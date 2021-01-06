<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataPengabdian extends Model
{
    protected $table = "data_pengabdian";
    protected $fillable = ['idpegawai','judul','sumberdana','tahun','filepengabdian'];
}
