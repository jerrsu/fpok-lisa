<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataStrukturalViewer extends Model
{
    protected $table = "v_data_struktural";
    protected $fillable = ['id','idpegawai','nama','struktural','sk','tmt','filesk','tgl','tmt2'];
}
