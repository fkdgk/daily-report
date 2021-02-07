<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Post;
use App\Models\Division;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        /* 
         * https://www.pakutaso.com/model.html
         */
        // $users = User::all();
        $users = User::orderIdDesc()->get();
        // $users = User::latest()->get();
        // $users = User::orderBy('id','desc')->get();
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
        $posts = Post::whereUserId($user -> id)->orderWorkDate()->paginate(5);
        $users = User::where('id','!=', $user->id)->isActive()->get();
        return view('user.show',[
            'user' => $user,
            'users' => $users,
            'posts' => $posts,
        ]);
    }

    public function edit(User $user)
    {
        $divisions = Division::all()->pluck('name','id');
        return view('user.edit',[
            'user' => $user,
            'divisions' => $divisions,
        ]);
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
