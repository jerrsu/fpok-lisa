<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataKeluarga extends Model
{
    protected $table = "data_keluarga";
    protected $fillable = ['nip','nama','ttl','pendidikan','pekerjaan','hub','idpegawai','tempat'];
}
