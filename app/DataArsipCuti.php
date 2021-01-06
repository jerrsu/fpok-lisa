<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataArsipCuti extends Model
{
    protected $table = "data_arsip_cuti";
    protected $fillable = ['id','idpegawai','jenis','mulai','selesai','id_unit','filesk'];
}
