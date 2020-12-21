<?php

namespace App\Http\Livewire\Admin\Osis;

use App\Osis;
use Livewire\Component;
use Illuminate\Support\Facades\Storage;

class Index extends Component
{
    public $osis;

    public function render()
    {
        $this->osis = Osis::first();
        return view('livewire.admin.osis.index');
    }
}
