<?php

namespace App\Http\Livewire\Admin\Osis;

use App\Osis;
use Livewire\Component;
use Illuminate\Support\Facades\Storage;

class Edit extends Component
{
    public $osisId;
    public $osis;
    public $photo;
    public $newPhoto;
    public $photoName;
    public $chairman_name;
    public $vice_chairman_name;
    public $moto;
    public $vision;
    public $mision;

    protected $listeners = [
        'photoUpload' => 'handlePhotoUpload',
        'photoName'   => 'handlePhotoName'
    ];

    public function mount()
    {
        $osis = Osis::first();
        if ($osis) {
            $this->osisId = $osis->id;
            $this->photo = $osis->photo;
            $this->chairman_name = $osis->chairman_name;
            $this->vice_chairman_name = $osis->vice_chairman_name;
            $this->vision = $osis->vision;
            $this->mision = $osis->mission;
            $this->moto = $osis->moto;
        }
    }

    public function handlePhotoName($photoName)
    {
        $this->photoName = date('YmdHis') . $photoName;
    }

    public function handlePhotoUpload($photoData)
    {
        $this->newPhoto = $photoData;
    }

    public function storePhoto()
    {
        if (!$this->newPhoto) {
            return null;
        }

        Storage::disk('public')->delete($this->photo);
        Storage::disk('public')->put($this->photoName, $this->newPhoto);
        return $this->photoName;
    }

    public function update()
    {
        $osis = Osis::find($this->osisId);
        $photo = $this->storePhoto();
        if ($osis) {
            if ($photo == null) {
                $osis->update([
                    'chairman_name' => $this->chairman_name,
                    'vice_chairman_name' => $this->vice_chairman_name,
                    'vision' => $this->vision,
                    'mission' => $this->mision
                ]);
            } else {
                $osis->update([
                    'chairman_name' => $this->chairman_name,
                    'vice_chairman_name' => $this->vice_chairman_name,
                    'vision' => $this->vision,
                    'mission' => $this->mision,
                    'photo' => $photo
                ]);
            }
        }

        session()->flash('success', 'OSIS Berhasil Di Edit');
        return redirect()->route('admin.osis.index');
    }

    public function render()
    {
        $this->osis = Osis::first();
        return view('livewire.admin.osis.edit');
    }
}
