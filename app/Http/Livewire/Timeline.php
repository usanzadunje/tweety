<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;

class Timeline extends Component
{
    use WithPagination;

    public $user;

    protected $listeners = ['freshParant' => '$refresh'];

    public function render()
    {
        return view('livewire.timeline', [
            'tweets' => $this->user ? $this->user->tweets()->simplePaginate(10) : auth()->user()->timeline(),
        ]);
    }
}
