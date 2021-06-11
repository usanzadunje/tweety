<?php

namespace App\Http\Livewire;

use App\Tweet;
use Livewire\Component;

class SingleTweet extends Component
{

    public $tweet;


    public function mount(Tweet $tweet)
    {
        $this->tweet = $tweet;
    }

    public function render()
    {
        return view('livewire.single-tweet');
    }
}
