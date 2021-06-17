<?php

namespace App\Http\Livewire;

use App\User;
use App\Tweet;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Card extends Component
{
    public $title;
    public $analyticsFor;
    public $cardType;

    public $user;
    public $tweet;

    public function mount()
    {
        $this->tweet = $this->analyticsFor === 'self'
            ? auth()->user()->tweets()->latest()->first()
            : Tweet::find(18);
        if($this->analyticsFor === 'self')
        {
            $this->user = auth()->user();
        }
        else
        {
            $this->user = $this->cardType === 'tweet'
                ? $this->tweet->user
                : DB::select('CALL most_followed_person')[0];
        }

    }

    public function render()
    {
        return view('livewire.card', [
            'tweet' => auth()->user()->tweets()->latest()->first(),
            'user' => $this->user
        ]);
    }
}
