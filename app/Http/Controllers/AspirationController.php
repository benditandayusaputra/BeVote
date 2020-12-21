<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Aspiration;
use App\Exports\AspirationExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;

class AspirationController extends Controller
{
    public function aspirationExport() {
    	return Excel::download(new AspirationExport, 'aspirations.xlsx');
    }
}
