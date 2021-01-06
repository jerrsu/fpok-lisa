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
    Data Arsip KGB
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
                <a href="{{ route('arsipkgb.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i>Tambah Data</a> <br/> <br/>
                  <div class="table-responsive">
                    <table class="table table-bordered table-hover " id="table">
                        <thead>
                            <tr>
                                <th>Nama Pegawai</th>
                                <th>Nomor dan Tanggal KGB</th>
                                <th>Gaji Pokok Baru</th>
                                <th>Masa Kerja</th>
                                <th>Dalam Golongan</th>
                                <th>TMT KGB</th>
                                <th>File KGB</th>
                                <th style="width : 5px">Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($datas as $data)
                            <tr>
                            <td>{{$data->nama}}</td>
                            <td>{{$data->no}} - {{date('d-M-Y', strtotime($data->tgl))}}</td>
                            <td>{{$data->gaji}}</td>
                            <td>{{$data->masa}}</td>
                            <td>{{$data->pangkat}}</td>
                            <td>{{$data->tmt}}</td>
                            <td><a href="{{ url('data_arsipkgb'.'/'.$data->filesk) }}" target="_blank">{{$data->filesk}}</td>
                            <td>
                                  <a href="{{route('arsipkgb.edit', $data->id)}}" class="btn btn-success fa fa-edit" title="ubah"></a>                                                                   
                                  
                                  <a href="/arsipkgb/hapus/{{ $data->id }}" class="btn btn-danger fa fa-trash" title="hapus" onclick="return confirm('Anda yakin ingin menghapus data ini?')"></a>
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