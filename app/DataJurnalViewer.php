<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataJurnalViewer extends Model
{
    protected $table = "v_data_jurnal";
    protected $fillable = ['id','idpegawai','nama','namajurnal','judul','tahun','filejurnal','link'];
}
