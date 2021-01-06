@section('js')
 <script type="text/javascript">
            $(document).on('click', '.pilihPegawai', function (e) {
                document.getElementById("nama").value = $(this).attr('nama');
                document.getElementById("nip").value = $(this).attr('nip');
                document.getElementById("idpegawai").value = $(this).attr('idpegawai');
                $('#myModal').modal('hide');
            });  
            $(document).on('click', '.pilihPangkat', function (e) {
                document.getElementById("idpangkat").value = $(this).attr('idpangkat');
                document.getElementById("namapangkat").value = $(this).attr('namapangkat');
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

<form method="POST" action="{{ route('datapangkat.store') }}" enctype="multipart/form-data">
    {{ csrf_field() }}
<div class="row">
            <div class="col-md-12 d-flex align-items-stretch grid-margin">
              <div class="row flex-grow">
                <div class="col-12">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Tambah Data Pangkat / Golongan</h4>
                      
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
                        <div class="form-group{{ $errors->has('idpangkat') ? ' has-error' : '' }}">
                            <label for="idpangkat" class="col-md-4 control-label">Nama Pangkat / Golongan <code>*</code></label>
                            <div class="col-md-6">
                                <div class="input-group">
                                <input id="namapangkat" type="text" class="form-control" readonly="" required>
                                <input id="idpangkat" type="hidden" name="idpangkat" value="{{ old('idpangkat') }}" required readonly="">
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
                        <div class="form-group ">
                            <label for="sk" class="col-md-4 control-label">Nomor SK  </label>
                            <div class="col-md-6">
                                <input id="sk" type="text" class="form-control" name="sk"    >
                                 
                            </div>
                        </div>  
                        <div class="form-group ">
                            <label for="tglsk" class="col-md-4 control-label">Tanggal SK</label>
                            <div class="col-md-3">
                                <input id="tglsk" type="date" class="form-control" name="tglsk" value="{{ date('Y-m-d', strtotime(Carbon\Carbon::today()->toDateString())) }}"  >
                                 
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="pengesah" class="col-md-4 control-label">Pejabat Pengesahan SK</label>
                            <div class="col-md-6">
                                <input id="pengesah" type="text" class="form-control" name="pengesah"   >
                                 
                            </div>
                        </div> 
                        <div class="form-group ">
                            <label for="tmt" class="col-md-4 control-label">TMT Pangkat</label> 
                            <div class="col-md-3">
                                <input id="tmt" type="date" class="form-control" name="tmt" value="{{ date('Y-m-d', strtotime(Carbon\Carbon::today()->toDateString())) }}"   >
                                 
                            </div>
                        </div>
 
                        <div class="form-group ">
                            <label for="filesk" class="col-md-4 control-label">File SK  </label>
                            <div class="col-md-6">
                                <input id="filesk" type="file" class="form-control" name="filesk"  >
                                
                            </div>
                        </div>
                        
                                         

                        <button type="submit" class="btn btn-primary" id="submit">
                                    Submit
                        </button>
                        <button type="reset" class="btn btn-danger">
                                    Reset
                        </button>
                        <a href="{{route('datapangkat.index')}}" class="btn btn-light pull-right">Back</a>
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
                        @foreach($pangkat as $data)
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
@endsection