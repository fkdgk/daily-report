<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

<<<<<<< Updated upstream
=======

    public function adminlte_image()
    {
        return asset('img') . '/' . $this -> img;
    }

    public function adminlte_desc()
    {
        return ($this -> division)? $this -> division -> name :null;
    }

    public function adminlte_profile_url()
    {
        return 'profile/username';
    }

    public function division(){
        return $this -> belongsTo('App\Models\Division');
    }

>>>>>>> Stashed changes
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
