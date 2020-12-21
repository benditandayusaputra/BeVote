<?php

namespace App\Http\Livewire\Admin\Profile;

use App\Admin;
use Livewire\Component;
use Illuminate\Support\Facades\Storage;

class Index extends Component
{
    public $profile;

    public function mount()
    {
        $this->profile = Admin::first();
    }

    public function render()
    {
        return view('livewire.admin.profile.index');
    }
}
