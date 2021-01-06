@section('js')
 <script type="text/javascript">
            $(document).on('click', '.pilihPegawai', function (e) {
                document.getElementById("nama").value = $(this).attr('nama');
                document.getElementById("nip").value = $(this).attr('nip');
                document.getElementById("idpegawai").value = $(this).attr('idpegawai');
                $('#myModal').modal('hide');
            });  

            $(document).on('click', '.pilihUnit', function (e) {
                document.getElementById("nama_unit").value = $(this).attr('nama_unit');
                document.getElementById("id_unit_kerja").value = $(this).attr('id_unit_kerja');
                $('#myModal2').modal('hide');
            });

            $(document).on('click', '.pilihJabatan', function (e) {
                document.getElementById("idjabatan").value = $(this).attr('idjabatan');
                document.getElementById("namajabatan").value = $(this).attr('namajabatan');
                $('#myModal3').modal('hide');
            });

            $(document).on('click', '.pilihAtasan', function (e) {
                document.getElementById("idatasan").value = $(this).attr('idatasan');
                document.getElementById("namaatasan").value = $(this).attr('namaatasan');
                $('#myModal4').modal('hide');
            });

            $(document).on('click', '.pilihPejabat', function (e) {
                document.getElementById("idpejabat").value = $(this).attr('idpejabat');
                document.getElementById("namapejabat").value = $(this).attr('namapejabat');
                $('#myModal5').modal('hide');
            });
          
             $(function () {
                $("#lookup, #lookup2, #lookup3,#lookup4,#lookup5").dataTable();
            });

        </script>

@stop
@section('css')

@stop
@extends('layouts.app')

@section('content')

<form method="POST" action="{{ route('pengajuancuti.store') }}" enctype="multipart/form-data">
    {{ csrf_field() }}
<div class="row">
            <div class="col-md-12 d-flex align-items-stretch grid-margin">
              <div class="row flex-grow">
                <div class="col-12">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Tambah Data Pengajuan Cuti</h4>

                        <div class="form-group{{ $errors->has('idpegawai') ? ' has-error' : '' }}">
                            <label for="idpegawai" class="col-md-4 control-label">Nama Pegawai <code>*</code></label>
                            <div class="col-md-6">
                                <div class="input-group">
                                <input id="nama" type="text" class="form-control" readonly=""    required>
                                <input id="idpegawai" type="hidden" name="idpegawai" value="{{ old('idpegawai') }}" required readonly="">
                                <span class="input-group-btn">
                                    <button type="button" class="btn btn-info btn-secondary" data-toggle="modal" data-target="#myModal"><b>Cari</b> <span class="fa fa-search"></span></button>
                                </span>
                                </div>
                                @if ($errors->has('idpegawai'))
                                    <span class="help-block">
                                        Data nama Pegawai tidak boleh kosong
                                    </span>
                                @endif                                 
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="gelar_depan" class="col-md-4 control-label">Nip</label>
                            <div class="col-md-6">
                            <input id="nip" type="text" class="form-control" name="nip"    required readonly="">
                            </div>
                        </div>                         
                        <div class="form-group">
                            <label for="id_unit_kerja" class="col-md-4 control-label">Unit Kerja <code>*</code></label>
                            <div class="col-md-6">
                                <div class="input-group">
                                <input id="nama_unit" type="text" class="form-control" readonly="" required  >
                                <input id="id_unit_kerja" type="hidden" name="id_unit_kerja"  readonly="">
                                <span class="input-group-btn">
                                    <button type="button" class="btn btn-info btn-secondary" data-toggle="modal" data-target="#myModal2"><b>Cari</b> <span class="fa fa-search"></span></button>
                                </span>
                                </div>
                                @if ($errors->has('idunit'))
                                    <span class="help-block">
                                        Data Unit tidak boleh kosong
                                    </span>
                                @endif                                 
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('idjabatan') ? ' has-error' : '' }}">
                            <label for="idjabatan" class="col-md-4 control-label">Nama Jabatan <code>*</code></label>
                            <div class="col-md-6">
                                <div class="input-group">
                                <input id="namajabatan" type="text" class="form-control" readonly=""    required>
                                <input id="idjabatan" type="hidden" name="idjabatan" value="{{ old('idjabatan') }}" required readonly="">
                                <span class="input-group-btn">
                                    <button type="button" class="btn btn-info btn-secondary" data-toggle="modal" data-target="#myModal3"><b>Cari</b> <span class="fa fa-search"></span></button>
                                </span>
                                </div>
                                @if ($errors->has('idjabatan'))
                                    <span class="help-block">
                                        Data Jabatan tidak boleh kosong
                                    </span>
                                @endif                                 
                            </div>
                        </div>  
                        <div class="form-group">
                            <label for="masakerja" class="col-md-4 control-label">Masa Kerja</label>
                            <div class="col-md-6">
                                <input id="masakerja" type="text" class="form-control" name="masakerja"   >
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="jenis_cuti" class="col-md-4 control-label">Jenis Cuti Yang Diambil </label>
                            <div class="col-md-4">
                            <select class="form-control" name="jenis_cuti"   >
                                <option value="-"></option>
                                <option value="Cuti Tahunan">Cuti Tahunan</option>
                                <option value="Cuti Besar">Cuti Besar</option>
                                <option value="Cuti Sakit">Cuti Sakit</option>
                                <option value="Cuti Melahirkan">Cuti Melahirkan</option>
                                <option value="Cuti Karena Alasan Penting">Cuti Karena Alasan Penting</option>
                                <option value="Cuti di Luar Tanggungan Negara">Cuti di Luar Tanggungan Negara</option>
                            </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="alasan_cuti" class="col-md-4 control-label">Alasan Cuti</label>
                            <div class="col-md-8">
                                <input id="alasan_cuti" type="text" class="form-control" name="alasan_cuti"   >
                            </div>
                        </div> 
                        <div class="form-group">
                            <label for="lama_cuti" class="col-md-4 control-label">Lamanya Cuti</label>
                            <div class="col-md-6">
                                <input id="lama_cuti" type="text" class="form-control" name="lama_cuti" placeholder="contoh: 1 hari"   >
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="start_date" class="col-md-4 control-label">Tanggal Awal Cuti</label>
                            <div class="col-md-3">
                                <input id="start_date" type="date" class="form-control" name="start_date" value="{{ date('Y-m-d', strtotime(Carbon\Carbon::today()->toDateString())) }}"   >
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="end_date" class="col-md-4 control-label">Tanggal Akhir Cuti</label>
                            <div class="col-md-3">
                                <input id="end_date" type="date" class="form-control" name="end_date" value="{{ date('Y-m-d', strtotime(Carbon\Carbon::today()->toDateString())) }}"   >
                            </div>
                        </div>                        
                        <div class="form-group">
                            <label for="catatan_cuti" class="col-md-4 control-label">Catatan Cuti</label>
                            <div class="col-md-8">
                                <input id="catatan_cuti" type="text" class="form-control" name="catatan_cuti"  >
                            </div>
                        </div>
                        <label for="catatan_cuti" class="col-md-4 control-label">Diisi saat memilih cuti tahunan</label>
                        <div class="col-md-1 control-label">
                        <table >
                            <thead style="border: 0.5px solid black">
                                <tr>
                                    <td style="border: 0.5px solid black"><center>Tahun</center></td>
                                    <td style="border: 0.5px solid black"><center>Sisa</center></td>
                                    <td style="border: 0.5px solid black"><center>Keterangan</center></td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="border: 0.5px solid black">N-2</td>
                                    <td style="border: 0.5px solid black"><input id="n2_sisa" name="n2_sisa" type="text"  size="2"></td>
                                    <td style="border: 0.5px solid black"><input id="n2_ket" name="n2_ket" type="text"size="40"></td>
                                </tr>
                                <tr>
                                    <td style="border: 0.5px solid black">N-1</td>
                                    <td style="border: 0.5px solid black"><input id="n1_sisa" name="n1_sisa" type="text" size="2"></td>
                                    <td style="border: 0.5px solid black"><input id="n1_ket" name="n1_ket" type="text" size="40"></td>
                                </tr>
                                <tr>
                                    <td style="border: 0.5px solid black">N</td>
                                    <td style="border: 0.5px solid black"><input id="n_sisa" name="n_sisa" type="text" size="2"></td>
                                    <td style="border: 0.5px solid black"><input id="n_ket" name="n_ket" type="text" size="40"></td>
                                </tr>
                            </tbody>
                        </table>  
                        </div>
                        <br> 
                        <div class="form-group">
                            <label for="alamat" class="col-md-4 control-label">Alamat Selama Menjalankan Cuti</label>
                            <div class="col-md-8">
                                <input id="alamat" type="text" class="form-control" name="alamat"   >
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="tlp" class="col-md-4 control-label">No Telp + HP</label>
                            <div class="col-md-3">
                                <input id="tlp" type="text" class="form-control" name="tlp"   >
                            </div>
                        </div>
                        <label> ________________________________________________________________________________________________________________________________________________ </label>
                        <div class="form-group">
                            <label for="idatasan" class="col-md-4 control-label">Nama Atasan <code>*</code></label>
                            <div class="col-md-6">
                                <div class="input-group">
                                <input id="namaatasan" type="text" class="form-control" readonly=""    required>
                                <input id="idatasan" type="hidden" name="idatasan" required readonly="">
                                <span class="input-group-btn">
                                    <button type="button" class="btn btn-info btn-secondary" data-toggle="modal" data-target="#myModal4"><b>Cari</b> <span class="fa fa-search"></span></button>
                                </span>
                                </div>                                
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="pertimbangan" class="col-md-4 control-label">Pertimbangan Atasan Langsung</label>
                            <div class="col-md-4">   
                            <select class="form-control" name="pertimbangan"   >
                                <option value="-"></option>
                                <option value="Disetujui">Disetujui</option>
                                <option value="Perubahan">Perubahan</option>
                                <option value="Ditangguhkan">Ditangguhkan</option>
                                <option value="Tidak Disetujui">Tidak Disetujui</option>
                            </select>
                            </div>
                        </div> 
                        <div class="form-group">
                            <label for="alasan_pertimbangan" class="col-md-4 control-label">Alasan Pertimbangan</label>
                            <div class="col-md-8">
                                <input id="alasan_pertimbangan" type="text" class="form-control" name="alasan_pertimbangan"   >
                            </div>
                        </div> 
                        <div class="form-group">
                            <label for="idpejabat" class="col-md-4 control-label">Nama Pejabat <code>*</code></label>
                            <div class="col-md-6">
                                <div class="input-group">
                                <input id="namapejabat" type="text" class="form-control" readonly=""    required>
                                <input id="idpejabat" type="hidden" name="idpejabat" required readonly="">
                                <span class="input-group-btn">
                                    <button type="button" class="btn btn-info btn-secondary" data-toggle="modal" data-target="#myModal5"><b>Cari</b> <span class="fa fa-search"></span></button>
                                </span>
                                </div>                                
                            </div>
                        </div>
                        <div class="form-group">                                    
                            <label for="keputusan" class="col-md-6 control-label">Keputusan Pejabat yang Berwenang Memberikan Cuti</label>
                            <div class="col-md-4">   
                            <select class="form-control" name="keputusan"   >
                                <option value="-"></option>
                                <option value="Disetujui">Disetujui</option>
                                <option value="Perubahan">Perubahan</option>
                                <option value="Ditangguhkan">Ditangguhkan</option>
                                <option value="Tidak Disetujui">Tidak Disetujui</option>
                            </select>
                            </div>
                        </div> 
                        <div class="form-group">
                            <label for="alasan_keputusan" class="col-md-4 control-label">Alasan Keputusan</label>
                            <div class="col-md-8">
                                <input id="alasan_keputusan" type="text" class="form-control" name="alasan_keputusan"   >
                            </div>
                        </div> 
                        <!--  -->                  

                        <button type="submit" class="btn btn-primary" id="submit">
                                    Submit
                        </button>
                        <button type="reset" class="btn btn-danger">
                                    Reset
                        </button>
                        <a href="{{route('pengajuancuti.index')}}" class="btn btn-light pull-right">Back</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>

</div>
</form>

<div class="modal fade bd-example-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" >
    <div class="modal-dialog modal-lg" role="document" >
        <div class="modal-content" style="background: #fff;">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cari Pegawai</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table id="lookup" class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                        <th>Id</th>
                            <th>Nip</th>
                            <th>Nama Pegawai</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($datapegawai as $data)
                        <tr class="pilihPegawai" nip="<?php echo $data->nip; ?>" 
                        nama="<?php echo $data->nama; ?>" idpegawai="<?php echo $data->id; ?>" 
                        ttl="<?php echo $data->ttl; ?>" tanggallahir="<?php echo $data->tanggallahir; ?>">
                        <td>{{$data->id}}</td>
                        <td>{{$data->nip}}</td>
                        <td>{{$data->nama}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>  
            </div>
        </div>
    </div>
</div>

<div class="modal fade bd-example-modal-lg" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" >
    <div class="modal-dialog modal-lg" role="document" >
        <div class="modal-content" style="background: #fff;">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cari Unit Kerja</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table id="lookup2" class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama Unit</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($dataunit as $data)
                        <tr class="pilihUnit" id_unit_kerja="<?php echo $data->id; ?>" nama_unit="<?php echo $data->nama_unit; ?>" >
                        <td>{{$data->id}}</td>
                            <td>{{$data->nama_unit}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>  
            </div>
        </div>
    </div>
</div>

<div class="modal fade bd-example-modal-lg" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" >
    <div class="modal-dialog modal-lg" role="document" >
        <div class="modal-content" style="background: #fff;">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cari Jabatan FUngsional</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table id="lookup3" class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                        <th>Id</th>
                            <th>Nama Jabatan Fungsional</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($datajabatan as $data)
                        <tr class="pilihJabatan" idjabatan="<?php echo $data->id; ?>" namajabatan="<?php echo $data->nama_jabatan; ?>"  >
                        <td>{{$data->id}}</td>
                        <td>{{$data->nama_jabatan}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>  
            </div>
        </div>
    </div>
</div>
<div class="modal fade bd-example-modal-lg" id="myModal4" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" >
    <div class="modal-dialog modal-lg" role="document" >
        <div class="modal-content" style="background: #fff;">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cari Atasan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table id="lookup4" class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                        <th>Id</th>
                            <th>Nip</th>
                            <th>Nama Pegawai</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($datapegawai as $data)
                        <tr class="pilihAtasan" 
                        namaatasan="<?php echo $data->nama; ?>" idatasan="<?php echo $data->id; ?>" >
                        <td>{{$data->id}}</td>
                        <td>{{$data->nip}}</td>
                        <td>{{$data->nama}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>  
            </div>
        </div>
    </div>
</div>
<div class="modal fade bd-example-modal-lg" id="myModal5" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" >
    <div class="modal-dialog modal-lg" role="document" >
        <div class="modal-content" style="background: #fff;">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cari Pejabat</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table id="lookup5" class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                        <th>Id</th>
                            <th>Nip</th>
                            <th>Nama Pegawai</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($datapegawai as $data)
                        <tr class="pilihPejabat" 
                        namapejabat="<?php echo $data->nama; ?>" idpejabat="<?php echo $data->id; ?>" >
                        <td>{{$data->id}}</td>
                        <td>{{$data->nip}}</td>
                        <td>{{$data->nama}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>  
            </div>
        </div>
    </div>
</div>
@endsection