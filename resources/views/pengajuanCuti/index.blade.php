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
    Data Pengajuan Cuti
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
                <a href="{{ route('pengajuancuti.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i>Tambah Data</a> <br/> <br/>
                  
                  <div class="table-responsive">
                    <table class="table table-bordered table-hover " id="table">
                        <thead>
                            <tr>
                                <th>Nama Pegawai</th>
                                <th>Jenis Cuti</th>
                                <th>Mulai Cuti</th>
                                <th>Selesai Cuti</th>
                                <th>Unit Kerja</th>
                                <th>Surat Cuti</th>
                                <th style="width : 5px">Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($datas as $data)
                            <tr>
                            <td>{{$data->nama}}</td>
                            <td>{{$data->jenis_cuti}}</td>
                            <td>{{date('d-M-Y', strtotime($data->start_date))}}</td>
                            <td>{{date('d-M-Y', strtotime($data->end_date))}}</td>
                            <td>{{$data->nama_unit}}</td>
                            <td><center>
                            <a href="{{route('pengajuancuti.show',$data->id)}}" target="_blank"class="btn btn-info fa fa-print" title="cetak"></a>
                            </center>
                            </td>
                            <td> 
                                  <a href="{{route('pengajuancuti.edit', $data->id)}}" class="btn btn-success fa fa-edit" title="ubah"></a>                                                                  
                                  <a href="/pengajuancuti/hapus/{{ $data->id }}" class="btn btn-danger fa fa-trash" title="hapus" onclick="return confirm('Anda yakin ingin menghapus data ini?')"></a>
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