<?php

namespace App\Http\Livewire;

use App\User;
use Livewire\Component;

class ExplorePeopleList extends Component
{

    protected $users;
    public $searchTerm;

    protected $listeners = ['removeFollowedUser' => '$refresh'];


    public function render()
    {
        $searchTerm = '%' . $this->searchTerm . '%';
        $this->users = User::whereNotIn(
            'id',
            auth()->user()->follows()->pluck('id')
                ->prepend(auth()->user()->id)
        )->where('name', 'LIKE', $searchTerm)->paginate(50);

        return view('livewire.explore-people-list', [
            'users' => $this->users
        ]);
    }
}
