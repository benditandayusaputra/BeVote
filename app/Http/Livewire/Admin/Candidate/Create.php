<?php

namespace App\Http\Livewire\Admin\Candidate;

use Livewire\Component;
use App\Candidate;  
use Illuminate\Support\Facades\Storage;

class Create extends Component
{
    public $photo;
    public $photoName;
    public $chairman_name;
    public $vice_chairman_name;
    public $vision;
    public $mision;

    protected $listeners = [
        'photoUpload' => 'handlePhotoUpload',
        'photoName'   => 'handlePhotoName'
    ];

    public function handlePhotoName($photoName)
    {
        $this->photoName = date('YmdHis').$photoName;
    }

    public function handlePhotoUpload($photoData)
    {
        $this->photo = $photoData;
    }

    public function storePhoto()
    {
        if( !$this->photo ) {
            return null;
        } else {
            Storage::disk('public')->put($this->photoName, $this->photo);
            return $this->photoName;
        }
    }

    public function save()
    {
        $message = [
            'chairman_name.required'        => 'Nama Calon Ketua OSIS Harus Di Isi',
            'vice_chairman_name.required'   => 'Nama Calon Wakil Ketua OSIS Hari Di Isi'
        ];

        $this->validate([
            'chairman_name'         => 'required',
            'vice_chairman_name'    => 'required'
        ], $message);

        $photo = $this->storePhoto();

        if ( $photo == null ) {
            return session()->flash('error', 'Foto Harus Di Isi');
        }

        Candidate::create([
            'chairman_name'         => $this->chairman_name,
            'vice_chairman_name'    => $this->vice_chairman_name,
            'mission'               => $this->mision,
            'vision'                => $this->vision,
            'photo'                 => $photo
        ]);

        $this->chairman_name = '';
        $this->vice_chairman_name = '';
        $this->mision = '';
        $this->vision = '';
        $this->photo = '';
        $this->photoName = '';

        session()->flash('success', 'Calon Berhasil Di Tambahkan');
        return redirect()->route('admin.candidate.index');
    }

    public function render()
    {
        return view('livewire.admin.candidate.create');
    }
}
