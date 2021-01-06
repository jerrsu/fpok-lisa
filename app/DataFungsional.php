<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataFungsional extends Model
{
    protected $table = "data_fungsional";
    protected $fillable = ['idpegawai','idfungsional','sk','tmt','filesk','tgl'];
}
