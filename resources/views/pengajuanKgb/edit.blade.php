@section('js')
 <script type="text/javascript">
            $(document).on('click', '.pilihPegawai', function (e) {
                document.getElementById("nama").value = $(this).attr('nama');
                document.getElementById("nip").value = $(this).attr('nip');
                document.getElementById("idpegawai").value = $(this).attr('idpegawai');
                document.getElementById("ttl").value = $(this).attr('ttl');
                document.getElementById("tanggallahir").value = $(this).attr('tanggallahir');
                $('#myModal').modal('hide');
            });  

            $(document).on('click', '.pilihPangkat', function (e) {
                document.getElementById("idpangkat").value = $(this).attr('idpangkat');
                document.getElementById("namapangkat").value = $(this).attr('namapangkat');
                $('#myModal2').modal('hide');
            });

            $(document).on('click', '.pilihJabatan', function (e) {
                document.getElementById("idjabatan").value = $(this).attr('idjabatan');
                document.getElementById("namajabatan").value = $(this).attr('namajabatan');
                $('#myModal3').modal('hide');
            });

            $(document).on('click', '.pilihPangkatBaru', function (e) {
                document.getElementById("idpangkatbaru").value = $(this).attr('idpangkatbaru');
                document.getElementById("namapangkatbaru").value = $(this).attr('namapangkatbaru');
                $('#myModal4').modal('hide');
            });
          
            $(document).on('click', '.pilihDekan', function (e) {
                document.getElementById("iddekan").value = $(this).attr('iddekan');
                document.getElementById("namadekan").value = $(this).attr('namadekan');
                $('#myModal5').modal('hide');
            });

             $(function () {
                $("#lookup, #lookup2, #lookup3,#lookup4,#lookup5").dataTable();
            });

        </script>

@stop
@section('css')

@stop
@extends('layouts.app')

@section('content')

<form action="{{ route('pengajuankgb.update', $data->id) }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('put') }}
<div class="row">
            <div class="col-md-12 d-flex align-items-stretch grid-margin">
              <div class="row flex-grow">
                <div class="col-12">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Edit Data </h4>
                      <form class="forms-sample">
                        <div class="form-group{{ $errors->has('idpegawai') ? ' has-error' : '' }}">
                            <label for="idpegawai" class="col-md-4 control-label">Nama Pegawai <code>*</code></label>
                            <div class="col-md-6">
                                <div class="input-group">
                                <input id="nama" type="text"  class="form-control" value="{{ $getpegawai->nama }}" readonly="" required>
                                <input id="idpegawai" type="hidden" name="idpegawai" value="{{ $data->idpegawai }}" required readonly="">
                                <span class="input-group-btn">
                                    <button type="button" class="btn btn-info btn-secondary" data-toggle="modal" data-target="#myModal"><b>Cari</b> <span class="fa fa-search"></span></button>
                                </span>
                                </div>
                                @if ($errors->has('idpegawai'))
                                    <span class="help-block">
                                        Data nama Pegawai tidak boleh kosong
                                    </span>
                                @endif                                 
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="gelar_depan" class="col-md-4 control-label">Nip</label>
                            <div class="col-md-6">
                            <input id="nip" type="text" class="form-control" name="nip" value="{{ $getpegawai->nip }}"   required readonly="">
                            </div>
                        </div>  
                        <div class="form-group">
                            <label for="tempatlahir" class="col-md-2 control-label">Tempat Lahir</label>                            
                            <div class="col-md-6">
                            <input id="ttl" name="ttl" value="{{ $getpegawai->ttl }}" class="form-control" required readonly="" size="20"  >
                            </div>
                        </div>
                        <div class="form-group">
                        <label for="tgllahir" class="col-md-2 control-label">Tanggal Lahir</label>                           
                            <div class="col-md-6">
                            <input id="tanggallahir" value="{{ $getpegawai->tanggallahir }}" class="form-control"  name="tanggallahir" required readonly="" size="14"  >
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('idpangkat') ? ' has-error' : '' }}">
                            <label for="idpangkat" class="col-md-4 control-label">Nama Pangkat / Golongan <code>*</code></label>
                            <div class="col-md-6">
                                <div class="input-group">
                                <input id="namapangkat" type="text"  class="form-control" readonly="" value="{{ $getpangkatlama->nama }}" required>
                                <input id="idpangkat" type="hidden" name="idpangkat" value="{{ $data->idpangkatlama }}" required readonly="">
                                <span class="input-group-btn">
                                    <button type="button" class="btn btn-info btn-secondary" data-toggle="modal" data-target="#myModal2"><b>Cari</b> <span class="fa fa-search"></span></button>
                                </span>
                                </div>
                                @if ($errors->has('idpangkat'))
                                    <span class="help-block">
                                        Data Pangkat tidak boleh kosong
                                    </span>
                                @endif                                 
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('idjabatan') ? ' has-error' : '' }}">
                            <label for="idjabatan" class="col-md-4 control-label">Nama Jabatan <code>*</code></label>
                            <div class="col-md-6">
                                <div class="input-group">
                                <input id="namajabatan" type="text"  class="form-control" readonly="" required value="{{ $getfungsional->nama_jabatan }}" >
                                <input id="idjabatan" type="hidden" name="idjabatan" value="{{ $data->idjabatanlama }}" required readonly="">
                                <span class="input-group-btn">
                                    <button type="button" class="btn btn-info btn-secondary" data-toggle="modal" data-target="#myModal3"><b>Cari</b> <span class="fa fa-search"></span></button>
                                </span>
                                </div>
                                @if ($errors->has('idjabatan'))
                                    <span class="help-block">
                                        Data Jabatan tidak boleh kosong
                                    </span>
                                @endif                                 
                            </div>
                        </div>  
                        <div class="form-group">
                            <label for="kantor" class="col-md-4 control-label">Kantor / Tempat</label>
                            <div class="col-md-6">
                                <input id="tempat" type="text" class="form-control" name="tempat" value="{{ $data->tempat }}"  >
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="gaji_lama" class="col-md-4 control-label">Gaji Pokok Lama</label>
                            <div class="col-md-3">
                                <input id="gajilama" type="number" class="form-control" name="gajilama" value="{{ $data->gajilama }}"  >
                            </div>
                        </div> 
                        <div class="form-group">
                            <label for="oleh_pejabat" class="col-md-4 control-label">Oleh Pejabat</label>
                            <div class="col-md-6">
                                <input id="pejabat" type="text" class="form-control" name="pejabat" value="{{ $data->pejabat }}"  >
                            </div>
                        </div>
                        <label class="col-md-8 control-label">Atas dasar surat keputusan terakhir tentang kenaikan gaji berkala yang ditetapkan</label>  
                        <div class="form-group">
                            <label for="no" class="col-md-4 control-label">Nomor</label>
                            <div class="col-md-6">
                                <input id="nomor" type="text" class="form-control" name="nomor" value="{{ $data->nomor }}"  >
                            </div>
                        </div> 
                        <div class="form-group">
                            <label for="tanggal" class="col-md-4 control-label">Tanggal Nomor Kgb</label>
                            <div class="col-md-3">
                                <input id="tgl" type="date" class="form-control" name="tgl" value="{{ $data->tgl }}"  >
                            </div>
                        </div>  
                        <div class="form-group">
                            <label for="tanggal_berlaku" class="col-md-4 control-label">Tanggal mulai berlakunya gaji tersebut</label>
                            <div class="col-md-3">
                                <input id="tglberlaku" type="date" class="form-control" name="tglberlaku" value="{{ $data->tglberlaku }}"  >
                            </div>
                        </div>
                        <label class="col-md-8 control-label">Diberikan kenaikan gaji berkala hingga memperoleh</label>  
                        <div class="form-group">
                            <label for="masakerja" class="col-md-4 control-label">Masa kerja golongan pada Tanggal</label>
                            <div class="col-md-3">
                                <input id="masatgl" type="date" class="form-control" name="masatgl" value="{{ $data->masatgl }}"  >
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="gapokbaru" class="col-md-4 control-label">Gaji Pokok Baru</label>
                            <div class="col-md-3">
                            <input id="gajibaru" type="number" class="form-control" name="gajibaru" value="{{ $data->gajibaru }}"  >
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="berdasarmasakerja" class="col-md-4 control-label">Berdasarkan Masa Kerja</label>
                            <div class="col-md-3">
                                <input id="masakerja" type="date" class="form-control" name="masakerja" value="{{ $data->masakerja }}"  >
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('idpangkatbaru') ? ' has-error' : '' }}">
                            <label for="idpangkatbaru" class="col-md-4 control-label">Dalam Golongan<code>*</code></label>
                            <div class="col-md-6">
                                <div class="input-group">
                                <input id="namapangkatbaru" type="text"  class="form-control" readonly="" required value="{{ $getpangkatbaru->nama }}">
                                <input id="idpangkatbaru" type="hidden" name="idpangkatbaru" required readonly="" value="{{ $data->idpangkatbaru }}">
                                <span class="input-group-btn">
                                    <button type="button" class="btn btn-info btn-secondary" data-toggle="modal" data-target="#myModal4"><b>Cari</b> <span class="fa fa-search"></span></button>
                                </span>
                                </div>
                                @if ($errors->has('idpangkatbaru'))
                                    <span class="help-block">
                                        Data Pangkat Baru tidak boleh kosong
                                    </span>
                                @endif                                 
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="mulaitgl" class="col-md-4 control-label">Mulai Tanggal</label>
                            <div class="col-md-3">
                                <input id="mulaitgl" type="date" class="form-control" name="mulaitgl" value="{{ $data->mulaitgl }}"  >
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="keterangan" class="col-md-4 control-label">Keterangan</label>
                            <div class="col-md-3">
                            <input id="ket" type="text" class="form-control" name="ket"    value="{{ $data->ket }}">
                            </div>
                        </div> 
                        <div class="form-group{{ $errors->has('iddekan') ? ' has-error' : '' }}">
                            <label for="iddekan" class="col-md-4 control-label">Nama Dekan<code>*</code></label>
                            <div class="col-md-6">
                                <div class="input-group">
                                <input id="namadekan" value="{{ $data->namadekan }}" type="text" class="form-control" readonly=""  required>
                                <input id="iddekan"value="{{ $data->iddekan }}" type="hidden" name="iddekan" required readonly="">
                                <span class="input-group-btn">
                                    <button type="button" class="btn btn-info btn-secondary" data-toggle="modal" data-target="#myModal5"><b>Cari</b> <span class="fa fa-search"></span></button>
                                </span>
                                </div>
                                @if ($errors->has('iddekan'))
                                    <span class="help-block">
                                        Dekan tidak boleh kosong
                                    </span>
                                @endif                                 
                            </div>
                        </div>   
                        <button type="submit" class="btn btn-primary" id="submit">
                                    Update
                        </button>
                        <a href="{{route('pengajuankgb.index')}}" class="btn btn-light pull-right">Back</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>

</div>
</form>
<div class="modal fade bd-example-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" >
    <div class="modal-dialog modal-lg" role="document" >
        <div class="modal-content" style="background: #fff;">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cari Pegawai</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table id="lookup" class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                        <th>Id</th>
                            <th>Nip</th>
                            <th>Nama Pegawai</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($datapegawai as $data)
                        <tr class="pilihPegawai" nip="<?php echo $data->nip; ?>" 
                        nama="<?php echo $data->nama; ?>" idpegawai="<?php echo $data->id; ?>" 
                        ttl="<?php echo $data->ttl; ?>" tanggallahir="<?php echo $data->tanggallahir; ?>">
                        <td>{{$data->id}}</td>
                        <td>{{$data->nip}}</td>
                        <td>{{$data->nama}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>  
            </div>
        </div>
    </div>
</div>

<div class="modal fade bd-example-modal-lg" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" >
    <div class="modal-dialog modal-lg" role="document" >
        <div class="modal-content" style="background: #fff;">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cari Pangkat</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table id="lookup2" class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                        <th>Id</th>
                            <th>Nama Nama Pangkat / Golongan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($datapangkat as $data)
                        <tr class="pilihPangkat" idpangkat="<?php echo $data->id; ?>" namapangkat="<?php echo $data->nama; ?>"  >
                        <td>{{$data->id}}</td>
                        <td>{{$data->nama}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>  
            </div>
        </div>
    </div>
</div>

<div class="modal fade bd-example-modal-lg" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" >
    <div class="modal-dialog modal-lg" role="document" >
        <div class="modal-content" style="background: #fff;">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cari Jabatan FUngsional</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table id="lookup3" class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                        <th>Id</th>
                            <th>Nama Jabatan Fungsional</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($datajabatan as $data)
                        <tr class="pilihJabatan" idjabatan="<?php echo $data->id; ?>" namajabatan="<?php echo $data->nama_jabatan; ?>"  >
                        <td>{{$data->id}}</td>
                        <td>{{$data->nama_jabatan}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>  
            </div>
        </div>
    </div>
</div>

<div class="modal fade bd-example-modal-lg" id="myModal4" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" >
    <div class="modal-dialog modal-lg" role="document" >
        <div class="modal-content" style="background: #fff;">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cari Jabatan FUngsional</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table id="lookup4" class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                        <th>Id</th>
                            <th>Nama Nama Pangkat / Golongan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($datapangkat as $data)
                        <tr class="pilihPangkatBaru" idpangkatbaru="<?php echo $data->id; ?>" namapangkatbaru="<?php echo $data->nama; ?>"  >
                        <td>{{$data->id}}</td>
                        <td>{{$data->nama}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>  
            </div>
        </div>
    </div>
</div>
@endsection