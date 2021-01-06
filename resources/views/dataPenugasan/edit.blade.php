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

<form action="{{ route('datapenugasan.update', $data->id) }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('put') }}
<div class="row">
            <div class="col-md-12 d-flex align-items-stretch grid-margin">
              <div class="row flex-grow">
                <div class="col-12">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Edit Data Penugasan</b> </h4>
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
                        <div class="form-group">
                            <label for="tujuan" class="col-md-4 control-label">Tujuan Tugas</label>
                            <div class="col-md-6">
                                <input id="tujuan" type="text" class="form-control" value="{{ $data->tujuan }}" name="tujuan"  >
                                
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="nosurat" class="col-md-4 control-label">Nomor Surat</label>
                            <div class="col-md-6">
                                <input id="nosurat" type="text" class="form-control" name="nosurat" value="{{ $data->nosurat }}"  >
                                
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="tgl" class="col-md-4 control-label">Tanggal Penugasan</label>
                            <div class="col-md-3">
                                <input id="tgl" type="date" class="form-control" name="tgl" value="{{ $data->tgl }}"  >
                                
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="lama" class="col-md-4 control-label">Lama Tugas</label>
                            <div class="col-md-2">
                                <input id="lama" type="text" class="form-control" name="lama" value="{{ $data->lama }}"  >
                                
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="filesk" class="col-md-4 control-label">File Penghargaan</label>
                            <div class="col-md-6">
                                <input id="filesk" type="file" class="form-control" name="filesk"  >
                                
                            </div>
                        </div> 
   
                        <button type="submit" class="btn btn-primary" id="submit">
                                    Update
                        </button>
                        <a href="{{route('datapenugasan.index')}}" class="btn btn-light pull-right">Back</a>
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