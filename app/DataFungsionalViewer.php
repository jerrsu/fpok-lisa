<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataFungsionalViewer extends Model
{
    protected $table = "v_data_fungsional";
    protected $fillable = ['id','idpegawai','nama','fungsional','sk','tmt','filesk','tgl'];
}
