<!DOCTYPE html>
<html>
<head>
	<title>Print</title>
	<style type="text/css">
		
		body{
	font-size: 12px;
	}
	.center{
	  margin-left:auto;
	  margin-right:auto;
	  font-size: 12px;
  }
  table, td, th {
  border: 1px solid black;
}
  table {
  border-collapse: collapse;
  width: 100%;
}
  
  </style>
 
 </head>
<body>
		
	<center>
	
	<img src="images/logo/logologin.png" width ="180" height="150"/>
		<b><u><h2>Data Detail Pegawai</u></h2></b>
	</center>
	<br>
	
	<br>
	<table>
		<tr>
			<th>No</th>
			<th>Data</td>
			<th>Keterangan</th>
		</tr>
	
		<tr>
			<td>1</td>
			<td>NIP/NIPT/NIPTT</td><td>{{$detailpegawai->nip}}</td>
		</tr>
		<tr>
		<td>2</td>
			<td>Nama Kengkap</td><td>{{$detailpegawai->nama}}</td>
		</tr>
		<tr>
		<td>3</td>
			<td>Gelar Depan</td><td>{{$detailpegawai->gelar_depan}}</td>
		</tr>
		<tr>
		<td>4</td>
			<td>Gelar Belakang</td><td>{{$detailpegawai->gelar_belakang}}</td>
		</tr>
		<tr>
		<td>5</td>
			<td>NIK</td><td>{{$detailpegawai->nik}}</td>
		</tr>
		<tr>
		<td>6</td>
			<td>NPWP</td><td>{{$detailpegawai->npwp}}</td>
		</tr>
		<tr>
		<td>7</td>
			<td>NIDN</td><td>{{$detailpegawai->nidn}}</td>
		</tr>
		<tr>
		<td>8</td>
			<td>Tempat Tanggal Lahir</td><td>{{$detailpegawai->ttl}} , {{$detailpegawai->tanggallahir}}</td>
		</tr>
		<tr>
		<td>9</td>
			<td>Agama</td><td>{{$detailpegawai->agama}}</td>
		</tr>
		<tr>
		<td>10</td>
			<td>Jenis Kelamain</td><td>{{$detailpegawai->jk}}</td>
		</tr>
		<tr>
			<td>11</td>
			<td>Golongan Darah</td><td>{{$detailpegawai->golongan_darah}}</td>
		</tr>
		<tr>
		<td>12</td>
			<td>Status Pernikahan</td><td>{{$detailpegawai->status_nikah}}</td>
		</tr>
		<tr>
		<td>13</td>
			<td>Status Kepegawaian</td><td>{{$detailpegawai->status_kepegawaian}}</td>
		</tr>
		<tr>
		<td>14</td>
			<td>Status Pegawai</td><td>{{$detailpegawai->status_pegawai}}</td>
		</tr>
		<tr>
		<td>15</td>
			<td>Alamat</td><td>{{$detailpegawai->alamat}}</td>
		</tr>
		<tr>
		<td>16</td>
			<td>No Telp</td><td>{{$detailpegawai->tlp}}</td>
		</tr>
		<tr>
		<td>17</td>
			<td>Email</td><td>{{$detailpegawai->email}}</td>
		</tr>
		<tr>
		<td>18</td>
			<td>Unit Kerja</td><td>{{$detailpegawai->nama_unit}}</td>
		</tr>
		<tr>
		<td>19</td>
			<td>Perkiraan Pensiun</td><td>{{$detailpegawai->pensiun}}</td>
		</tr>
		<tr>
		<td>20</td>
			<td>Status</td><td>{{$detailpegawai->nama_status}}</td>
		</tr>
	</table>
	<br><br>
	<label><b><u>Hubungan Orang Tua Kandung </u></label></b><br>
	<table>
		<tr >
			<th>Nama</th>
			<th>Hubungan</th>
			<th>Tempat Tanggal Lahir</th>
			<th>Pendidikan Terakhir</th>
			<th>Pekerjaan</th>
		</tr>
        <tbody>
            @foreach($ortu as $ortu)
            <tr>
            <td>{{$ortu->keluarga}}</td>
            <td>{{$ortu->hub}}</td>
            <td>{{$ortu->tempat}} , {{date('d-M-Y', strtotime($ortu->ttl))}}</td>
            <td>{{$ortu->pendidikan}}</td>
            <td>{{$ortu->pekerjaan}}</td> 
            </tr>
            @endforeach
        </tbody>		
	</table>
	<br>
	<label><b><u>Hubungan Suami / Istri</u></label></b><br>
	<table>
		<tr >
			<th>Nama</th>
			<th>Hubungan</th>
			<th>Tempat Tanggal Lahir</th>
			<th>Pendidikan Terakhir</th>
			<th>Pekerjaan</th>
		</tr>
        <tbody>
            @foreach($pasangan as $pasangan)
                <tr>
                <td>{{$pasangan->keluarga}}</td>
                <td>{{$pasangan->hub}}</td>
                <td>{{$pasangan->tempat}} , {{date('d-M-Y', strtotime($pasangan->ttl))}}</td>
                <td>{{$pasangan->pendidikan}}</td>
                <td>{{$pasangan->pekerjaan}}</td> 
                </tr>
                @endforeach
        </tbody>		
	</table>
	<br>
	<label ><b><u>Hubungan Anak Kandung </u></label></b><br>
	<table>
		<tr  >
			<th>Nama</th>
			<th>Hubungan</th>
			<th>Tempat Tanggal Lahir</th>
			<th>Pendidikan Terakhir</th>
			<th>Pekerjaan</th>
		</tr>		
        <tbody>
            @foreach($anak as $anak)
            <tr>
            <td>{{$anak->keluarga}}</td>
            <td>{{$anak->hub}}</td>
            <td>{{$anak->tempat}} , {{date('d-M-Y', strtotime($anak->ttl))}}</td>
            <td>{{$anak->pendidikan}}</td>
            <td>{{$anak->pekerjaan}}</td>
            </tr>
            @endforeach
        </tbody>
	</table>
	<br>
	<label  ><b><u>Riwayat Pendidikan </u></label></b><br>
	<table>
		<tr  >
			<th>Tingkat</th>
			<th>Perguruan Tinggi/ Sekolah</th>
			<th>Program Study</th>
			<th>No Ijazah</th>
			<th>Tahun Lukus</th>
		</tr>
        <tbody>
            @foreach($pendidikan as $pendidikan)
            <tr>
            <td>{{$pendidikan->tingkat}}</td>
            <td>{{$pendidikan->sekolah}}</td>
            <td>{{$pendidikan->program}}</td>
            <td>{{$pendidikan->noijazah}}</td>
            <td>{{$pendidikan->tahun}}</td>
            </tr>
            @endforeach
        </tbody>		
	</table>
	<br>
	<label  ><b><u>Jabatan Fungsional </u></label></b><br>
	<table>
		<tr  >
			<th>Nama Jabatan</th>
			<th>No Sk</th>
			<th>TMT Jabatan</th>
		</tr>
        <tbody>
            @foreach($fungsional as $fungsional)
            <tr>
            <td>{{$fungsional->fungsional}}</td>
            <td>{{$fungsional->sk}} - {{date('d-M-Y', strtotime($fungsional->tgl))}}</td>
            <td>{{date('d-M-Y', strtotime($fungsional->tmt))}}</td>
            </tr>
            @endforeach
        </tbody>		
	</table>
	<br>
	<label  ><b><u>Jabatan Strukturan </u></label></b><br>
	<table>
		<tr  >
			<th>Nama Jabatan</th>
			<th>No Sk</th>
			<th>TMT Awal - Akhir</th>
		</tr>
        <tbody>
        @foreach($struktural as $struktural)
            <tr>
            <td>{{$struktural->struktural}}</td>
            <td>{{$struktural->sk}} - {{date('d-M-Y', strtotime($struktural->tgl))}}</td>
            <td>{{date('d-M-Y', strtotime($struktural->tmt))}} - {{date('d-M-Y', strtotime($struktural->tmt2))}}</td>
            </tr>
            @endforeach
        </tbody>		
	</table>
	<br>
	<label  ><b><u>Pangkat / Golongan</u> </label></b><br>
	<table>
		<tr  >
			<th>Nama Pangkat / Golongan</th>
			<th>No Sk</th>
			<th>Nama Pengesah</th>
			<th>TMT Pangkat</th>
		</tr>
        <tbody>
        @foreach($pangkat as $pangkat)
            <tr>
            <td>{{$pangkat->pangkat}}</td>
            <td>{{$pangkat->sk}} - {{date('d-M-Y', strtotime($pangkat->tglsk))}}</td>
            <td>{{$pangkat->pengesah}}</td>
            <td>{{date('d-M-Y', strtotime($pangkat->tmt))}}</td>
            </tr>
            @endforeach
        </tbody>		
	</table>
	<br>
	<label  ><b><u>Dokumen</u></b></label><br>
	<table>
		<tr  >
			<th>Kategori</th>
			<th>Nama Dokumen</th>
			<th>Keterangan</th>
		</tr>
        <tbody>
        @foreach($dok as $dok)
            <tr>
            <td>{{$dok->kategori}}</td>
            <td>{{$dok->namadok}}</td>
            <td>{{$dok->ket}}</td>
            </tr>
            @endforeach
        </tbody>		
	</table>
	<br>
	<label  ><b><u>Jurnal dan publikasi </u></label></b><br>
	<table>
		<tr  >
			<th>Nama Jurnal</th>
			<th>Judul Jurnal</th>
			<th>Tahun Jurnal</th>
			<th>Link Jurnal</th>
		</tr>
        <tbody>
        @foreach($jurnal as $jurnal)
            <tr>
            <td>{{$jurnal->namajurnal}}</td>
            <td>{{$jurnal->judul}}</td>
            <td>{{$jurnal->tahun}}</td>
            <td>{{$jurnal->link}}</td>
            </tr>
            @endforeach
        </tbody>		
	</table>
	<br>
	<label  ><b><u>Kepakaran </u></label></b><br>
	<table>
		<tr >
			<th>Bidang Ilmu</th>
			<th>Mata Kuliah</th>
		</tr>	
        <tbody>
        @foreach($kepakaran as $kepakaran)
            <tr>
            <td>{{$kepakaran->bidang}}</td>
            <td>{{$kepakaran->matakuliah}}</td>
            </tr>
            @endforeach
        </tbody>	
	</table>
	<br>
	<label  ><b><u>Penelitian </u></b></label><br>
	<table>
		<tr  >
			<th>Judul Penelitian</th>
			<th>Sumber dana</th>
			<th>Tahun</th>
		</tr>	
        <tbody>
        @foreach($penelitian as $penelitian)
            <tr>
            <td>{{$penelitian->judul}}</td>
            <td>{{$penelitian->sumberdana}}</td>
            <td>{{$penelitian->tahun}}</td>
            </tr>
            @endforeach
        </tbody>	
	</table>
	<br>
	<label  ><b><u>Pelatihan </u></label></b><br>
	<table>
		<tr  >
            <th>Nama</th>
            <th>Nama Diklat</th>
            <th>Nama Penyelenggara</th>
            <th>Tanggal Penyelenggaraan</th>
            <th>Jumlah Jam</th>
            <th>No Sertifikat</th>
		</tr>	
        <tbody>
        @foreach($pelatihan as $pelatihan)
            <tr>
            <td>{{$pelatihan->nama}}</td>
            <td>{{$pelatihan->namadiklat}}</td>
            <td>{{$pelatihan->penyelenggara}}</td>
            <td>{{date('d-M-Y', strtotime($pelatihan->tgl))}}</td>
            <td>{{$pelatihan->jam}}</td>
            <td>{{$pelatihan->nosertifikat}}</td>
            </tr>
            @endforeach
        </tbody>	
	</table>
	<br>
	<label  ><b><u>Pengabdian</u> </label></b><br>
	<table>
		<tr  >
			<th>Nama</th>
			<th>Judul Pengabdian</th>
			<th>Sumber Dana</th>
			<th>Tahun</th>
		</tr>
        <tbody>
        @foreach($pengabdian as $pengabdian)
            <tr>
            <td>{{$pengabdian->nama}}</td>
            <td>{{$pengabdian->judul}}</td>
            <td>{{$pengabdian->sumberdana}}</td>
            <td>{{$pengabdian->tahun}}</td>
            </tr>
            @endforeach
        </tbody>
	</table>
	<br>
	<label  ><b><u>Penghargaan </u></label></b><br>
	<table>
		<tr  >
			<th>Nama</th>
			<th>Penghargaan</th>
			<th>Negara / Instansi Pemberi</th>
			<th>Tahun</th>
		</tr>	
        <tbody>
        @foreach($penghargaan as $penghargaan)
            <tr>
            <td>{{$penghargaan->nama}}</td>
            <td>{{$penghargaan->penghargaan}}</td>
            <td>{{$penghargaan->instansi}}</td>
            <td>{{$penghargaan->tahun}}</td>
            </tr>
            @endforeach
        </tbody>
	</table>
    <br>
	<label  ><b><u>Penugasan</u> </label> </b><br>
	<table>
		<tr  >
			<th>Nama</th>
			<th>Tujuan Tugans</th>
			<th>No Surat dan Tanggal</th>
			<th>Lama Penugasan</th>
		</tr>
        <tbody>
        @foreach($penugasan as $penugasan)
            <tr>
            <td>{{$penugasan->nama}}</td>
            <td>{{$penugasan->tujuan}}</td>
            <td>{{$penugasan->nosurat}} - {{date('d-M-Y', strtotime($penugasan->tgl))}} </td>
            <td>{{$penugasan->lama}}</td>
            </tr>
            @endforeach
        </tbody>		
	</table>
	<br>
	<label  ><b><u>Data Study </u></label></b><br>
	<table>
		<tr  >
            <th>Nama</th>
            <th>Tingkat</th>
            <th>Perguruan Tinggi</th>
            <th>Program Studi</th>
            <th>Tahun Masuk</th>
            <th>Negara</th>
		</tr>
        <tbody>
        @foreach($study as $study)
            <tr>
            <td>{{$study->nama}}</td>
            <td>{{$study->tingkat}}</td>
            <td>{{$study->perguruan}}</td>
            <td>{{$study->program}}</td>
            <td>{{$study->tahun}}</td>
            <td>{{$study->negara}}</td>
            </tr>
            @endforeach
        </tbody>
	</table> 

</body>
</html>