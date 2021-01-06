<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataPangkat extends Model
{
    protected $table = "data_pangkat";
    protected $fillable = ['idpegawai','idpangkat','sk','tglsk','pengesah','tmt','filesk'];
}
