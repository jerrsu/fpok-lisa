<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataPenugasanViewer extends Model
{
    protected $table = "v_data_penugasan";
    protected $fillable = ['id','nama','idpegawai','tujuan','nosurat','tgl','filesk','lama'];
}
