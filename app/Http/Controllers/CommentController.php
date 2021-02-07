<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{

    public function store(Request $request)
    {
        $request->validate([
            'body' => 'required',
        ]);
        
        $comment = Comment::create($request->all());
        toastr() -> success('コメントを投稿しました');
        return redirect() -> route('post.show', request('post_id') . '#a' . $comment -> id);
    }

}
