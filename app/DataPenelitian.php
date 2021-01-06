<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataPenelitian extends Model
{
    protected $table = "data_penelitian";
    protected $fillable = ['idpegawai','judul','sumberdana','tahun','filepenelitian'];
}
