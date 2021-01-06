<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataKeluargaPasanganViewer extends Model
{
    protected $table = "v_data_keluarga_pasangan";
    protected $fillable = ['id','nama','ttl','pendidikan','pekerjaan','hub','idpegawai','keluarga','tempat'];
}
