<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataPelatihan extends Model
{
    protected $table = "data_pelatihan";
    protected $fillable = ['idpegawai','namadiklat','penyelenggara','tgl','nosertifikat','jam','filesertifikat'];
}
