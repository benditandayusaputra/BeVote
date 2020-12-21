<?php

namespace App\Http\Livewire\Choice;

use App\Candidate;
use App\Choice;
use App\Choose_amount;
use Livewire\Component;

class Index extends Component
{
    public $candidates;
    public $listeners = ['choice'];

    public function choice($id)
    {
        Choice::create(['candidate_id' => $id]);
        $choiceAmount = Choose_amount::where('candidate_id', $id)->first();
        if ( $choiceAmount ) {
            $amount = $choiceAmount->amount + 1;
            Choose_amount::where('candidate_id', $id)->update(['amount' => $amount]);
            return redirect()->route('rating.index');
        } else {
            Choose_amount::create([
                'candidate_id'  => $id,
                'amount'        => 1
            ]);
            return redirect()->route('rating.index');
        }
    }

    public function render()
    {
        $this->candidates = Candidate::all();
        return view('livewire.choice.index');
    }
}
