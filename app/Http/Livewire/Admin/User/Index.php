<?php

namespace App\Http\Livewire\Admin\User;

use App\User;
use Livewire\Component;

class Index extends Component
{
    public $users;

    public function downloadFile()
    {
        $path = public_path('media/example.csv');
        $this->emit('startDownload', $path);
    }

    public function render()
    {
        $this->users = User::all();
        return view('livewire.admin.user.index');
    }
}
