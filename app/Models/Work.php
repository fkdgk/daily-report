<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    use HasFactory;
    public function project(){
        return $this -> belongsTo('App\Models\Project');
    }

    protected $fillable = [
        'post_id',
        'project_id',
        'work_time',
        'progress',
        'limit',
    ];
}
