<?php

namespace App\Http\Livewire;

use App\Tweet;
use Livewire\Component;

class PublishTweet extends Component
{

    public $body;

    protected $rules = [
        'body' => 'required|min:3|max:191',
    ];

    public function publish()
    {
        $this->validate();

        Tweet::create([
            'body' => $this->body,
            'user_id' => auth()->id(),
        ]);

        $this->emitTo('timeline', 'freshParant');

        $this->body = "";
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function render()
    {
        return view('livewire.publish-tweet');
    }
}
