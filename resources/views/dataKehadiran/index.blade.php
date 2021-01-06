@section('js')
<script type="text/javascript">
  $(document).ready(function() {
    $('#table').DataTable({
      iDisplayLength: 10,
      dom:'Bfrtip',
      button:[
        'excel','pdf'
      ]
      
    });

} );
</script>
@stop
@extends('layouts.app')

@section('content')
<div class="row">

  <div class="col-lg-4">
    Data Kehadiran
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
                <a href="{{ route('kehadiran.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Data</a> 
                <a href="{{ url('file_kehadiran/Upload Data Kehadiran.xlsx') }}" class="btn btn-warning pull-right">Download Template</a>
                <br/> <br/>
                  <div class="table-responsive">
                    <table class="table table-bordered table-hover " id="table">
                        <thead>
                            <tr>
                                <th>NIP</th>
                                <th>Nama Pegawai</th>
                                <th>Hari Kerja</th>
                                <th>Hari Masuk</th>
                                <th>Presentase</th>
                                <th>Bulan, Tahun</th>                                 
                                <th style="width : 5px">Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($datas as $data)
                            <tr>
                            <td>{{$data->nip}}</td>
                            <td>{{$data->namapegawai}}</td>
                            <td>{{$data->harikerja}}</td>
                            <td>{{$data->harimasuk}}</td>
                            <td>{{$data->presentase}}</td>
                            <td>{{$data->bulan}}, {{$data->tahun}}</td>                           
                            <td>
                                  <a href="{{route('kehadiran.edit', $data->id)}}" class="btn btn-success fa fa-edit" title="ubah"></a>
                                                                    
                                  <a href="/kehadiran/hapus/{{ $data->id }}" class="btn btn-danger fa fa-trash" title="hapus" onclick="return confirm('Anda yakin ingin menghapus data ini?')"></a>
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