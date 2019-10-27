<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
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
