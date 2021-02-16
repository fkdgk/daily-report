<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Comment;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        /* すべての投稿 */
        // $posts = Post::orderBy('id','desc')->paginate(15);
        $posts = Post::isActive() -> paginate(15);
        $users = User::withCount('posts')->isActive()->get(); // Count 効率よく取得 https://blog.nakamu.life/posts/laravel-withcount
        $comments = Comment::orderBy('id','desc')->take(5)->get();
        
        return view('home',compact('posts','users','comments'));
    }
}
