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
    Data Peraturan Pegawai
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
                @if(Auth::user()->level == 1 or Auth::user()->level == 2)
                <a href="{{ route('dataperaturan.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Data</a> <br/> <br/>
                @endif
                  <div class="table-responsive">
                    <table class="table table-bordered table-hover " id="table">
                        <thead>
                            <tr>
                                <th>No Peraturan</th>
                                <th>Tentang</th>
                                <th>Tahun</th>
                                <th>File Peraturan</th>
                                @if(Auth::user()->level == 1 or Auth::user()->level == 2)  
                                <th style="width : 5px">Opsi</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($datas as $data)
                            <tr>
                            <td>{{$data->no}}</td>
                            <td>{{$data->tentang}}</td>
                            <td>{{$data->tahun}}</td>
                            <td><a href="{{ url('data_peraturan'.'/'.$data->filesk) }}" target="_blank">{{$data->filesk}}</td>
                            @if(Auth::user()->level == 1 or Auth::user()->level == 2)  
                            <td>
                                  <a href="{{route('dataperaturan.edit', $data->id)}}" class="btn btn-success fa fa-edit" title="ubah"></a>
                                                                    
                                  <a href="/dataperaturan/hapus/{{ $data->id }}" class="btn btn-danger fa fa-trash" title="hapus" onclick="return confirm('Anda yakin ingin menghapus data ini?')"></a>
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