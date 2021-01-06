<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataDokumenViewer extends Model
{
    protected $table = "v_data_dokumen";
    protected $fillable = ['id','nama','idpegawai','kategori','namadok','ket','filedok'];
}
