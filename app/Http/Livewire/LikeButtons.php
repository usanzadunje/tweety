<?php

namespace App\Http\Livewire;

use App\Events\UserLikedMyTweetEvent;
use App\Tweet;
use Livewire\Component;

class LikeButtons extends Component
{

    public $tweet;

    protected $listeners = [
        'tweetLiked' => '$refresh'
    ];

    public function mount(Tweet $tweet)
    {
        $this->tweet = $tweet;
    }

    public function like()
    {
        if(!$this->tweet->isLikedBy(current_user()))
        {
            $this->tweet->like(current_user());

            event(new UserLikedMyTweetEvent($this->tweet));

        } else
        {
            $this->tweet->removeLike();
        }
        $this->emitSelf('tweetLiked');
    }

    public function dislike()
    {
        if(!$this->tweet->isDislikedBy(current_user()))
        {
            $this->tweet->dislike(current_user());
        } else
        {
            $this->tweet->removeLike();
        }
        $this->emitSelf('tweetLiked');
    }

    public function render()
    {
        return view('livewire.like-buttons');
    }
}
