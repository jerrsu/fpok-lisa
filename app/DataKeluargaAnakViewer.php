<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataKeluargaAnakViewer extends Model
{
    protected $table = "v_data_keluarga_anak";
    protected $fillable = ['id','idpegawai','nama','keluarga','ttl','pendidikan','pekerjaan','hub','tempat'];
}
