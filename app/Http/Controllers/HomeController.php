<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

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

        /* ユーザが有効のみ */
        $posts = Post::select('posts.*')
        -> join('users','users.id','=','posts.user_id')
        -> where('users.active', 1)
        -> orderBy('posts.id','desc')
        -> paginate(15);

        $users = User::orderBy('id','desc')->where('active',1)->get();
        
        return view('home',[
            'posts' => $posts,
            'users' => $users,
        ]);
    }
}
