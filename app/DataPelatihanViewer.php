<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataPelatihanViewer extends Model
{
    protected $table = "v_data_pelatihan";
    protected $fillable = ['id','nama','idpegawai','namadiklat','penyelenggara','tgl','nosertifikat','jam','filesertifikat'];
}
