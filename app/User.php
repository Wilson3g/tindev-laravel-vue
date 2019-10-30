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
        'user',
        'password',
        'avatar'
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

