<?php

namespace App\Http\Livewire\Rating;

use App\Osis;
use App\Rating;
use Livewire\Component;

class Index extends Component
{
    public $osis;
    public $listeners = ['save'];

    public function mount()
    {
        $this->osis = Osis::first();
    }

    public function save($rating)
    {
        Rating::create([
            'oses_id'   => $this->osis->id,
            'user_id'   => session('id'),
            'rating'    => $rating
        ]);
        return redirect()->route('aspiration.index');
    }

    public function render()
    {
        return view('livewire.rating.index');
    }
}
