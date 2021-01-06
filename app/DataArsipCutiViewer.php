<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataArsipCutiViewer extends Model
{
    protected $table = "v_data_arsip_cuti";
    protected $fillable = ['id','nama','nama_unit','idpegawai','jenis','mulai','selesai','id_unit','filesk'];
}
