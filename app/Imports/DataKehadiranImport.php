<?php

namespace App\Imports;

use App\DataKehadiran;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class DataKehadiranImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new DataKehadiran([
            'nip' => $row['nip'],
            'namapegawai' => $row['namapegawai'], 
            'harikerja' => $row['harikerja'],
            'harimasuk' => $row['harimasuk'],
            'presentase' => $row['presentase'], 
            'bulan' => $row['bulan'],
            'tahun' => $row['tahun'],
        ]);
    }
    
}
