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
    Data Penugasan
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
                <a href="{{ route('datapenugasan.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Data</a> <br/> <br/>
                  <div class="table-responsive">
                    <table class="table table-bordered table-hover " id="table">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Tujuan Tugas</th>
                                <th>No Surat & Tanggal</th>
                                <th>Lama Penugasan</th>
                                <th>File Tugas</th>
                                <th style="width : 5px">Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($datas as $data)
                            <tr>
                            <td>{{$data->nama}}</td>
                            <td>{{$data->tujuan}}</td>
                            <td>{{$data->nosurat}} - {{date('d-M-Y', strtotime($data->tgl))}} </td>
                            <td>{{$data->lama}}</td>
                            <td><a href="{{ url('data_penugasan'.'/'.$data->filesk) }}" target="_blank">{{$data->filesk}}</td>
                            <td>
                                  <a href="{{route('datapenugasan.edit', $data->id)}}" class="btn btn-success fa fa-edit" title="ubah"></a>
                                                                    
                                  <a href="/datapenugasan/hapus/{{ $data->id }}" class="btn btn-danger fa fa-trash" title="hapus" onclick="return confirm('Anda yakin ingin menghapus data ini?')"></a>
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