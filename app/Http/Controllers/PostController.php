<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Work;
use App\Models\User;
use App\Models\Project;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public $post_count = 15;

    public function index(User $user)
    {
        $posts = $user -> posts() -> paginate($this -> post_count);
        return view('post.index', compact('user', 'posts'));
    }


    public function show(Post $post)
    {
        $prev = Post::prev($post)->first();
        $next = Post::next($post)->first();
        // $works = Work::where('post_id', $post->id)->get(); // opt 1
        // $works = $post -> works() -> get();// opt 2
        $works = $post -> works; // opt 3
        // $comments = Comment::where('post_id',$post -> id)->get(); // opt 1
        $comments = $post -> comments;  // opt 2
        $user = $post -> user;

        /* compact を使った書き方 */
        return view('post.show', compact('user', 'post', 'prev', 'next', 'works', 'comments'));
        // return view('post.show',[
        //     'user' => $user,
        //     'post' => $post,
        //     'prev' => $prev,
        //     'next' => $next,
        //     'works' => $works,
        //     'comments' => $comments,
        // ]);
    }


    public function edit(Post $post)
    {
        if (Auth::id() != $post -> user_id) {
            toastr_not_allow();
            return redirect() -> route('home');
        }
        
        // $works = Work::where('post_id', $post->id)->get();
        $works = $post -> works;
        $user = $post -> user;
        $projects = Project::formSelect();
        
        return view('post.edit', [
            'post' => $post,
            'user' => $user,
            'works' => $works,
            'projects' => $projects,
        ]);
    }

    public function create()
    {
        $projects = Project::formSelect();
        $user = Auth::user();
        return view('post.create', [
            'user' => $user,
            'works' => [],
            'projects' => $projects,
        ]);
    }

    public function store(Request $request)
    {
        $this -> validateForm($request);

        DB::beginTransaction();
        try {
            // $post = Post::create($request->all());
            $post = Post::create(array_merge($request->all(), [
                'user_id' => Auth::id(),
            ]));

            /* store works */
            $this -> createWork($post -> id, request('project_id'));

            toastr_store();
            DB::commit();
        } catch (\Exception $e) {
            toastr_error();
            DB::rollback();
            return redirect() -> back();
        }

        return redirect() -> route('post.show', $post -> id);
    }


    public function createWork($post_id, $project_id)
    {
        $check_count = $project_id;
        $count = ($check_count) ? count($check_count) : null;

        /* delete all works */
        Work::where('post_id', $post_id)->delete();

        for ($i=0; $i < $count; $i++) {
            if (!request('project_id')[$i]) {
                continue;
            }

            Work::create([
                'post_id' => $post_id,
                'project_id' => request('project_id')[$i],
                'work_time' => request('work_time')[$i],
                'progress' => request('progress')[$i],
                'limit' => request('limit')[$i],
            ]);
        }
    }

    public function validateForm(Request $request)
    {
        $request->validate([
            'work_date' => 'required|date',
            'start_time' => 'date_format:H:i',
            'finish_time' => 'date_format:H:i|after:start_time',
        ]);
    }

    public function copy(Post $post)
    {
        DB::beginTransaction();
        try {

            /* copy post */
            $old_id = $post -> id;
            $old_post = Post::find($old_id);

            $new_post = $old_post
                    -> replicate()
                    -> fill([
                            'user_id' => Auth::id(),
                            'work_date' => date('Y-m-d'),
                        ]);
            $new_post->save();
            $new_id = $new_post -> id;

            /* copy work */
            $old_works= Work::where('post_id', $old_id)->get();
            foreach ($old_works as $old_work) {
                $new_work = $old_work
                        -> replicate()
                        -> fill([
                            'user_id' => Auth::id(),
                            'post_id' => $new_post -> id,
                        ]);
                $new_work -> save();
            }

            toastr_copy();
            DB::commit();
        } catch (\Exception $e) {
            toastr_error();
            DB::rollback();
            return redirect() -> back();
        }

        return redirect() -> route('post.edit', $new_id);
    }

    public function update(Request $request, Post $post)
    {
        $this -> validateForm($request);

        DB::beginTransaction();
        try {
            
            /* post update */
            $post -> fill($request->all())->save();

            /* update works */
            $this -> createWork($post -> id, request('project_id'));

            toastr_update();
            // toastr() -> success('更新しました');
            DB::commit();
        } catch (\Exception $e) {
            toastr_error();
            // toastr() -> error('エラーが発生しました');
            DB::rollback();
        }

        return redirect() -> back();
    }

    public function destroy(Post $post)
    {
        $user_id = $post -> user_id;
        $post -> delete();
        toastr_error();
        return redirect() -> route('post.index', $user_id);
    }
}
