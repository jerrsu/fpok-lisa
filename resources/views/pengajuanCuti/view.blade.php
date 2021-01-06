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
		
	<label style="color:white">………………………………………………………………………………...........</label>ANAK LAMPIRAN 1.b<br>
	<label style="color:white">………………………………………………………………………………...........</label>PERATURAN BADAN KEPEGAWAIAN NEGARA<br>
	<label style="color:white">………………………………………………………………………………...........</label>REPUBLIK INDONESIA<br>
	<label style="color:white">………………………………………………………………………………...........</label>NOMOR 24 TAHUN 2017<br>
	<label style="color:white">………………………………………………………………………………...........</label>TENTANG<br>
	<label style="color:white">………………………………………………………………………………...........</label>TATA CARA PEMBERIAN CUTI PEGAWAI NEGERI SIPIL<br>

	<label style="color:white">………………………………………………………………………………………………………………</label>Bandung<br>
	<label style="color:white">………………………………………………………………………………………………………………</label>Kepada<br>
	<label style="color:white">………………………………………………………………………………………………………………</label>Yth.<br>
	<label style="color:white">………………………………………………………………………………………………………………</label>di<br>
	<label style="color:white">………………………………………………………………………………………………………………</label>Tempat<br>
	<center>
		<b><u>HASIL PERMINTAAN DAN PEMBERIAN CUTI</u></b><br>
	</center>
	<br>
	<table>
		<tr>
			<td colspan="4">I. Data Pegawai</td>
		</tr>
		<tr>
			<td>Nama</td><td>{{ $data->nama }}</td>
			<td>NIP</td><td>{{ $data->nip }}</td>
		</tr>
		<tr>
			<td>Jabatan</td><td>{{ $data->nama_jabatan }}</td>
			<td>Masa Kerja</td><td> {{ $data->masakerja }}</td>
		</tr>
		<tr>
			<td>Unit Kerja</td><td colspan="3"> {{ $data->nama_unit }}</td>
		</tr>
	</table>
	<br>
	<table>
		<tr>
			<td colspan="4">II. JENIS CUTI YANG DIAMBIL **</td>
		</tr>
		<tr>
			<td>1. Cuti Tahunan</td>
			<td >@if($data->jenis_cuti == 'Cuti Tahunan') <input type="checkbox" checked > @endif </td>
			<td>2. Cuti Besar</td>
			<td>@if($data->jenis_cuti == 'Cuti Besar') <input type="checkbox" checked > @endif </td>
		</tr>
		<tr>
			<td>3. Cuti Sakit</td>
			<td>@if($data->jenis_cuti == 'Cuti Sakit') <input type="checkbox" checked > @endif </td>
			<td>4. Cuti Melahirkan</td>
			<td>@if($data->jenis_cuti == 'Cuti Melahirkan') <input type="checkbox" checked > @endif </td>
		</tr>
		<tr>
			<td>5. Karena Alasan Penting</td>
			<td>@if($data->jenis_cuti == 'Cuti Karena Alasan Penting') <input type="checkbox" checked > @endif </td>
			<td>6. Cuti di Luar Tanggungan Negara</td>
			<td>@if($data->jenis_cuti == 'Cuti di Luar Tanggungan Negara') <input type="checkbox" checked > @endif </td>
		</tr>
	</table>
	<br>
	<table>	
		<tr>
			<td >III. ALASAN CUTI</td>
		</tr>
		<tr>
			<td>{{ $data->alasan_cuti }}</td>
		</tr>
	</table>
	<br>
	<table>
		<tr>
			<td colspan="4">IV. LAMANYA CUTI</td>
		</tr>
		<tr>
			<td>Selama</td><td>{{ $data->lama_cuti }}
			<td>Mulai Tanggal</td><td>{{date('d-M-Y', strtotime($data->start_date))}} s/d {{date('d-M-Y', strtotime($data->end_date))}}</td>
		</tr>
	</table>
    <br>	
	<table>
			<tr>
			<td colspan="5">V. CATATAN CUTI***</td>
			</tr>
			<tr>
				<td colspan="3">1. CUTI TAHUNAN</td>
				<td >2. CUTI BESAR</td>
				<td >@if($data->jenis_cuti == 'Cuti Besar') {{$data->catatan_cuti}} @endif</td>
			</tr>
			<tr>
				<td ><center>Tahun</center></td>
				<td ><center>Sisa</center></td>
				<td ><center>Keterangan</center></td>
				<td >3. CUTI SAKIT</td>
				<td >@if($data->jenis_cuti == 'Cuti Sakit') {{$data->catatan_cuti}} @endif</td>
			</tr>
		
		
			<tr>
				<td >N-2</td>
				<td >{{ $data->n2_sisa }}</td>
				<td >{{ $data->n2_ket }}</td>
				<td >4. CUTI MELAHIRKAN</td>
				<td >@if($data->jenis_cuti == 'Cuti Melahirkan') {{$data->catatan_cuti}} @endif</td>
			</tr>
			<tr>
				<td >N-1</td>
				<td >{{ $data->n1_sisa }}</td>
				<td >{{ $data->n1_ket }}</td>
				<td >5. CUTI KARENA ALASAN PENTING</td>
				<td >@if($data->jenis_cuti == 'Cuti Karena Alasan Penting') {{$data->catatan_cuti}} @endif</td>
			</tr>
			<tr>
				<td >N</td>
				<td >{{ $data->n_sisa }}</td>
				<td >{{ $data->n_ket }}</td>
				<td >6. CUTI DI LUAR TANGGUNGAN NEGARA</td>
				<td >@if($data->jenis_cuti == 'Cuti di Luar Tanggungan Negara') {{$data->catatan_cuti}} @endif</td>
			</tr>
		
	</table>
	<br>
	<table>
			<tr>
			<td colspan="5">VI. ALAMAT SELAMA MENJALANKAN CUTI</td>
			<td >TELP | {{$data->tlp}}</td>
			</tr>
			<tr>
			<td colspan="5">{{$data->alamat}}</td>
			<td ><center>Hormat saya, <br><br><br><br><br> {{$data->nama}} <br> NIP {{$data->nip}}</center></td>
			</tr>
	</table> 	
    <br>
	<table>
			<tr>
			<td colspan="4">VII. PERTIMBANGAN ATASAN LANGSUNG**</td>
			</tr>
			<tr>
			<td>DISETUJUI</td>
			<td>PERUBAHAN****</td>
			<td>DITANGGUHKAN****</td>
			<td>TIDAK DISETUJUI****</td>
			</tr>
			<tr>
			<td>@if($data->pertimbangan == 'Disetujui') <input type="checkbox" checked > @endif </td>
			<td>@if($data->pertimbangan == 'Perubahan') <input type="checkbox" checked > @endif</td>
			<td>@if($data->pertimbangan == 'Ditangguhkan') <input type="checkbox" checked > @endif</td>
			<td>@if($data->pertimbangan == 'Tidak Disetujui') <input type="checkbox" checked > @endif</td>
			</tr>
			<tr>
			<td colspan="3">{{$data->alasan_pertimbangan}}</td>
			<td><center> <br><br><br><br><br> {{$data->namaatasan}} <br> NIP {{$data->nipatasan}}</center></td>
			</tr>
	</table>
	<br>
	<table>
			<tr>
			<td colspan="4">VIII. KEPUTUSAN PEJABAT YANG BERWENANG MEMBERIKAN CUTI**</td>
			</tr>
			<tr>
			<td>DISETUJUI</td>
			<td>PERUBAHAN****</td>
			<td>DITANGGUHKAN****</td>
			<td>TIDAK DISETUJUI****</td>
			</tr>
			<tr>
			<td>@if($data->keputusan == 'Disetujui') <input type="checkbox" checked > @endif</td>
			<td>@if($data->keputusan == 'Perubahan') <input type="checkbox" checked > @endif</td>
			<td>@if($data->keputusan == 'Ditangguhkan') <input type="checkbox" checked > @endif</td>
			<td>@if($data->keputusan == 'Tidak Disetujui') <input type="checkbox" checked > @endif</td>
			</tr>
			<tr>
			<td colspan="3">{{$data->alasan_keputusan}}</td>
			<td><center> <br><br><br><br><br> {{$data->namapejabat}} <br> NIP {{$data->nippejabat}}</center></td>
			</tr>
	</table>
	<br>
	Catatan :	<br>
	*	Coret yang tidak perlu<br>
	**	Pilih salah satu dengan memberi tanda centang <input type="checkbox"checked><br>
	***	diisi oleh pejabat yang menangani bidang kepegawaian sebelum PNS mengajukan cuti<br>
	****	diberi tanda centang <input type="checkbox"checked> dan alasannya<br>
	N	Cuti tahun berjalan<br>
	N-1	Sisa cuti 1 tahun sebelumnya<br>
	N-2	Sisa cuti 2 tahun sebelumnya<br>

    
	
	
  

</body>
</html>