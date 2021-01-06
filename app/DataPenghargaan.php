<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataPenghargaan extends Model
{
    protected $table = "data_penghargaan";
    protected $fillable = ['idpegawai','penghargaan','instansi','tahun','filesk'];
}
