<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataKeluargaViewer extends Model
{
    protected $table = "v_data_keluarga";
    protected $fillable = ['id','nama','ttl','pendidikan','pekerjaan','hub','idpegawai','keluarga','tempat'];
}
