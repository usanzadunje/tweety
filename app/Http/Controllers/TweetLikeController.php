<?php

namespace App\Http\Controllers;

use App\Events\UserLikedMyTweetEvent;
use App\Tweet;
use Illuminate\Http\Request;

class TweetLikeController extends Controller
{
    public function store(Tweet $tweet)
    {
        if(!$tweet->isLikedBy(current_user()))
        {
            $tweet->like(current_user());

            event(new UserLikedMyTweetEvent($tweet));

        }
        else
        {
            $tweet->removeLike();
        }


        return back();
    }

    public function destroy(Tweet $tweet)
    {
        if(!$tweet->isDislikedBy(current_user()))
        {
            $tweet->dislike(current_user());
        }
        else
        {
            $tweet->removeLike();
        }

        return back();
    }
}
