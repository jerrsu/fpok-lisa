<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PengajuanKgb extends Model
{
    protected $table = "data_pengajuan_kbg";
    protected $fillable = ['id','idpegawai','idjabatanlama','idpangkatlama','tempat','gajilama','pejabat'
    ,'nomor','tgl','tglberlaku','masatgl','gajibaru','masakerja','idpangkatbaru','mulaitgl','ket','iddekan'];
}
