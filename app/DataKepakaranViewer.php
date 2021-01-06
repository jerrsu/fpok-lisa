<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataKepakaranViewer extends Model
{
    protected $table = "v_data_kepakaran";
    protected $fillable = ['id','nama','idpegawai','bidang','matakuliah'];
}
