<?php

namespace App\Http\Livewire\Admin\Choice;

use App\Choose_amount;
use App\User;
use Livewire\Component;

class Index extends Component
{
    public $choices, $userAmount, $urlGetData;

    public function mount()
    {
        $this->choices = Choose_amount::join('candidates', 'candidates.id', '=', 'choose_amounts.candidate_id')->get();
        $this->userAmount = User::where('status_choice', '0')->get()->count();
    }

    public function render()
    {
        $this->urlGetData = url('getDataChoice');
        return view('livewire.admin.choice.index');
    }
}
