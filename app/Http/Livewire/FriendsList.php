<?php

namespace App\Http\Livewire;

use Livewire\Component;

class FriendsList extends Component
{

    protected $listeners = [
        'removeUnfollowedFriend' => '$refresh',
        'userFollowed' => '$refresh',
        ];

    public function render()
    {
        return view('livewire.friends-list');
    }
}
