<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'work_date', 
        'user_id', 
        'start_time', 
        'finish_time', 
        'body', 
    ];

    public function user(){
        return $this -> belongsTo('App\Models\User');
    }


    public function scopeIsActive(){
        return Post::select('posts.*')
               -> join('users','users.id','=','posts.user_id')
               -> where('users.active', 1)
               -> orderBy('posts.id','desc');
    }

}
