@section('js')
 <script type="text/javascript">
            $(document).on('click', '.pilihPegawai', function (e) {
                document.getElementById("nama").value = $(this).attr('nama');
                document.getElementById("nip").value = $(this).attr('nip');
                document.getElementById("idpegawai").value = $(this).attr('idpegawai');
                $('#myModal').modal('hide');
            });           
            $(document).on('click', '.pilihUnit', function (e) {
                document.getElementById("nama_unit").value = $(this).attr('nama_unit');
                document.getElementById("id_unit_kerja").value = $(this).attr('id_unit_kerja');
                $('#myModal2').modal('hide');
            });
             $(function () {
                $("#lookup, #lookup2").dataTable();
            });

        </script>

@stop
@section('css')

@stop
@extends('layouts.app')

@section('content')

<form method="POST" action="{{ route('arsipcuti.store') }}" enctype="multipart/form-data">
    {{ csrf_field() }}
<div class="row">
            <div class="col-md-12 d-flex align-items-stretch grid-margin">
              <div class="row flex-grow">
                <div class="col-12">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Tambah Data Arsip Cuti</h4>
                      
                        <div class="form-group{{ $errors->has('nip') ? ' has-error' : '' }}">
                            <label for="nip" class="col-md-4 control-label">Nama Pegawai <code>*</code></label>
                            <div class="col-md-6">
                                <div class="input-group">
                                <input id="nama" type="text" class="form-control" readonly="" required>
                                <input id="nip" type="hidden"  name="nip" value="{{ old('nip') }}" required readonly="">
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
                        <div class="form-group{{ $errors->has('id_unit_kerja') ? ' has-error' : '' }}">
                            <label for="id_unit_kerja" class="col-md-4 control-label">Unit Kerja <code>*</code></label>
                            <div class="col-md-6">
                                <div class="input-group">
                                <input id="nama_unit" type="text" class="form-control" readonly="" required  >
                                <input id="id_unit_kerja" type="hidden" name="id_unit_kerja" value="{{ old('id_unit_kerja') }}" required readonly="">
                                <span class="input-group-btn">
                                    <button type="button" class="btn btn-info btn-secondary" data-toggle="modal" data-target="#myModal2"><b>Cari</b> <span class="fa fa-search"></span></button>
                                </span>
                                </div>
                                @if ($errors->has('id_unit_kerja'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('id_unit_kerja') }}</strong>
                                    </span>
                                @endif
                                 
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="jenis" class="col-md-4 control-label">Jenis Cuti</label>
                            <div class="col-md-3">
                            <select class="form-control" name="jenis"  >
                                <option value=""></option>
                                <option value="Cuti Tahunan">Cuti Tahunan</option>
                                <option value="Cuti Besar">Cuti Besar</option>
                                <option value="Cuti Sakit">Cuti Sakit</option>
                                <option value="Cuti Melahirkan">Cuti Melahirkan</option>
                                <option value="Cuti Alasan Penting">Cuti Alasan Penting</option>
                                <option value="Cuti di Luar Tanggungan Negara">Cuti di Luar Tanggungan Negara</option>
                            </select>
                            </div>
                        </div>  
                        <div class="form-group">
                            <label for="mulai" class="col-md-4 control-label">Tanggal Mulai</label>
                            <div class="col-md-3">
                                <input id="mulai" type="date" class="form-control" name="mulai" value="{{ date('Y-m-d', strtotime(Carbon\Carbon::today()->toDateString())) }}"  >
                                
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="selesai" class="col-md-4 control-label">Tanggal Selesai</label>
                            <div class="col-md-3">
                                <input id="selesai" type="date" class="form-control" name="selesai" value="{{ date('Y-m-d', strtotime(Carbon\Carbon::today()->toDateString())) }}"   >
                                 
                            </div>
                        </div> 
                        <div class="form-group">
                            <label for="filesk" class="col-md-4 control-label">File SK </label>
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
                        <a href="{{route('arsipcuti.index')}}" class="btn btn-light pull-right">Back</a>
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

@endsection