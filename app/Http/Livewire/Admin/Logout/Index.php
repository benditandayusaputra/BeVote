<?php

namespace App\Http\Livewire\Admin\Logout;

use Illuminate\Support\Facades\Session;
use Livewire\Component;

class Index extends Component
{
    public function mount()
    {
        $session = ['id', 'username', 'name', 'photo'];
        Session::forget($session);
        session()->flash('success', 'Anda Berhasil Logout');
        return redirect()->route('admin.login.index');
    }
}
