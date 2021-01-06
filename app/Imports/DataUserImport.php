<?php

namespace App\Imports;

use App\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
class DataUserImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new User([
            'idpegawai' => $row['idpegawai'],
            'username' => $row['username'], 
            'name' => $row['name'],
            'level' => 3,
            'password' => bcrypt((123456))
        ]);
    }
}
