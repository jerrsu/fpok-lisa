<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataSkp extends Model
{
    protected $table = "data_skp";
    protected $fillable = ['idpegawai','tahun','filesk'];
}
