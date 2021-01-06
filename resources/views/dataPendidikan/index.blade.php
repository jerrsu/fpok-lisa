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
    Data Pendidikan
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
                <a href="{{ route('datapendidikan.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i>Tambah Data</a> 
                <code class="pull-right">*Untuk mengisi pendidikan, dimulai dari yang terendah</code><br/> <br/>
                  <div class="table-responsive">
                    <table class="table table-bordered table-hover " id="table">
                        <thead>
                            <tr>
                                <th>Nama Pegawai</th>
                                <th>Tingkat</th>
                                <th>Perguruan Tinggi/ Sekolah</th>
                                <th>Program Study</th>
                                <th>No Ijazah</th>
                                <th>Tahun Lulus</th>
                                <th>File Ijazah</th>
                                <th style="width : 5px">Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($datas as $data)
                            <tr>
                            <td>{{$data->nama}}</td>
                            <td>{{$data->tingkat}}</td>
                            <td>{{$data->sekolah}}</td>
                            <td>{{$data->program}}</td>
                            <td>{{$data->noijazah}}</td>
                            <td>{{$data->tahun}}</td>
                            <td><a href="{{ url('data_ijazah'.'/'.$data->fileijazah) }}" target="_blank">{{$data->fileijazah}}</td>
                            <td>
                                  <a href="{{route('datapendidikan.edit', $data->id)}}" class="btn btn-success fa fa-edit" title="ubah"></a>
                                  
                                  <a href="/datapendidikan/hapus/{{ $data->id }}" class="btn btn-danger fa fa-trash" title="hapus" onclick="return confirm('Anda yakin ingin menghapus data ini?')"></a>
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