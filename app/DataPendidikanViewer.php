<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataPendidikanViewer extends Model
{
    protected $table = "v_data_pendidikan";
    protected $fillable = ['id','nama','idpendidikan','tingkat','sekolah','program','noijazah','tahun','lokasi','fileijazah','filetranskrip','idpegawai'];
}
