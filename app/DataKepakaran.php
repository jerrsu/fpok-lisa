<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataKepakaran extends Model
{
    protected $table = "data_kepakaran";
    protected $fillable = ['idpegawai','bidang','matakuliah'];
}
