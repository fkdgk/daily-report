<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::where('user_id', Auth::id())->orderBy('id','desc')->paginate(10);
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
<<<<<<< HEAD
        return view('post.show',[
            'post' => $post,
        ]);
=======
<<<<<<< Updated upstream
        //
=======
        $prev = Post::where('id', '<', $post->id)->max('id');
        $next = Post::where('id', '>', $post->id)->min('id');
        return view('post.show',[
            'post' => $post,
            'prev' => $prev,
            'next' => $next,
        ]);
>>>>>>> Stashed changes
>>>>>>> 0.9
    }

    public function edit(Post $post)
    {
        //
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
