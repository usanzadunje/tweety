<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use Notifiable, Followable;

    protected $guarded = [];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getAvatarAttribute($value)
    {
        return asset('storage/avatars/' . $value);
    }

    public function getBannerAttribute($value)
    {
        return asset('storage/banners/' . $value);
    }

    public function tweets()
    {
        return $this-> hasMany('App\Tweet')->latest();
    }

    public function path($append = '')
    {
        $path = route('profile', $this->username);
        return $append ? "{$path}/{$append}" : $path;
    }

    public function timeline()
    {
        return Tweet::where('user_id', $this->id)
            ->orWhereIn('user_id', $this->follows()->pluck('id'))
            ->withLikes()
            ->latest()
            ->simplePaginate(10);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function latestTweet()
    {
        return $this->hasOne('App\Tweet')->latest();
    }

}
