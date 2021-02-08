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

    public function works()
    {
        return $this -> hasMany('App\Models\Work');
    }

    public function comments()
    {
        return $this -> hasMany('App\Models\Comment');
    }

    public function user()
    {
        return $this -> belongsTo('App\Models\User');
    }

    public function scopePrev($query,$post)
    {
        return $query -> where('user_id',$post -> user_id)
                      -> where('work_date', '<', $post -> work_date)
                      -> orderBy('work_date', 'desc')
                      -> limit(1);
    }

    public function scopeNext($query,$post)
    {
        return $query -> where('user_id',$post -> user_id)
                      -> where('work_date', '>',  $post -> work_date)
                      -> orderBy('work_date','asc')
                      -> limit(1);
    }

    public function scopeWhereUserId($query, $id)
    {
        return $query -> where('user_id', $id);
    }

    public function scopeOrderWorkDate($query)
    {
        return $query -> orderBy('work_date','desc');
    }

    public function scopeIsActive()
    {
        return Post::select('posts.*')
               -> join('users','users.id','=','posts.user_id')
               -> where('users.active', 1)
               -> orderBy('posts.work_date','desc');
    }

}
