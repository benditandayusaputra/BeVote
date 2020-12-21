<?php

namespace App\Imports;

use App\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UsersImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new User([
            'nis'           => $row['nis'],
            'name'          => $row['name'],
            'gender'        => $row['gender'],
            'class'         => $row['class'],
            'user_type'     => $row['user_type'],
            'token'         => $row['token'],
            'status_choice' => '0'
        ]);
    }
}
