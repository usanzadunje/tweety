<?php


namespace App;


use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;

trait Likable
{

    public function scopeWithLikes(Builder $query)
    {
        $query->leftJoinSub(
            'select tweet_id, sum(liked) likes from likes group by tweet_id',
            'likes', 'likes.tweet_id', 'tweets.id'
        );
    }

    public function likeCount()
    {
        return DB::table('likes')
            ->select(DB::raw('sum(liked) likes'))
            ->where('tweet_id', $this->id)
            ->get()->sum('likes');
    }

    public function dislikeCount()
    {
        return DB::table('likes')
            ->select(DB::raw('sum(!liked) dislikes'))
            ->where('tweet_id', $this->id)
            ->get()->sum('dislikes');
    }

    public function isLikedBy(User $user)
    {
        return (bool)$user->likes
            ->where('tweet_id', $this->id)
            ->where('liked', true)->count();
    }

    public function isDislikedBy(User $user)
    {
        return (bool)$user->likes
            ->where('tweet_id', $this->id)
            ->where('liked', false)->count();
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function dislike($user = null)
    {
        return $this->like($user, false);
    }

    public function like($user = null, $liked = true)
    {
        $this->likes()->updateOrCreate([
            'user_id' => $user ? $user->id : auth()->user()->id(),
        ], [
            'liked' => $liked,
        ]);
    }

    public function removeLike()
    {
        $this->users()->detach(auth()->user()->id);
    }
}