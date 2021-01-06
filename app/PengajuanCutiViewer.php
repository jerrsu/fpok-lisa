<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PengajuanCutiViewer extends Model
{
    protected $table = "v_data_pengajuan_cuti";
    protected $fillable = ['id','idpegawai','nama','masakerja','jenis_cuti','alasan_cuti','lama_cuti','start_date'
    ,'end_date','alamat','hasil','idunit','nama_unit','idjabatan','nama_jabatan','tlp','catatan_cuti',
    'n2_sisa','n2_ket' ,'n1_sisa' ,'n1_ket' ,'n_sisa' ,'n_ket'	,'pertimbangan', 'alasan_pertimbangan','keputusan' ,'alasan_keputusan',
    'idatasan','idpejabat','nipatasan','namaatasan','namapejabat','nippejabat'];
}