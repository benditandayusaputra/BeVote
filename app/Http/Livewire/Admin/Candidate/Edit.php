<?php

namespace App\Http\Livewire\Admin\Candidate;

use App\Candidate;
use Livewire\Component;
use Illuminate\Support\Facades\Storage;

class Edit extends Component
{
    public $candidateId;
    public $candidate;
    public $photo;
    public $newPhoto;
    public $photoName;
    public $chairman_name;
    public $vice_chairman_name;
    public $vision;
    public $mision;

    protected $listeners = [
        'photoUpload' => 'handlePhotoUpload',
        'photoName'   => 'handlePhotoName'
    ];

    public function mount($id)
    {
        $candidate = Candidate::find(decrypt($id));
        if ( $candidate ) {
            $this->candidateId = $candidate->id;
            $this->photo = $candidate->photo;
            $this->chairman_name = $candidate->chairman_name;
            $this->vice_chairman_name = $candidate->vice_chairman_name;
            $this->vision = $candidate->vision;
            $this->mision = $candidate->mission;
        }
    }

    public function handlePhotoName($photoName)
    {
        $this->photoName = date('YmdHis').$photoName;
    }

    public function handlePhotoUpload($photoData)
    {
        $this->newPhoto = $photoData;
    }

    public function storePhoto()
    {
        if( !$this->newPhoto ) {
            return null;
        } 
        
        Storage::disk('public')->delete($this->photo);
        Storage::disk('public')->put($this->photoName, $this->newPhoto);
        return $this->photoName;
    }

    public function update()
    {
        $candidate = Candidate::find($this->candidateId);
        $photo = $this->storePhoto();
        if ( $candidate ) {
            if( $photo == null ) {
                $candidate->update([
                    'chairman_name' => $this->chairman_name,
                    'vice_chairman_name' => $this->vice_chairman_name,
                    'vision' => $this->vision,
                    'mission' => $this->mision
                ]);
            } else {
                $candidate->update([
                    'chairman_name' => $this->chairman_name,
                    'vice_chairman_name' => $this->vice_chairman_name,
                    'vision' => $this->vision,
                    'mission' => $this->mision,
                    'photo' => $photo
                ]);
            }
        }

        session()->flash('success', 'Calon Berhasil Di Edit');
        return redirect()->route('admin.candidate.index');
    }

    public function render()
    {
        $this->candidate = Candidate::where('id', $this->candidateId)->first();
        return view('livewire.admin.candidate.edit');
    }
}
