<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataKehadiran extends Model
{
    protected $table = "data_kehadiran";
 
    protected $fillable = ['nip','namapegawai','harikerja','harimasuk','presentase','bulan','tahun'];
}
