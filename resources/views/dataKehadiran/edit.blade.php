@section('js')

<script type="text/javascript">

$(document).ready(function() {
    $(".users").select2();
});

</script>
@stop
@extends('layouts.app')

@section('content')

<form action="{{ route('kehadiran.update', $data->id) }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('put') }}
<div class="row">
            <div class="col-md-12 d-flex align-items-stretch grid-margin">
              <div class="row flex-grow">
                <div class="col-12">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Edit Data Kehadiran</b> </h4>
                      <form class="forms-sample">
                        <div class="form-group">
                            <label for="nip" class="col-md-4 control-label">NIP</label>
                            <div class="col-md-4">
                                <input id="nip" value="{{ $data->nip }}" type="text" class="form-control" name="nip">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="namapegawai" class="col-md-4 control-label">Nama Pegawai</label>
                            <div class="col-md-6">
                                <input id="namapegawai" value="{{ $data->namapegawai }}" type="text" class="form-control" name="namapegawai" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="harikerja" class="col-md-4 control-label">Jumlah Hari Kerja</label>
                            <div class="col-md-1">
                                <input id="harikerja" value="{{ $data->harikerja }}" type="text" class="form-control"  name="harikerja" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="harimasuk" class="col-md-4 control-label">Jumlah Hari Masuk</label>
                            <div class="col-md-1">
                                <input id="harimasuk" value="{{ $data->harimasuk }}" type="text" class="form-control" name="harimasuk" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="presentase" class="col-md-4 control-label">Presentase Kehadiran</label>
                            <div class="col-md-1">
                                <input id="presentase" value="{{ $data->presentase }}" type="text" class="form-control" name="presentase" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="bulan" class="col-md-4 control-label">Periode Bulan</label>
                            <div class="col-md-4">
                            <select class="form-control" name="bulan"   >
                                <option selected="selected">{{$data->bulan}}</option>
                                <option value="-"></option>
                                <option value="Januari">Januari</option>
                                <option value="Februari">Februari</option>
                                <option value="Maret">Maret</option>
                                <option value="April">April</option>
                                <option value="Mei">Mei</option>
                                <option value="Juni">Juni</option>
                                <option value="Juli">Juli</option>
                                <option value="Agustus">Agustus</option>
                                <option value="September">September</option>
                                <option value="Oktober">Oktober</option>
                                <option value="Noovember">November</option>
                                <option value="Desember">Desember</option>
                            </select>
                            </div>
                        </div> 
                        <div class="form-group">
                            <label for="tahun" class="col-md-4 control-label">Periode Tahun</label>
                            <div class="col-md-2">
                                <input id="tahun" type="text" class="form-control" name="tahun" value="{{ $data->tahun }}"  >                                
                            </div>
                        </div>
   
                        <button type="submit" class="btn btn-primary" id="submit">
                                    Update
                        </button>
                        <a href="{{route('kehadiran.index')}}" class="btn btn-light pull-right">Back</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>

</div>
</form>
@endsection