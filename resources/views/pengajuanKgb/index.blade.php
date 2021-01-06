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
    Data Pengajuan KGB
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
                <a href="{{ route('pengajuankgb.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i>Tambah Data</a> <br/> <br/>
                  <!-- <a href="{{url('format_buku')}}" class="btn btn-xs btn-info pull-right">Format Buku</a> -->
                  <div class="table-responsive">
                    <table class="table table-bordered table-hover " id="table" >
                        <thead>
                            <tr >
                                <th >Nama Pegawai</th>
                                <th >Nomor dan Tahun KGB</th>
                                <th >Gaji Pokok Baru</th>
                                <th >Masa Kerja</th>
                                <th >Dalam Golongan</th>
                                <th >TMT KGB</th>
                                <th >Hasil Kgb</th> 
                                <th style="width : 5px">Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($datas as $data)
                            <tr>
                            <td>{{$data->nama}}</td>
                            <td>{{$data->nomor}} Tgl {{date('d-M-Y', strtotime($data->tgl))}}</td>
                            <td>{{$data->gajibaru}}</td>
                            <td>{{date('d-M-Y', strtotime($data->masakerja))}}</td>
                            <td>{{$data->namapangkatbaru}}</td>
                            <td>{{date('d-M-Y', strtotime($data->mulaitgl))}}</td>
                            <td><center>
                            <a href="{{route('pengajuankgb.show', $data->id)}}" target="_blank"class="btn btn-info fa fa-print" title="cetak"></a> 
                            </center>  
                            </td>
                            <td> 
                                  <a href="{{route('pengajuankgb.edit', $data->id)}}" class="btn btn-success fa fa-edit" title="ubah"></a>                                                                 
                                  <a href="/pengajuankgb/hapus/{{ $data->id }}" class="btn btn-danger fa fa-trash" title="hapus" onclick="return confirm('Anda yakin ingin menghapus data ini?')"></a>
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