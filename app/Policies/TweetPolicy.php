<?php

namespace App\Policies;

use App\Tweet;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TweetPolicy
{
    use HandlesAuthorization;

    public function delete(User $user, Tweet $tweet)
    {
        return $user->is($tweet->user);
    }
}
