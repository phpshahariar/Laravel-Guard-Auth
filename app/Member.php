<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;


use Illuminate\Database\Eloquent\Model;

class Member extends Authenticatable
{
    use Notifiable;

        protected $guard = 'writer';

        protected $fillable = [
            'name', 'email', 'password',
        ];

        protected $hidden = [
            'password', 'remember_token',
        ];
}
