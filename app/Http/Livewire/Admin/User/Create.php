<?php

namespace App\Http\Livewire\Admin\User;

use App\User;
use Livewire\Component;
use Illuminate\Support\Str;

class Create extends Component
{
    public $nis, $token, $name, $gender, $user_type, $class;

    public function save()
    {
        $message = [
            'nis.required'          => 'NIS harus Di Isi',
            'nis.unique'            => 'NIS Sudah Ada',
            'name.required'         => 'Nama Harus Di Isi',
            'gender.required'       => 'Jenis Kelamin Harus Di Isi',
            'user_type.required'    => 'Jabatan User Harus Di Isi',
            'class.required'        => 'Kelas Harus Di Isi'
        ];

        $this->validate([
            'nis'       => 'required|unique:users',
            'name'      => 'required',
            'gender'    => 'required',
            'user_type' => 'required',
            'class'     => 'required'
        ], $message);

        $this->token = strtoupper(Str::random(6));
        
        User::create([
            'nis'       => $this->nis,
            'name'      => $this->name,
            'gender'    => $this->gender,
            'class'     => $this->class,
            'user_type' => $this->user_type,
            'token'     => $this->token
        ]);

        session()->flash('success', 'Data Berhasil Di Tambahkan');
        return redirect()->route('admin.user.index');
    }

    public function render()
    {
        return view('livewire.admin.user.create');
    }
}
