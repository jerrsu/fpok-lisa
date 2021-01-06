@section('js')
<script type="text/javascript">
  $(document).ready(function() {
    $('#table').DataTable({
      "iDisplayLength": 10
    });

} );
</script>
@stop
@extends('layouts.app')

@section('content')
<div class="row">

  <div class="col-lg-4">
    
  Data User Management
  </div>
    <div class="col-lg-12">
                  @if (Session::has('message'))
                  <div class="alert alert-{{ Session::get('message_type') }}" id="waktu2" style="margin-top:10px;">{{ Session::get('message') }}</div>
                  @endif
                  </div>
</div>
<div class="row" style="margin-top: 20px;">
<div class="col-lg-12 grid-margin stretch-card">
              <div class="card">

                <div class="card-body">
                  <a href="{{ route('user.create') }}" class="btn btn-outline-primary"><i class="fa fa-plus"></i>Tambah Data</a> 
                  @if(Auth::user()->level == 4)  
                  <a href="{{route('printdataPegawai.create')}}" class="btn btn-light pull-right">Upload</a>
                  @endif
                  <br/> <br/>
                  
                  <div class="table-responsive">
                    <table id="table" class="table table-bordered table-hover table-striped">
                      <thead>
                        <tr>
                          <th>Name</th>
                          <th>Username / NIP</th>
                          <th>Level</th>
                          @if(Auth::user()->level == 1 or Auth::user()->level == 4)
                          <th style="width : 5px">Opsi</th>
                          @endif
                        </tr>
                      </thead>
                      <tbody>
                      @foreach($datas as $data)
                        <tr>
                          <td>{{$data->name}}</td>
                          <td>{{$data->username}}</td>
                          <td>{{$data->level}}</td>
                          @if(Auth::user()->level == 1 or Auth::user()->level == 4)
                          <td>
                          <a href="{{route('user.edit', $data->id)}}" class="btn btn-success fa fa-edit" title="ubah"></a>
                          <a href="/user/hapus/{{ $data->id }}" class="btn btn-danger fa fa-trash" title="hapus" onclick="return confirm('Anda yakin ingin menghapus data ini?')"></a>
                          </td>
                          @endif
                        </tr>
                      @endforeach
                      </tbody>
                    </table>
                  </div>
                  {{-- {!! $datas->links() !!} --}}
                </div>
              </div>
            </div>
          </div>
@endsection