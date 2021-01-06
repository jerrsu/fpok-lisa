<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataKeluargaAnak extends Model
{
    protected $table = "data_keluarga_anak";
    protected $fillable = ['nip','nama','ttl','pendidikan','pekerjaan','hub','idpegawai','tempat'];
}
