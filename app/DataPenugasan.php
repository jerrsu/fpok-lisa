<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataPenugasan extends Model
{
    protected $table = "data_penugasan";
    protected $fillable = ['idpegawai','tujuan','nosurat','tgl','filesk','lama'];
}
