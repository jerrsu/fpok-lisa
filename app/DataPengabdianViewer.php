<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataPengabdianViewer extends Model
{
    protected $table = "v_data_pengabdian";
    protected $fillable = ['id','nama','idpegawai','judul','sumberdana','tahun','filepengabdian'];
}
