<?php

namespace App;

use Tymon\JWTAuth\Contracts\JWTSubject;
use App\Like;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements JWTSubject
{
    protected $fillable = [
        'name',
        'bio',
        'user',
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

