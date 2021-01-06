<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PengajuanCuti extends Model
{
    protected $table = "data_pengajuan_cuti";
    protected $fillable = ['idpegawai','masakerja','jenis_cuti','alasan_cuti','lama_cuti','start_date'
    ,'end_date','alamat','hasil','idunit','idjabatan','tlp','catatan_cuti',
    'n2_sisa','n2_ket' ,'n1_sisa' ,'n1_ket' ,'n_sisa' ,'n_ket'	,'pertimbangan', 'alasan_pertimbangan','keputusan' ,'alasan_keputusan' ,
    'idatasan','idpejabat','month_name','year_number'];
}
