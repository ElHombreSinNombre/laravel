<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = "users";

    protected $fillable = [
        'user_name', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public static $rules = [
        "password" => "required",
        "user_name" => "required",
    ];

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = Hash::make($password);   
    }
}
