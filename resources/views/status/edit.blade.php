@section('js')

<script type="text/javascript">

$(document).ready(function() {
    $(".users").select2();
});

</script>
@stop

@extends('layouts.app')

@section('content')

<form action="{{ route('status.update', $data->id) }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('put') }}
<div class="row">
            <div class="col-md-12 d-flex align-items-stretch grid-margin">
              <div class="row flex-grow">
                <div class="col-12">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Edit Status </b> </h4>
                      <form class="forms-sample">
                        <div class="form-group{{ $errors->has('nama_status') ? ' has-error' : '' }}">
                            <label for="nama_status" class="col-md-4 control-label">Nama Status</label>
                            <div class="col-md-6">
                                <input id="nama_status" type="text" class="form-control" name="nama_status" value="{{ $data->nama_status }}" required  >
                                @if ($errors->has('nama_status'))
                                    <span class="help-block">
                                    Nama tidak boleh kosong
                                    </span>
                                @endif
                            </div>
                        </div>    
                        <button type="submit" class="btn btn-primary" id="submit">
                                    Update
                        </button>
                        <a href="{{route('status.index')}}" class="btn btn-light pull-right">Back</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>

</div>
</form>
@endsection