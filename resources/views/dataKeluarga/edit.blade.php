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

<form action="{{ route('keluarga.update', $data->id) }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('put') }}
<div class="row">
            <div class="col-md-12 d-flex align-items-stretch grid-margin">
              <div class="row flex-grow">
                <div class="col-12">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Edit Data Orang Tua</b> </h4>
                      <form class="forms-sample">
                      <div class="form-group{{ $errors->has('nip') ? ' has-error' : '' }}">
                            <label for="nip" class="col-md-4 control-label">Nama Pegawai <code>*</code></label>
                            <div class="col-md-6">
                                <div class="input-group">
                                <input id="nama" type="text" class="form-control" value="{{ $datas2->nama }}" readonly="" required>
                                <input id="nip" type="hidden" name="nip" value="{{ old('nip') }}" required readonly="">
                                <input id="idpegawai" type="hidden" name="idpegawai" value="{{  $datas2->id }}" required readonly="">
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
                        <div class="form-group{{ $errors->has('nama') ? ' has-error' : '' }}">
                            <label for="nama" class="col-md-4 control-label">Nama Lengkap Orangtua<code>*</code></label>
                            <div class="col-md-6">
                                <input id="nama" type="text" class="form-control" name="nama" value="{{ $data->nama }}"  >
                                @if ($errors->has('nama'))
                                    <span class="help-block">
                                    Nama Keluarga tidak boleh kosong
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="tempat" class="col-md-4 control-label">Tempat Lahir </label>
                            <div class="col-md-6">
                                <input id="tempat" type="text" class="form-control" name="tempat" value="{{ $data->tempat }}"   >
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="ttl" class="col-md-4 control-label">Tanggal Lahir</label>
                            <div class="col-md-3">
                                <input id="ttl" type="date" class="form-control" name="ttl" value="{{ $data->ttl }}"   >
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="pendidikan" class="col-md-4 control-label">Pendidikan  </label>
                            <div class="col-md-4">
                            <select class="form-control" name="pendidikan"   >
                                <option selected="selected">{{$data->pendidikan}}</option>
                                <option value="-"></option>
                                <option value="SD">SD</option>
                                <option value="SMP">SMP</option>
                                <option value="SMA/SMK">SMA/SMK</option>
                                <option value="D1">D1</option>
                                <option value="D2">D2</option>
                                <option value="D3">D3</option>
                                <option value="D4">D4</option>
                                <option value="Sarjana">Sarjanan</option>
                                <option value="Magister">Magister</option>
                                <option value="Doktor">Doktor</option>
                            </select>
                            </div>
                        </div>                         
                        <div class="form-group ">
                            <label for="pekerjaan" class="col-md-4 control-label">Pekerjaan  </label>
                            <div class="col-md-4">
                            <select class="form-control" name="pekerjaan"    >
                                <option selected="selected">{{$data->pekerjaan}}</option>
                                <option value="-"></option>
                                <option value="PNS">PNS</option>
                                <option value="Pegawai Swasta">Pegawai Swasta</option>
                                <option value="Wiraswasta">Wiraswasta</option>
                                <option value="Tidak Bekerja">Tidak Bekerja</option>
                                <option value="Lainnya">Lainnya</option>
                            </select>
                            </div>
                        </div>   
                        <div class="form-group ">
                            <label for="hub" class="col-md-4 control-label">Hubungan Keluarga  </label>
                            <div class="col-md-4">
                            <select class="form-control" name="hub" required=""  >
                                <option selected="selected">{{$data->hub}}</option>
                                <option value="-"></option> 
                                <option value="Ayah Kandung">Ayah Kandung</option>
                                <option value="Ibu Kandung">Ibu Kandung</option> 
                            </select>
                            </div>
                        </div>
   
                        <button type="submit" class="btn btn-primary" id="submit">
                                    Update
                        </button>
                        <a href="{{route('keluarga.index')}}" class="btn btn-light pull-right">Back</a>
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
                        @foreach($datas as $data)
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