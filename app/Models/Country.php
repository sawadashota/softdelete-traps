<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Country extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'name',
    ];
    
    protected static function boot()
    {
        parent::boot();
        self::deleting(function ($country) {
            // Postが削除されない
            // $country->users()->delete();
            
            
            // ぐるぐる削除
            // $users = $country->users;
            // foreach($users as $user) {
            //     $user->delete();
            // }
            
            // 削除するモデルを全部書きだす
            $user_ids = $country->users->pluck('id')->toArray();
            Post::whereIn('user_id', $user_ids)->delete();
            User::destroy($user_ids);
        });
    }
    
    
    public function users()
    {
        return $this->hasMany('App\Models\User');
    }
    
    public function posts()
    {
        return $this->hasManyThrough('App\Models\Post', 'App\Models\User');
    }
}
