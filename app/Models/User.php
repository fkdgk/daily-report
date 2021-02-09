<?php

namespace App\Models;
use App\Models\Post;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    public function getImage()
    {
        return asset('img') . '/' . $this -> img;
    }

    public function getPostCount()
    {
        return Post::where('user_id',$this -> id) ->get() -> count();
    }
    

    /* 
     * table  relations
     */
    public function division(){
        return $this -> belongsTo(Division::class);
    }

    public function posts($paginate)
    {
        return $this -> hasMany(Post::class) -> paginate($paginate);
    }

    /* 
     * adminlte settings
     */
    public function scopeIsActive($query)
    {
        return $query->where('active', true)->orderBy('id','desc');
    }

    /* 
     * adminlte settings
     */
    public function adminlte_image()
    {
        return asset('img') . '/' . $this -> img;
    }

    public function adminlte_desc()
    {
        return @$this -> division -> name;
        // return ($this -> division) ? $this -> division -> name :null;
    }

    public function adminlte_profile_url()
    {
        return route('user.show', Auth::id());
    }


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'img',
        'role',
        'active',
        'division_id',
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
