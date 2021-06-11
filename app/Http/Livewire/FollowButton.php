<?php

namespace App\Http\Livewire;

use App\Events\UserFollowedMeEvent;
use App\User;
use Livewire\Component;

class FollowButton extends Component
{

    public $followedUser;

    protected $listeners = [
        'userFollowed' => '$refresh'
    ];

    public function mount(User $followedUser)
    {
        $this->followedUser = $followedUser;
    }

    public function follow()
    {
        current_user()->toggleFollow($this->followedUser);

        if(current_user()->following($this->followedUser))
        {
            $this->emitSelf('userFollowed');
            $this->emitTo('friends-list', 'userFollowed');
            $this->emitUp('removeFollowedUser');
            event(new UserFollowedMeEvent($this->followedUser));
        }
        else
        {
            $this->emitTo('friends-list', 'removeUnfollowedFriend');
        }


    }

    public function render()
    {
        return view('livewire.follow-button');
    }
}
