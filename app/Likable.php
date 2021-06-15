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
        return DB::select('SELECT like_count(?) likeCount', [$this->id])[0]->likeCount ?? 0;
    }

    public function dislikeCount()
    {
        return DB::select('SELECT dislike_count(?) dislikeCount', [$this->id])[0]->dislikeCount ?? 0;
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
        DB::statement(
            'CALL like_dislike(?, ?, ?)',
            [$user ? $user->id : auth()->user()->id(), $this->id, $liked]
        );
    }

    public function removeLike()
    {
        $this->users()->detach(auth()->user()->id);
    }
}