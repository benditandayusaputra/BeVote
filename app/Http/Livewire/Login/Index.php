<?php

namespace App\Http\Livewire\Login;

use App\Config;
use App\User;
use Illuminate\Support\Facades\Session;
use Livewire\Component;
use Illuminate\Support\Facades\Storage;

class Index extends Component
{
    public $config, $nis, $token;

    public function doLogin()
    {
        $message = [
            'token.required'    => 'Token Harus Di Isi',
            'nis.required'      => 'NIS Harus Di Isi'
        ];

        $this->validate([
            'token' => 'required',
            'nis'   => 'required'
        ], $message);

        $where = [
            'nis'   => $this->nis,
            'token' => $this->token
        ];
        $user = User::where($where)->first();

        if ( $user ) {
            if ( $user->status_choice == '0' ) {
                Session::put([
                    'id'        => $user->id,
                    'nis'       => $user->nis,
                    'name'      => $user->name,
                    'class'     => $user->class,
                    'gender'    => $user->gender,
                    'user_type' => $user->user_type
                ]);

                return redirect()->route('profile.index');
            } else {
                session()->flash('error', 'Anda Sudah Memilih!');
                return redirect()->route('login.index');
            }
        } else {
            session()->flash('error', 'NIS atau Token Salah!');
            return redirect()->route('login.index');
        }
    }

    public function render()
    {
        $this->config = Config::first();
        return view('livewire.login.index');
    }
}
