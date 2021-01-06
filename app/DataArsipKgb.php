<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataArsipKgb extends Model
{
    protected $table = "data_arsip_kgb";
    protected $fillable = ['id','idpegawai','no','tgl','gaji','masa','filesk','idpangkat','tmt'];
}
