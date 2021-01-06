<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataPegawaiViewer extends Model
{
    protected $table = "v_data_pegawai";
    protected $fillable = ['id','nik','nip','nama','gelar_depan','gelar_belakang','npwp',
    'nidn','ttl','agama','jk','golongan_darah','status_nikah','status_kepegawaian','status_pegawai','alamat','tlp',
    'email','id_unit_kerja','nama_unit','pensiun','id_status','nama_status','id_jabatan_fungsional','nama_jabatan','tanggallahir'];
}
