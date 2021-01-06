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

<form method="POST" action="{{ route('datajurnal.store') }}" enctype="multipart/form-data">
    {{ csrf_field() }}
<div class="row">
            <div class="col-md-12 d-flex align-items-stretch grid-margin">
              <div class="row flex-grow">
                <div class="col-12">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Tambah Data Jurnal baru</h4>
                      
                        <div class="form-group{{ $errors->has('nip') ? ' has-error' : '' }}">
                            <label for="nip" class="col-md-4 control-label">Nama Pegawai <code>*</code></label>
                            <div class="col-md-6">
                                <div class="input-group">
                                <input id="nama" type="text" class="form-control" readonly="" required>
                                <input id="nip" type="hidden" name="nip"  required readonly="">
                                <input id="idpegawai" type="hidden" name="idpegawai"  required readonly="">
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
                            <label for="judul" class="col-md-4 control-label">Judul Artikel </label>
                            <div class="col-md-6">
                                <input id="judul" type="text" class="form-control" name="judul"   >
                                 
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="namajurnal" class="col-md-4 control-label">Nama Jurnal / Publikasi </label>
                            <div class="col-md-6">
                                <input id="namajurnal" type="text" class="form-control" name="namajurnal"   >
                                 
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="tahun" class="col-md-4 control-label">Tahun </label>
                            <div class="col-md-2">
                                <input id="tahun" type="text" class="form-control" name="tahun"    >
                                 
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="link" class="col-md-4 control-label">Link </label>
                            <div class="col-md-6">
                                <input id="link" type="text" class="form-control" name="link"   >
                                 
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="filejurnal" class="col-md-4 control-label">File Jurnal / Publikasi </label>
                            <div class="col-md-6">
                                <input id="filejurnal" type="file" class="form-control" name="filejurnal"  >
                                 
                            </div>
                        </div>                 

                        <button type="submit" class="btn btn-primary" id="submit">
                                    Submit
                        </button>
                        <button type="reset" class="btn btn-danger">
                                    Reset
                        </button>
                        <a href="{{route('datajurnal.index')}}" class="btn btn-light pull-right">Back</a>
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
@endsection