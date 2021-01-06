@section('js')
 <script type="text/javascript">
            $(document).on('click', '.pilihPegawai', function (e) {
                document.getElementById("nama").value = $(this).attr('nama');
                document.getElementById("nip").value = $(this).attr('nip');
                document.getElementById("idpegawai").value = $(this).attr('idpegawai');
                $('#myModal').modal('hide');
            });  
            $(document).on('click', '.pilihJabatan', function (e) {
                document.getElementById("idstruktural").value = $(this).attr('idstruktural');
                document.getElementById("namastruktural").value = $(this).attr('namastruktural');
                $('#myModal2').modal('hide');
            });           
          
             $(function () {
                $("#lookup,#lookup2").dataTable();
            });

        </script>

@stop
@section('css')
@stop
@extends('layouts.app')

@section('content')

<form action="{{ route('datastruktural.update', $data->id) }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('put') }}
<div class="row">
            <div class="col-md-12 d-flex align-items-stretch grid-margin">
              <div class="row flex-grow">
                <div class="col-12">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Edit Data Jabatan Struktural</b> </h4>
                      <form class="forms-sample">             
                      <div class="form-group{{ $errors->has('nip') ? ' has-error' : '' }}">
                            <label for="nip" class="col-md-4 control-label">Nama Pegawai <code>*</code></label>
                            <div class="col-md-6">
                                <div class="input-group">
                                <input id="nama" type="text" class="form-control" readonly="" value="{{ $pegawais->nama }}" required>
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
                        <div class="form-group{{ $errors->has('idstruktural') ? ' has-error' : '' }}">
                            <label for="idstruktural" class="col-md-4 control-label">Nama Jabatan Struktural <code>*</code></label>
                            <div class="col-md-6">
                                <div class="input-group">
                                <input id="namastruktural" type="text" class="form-control" value="{{ $strukturals->nama }}" readonly="" required>
                                <input id="idstruktural" type="hidden" name="idstruktural" value="{{ $data->idstruktural }}" required readonly="">
                                <span class="input-group-btn">
                                    <button type="button" class="btn btn-info btn-secondary" data-toggle="modal" data-target="#myModal2"><b>Cari</b> <span class="fa fa-search"></span></button>
                                </span>
                                </div>
                                @if ($errors->has('idstruktural'))
                                    <span class="help-block">
                                        Data Struktural tidak boleh kosong
                                    </span>
                                @endif                                 
                            </div>
                        </div>                          
                        <div class="form-group ">
                            <label for="sk" class="col-md-4 control-label">Nomor SK</label>
                            <div class="col-md-6">
                                <input id="sk" type="text" class="form-control" name="sk" value="{{ $data->sk }}"   >
                                
                            </div>
                        </div>  
                        <div class="form-group">
                            <label for="tgl" class="col-md-4 control-label">Tanggal SK</label>
                            <div class="col-md-3">
                                <input id="tgl" type="date" class="form-control" name="tgl" value="{{  $data->tgl }}"  >
                                
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="tmt" class="col-md-4 control-label">TMT Awal</label>
                            <div class="col-md-3">
                                <input id="tmt" type="date" class="form-control" name="tmt" value="{{  $data->tmt }}"  >
                                
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="tmt2" class="col-md-4 control-label">TMT Akhir</label>
                            <div class="col-md-3">
                                <input id="tmt2" type="date" class="form-control" name="tmt2" value="{{  $data->tmt2 }}"   >
                                
                            </div>
                        </div> 
                        <div class="form-group">
                            <label for="filesk" class="col-md-4 control-label">File SK <code>*</code></label>
                            <div class="col-md-6">
                                <input id="filesk" type="file" class="form-control" name="filesk"  >
                                
                            </div>
                        </div>
   
                        <button type="submit" class="btn btn-primary" id="submit">
                                    Update
                        </button>
                        <a href="{{route('datastruktural.index')}}" class="btn btn-light pull-right">Back</a>
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
<div class="modal fade bd-example-modal-lg" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" >
    <div class="modal-dialog modal-lg" role="document" >
        <div class="modal-content" style="background: #fff;">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cari Jabatan Struktural</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table id="lookup2" class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                        <th>Id</th>
                            <th>Nama Jabatan Struktural</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($struktural as $data)
                        <tr class="pilihJabatan" idstruktural="<?php echo $data->id; ?>" namastruktural="<?php echo $data->nama; ?>"  >
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