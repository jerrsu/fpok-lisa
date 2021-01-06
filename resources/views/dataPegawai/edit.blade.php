@section('js')
 <script type="text/javascript">
            $(document).on('click', '.pilihUnit', function (e) {
                document.getElementById("nama_unit").value = $(this).attr('nama_unit');
                document.getElementById("id_unit_kerja").value = $(this).attr('id_unit_kerja');
                $('#myModal').modal('hide');
            });

            $(document).on('click', '.pilihStatus', function (e) {
                document.getElementById("id_status").value = $(this).attr('id_status');
                document.getElementById("nama_status").value = $(this).attr('nama_status');
                $('#myModal2').modal('hide');
            });

            // $(document).on('click', '.pilihJabatan', function (e) {
            //     document.getElementById("id_jabatan_fungsional").value = $(this).attr('id_jabatan_fungsional');
            //     document.getElementById("nama_fungsional").value = $(this).attr('nama_fungsional');
            //     $('#myModal3').modal('hide');
            // });
          
             $(function () {
                $("#lookup, #lookup2").dataTable();
            });

        </script>

@stop
@section('css')

@stop
@extends('layouts.app')

@section('content')

<form action="{{ route('dataPegawai.update', $data->id) }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('put') }}
<div class="row">
            <div class="col-md-12 d-flex align-items-stretch grid-margin">
              <div class="row flex-grow">
                <div class="col-12">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Edit Data : <b>{{$data->nik}}</b> </h4>
                      <form class="forms-sample">
                        <div class="form-group{{ $errors->has('nip') ? ' has-error' : '' }}">
                            <label for="nip" class="col-md-4 control-label">NIP <code>*</code></label>
                            <div class="col-md-6">
                                <input id="nip" type="text" class="form-control" name="nip" value="{{ $data->nip }}"   required>
                                @if ($errors->has('nip'))
                                    <span class="help-block">
                                    Nip Tidak Boleh Kosong
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('nama') ? ' has-error' : '' }}">
                            <label for="nama" class="col-md-4 control-label">Nama Lengkap <code>*</code></label>
                            <div class="col-md-6">
                                <input id="nama" type="text" class="form-control" name="nama" value="{{ $data->nama }}"   required>
                                @if ($errors->has('nama'))
                                    <span class="help-block">
                                    Nama Tidak Boleh Kosong
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="gelar_depan" class="col-md-4 control-label">Gelar Depan  </label>
                            <div class="col-md-6">
                                <input id="gelar_depan" type="text" class="form-control" value="{{ $data->gelar_depan }}" name="gelar_depan"   >
                                 
                            </div>
                        </div>                         
                        <div class="form-group ">
                            <label for="gelar_belakang" class="col-md-4 control-label">Gelar Belakang  </label>
                            <div class="col-md-6">
                                <input id="gelar_belakang" type="text" class="form-control" value="{{ $data->gelar_belakang }}" name="gelar_belakang"     >
                                 
                            </div>
                        </div> 
                        <div class="form-group ">
                            <label for="nik" class="col-md-4 control-label">NIK  </label>
                            <div class="col-md-6">
                                <input id="nik" type="text" class="form-control" name="nik" value="{{ $data->nik }}"   required>
                                @if ($errors->has('nik'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nik') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                         
                        <div class="form-group ">
                            <label for="npwp" class="col-md-4 control-label">NPWP </label>
                            <div class="col-md-6">
                                <input id="npwp" type="text" class="form-control" name="npwp" value="{{ $data->npwp }}"    >
                                 
                            </div>
                        </div>  
                        <div class="form-group ">
                            <label for="nidn" class="col-md-4 control-label">NIDN  </label>
                            <div class="col-md-6">
                                <input id="nidn" type="text" class="form-control" name="nidn" value="{{ $data->nidn }}"    >
                                 
                            </div>
                        </div>   
                        <div class="form-group ">
                            <label for="ttl" class="col-md-4 control-label">Tempat Lahir </label>
                            <div class="col-md-6">
                                <input id="ttl" type="text" class="form-control" name="ttl" value="{{ $data->ttl }}"    >                                
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="tgl" class="col-md-4 control-label">Tanggal Lahir</label>
                            <div class="col-md-3">
                                <input id="tanggallahir" type="date" class="form-control" name="tanggallahir" value="{{ $data->tanggallahir }}"  >
                                
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="agama" class="col-md-4 control-label">Agama </label>
                            <div class="col-md-4">
                            <select class="form-control" name="agama" value = "{{$data->agama}}"  >
                            <option selected="selected">{{$data->agama}}</option>
                                <option value=""></option>
                                <option value="Islam">Islam</option>
                                <option value="Kristen">Kristen</option>
                                <option value="Budha">Budha</option>
                                <option value="Hindu">Hindu</option>
                                <option value="Lainnya">Lainnya</option>
                            </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="jk" class="col-md-4 control-label">Jenis Kelamin </label>
                            <div class="col-md-4">
                            <select class="form-control" name="jk" value = "{{$data->jk}}"   >
                                <option selected="selected">{{$data->jk}}</option>
                                <option value=""></option>
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                            </div>
                        </div>   
                        <div class="form-group">
                            <label for="golongan_darah" class="col-md-4 control-label">Golongan Darah </label>
                            <div class="col-md-4">
                            <select class="form-control" name="golongan_darah" value = "{{$data->golongan_darah}}"   >
                                <option selected="selected">{{$data->golongan_darah}}</option>
                                <option value=""></option>
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="O">O</option>
                                <option value="AB">AB</option>
                            </select>
                            </div>
                        </div> 
                        <div class="form-group">
                            <label for="status_nikah" class="col-md-4 control-label">Status Pernikahan </label>
                            <div class="col-md-4">
                            <select class="form-control" name="status_nikah" value = "{{$data->status_nikah}}"   >
                                <option selected="selected">{{$data->status_nikah}}</option>
                                <option value=""></option>
                                <option value="Kawin">Kawin</option>
                                <option value="Belum Kawin">Belum Kawin</option>
                                <option value="Duda">Duda</option>
                                <option value="Janda">Janda</option>
                            </select>
                            </div>
                        </div> 
                        <div class="form-group">
                            <label for="status_kepegawaian" class="col-md-4 control-label">Status Kepegawaian </label>
                            <div class="col-md-4">
                            <select class="form-control" name="status_kepegawaian"   >
                                <option selected="selected">{{$data->status_kepegawaian}}</option>
                                <option value=""></option>
                                <option value="CPNS">CPNS</option>
                                <option value="PNS">PNS</option>
                                <option value="CPT">CPT</option>
                                <option value="PT">PT</option>
                                <option value="PTT">PTT</option>
                            </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="status_pegawai" class="col-md-4 control-label">Status Pegawai </label>
                            <div class="col-md-4">
                            <select class="form-control" name="status_pegawai" value = "{{$data->status_pegawai}}"   >
                                <option selected="selected">{{$data->status_pegawai}}</option>
                                <option value=""></option>
                                <option value="Dosen">Dosen</option>
                                <option value="Tenaga Kependidikan">Tenaga Kependidikan</option>
                            </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="alamat" class="col-md-4 control-label">Alamat </label>
                            <div class="col-md-6">
                                <input id="alamat" type="text" class="form-control" name="alamat" value="{{ $data->alamat }}"   >
                                
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="tlp" class="col-md-4 control-label">Telepon </label>
                            <div class="col-md-6">
                                <input id="tlp" type="text" class="form-control" name="tlp" value="{{ $data->tlp }}"   >
                                
                            </div>
                        </div>      
                        <div class="form-group">
                            <label for="email" class="col-md-4 control-label">E-Mail Address </label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ $data->email}}"   >
                                
                            </div>
                        </div>      
                        <div class="form-group">
                            <label for="pensiun" class="col-md-4 control-label">Perkiraan Pensiun </label>
                            <div class="col-md-4">
                            <select class="form-control" name="pensiun" value="{{ $data->pensiun}}" required  >
                                <option selected="selected">{{$data->pensiun}}</option>
                                <option value=""></option>
                                <option value="70">Guru Besar 70 th</option>
                                <option value="65">Dosen 65 th</option>
                                <option value="58">Tendik 58 th</option>
                            </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="id_unit_kerja" class="col-md-4 control-label">Unit Kerja </label>
                            <div class="col-md-6">
                                <div class="input-group">
                                <input id="nama_unit" type="text" class="form-control" value="{{ $datas->nama_unit }}" readonly=""   >
                                <input id="id_unit_kerja" type="hidden" name="id_unit_kerja" value="{{ $data->id_unit_kerja }}"  readonly="">
                                <span class="input-group-btn">
                                    <button type="button" class="btn btn-info btn-secondary" data-toggle="modal" data-target="#myModal"><b>Cari</b> <span class="fa fa-search"></span></button>
                                </span>
                                </div>                                
                                 
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="id_status" class="col-md-4 control-label">Status </label>
                            <div class="col-md-6">
                                <div class="input-group">
                                <input id="nama_status" type="text" class="form-control" value="{{ $datas->nama_status }}" readonly=""   >
                                <input id="id_status" type="hidden" name="id_status" value="{{ $data->id_status }}"  readonly="">
                                <span class="input-group-btn">
                                    <button type="button" class="btn btn-info btn-secondary" data-toggle="modal" data-target="#myModal2"><b>Cari</b> <span class="fa fa-search"></span></button>
                                </span>
                                </div>
                                 
                            </div>
                        </div>

                        <!-- <div class="form-group">
                            <label for="id_jabatan_fungsional" class="col-md-4 control-label">Unit Kerja </label>
                            <div class="col-md-6">
                                <div class="input-group">
                                <input id="nama_fungsional" type="text" class="form-control" value="{{ $datas->nama_jabatan }}" readonly=""   >
                                <input id="id_jabatan_fungsional" type="hidden" name="id_jabatan_fungsional" value="{{ $data->id_jabatan_fungsional }}"  readonly="">
                                <span class="input-group-btn">
                                    <button type="button" class="btn btn-info btn-secondary" data-toggle="modal" data-target="#myModal3"><b>Cari</b> <span class="fa fa-search"></span></button>
                                </span>
                                </div>
                                                                 
                            </div>
                        </div>     -->
                        <button type="submit" class="btn btn-primary" id="submit">
                                    Update
                        </button>
                        <a href="{{route('dataPegawai.index')}}" class="btn btn-light pull-right">Back</a>
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
                <h5 class="modal-title" id="exampleModalLabel">Cari Unit Kerja</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table id="lookup" class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama Unit</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($units as $data)
                        <tr class="pilihUnit" id_unit_kerja="<?php echo $data->id; ?>" nama_unit="<?php echo $data->nama_unit; ?>" >
                        <td>{{$data->id}}</td>
                            <td>{{$data->nama_unit}}</td>
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
                <h5 class="modal-title" id="exampleModalLabel">Cari Status</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table id="lookup2" class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($status as $data)
                        <tr class="pilihStatus" id_status="<?php echo $data->id; ?>" nama_status="<?php echo $data->nama_status; ?>" >
                        <td>{{$data->id}}</td>
                            <td>{{$data->nama_status}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>  
            </div>
        </div>
    </div>
</div>

<!-- <div class="modal fade bd-example-modal-lg" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" >
    <div class="modal-dialog modal-lg" role="document" >
        <div class="modal-content" style="background: #fff;">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cari Status</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table id="lookup3" class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama Jabatan Fungsional</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($jabfus as $data)
                        <tr class="pilihJabatan" id_jabatan_fungsional="<?php echo $data->id; ?>" nama_fungsional="<?php echo $data->nama_jabatan; ?>" >
                        <td>{{$data->id}}</td>
                            <td>{{$data->nama_jabatan}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>  
            </div>
        </div>
    </div>
</div> -->
@endsection