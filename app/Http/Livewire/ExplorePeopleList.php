<?php

namespace App\Http\Livewire;

use App\User;
use Livewire\Component;

class ExplorePeopleList extends Component
{

    protected $listeners = ['removeFollowedUser' => '$refresh'];


    public function render()
    {
        return view('livewire.explore-people-list', [
            'users' => User::whereNotIn('id', auth()->user()->follows()->pluck('id')->prepend(auth()->user()->id))->paginate(50),
        ]);
    }
}
