<?php

namespace App\Model\admin;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class admin extends Authenticatable
{
    use Notifiable;

    public function admin()
    {
        return $this->hasMany('App\Model\user\Post');
    }

    public function roles()
    {
        return $this->belongsToMany('App\Model\admin\role');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'username', 'password', 'status', 'phone',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
