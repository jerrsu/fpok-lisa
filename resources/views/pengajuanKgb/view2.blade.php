
@extends('layouts.app')
<style>
  .center{
	  margin-left:auto;
	  margin-right:auto;
	  font-size: 14px;
  }
  </style>
@section('content')
<div class="row">

  <div class="col-lg-4">
    Review Pengajuan KGB
  </div>

    <div class="col-lg-12">
      @if (Session::has('message'))
      <div class="alert alert-{{ Session::get('message_type') }}" id="waktu2" style="margin-top:10px;">{{ Session::get('message') }}</div>
      @endif
      </div>
    </div>
          <div class="row" style="margin-top: 20px;">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">

                <div class="card-body">
                <a href="{{ route('pengajuankgb.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i>Print</a> 
				<a href="{{ route('pengajuankgb.index') }}" class="btn btn-primary"><i class="fa fa-plus"></i>Back</a> 
                  <!-- <a href="{{url('format_buku')}}" class="btn btn-xs btn-info pull-right">Format Buku</a> -->
                  <center>
		<table class="center">
			<tr>
				<td>
				<center><img src="{{ url('images/logo/logo-kgb.png') }}"alt="logo"/></center>
				</td>
				<td>
				<center>
					KEMENTERIAN PENDIDIKAN DAN KEBUDAYAAN<br>
					UNIVERSITAS PENDIDIKAN INDONESIA<br>
					<b>FAKULTAS PENDIDIKAN OLAH RAGA  DAN KESEHATAN</b><br>
					Jalan Dr. Setiabudhi Nomor 229 Bandung 40154 Telepon/Fax (022) 2004750<br>
					Website : <a href="http://fpok.upi.edu" target="blank">http://fpok.upi.edu</a> E-mail : fpok@upi.edu
				</center>
				</td>
			</tr>
		</table>
	
	<b>____________________________________________________________________________________________________________</b>
	</center>
	<br>
	<table>
		<tr>
			<td style="width:80px">Nomor</td><td>:</td><td>{{ $data->nomor }}</td>
		</tr>
		<tr>
			<td style="width:80px">Lampiran</td><td>:</td><td>…………………………………</td>
		</tr>
		<tr>
			<td style="width:80px">Perihal</td><td>:</td><td>Kenaikan Gaji berkala</td>
		</tr>
		<tr>
			<td style="width:80px"></td><td>a.n</td><td> {{ $data->nama }}</td>
		</tr>
	</table>
    <br>

    
	Yth. Kepala Kantor Pelayanan Perbendaharaan Negara<br>di<br>Bandung<br><br>
    
	  Dengan ini diberitahukan bahwa berhubung dengan telah dipenuhinya masa kerja dan syarat-syarat kepada : <br>
	<table>
		<tr>
			<td>1.</td><td style="width:187px">Nama/Tempat dan Tgl Lahir</td><td>:</td><td>{{ $data->nama }} , {{ $data->ttl}} {{ $data->tanggallahir }}</td>
		</tr>
		<tr>
			<td>2.</td><td  >NIP/KARPEG</td><td>:</td><td>{{ $data->nip }}</td>
		</tr>
		<tr>
			<td>3.</td><td >Pangkat/Jabatan</td><td>:</td><td>{{ $data->pangkatlama }}</td>
		</tr>
		<tr>
			<td>4.</td><td >Kantor/Tempat</td><td>:</td><td> {{ $data->tempat }}</td>
		</tr>
		<tr>
			<td>5.</td><td >Gaji Pokok Lama</td><td>:</td><td> {{ $data->gajilama }}</td>
		</tr>
	</table>
	<br>
	  Atas dasar surat keputusan terakhir tentang kenaikan gaji berkala  yang ditetapkan :<br>
	<table>
		<tr>
			<td>a.</td><td >Oleh Pejabat</td><td>:</td><td>{{ $data->pejabat }}</td>
		</tr>
		<tr>
			<td>b.</td><td >Tanggal/Nomor</td><td>:</td><td>{{ $data->tgl }} No.{{ $data->nomor }}</td>
		</tr>
		<tr>
			<td>c.</td><td >Tanggal mulai berlakunya gaji tersebut</td><td>:</td><td>{{ $data->tglberlaku }}</td>
		</tr>
		<tr>
			<td>d.</td><td>Masa kerja golongan pada Tanggal</td><td>:</td><td> {{ $data->masatgl }}</td>
		</tr>
	</table>
	<br>
		diberikan kenaikan gaji berkala hingga memperoleh :
		<br>
	<table>
		<tr>
			<td>6.</td><td style="width:187px">Gaji Pokok Baru</td><td>:</td><td>{{ $data->gajibaru }}</td>
		</tr>
		<tr>
			<td>7.</td><td >Berdasarkan Masa Kerja</td><td>:</td><td>{{ $data->masakerja }}</td>
		</tr>
		<tr>
			<td>8.</td><td >Dalam Golongan</td><td>:</td><td>{{ $data->namapangkatbaru }}</td>
		</tr>
		<tr>
			<td>9.</td><td>Mulai tanggal</td><td>:</td><td> {{ $data->mulaitgl }}</td>
		</tr>
		<tr>
			<td>10.</td><td >Keterangan</td><td>:</td><td> {{ $data->ket }}</td>
		</tr>
	</table><br>
					
		Demikian agar sesuai dengan Peraturan Pemerintah No. …. Tahun …… kepada pegawai tersebut dapat dibayarkan penghasilannya berdasarkan gaji pokok baru.
		<br><br><br>
	
	
      <label style="color:white">………………………………………………………………………………………………………………</label>Dekan,
      <br><br><br><br><br><br><br>
      <label style="color:white">………………………………………………………………………………………………………………</label>……………………………………<br>
      <label style="color:white">………………………………………………………………………………………………………………</label>NIP ……………………………………
	  <br> <br> <br><br>
	
	
	  Tembusan :<br>		
		1.	Kepala Biro SDM Kemenristek Dikti di Jakarta;<br>
		2.	Kepala Biro Tata Usaha Kepegawaian BKN di Jakarta;<br>
		3.	Direktur PT. TASPEN di Jakarta;<br>
		4.	Kepala Kantor Regional III BKN Jabar di Bandung;<br>
		5.	Kepala Kantor Cabang Utama PT. TASPEN di Bandung<br>
		6.	Kepala Biro Hukum dan Kesekretariatan UPI;<br>
		7.	Kepala Biro Kepegawaian UPI;<br>
		8.	Direktur Direktorat Keuangan UPI;<br>
		9.	Pegawai Ybs.
                </div>
            </div>
          </div>
</div>
@endsection
