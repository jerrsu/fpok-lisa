<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataPenghargaanViewer extends Model
{
    
    protected $table = "v_data_penghargaan";
    protected $fillable = ['id','nama','idpegawai','penghargaan','instansi','tahun','filesk'];
}
