<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataPendidikan extends Model
{
    protected $table = "data_pendidikan";
    protected $fillable = ['nip','idpendidikan','sekolah','program','noijazah','tahun','lokasi','fileijazah','filetranskrip','idpegawai'];
}
