<?php

namespace App\Exports;

use App\Aspiration;
use Maatwebsite\Excel\Concerns\FromCollection;

class AspirationExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Aspiration::all();
    }
}
