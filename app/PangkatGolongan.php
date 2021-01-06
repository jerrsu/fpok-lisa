<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PangkatGolongan extends Model
{
    protected $table = "pangkat_golongan";
    protected $fillable = ['nama'];
}
