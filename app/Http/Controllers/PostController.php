<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Work;
use App\Models\Comment;
use Illuminate\Http\Request;
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
        return view('post.edit',[
            'post' => $post,
        ]);
    }

    public function update(Request $request, Post $post)
    {
        //
    }

    public function destroy(Post $post)
    {
        //
    }
}
