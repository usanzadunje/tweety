<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;

class Timeline extends Component
{
    use WithPagination;


    protected $listeners = ['freshParant' => '$refresh'];

    public function render()
    {
        return view('livewire.timeline', [
            'tweets' => auth()->user()->timeline(),
        ]);
    }
}
