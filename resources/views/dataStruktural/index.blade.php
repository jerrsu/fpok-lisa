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
    Data Jabatan Struktural
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
                <a href="{{ route('datastruktural.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i>Tambah Data</a> <br/> <br/>
                  <div class="table-responsive">
                    <table class="table table-bordered table-hover " id="table">
                        <thead>
                            <tr>
                                <th>Nama Pegawai</th>
                                <th>Jabatan Struktural</th>
                                <th>Nomor SK, Tanggal</th>
                                <th>TMT Awal - Alhir</th>
                                <th>File SK</th>
                                <th style="width : 5px">Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($datas as $data)
                            <tr>
                            <td>{{$data->nama}}</td>
                            <td>{{$data->struktural}}</td>
                            <td>{{$data->sk}} - {{date('d-M-Y', strtotime($data->tgl))}}</td>
                            <td>{{date('d-M-Y', strtotime($data->tmt))}} - {{date('d-M-Y', strtotime($data->tmt2))}}</td>
                            <td><a href="{{ url('data_sk'.'/'.$data->filesk) }}" target="_blank">{{$data->filesk}}</td>
                            <td>
                                  <a href="{{route('datastruktural.edit', $data->id)}}" class="btn btn-success fa fa-edit" title="ubah"></a>                                                                   
                                  
                                  <a href="/datastruktural/hapus/{{ $data->id }}" class="btn btn-danger fa fa-trash" title="hapus" onclick="return confirm('Anda yakin ingin menghapus data ini?')"></a>
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