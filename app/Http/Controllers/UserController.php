<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        /* 
         * https://www.pakutaso.com/model.html
         */
        $users = User::orderBy('id','desc')->get();
        return view('user.index',[
            'users' => $users,
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

    public function show(User $user)
    {
        $posts = Post::where('user_id', $user -> id)->orderBy('id','desc')->paginate(5);
        return view('user.show',[
            'user' => $user,
            'posts' => $posts,
        ]);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
