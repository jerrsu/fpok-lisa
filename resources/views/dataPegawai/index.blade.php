@section('js')
<script type="text/javascript">
  $(document).ready(function() {
    $('#table').DataTable({
      "iDisplayLength": 10,
      "order":[[0,"asc"]]
    });

} );
</script>
@stop
@extends('layouts.app')

@section('content')
<div class="row">

  <div class="col-lg-4">
    Data Pegawai
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
                @if(Auth::user()->level == 1) 
                <a href="{{ route('dataPegawai.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Data</a> <br/> <br/>
                @endif <!-- <a href="{{url('format_buku')}}" class="btn btn-xs btn-info pull-right">Format Buku</a> -->
                  <div class="table-responsive">
                    <table class="table table-bordered table-hover " id="table">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>NIP</th>
                                
                                <th>Unit Kerja</th>
                                <th>Status</th>
                                <th style="width : 5px">Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($datas as $data)
                            <tr>
                            <td><a href="{{route('dataPegawai.show', $data->id)}}">{{$data->depan}} {{$data->nama}} {{$data->belakang}}</td>
                            <td>{{$data->nip}}</a></td>                            
                            <td>{{$data->nama_unit}}</td>
                            <td>{{$data->nama_status}}</td>
                            <td>
                                  <a href="{{route('dataPegawai.edit', $data->id)}}" class="btn btn-success fa fa-edit" title="ubah"></a>      
                                  @if(Auth::user()->level == 1)                         
                                  <a href="/dataPegawai/hapus/{{ $data->id }}" class="btn btn-danger fa fa-trash" title="hapus" onclick="return confirm('Anda yakin ingin menghapus data ini?')"></a>
                                  @endif
                              </td>
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