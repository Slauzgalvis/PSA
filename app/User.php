<?php

namespace WorkIT;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use WorkIT\workAd;
use WorkIT\User;
use WorkIT\applications;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function workAds()
    {
        return $this->hasMany('App\workAd');
    }
    public function applications()
    {
        return $this->hasMany('App\applications');
    }
}
