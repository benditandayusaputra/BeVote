<?php

namespace App\Http\Livewire\Admin\Login;

use App\Admin;
use App\Config;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class Index extends Component
{
    public $username, $password, $config;

    public function doLogin()
    {
        $message = [
            'username.required' => 'Username Harus Di Isi',
            'password.required' => 'Password Harus Di Isi'
        ];

        $this->validate([
            'username'  => 'required',
            'password'  => 'required'
        ], $message);

        $where = ['username'  => $this->username];
        $admin = Admin::where($where)->first();

        if ($admin) {
            $cekPassword = Hash::check($this->password, $admin->password);

            if ( $cekPassword ) {
                Session::put([
                    'id'        => $admin->id,
                    'username'  => $admin->username,
                    'name'      => $admin->name,
                    'photo'     => $admin->photo
                ]);
                return redirect()->route('admin.dashboard.index');
            } else {
                session()->flash('error', 'Username atau Password Salah'); 
                return redirect()->route('admin.login.index');
            }
        } else {
            session()->flash('error', 'Username atau Password Salah');
            return redirect()->route('admin.login.index');
        }
    }

    public function render()
    {
        $this->config = Config::first();
        return view('livewire.admin.login.index');
    }
}
