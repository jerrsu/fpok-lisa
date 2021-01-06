@section('js')
 <script type="text/javascript">
            $(document).on('click', '.pilihPegawai', function (e) {
                document.getElementById("nama").value = $(this).attr('nama');
                document.getElementById("nip").value = $(this).attr('nip');
                document.getElementById("idpegawai").value = $(this).attr('idpegawai');
                $('#myModal').modal('hide');
            });  
            $(document).on('click', '.pilihJabatan', function (e) {
                document.getElementById("idjabatan").value = $(this).attr('idjabatan');
                document.getElementById("namajabatan").value = $(this).attr('namajabatan');
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

<form method="POST" action="{{ route('datafungsional.store') }}" enctype="multipart/form-data">
    {{ csrf_field() }}
<div class="row">
            <div class="col-md-12 d-flex align-items-stretch grid-margin">
              <div class="row flex-grow">
                <div class="col-12">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Tambah Data Jabatan Fungsional</h4>
                      
                        <div class="form-group{{ $errors->has('nip') ? ' has-error' : '' }}">
                            <label for="nip" class="col-md-4 control-label">Nama Pegawai <code>*</code></label>
                            <div class="col-md-6">
                                <div class="input-group">
                                <input id="nama" type="text" class="form-control" readonly="" required>
                                <input id="nip" type="hidden" name="nip" value="{{ old('nip') }}" required readonly="">
                                <input id="idpegawai" type="hidden" name="idpegawai" value="{{ old('idpegawai') }}" required readonly="">
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
                        <div class="form-group{{ $errors->has('idjabatan') ? ' has-error' : '' }}">
                            <label for="idjabatan" class="col-md-4 control-label">Nama Jabatan <code>*</code></label>
                            <div class="col-md-6">
                                <div class="input-group">
                                <input id="namajabatan" type="text" class="form-control" readonly="" required>
                                <input id="idjabatan" type="hidden" name="idjabatan" value="{{ old('idjabatan') }}" required readonly="">
                                <span class="input-group-btn">
                                    <button type="button" class="btn btn-info btn-secondary" data-toggle="modal" data-target="#myModal2"><b>Cari</b> <span class="fa fa-search"></span></button>
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
                            <label for="sk" class="col-md-4 control-label">Nomor SK </label>
                            <div class="col-md-6">
                                <input id="sk" type="text" class="form-control" name="sk"    >
                                
                            </div>
                        </div>  
                        <div class="form-group">
                            <label for="tgl" class="col-md-4 control-label">Tanggal SK</label>
                            <div class="col-md-3">
                                <input id="tgl" type="date" class="form-control" name="tgl" value="{{ date('Y-m-d', strtotime(Carbon\Carbon::today()->toDateString())) }}"  >
                                
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="tmt" class="col-md-4 control-label">TMT Awal</label>
                            <div class="col-md-3">
                                <input id="tmt" type="date" class="form-control" name="tmt" value="{{ date('Y-m-d', strtotime(Carbon\Carbon::today()->toDateString())) }}"   >
                                
                            </div>
                        </div> 
                        <div class="form-group">
                            <label for="filesk" class="col-md-4 control-label">File SK ></label>
                            <div class="col-md-6">
                                <input id="filesk" type="file" class="form-control" name="filesk"   >
                                
                            </div>
                        </div>
                        
                                         

                        <button type="submit" class="btn btn-primary" id="submit">
                                    Submit
                        </button>
                        <button type="reset" class="btn btn-danger">
                                    Reset
                        </button>
                        <a href="{{route('datafungsional.index')}}" class="btn btn-light pull-right">Back</a>
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
                        @foreach($data as $data)
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
                <h5 class="modal-title" id="exampleModalLabel">Cari Jabatan FUngsional</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table id="lookup2" class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                        <th>Id</th>
                            <th>Nama Jabatan Fungsional</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($datas as $data)
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
@endsection