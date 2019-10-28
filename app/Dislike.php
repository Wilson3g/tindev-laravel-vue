<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Dislike extends Model
{
    protected $fillable = [
        'target',
        'user_id'
    ];

    public function users()
    {
        return $this->belongsTo(User::class);
    }
}