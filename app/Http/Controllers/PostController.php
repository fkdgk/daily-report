<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Work;
use App\Models\Project;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function user($id)
    {
        $posts = Post::whereUserId($id)->orderWorkDate()->paginate(15);
        return view('post.user',[
            'posts'  => $posts,
            'id'=> $id,
        ]);
    }

    public function index()
    {
        $posts = Post::whereUserId(Auth::id())->orderWorkDate()->paginate(15);
        return view('post.index',[
            'posts' => $posts,
        ]);
    }

    public function create()
    {
        $projects = Project::select();
        return view('post.create',[
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

            toastr() -> success('新規作成しました');
            DB::commit();

        } catch (\Exception $e) {
            toastr() -> error('エラーが発生しました');
            DB::rollback();
            return redirect() -> back();
        }

        return redirect() -> route('post.show', $post -> id);
    }

    public function show(Post $post)
    {

        $prev = Post::prev($post)->first();
        $next = Post::next($post)->first();
        $works = Work::where('post_id', $post->id)->get();
        $comments = Comment::where('post_id',$post -> id)->get();

        return view('post.show',[
            'post' => $post,
            'prev' => $prev,
            'next' => $next,
            'works' => $works,
            'comments' => $comments,
        ]);
    }

    public function edit(Post $post)
    {
        $works = Work::where('post_id', $post->id)->get();
        $projects = Project::select();
        return view('post.edit',[
            'post' => $post,
            'works' => $works,
            'projects' => $projects,
        ]);
    }

    public function createWork($post_id, $project_id)
    {
        $check_count = $project_id;
        $count = ($check_count) ? count($check_count) : null;

        /* delete all works */
        Work::where('post_id',$post_id)->delete();

        for ($i=0; $i < $count; $i++) {
            if(!request('project_id')[$i]) continue;

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
            'finish_time' => 'date_format:H:i',
        ]);
    }

    public function update(Request $request, Post $post)
    {
        
        $this -> validateForm($request);

        DB::beginTransaction();
        try {
            
            /* post update */
            $post -> fill(request()->all())->save();    

            /* update works */
            $this -> createWork($post -> id, request('project_id'));

            toastr() -> success('更新しました');
            DB::commit();
        } catch (\Exception $e) {
            toastr() -> error('エラーが発生しました');
            DB::rollback();
        }

        return redirect() -> back();
        
    }

    public function destroy(Post $post)
    {
        $user_id = $post -> user_id;
        $post -> delete();
        toastr() -> error('削除しました');
        return redirect() -> route('post.user',$user_id);
    }
}
