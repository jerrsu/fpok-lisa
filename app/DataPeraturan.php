<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataPeraturan extends Model
{
    protected $table = "data_peraturan";
    protected $fillable = ['no','tentang','tahun','filesk'];
}
