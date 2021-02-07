<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Post;
use App\Models\Division;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateUser;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

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

    public function update(UpdateUser $request, User $user)
    {
        /* User Store Validate */
        // request()->validate([
            // 'img' => 'image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            // 'name' => 'required|max:50',
            // 'email' => 'email|unique:users,email,' . $user->id,
            // 'password' => 'sometimes|nullable|min:6',
            // 'division_id' => 'required',
        // ]);

        makeUserImage($user);

        /* update password */
        $password = request('password');
        if($password)
            {
                $user -> password = bcrypt($password);
            }

        $user->save();

        // return $request -> all();
        $user -> fill($request->only([
                'name',
                'email',
                'role',
                'division_id',
                'active',
            ]))->save();

        toastr() -> success('更新しました');
        return redirect() -> back();
    }

    public function destroy($id)
    {
        //
    }
}
