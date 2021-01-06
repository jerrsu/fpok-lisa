<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataArsipKgbViewer extends Model
{
    protected $table = "v_data_arsip_kgb";
    protected $fillable = ['id','idpegawai','nama','no','tgl','gaji','masa','pangkat','filesk','tmt'];
}
