<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataStruktural extends Model
{
    protected $table = "data_struktural";
    protected $fillable = ['idpegawai','idstruktural','sk','tmt','filesk','tgl','tmt2'];
}
