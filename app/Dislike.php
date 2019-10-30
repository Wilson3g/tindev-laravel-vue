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

    protected static function boot()
    {
        parent::boot();
        static::updating(function($model){
            return false;
        });
    }

    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
