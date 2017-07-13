<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'country_id',
        'email'
    ];

    protected static function boot()
    {
        parent::boot();
        self::deleting(
            function ($user) {
                $user->posts()->delete();
            }
        );
    }


    public function country()
    {
        return $this->belongsTo('App\Models\Country');
    }

    public function posts()
    {
        return $this->hasMany('App\Models\Post');
    }
}
