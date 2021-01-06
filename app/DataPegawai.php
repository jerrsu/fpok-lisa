<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataPegawai extends Model
{
    protected $table = "data_pegawai";
    protected $fillable = ['nik','nip','nama','gelar_depan','gelar_belakang','npwp',
    'nidn','ttl','agama','jk','golongan_darah','status_nikah','status_kepegawaian','status_pegawai','alamat','tlp',
    'email','id_unit_kerja','pensiun','id_status','id_jabatan_fungsional','tanggallahir'];    
}
