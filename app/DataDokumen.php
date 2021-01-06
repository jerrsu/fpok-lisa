<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataDokumen extends Model
{
    protected $table = "data_dokumen";
    protected $fillable = ['idpegawai','kategori','namadok','ket','filedok'];

    
}
