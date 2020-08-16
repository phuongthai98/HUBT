<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'users';

    protected $fillable = ['first_name','last_name','status','email','password','address','avatar','phone','deleted_at','created_at','updated_at','remember_token'];
    protected $hidden = [
        'password', 'remember_token',
    ];
    public $timestamp = true;
}
