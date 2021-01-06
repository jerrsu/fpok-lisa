<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataStudyViewer extends Model
{
    protected $table = "v_data_study";
    protected $fillable = ['id','nama','idpegawai','tingkat','perguruan','program','tahun','negara'];
}
