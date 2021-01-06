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
    Master Data / Jabatan Struktural
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
                <a href="{{ route('struktural.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Data</a> <br/> <br/>
                  <!-- <a href="{{url('format_buku')}}" class="btn btn-xs btn-info pull-right">Format Buku</a> -->
                  <div class="table-responsive">
                    <table class="table table-bordered table-hover " id="table">
                        <thead>
                            <tr>
                            <th style="width : 5px">Id</th>
                                <th>Nama</th>
                                @if(Auth::user()->level == 1)
                                <th style="width : 5px">Opsi</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($datas as $data)
                            <tr>
                            <td>{{$data->id}}</td>
                            <td>{{$data->nama}}</a></td>
                            @if(Auth::user()->level == 1)
                              <td>
                                  <a href="{{route('struktural.edit', $data->id)}}" class="btn btn-success fa fa-edit" title="ubah"></a>
                                                                    
                                  <a href="/jabatan/hapus/{{ $data->id }}" class="btn btn-danger fa fa-trash" title="hapus" onclick="return confirm('Anda yakin ingin menghapus data ini?')"></a>
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