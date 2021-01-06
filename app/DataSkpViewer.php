<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataSkpViewer extends Model
{
    protected $table = "v_data_skp";
    protected $fillable = ['id','nama','idpegawai','tahun','filesk'];
}
