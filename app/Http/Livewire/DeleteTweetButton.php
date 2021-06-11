<?php

namespace App\Http\Livewire;

use App\Tweet;
use Livewire\Component;

class DeleteTweetButton extends Component
{

    public $tweet;

    public function mount(Tweet $tweet)
    {
        $this->tweet = $tweet;
    }

    public function destroy()
    {
        $this->tweet->delete();

        $this->emitTo('timeline', 'freshParant');
    }

    public function render()
    {
        return view('livewire.delete-tweet-button');
    }
}
