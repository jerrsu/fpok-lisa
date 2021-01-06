<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PengajuanKgbViewer extends Model
{
    protected $table = "v_data_pengajuan_kgb";
    protected $fillable = ['idpegawai','idjabatanlama','idpangkatlama','tempat','gajilama','pejabat'
    ,'nomor','tgl','tglberlaku','masatgl','gajibaru','masakerja','idpangkatbaru','mulaitgl','ket',
    'namapangkatbaru','nama','nama_jabatan','pangkatlama','nip','ttl','tanggallahir','created_at','iddekan','namadekan','nipdekan'];
}
