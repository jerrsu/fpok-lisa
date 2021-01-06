<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataPenelitianViewer extends Model
{
    protected $table = "v_data_penelitian";
    protected $fillable = ['id','nama','idpegawai','judul','sumberdana','tahun','filepenelitian'];
}
