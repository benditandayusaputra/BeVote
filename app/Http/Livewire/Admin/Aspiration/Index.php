<?php

namespace App\Http\Livewire\Admin\Aspiration;

use App\Aspiration;
use Livewire\Component;

class Index extends Component
{
    public $aspirations;

    public function render()
    {
        session()->forget('success');
        $this->aspirations = Aspiration::all();
        return view('livewire.admin.aspiration.index');
    }
}
