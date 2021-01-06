<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChartCutiModel extends Model
{
    protected $table = "v_jumlah_pengajuan_cuti";
    protected $fillable = ['jumlah','bulan','tahun'];
}
