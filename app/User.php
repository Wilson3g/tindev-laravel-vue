<?php

namespace App;

use App\Like;
use Illuminate\Database\Eloquent\Model;

class User extends Model
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
}

