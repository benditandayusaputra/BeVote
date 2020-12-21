<?php

namespace App\Http\Livewire\Admin\Profile;

use App\Admin;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Change_password extends Component
{
    public $oldPassword, $newPassword, $confirmPassword;

    public function change()
    {
        $message = [
            'oldPassword.required'  => 'Password Lama Harus Di Isi',
            'newPassword.required'  => 'Password Barus Harus Di Isi',
            'newPassword.same'      => 'Konfirmasi Password Tidak Sama'
        ];

        $this->validate([
            'oldPassword'       => 'required',
            'newPassword'       => 'required|same:confirmPassword',
            'confirmPassword'   => 'required|same:newPassword'
        ], $message);

        $admin = Admin::find(session('id'));

        if (Hash::check($this->oldPassword, $admin->password)) {
            $admin->update([
                'password'  => Hash::make($this->newPassword)
            ]);

            session()->flash('success', 'Password Berhasil Di Gantti');
            return redirect()->route('admin.profile.index');
        } else {
            session()->flash('error', 'Password Lama Tidak Sesuai');
            return redirect()->route('admin.profile.change_password');
        }
    }

    public function render()
    {
        return view('livewire.admin.profile.change_password');
    }
}
