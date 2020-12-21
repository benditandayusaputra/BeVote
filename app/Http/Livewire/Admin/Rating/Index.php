<?php

namespace App\Http\Livewire\Admin\Rating;

use App\Rating;
use Livewire\Component;

class Index extends Component
{
    public $ratings;

    public function render()
    {
        session()->forget('success');
        $this->ratings = Rating::all();
        return view('livewire.admin.rating.index');
    }
}
