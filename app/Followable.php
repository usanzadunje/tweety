<?php


namespace App;


use Illuminate\Support\Facades\DB;

trait Followable
{

    public function follow($user)
    {
        return $this->follows()->save($user);
    }

    public function unfollow($user)
    {
        return $this->follows()->detach($user);
    }

    public function toggleFollow(User $user)
    {
       $this->follows()->toggle($user);
    }

    public function follows()
    {
        return $this->belongsToMany(
            User::class,
            'follows',
            'user_id',
            'following_user_id'
        );
    }

    public function following(User $user)
    {
        return $this->follows()->where('following_user_id', $user->id)->exists();
    }

    public function followings()
    {
        return $this->follows()->count();
    }

    public function followers()
    {
        $followingCount = DB::select('SELECT following_user_id FROM follows WHERE following_user_id = ?', [$this->id]);
        return count($followingCount);
    }

}