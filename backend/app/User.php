<?php

namespace App;

use App\Like;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    protected $fillable = [
        'name',
        'bio',
        'email',
        'password',
        'avatar'
    ];

    protected $hidden = [
        'password', 'remember_token'
    ];

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function getJWTIdentifier() 
    {    
        return $this->getKey();
    }
    
    public function getJWTCustomClaims() 
    {
        return [];
    }
}

