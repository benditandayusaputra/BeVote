<?php

namespace App\Http\Livewire\Admin\Dashboard;

use App\Candidate;
use App\User;
use Livewire\Component;

class Index extends Component
{
    public $countUsers;
    public $countCandidates;
    public $countStudents;
    public $countTeachers;

    public function render()
    {
        session()->forget('success');
        $this->countUsers = User::all()->count();
        $this->countStudents = User::where('user_type', 'SISWA')->get()->count();
        $this->countTeachers = User::where('user_type', 'GURU')->get()->count();
        $this->countCandidates = Candidate::all()->count();
        return view('livewire.admin.dashboard.index');
    }
}
