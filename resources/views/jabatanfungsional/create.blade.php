@section('js')

<script type="text/javascript">

$(document).ready(function() {
    $(".users").select2();
});

</script>
@stop

@extends('layouts.app')

@section('content')

<form method="POST" action="{{ route('jabatan.store') }}" enctype="multipart/form-data">
    {{ csrf_field() }}
<div class="row">
            <div class="col-md-12 d-flex align-items-stretch grid-margin">
              <div class="row flex-grow">
                <div class="col-12">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Tambah Jabatan</h4>
                      
                        <div class="form-group{{ $errors->has('nama_jabatan') ? ' has-error' : '' }}">
                            <label for="nama_jabatan" class="col-md-4 control-label">Nama Jabatan Fungsional</label>
                            <div class="col-md-6">
                                <input id="nama_jabatan" type="text" class="form-control" name="nama_jabatan" value="{{ old('nama_jabatan') }}" required  >
                                @if ($errors->has('nama_jabatan'))
                                    <span class="help-block">
                                        Nama tidak boleh kosong
                                    </span>
                                @endif
                            </div>
                        </div>                  

                        <button type="submit" class="btn btn-primary" id="submit">
                                    Submit
                        </button>
                        <button type="reset" class="btn btn-danger">
                                    Reset
                        </button>
                        <a href="{{route('jabatan.index')}}" class="btn btn-light pull-right">Back</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>

</div>
</form>
@endsection