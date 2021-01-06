<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataJurnal extends Model
{
    protected $table = "data_jurnal";
    protected $fillable = ['idpegawai','namajurnal','judul','tahun','filejurnal','link'];
}