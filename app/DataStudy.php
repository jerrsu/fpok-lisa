<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataStudy extends Model
{
    protected $table = "data_study";
    protected $fillable = ['idpegawai','tingkat','perguruan','program','tahun','negara'];
}
