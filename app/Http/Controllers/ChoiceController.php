<?php

namespace App\Http\Controllers;

use App\User;
use App\Choose_amount;
use Illuminate\Http\Request;

class ChoiceController extends Controller
{
    public function getData()
    {
        $data = Choose_amount::join('candidates', 'candidates.id', '=', 'choose_amounts.candidate_id')->get();
        return response()->json([
            'data'          => $data,
            'userAmount'    => User::where('status_choice', '0')->get()->count()
        ]);
    }
}
