<?php

namespace Forum;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function profile(){

        return $this->hasOne('Forum\profile');
    }

    public function threads(){

        return $this->hasMany('Forum\thread');
    }

    public function answer(){

        return $this->hasMany('Forum\answer');
    }
}
