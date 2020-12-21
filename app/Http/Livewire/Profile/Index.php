<?php

namespace App\Http\Livewire\Profile;

use Illuminate\Support\Facades\Session;
use Livewire\Component;

class Index extends Component
{
    public function back()
    {
        $session = ['id', 'nis', 'name', 'class', 'gender', 'user_type'];
        Session::forget($session);
        return redirect()->route('login.index');
    }

    public function next()
    {
        return redirect()->route('choice.index');
    }

    public function render()
    {
        return view('livewire.profile.index');
    }
}
