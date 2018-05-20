<?php

namespace App\Models;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    protected $fillable = [
        'id', 'name', 'password', 'active',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function findForPassport($identifier) 
    {
        return $this->where('name', $identifier)->first();
    }

    public function validateForPassportPasswordGrant($password)
    {
        return $this->where('password', md5($password))->exists();
    }
}
