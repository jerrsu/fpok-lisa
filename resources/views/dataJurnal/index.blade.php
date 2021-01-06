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
    Data Jurnal Publikasi
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
                <a href="{{ route('datajurnal.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i>Tambah Data</a> <br/> <br/>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover " id="table">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Nama Jurnal</th>
                                <th>Judul Artikel</th>
                                <th>Tahun Jurnal</th>
                                <th>File Jurnal</th>
                                <th>Link Jurnal</th>
                                <th >Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($datas as $data)
                            <tr>
                            <td>{{$data->nama}}</td>
                            <td>{{$data->namajurnal}}</td>
                            <td>{{$data->judul}}</td>
                            <td>{{$data->tahun}}</td>
                            <td><a href="{{ url('data_jurnal'.'/'.$data->filejurnal) }}" target="_blank">{{$data->filejurnal}}</td>
                            <td>{{$data->link}}</td>
                            <td>
                                  <a href="{{route('datajurnal.edit', $data->id)}}" class="btn btn-success fa fa-edit" title="ubah"></a>
                                                                    
                                  <a href="/datajurnal/hapus/{{ $data->id }}" class="btn btn-danger fa fa-trash" title="hapus" onclick="return confirm('Anda yakin ingin menghapus data ini?')"></a>
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