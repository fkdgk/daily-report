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
        $posts = Post::where('user_id', $id)->orderBy('id','desc')->paginate(15);
        return view('post.user',[
            'posts'  => $posts,
            'id'=> $id,
        ]);
    }

    public function index()
    {
        $posts = Post::where('user_id', Auth::id())->orderBy('id','desc')->paginate(15);
        return view('post.index',[
            'posts' => $posts,
        ]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Post $post)
    {
        $prev = Post::where('id', '<', $post->id)->max('id');
        $next = Post::where('id', '>', $post->id)->min('id');
        $works = Work::where('post_id', $post->id)->get();
        $comments = Comment::where('post_id',$post -> id)->orderBy('id','desc')->get();
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
        $works = Work::where('post_id', $post->id)->latest()->get();
        $projects = Project::all()->pluck('name','id');
        return view('post.edit',[
            'post' => $post,
            'works' => $works,
            'projects' => $projects,
        ]);
    }

    public function update(Request $request, Post $post)
    {
        /* post update */
        // return $post;
        $post -> fill(request()->all())->save();

        // $post -> update([request()->all()]);
        return redirect() -> back();
        /* works delete,insert */

        DB::beginTransaction();
        try {
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
        }
        $post_id = $post -> id;
        $works = Work::where('post_id',$post_id)->get();
        dd($works);
        $count = count(request('project_id'));
        for ($i=0; $i < $count; $i++) { 
            echo $i;
            echo "<br>";
        }
        return request('project_id');
        return count(request('project_id'));
        return $request;
    }

    public function destroy(Post $post)
    {
        //
    }
}
