<?php

namespace App\Http\Livewire;

use App\User;
use Livewire\Component;
use Livewire\WithFileUploads;

class BannerUpload extends Component
{
    use WithFileUploads;

    public $banner;
    public $user;

    public function mount(User $user)
    {
        $this->user = $user;
    }

    public function render()
    {
        return view('livewire.banner-upload');
    }
}
