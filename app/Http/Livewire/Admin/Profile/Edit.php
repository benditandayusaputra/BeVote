<?php

namespace App\Http\Livewire\Admin\Profile;

use App\Admin;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class Edit extends Component
{
    public $adminId, $name, $username, $photo, $newPhoto, $namePhoto;
    protected $listeners = ['newPhoto', 'namePhoto'];

    public function mount()
    {
        $profile = Admin::first();
        $this->adminId = $profile->id;
        $this->name = $profile->name;
        $this->username = $profile->username;
        $this->photo = $profile->photo;
    }

    public function newPhoto($photo)
    {
        $this->newPhoto = $photo;
    }

    public function namePhoto($name)
    {
        $this->namePhoto = $name;
    }

    public function storePhoto()
    {
        if (!$this->newPhoto) {
            return null;
        }

        Storage::disk('public')->put($this->namePhoto, $this->newPhoto);
        return $this->namePhoto;
    }

    public function update()
    {
        $profile = Admin::find($this->adminId);
        $photo = $this->storePhoto();
        if ($profile) {
            $profile->update([
                'name'      => $this->name,
                'username'  => $this->username,
                'photo'     => $photo
            ]);

            session()->flash('success', 'Profile Berhasil Di Update');
            return redirect()->route('admin.profile.index');
        }
    }

    public function render()
    {
        return view('livewire.admin.profile.edit');
    }
}
