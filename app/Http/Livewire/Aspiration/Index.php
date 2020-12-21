<?php

namespace App\Http\Livewire\Aspiration;

use App\Aspiration;
use App\User;
use Livewire\Component;
use Illuminate\Support\Facades\Session;

class Index extends Component
{
    public $aspirations, $aspiration, $critic;

    public function mount()
    {
        $this->aspirations = Aspiration::limit(5)->get();
    }

    public function save()
    {
        Aspiration::create([
            'user_id'       => session('id'),
        	'critic'		=> $this->critic,
            'aspiration'    => $this->aspiration
        ]);

        User::where('id', session('id'))->update(['status_choice' => '1']);

        $session = ['id', 'nis', 'name', 'class', 'gender', 'user_type'];
        Session::forget($session);
        session()->flash('success', 'Terimakasih Telah Memilih');
        return redirect()->route('login.index');
    }

    public function render()
    {
        return view('livewire.aspiration.index');
    }
}
