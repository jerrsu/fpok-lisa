<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataKeluargaPasangan extends Model
{
    protected $table = "data_keluarga_pasangan";
    protected $fillable = ['nip','nama','ttl','pendidikan','pekerjaan','hub','idpegawai','tempat'];
}
