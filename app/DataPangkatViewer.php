<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataPangkatViewer extends Model
{
    protected $table = "v_data_pangkat";
    protected $fillable = ['id','idpegawai','nama','pangkat','sk','tglsk','pengesah','tmt','filesk'];
}
