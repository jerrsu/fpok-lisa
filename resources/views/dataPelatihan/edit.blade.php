@section('js')
 <script type="text/javascript">
            $(document).on('click', '.pilihPegawai', function (e) {
                document.getElementById("nama").value = $(this).attr('nama');
                document.getElementById("nip").value = $(this).attr('nip');
                document.getElementById("idpegawai").value = $(this).attr('idpegawai');
                $('#myModal').modal('hide');
            });            
          
             $(function () {
                $("#lookup").dataTable();
            });

        </script>

@stop
@section('css')
@stop
@extends('layouts.app')

@section('content')

<form action="{{ route('datapelatihan.update', $data->id) }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('put') }}
<div class="row">
            <div class="col-md-12 d-flex align-items-stretch grid-margin">
              <div class="row flex-grow">
                <div class="col-12">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Edit Data Pelatihan</b> </h4>
                      <form class="forms-sample">
                      <div class="form-group{{ $errors->has('nip') ? ' has-error' : '' }}">
                            <label for="nip" class="col-md-4 control-label">Nama Pegawai <code>*</code></label>
                            <div class="col-md-6">
                                <div class="input-group">
                                <input id="nama" type="text" class="form-control" readonly="" required value="{{ $pegawais->nama }}">
                                <input id="nip" type="hidden" name="nip" value="{{ $pegawais->nip }}" required readonly="">
                                <input id="idpegawai" type="hidden" name="idpegawai" value="{{ $data->idpegawai }}" required readonly="">
                                <span class="input-group-btn">
                                    <button type="button" class="btn btn-info btn-secondary" data-toggle="modal" data-target="#myModal"><b>Cari</b> <span class="fa fa-search"></span></button>
                                </span>
                                </div>
                                @if ($errors->has('nip'))
                                    <span class="help-block">
                                        Data nama Pegawai tidak boleh kosong
                                    </span>
                                @endif                                 
                            </div>
                        </div> 
                        <div class="form-group ">
                            <label for="namadiklat" class="col-md-4 control-label">Nama Diklat </label>
                            <div class="col-md-6">
                                <input id="namadiklat" type="text" class="form-control" name="namadiklat" value="{{ $data->namadiklat }}"   >
                                 
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="penyelenggara" class="col-md-4 control-label">Nama Penyelenggara </label>
                            <div class="col-md-6">
                                <input id="penyelenggara" type="text" class="form-control" name="penyelenggara" value="{{ $data->penyelenggara }}"  >
                                 
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="jam" class="col-md-4 control-label">Jumlah Jam </label>
                            <div class="col-md-1">
                                <input id="jam" placeholder="0" type="text" class="form-control" name="jam" value="{{ $data->jam }}"  >
                                 
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="nosertifikat" class="col-md-4 control-label">No Sertifikat </label>
                            <div class="col-md-4">
                                <input id="nosertifikat" type="text" class="form-control" name="nosertifikat" value="{{ $data->nosertifikat }}"  >
                                 
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="tgl" class="col-md-4 control-label">Tanggal Penyelenggaraan</label>
                            <div class="col-md-3">
                                <input id="tgl" type="date" class="form-control" name="tgl" value="{{ $data->tgl }}"  >
                                 
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="filesertifikat" class="col-md-4 control-label">File Sertifikat </label>
                            <div class="col-md-6">
                                <input id="filesertifikat" type="file" class="form-control" name="filesertifikat"   >
                                
                            </div>
                        </div>
   
                        <button type="submit" class="btn btn-primary" id="submit">
                                    Update
                        </button>
                        <a href="{{route('datapelatihan.index')}}" class="btn btn-light pull-right">Back</a>
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
                        @foreach($pegawai as $data)
                        <tr class="pilihPegawai" nip="<?php echo $data->nip; ?>" nama="<?php echo $data->nama; ?>" idpegawai="<?php echo $data->id; ?>" >
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
@endsection