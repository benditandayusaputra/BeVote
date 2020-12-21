<?php

namespace App\Http\Livewire\Admin\Candidate;

use App\Candidate;
use Livewire\Component;
use Illuminate\Support\Facades\Storage;

class Index extends Component
{
    public $candidates;
    public $listeners = ['destroy'];

    public function destroy($id)
    {
        $searchCandidate = Candidate::find($id);
        if( $searchCandidate ) {
            $candidate = Candidate::where('id', $id)->first();
            Storage::disk('public')->delete($candidate->photo);
            $searchCandidate->delete();
            session()->flash('success', 'Calon Berhasil Di Hapus');
            return redirect()->route('admin.candidate.index');
        }
    }

    public function render()
    {
        $this->candidates = Candidate::all();
        return view('livewire.admin.candidate.index');
    }
}
