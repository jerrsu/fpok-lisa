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
    Master Data / User
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
                <a href="{{ route('role.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i>Tambah Data</a> <br/> <br/>
                  <div class="table-responsive">
                    <table class="table table-bordered table-hover " id="table">
                        <thead>
                            <tr>
                            <th style="width : 5px">Id</th>
                                <th>Nama User Role</th>
                                @if(Auth::user()->level == 1)
                                <th style="width : 5px">Opsi</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($datas as $data)
                            <tr>
                            <td>{{$data->id}}</td>
                            <td>{{$data->nama_role}}</a></td>
                            @if(Auth::user()->level == 1)
                              <td>
                                  <a href="{{route('role.edit', $data->id)}}" class="btn btn-success fa fa-edit" title="ubah"></a>
                                                                    
                                  <a href="/role/hapus/{{ $data->id }}" class="btn btn-danger fa fa-trash" title="hapus" onclick="return confirm('Anda yakin ingin menghapus data ini?')"></a>
                                  
                              </td>
                              @endif
                            </tr>
                            @endforeach
                        </tbody>
                    </table>                     
                  </div>
               {{--  {!! $datas->links() !!} --}}
                </div>
            </div>
          </div>
</div>
@endsection