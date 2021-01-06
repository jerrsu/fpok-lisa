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

<form action="{{ route('datastudy.update', $data->id) }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('put') }}
<div class="row">
            <div class="col-md-12 d-flex align-items-stretch grid-margin">
              <div class="row flex-grow">
                <div class="col-12">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Edit Data Study Lanjut</b> </h4>
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
                            <label for="tingkat" class="col-md-4 control-label">Tingkat</label>
                            <div class="col-md-2">
                            <select class="form-control" name="tingkat"  >
                                <option selected="selected">{{$data->tingkat}}</option>
                                <option value=""></option>
                                <option value="D3">D3</option>
                                <option value="D4">D4</option>
                                <option value="Sarjana">Sarjanan</option>
                                <option value="Magister">Magister</option>
                                <option value="Doktor">Doktor</option>
                            </select>
                            </div>
                        </div> 
                        <div class="form-group{{ $errors->has('perguruan') ? ' has-error' : '' }}">
                            <label for="perguruan" class="col-md-4 control-label">Nama Perguruan Tinggi <code>*</code></label>
                            <div class="col-md-6">
                                <input id="perguruan" type="text" class="form-control" name="perguruan" value="{{ $data->perguruan }}" required   >
                                @if ($errors->has('perguruan'))
                                    <span class="help-block">
                                    perguruan  tidak boleh kosong
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="program" class="col-md-4 control-label">Program Study</label>
                            <div class="col-md-6">
                                <input id="program" type="text" class="form-control" name="program" value="{{ $data->program }}"  >
                              
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="tahun" class="col-md-4 control-label">Tahun Masuk</label>
                            <div class="col-md-2">
                                <input id="tahun" type="text" class="form-control" name="tahun" value="{{ $data->tahun }}"  >
                                
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="negara" class="col-md-4 control-label">Negara</label>
                            <div class="col-md-2">
                                <input id="negara" type="text" class="form-control" name="negara" value="{{ $data->negara }}"  >
                                
                            </div>
                        </div> 
   
                        <button type="submit" class="btn btn-primary" id="submit">
                                    Update
                        </button>
                        <a href="{{route('datastudy.index')}}" class="btn btn-light pull-right">Back</a>
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