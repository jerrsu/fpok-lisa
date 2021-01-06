@section('js')

<script type="text/javascript">

$(document).ready(function() {
    $(".users").select2();
});

</script>
@stop
@extends('layouts.app')

@section('content')

<form action="{{ route('dataperaturan.update', $data->id) }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('put') }}
<div class="row">
            <div class="col-md-12 d-flex align-items-stretch grid-margin">
              <div class="row flex-grow">
                <div class="col-12">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Edit Data Peraturan</b> </h4>
                      <form class="forms-sample">
                      <div class="form-group{{ $errors->has('no') ? ' has-error' : '' }}">
                            <label for="no" class="col-md-4 control-label">Nomor Peraturan <code>*</code></label>
                            <div class="col-md-6">
                                <input id="no" type="text" class="form-control" name="no" value="{{ $data->no }}" required=""  >
                                @if ($errors->has('judul'))
                                    <span class="help-block">
                                    nomor tidak boleh kosong
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="tentang" class="col-md-4 control-label">Tentang</label>
                            <div class="col-md-6">
                                <input id="tentang" type="text" class="form-control" name="tentang" value="{{ $data->tentang }}"    >
                                
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="tahun" class="col-md-4 control-label">Tahun</label>
                            <div class="col-md-1">
                                <input id="tahun" type="text" class="form-control" name="tahun" value="{{ $data->tahun }}"  >
                                
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="filesk" class="col-md-4 control-label">File Peraturan</label>
                            <div class="col-md-6">
                                <input id="filesk" type="file" class="form-control" name="filesk"   >
                                
                            </div>
                        </div> 
   
                        <button type="submit" class="btn btn-primary" id="submit">
                                    Update
                        </button>
                        <a href="{{route('dataperaturan.index')}}" class="btn btn-light pull-right">Back</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>

</div>
</form>
@endsection