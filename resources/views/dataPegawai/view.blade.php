@section('js')
<script type="text/javascript">
  $(document).ready(function() {
    $('#tableortu,#tablependidikan,#tablefungsional,#tablestruktural,#tablepangkat,#tabledok,#tablejurnal,#tablekepakaran,#tablepenelitian,#tableanak,#tablepasangan,#tablestudi,#tableperaturan,#tablepenugasan,#tablepenghargaan,#tablepengabdian,#tablepelatihan')
    .DataTable({
      "iDisplayLength": 10
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
                <a href="{{route('printdataPegawai.show', $detailpegawai->id)}}" target="_blank" class="btn btn-info fa fa-print" title="cetak"></a> 
                <a href="{{route('dataPegawai.index')}}" class="btn btn-light pull-right">Back</a><br/> <br/>               
                  
                    <ul class="nav nav-tabs">
                      <li class="btn btn-outline-warning"><a data-toggle="tab" href="#profile">Profile </a></li>
                      <li class="btn btn-outline-warning"><a data-toggle="tab" href="#menukeluarga">Keluarga</a></li>
                      <li class="btn btn-outline-warning"><a data-toggle="tab" href="#pendidikan">Pendidikan</a></li>
                      <li class="btn btn-outline-warning"><a data-toggle="tab" href="#jabatan">Jabatan</a></li>
                      <li class="btn btn-outline-warning"><a data-toggle="tab" href="#pangkat">Pangkat/ Golongan</a></li>
                      <li class="btn btn-outline-warning"><a data-toggle="tab" href="#dok">Dokumen</a></li>
                      <li class="btn btn-outline-warning"><a data-toggle="tab" href="#lainnya">Lainnya</a></li>
                    </ul>
                    
                    <div class="tab-content">
                      <!-- profile -->
                      <div id="profile" class="tab-pane fade ">
                        <br>
                        <h4>Profile</h4><br>
                        <label style="width:200px">1. NIP/NIPT/NIPTT</label>: {{$detailpegawai->nip}}<br>
                        <label style="width:200px">2. Nama </label>: {{$detailpegawai->nama}}<br>
                        <label style="width:200px">3. Gelar Depan</label>: {{$detailpegawai->gelar_depan}}<br>
                        <label style="width:200px">4. Gelar Belakang </label>: {{$detailpegawai->gelar_belakang}}<br>
                        <label style="width:200px">5. NIK</label>: {{$detailpegawai->nik}}<br>
                        <label style="width:200px">6. NPWP </label>: {{$detailpegawai->npwp}}<br>
                        <label style="width:200px">7. NIDN</label>: {{$detailpegawai->nidn}}<br>
                        <label style="width:200px">8. Tempat Tanggal Lahir </label>: {{$detailpegawai->ttl}} / {{$detailpegawai->tanggallahir}}<br>
                        <label style="width:200px">9. Agama</label>: {{$detailpegawai->agama}}<br>
                        <label style="width:200px">10. Jenis Kelamin </label>: {{$detailpegawai->jk}}<br>
                        <label style="width:200px">11. Golongan Darah</label>: {{$detailpegawai->golongan_darah}}<br>
                        <label style="width:200px">12. Status Pernikahan </label>: {{$detailpegawai->status_nikah}}<br>
                        <label style="width:200px">13. Status Kepegawaian</label>: {{$detailpegawai->status_kepegawaian}}<br>
                        <label style="width:200px">14. Status Pegawai </label>: {{$detailpegawai->status_pegawai}}<br>
                        <label style="width:200px">15. Alamat</label>: {{$detailpegawai->alamat}}<br>
                        <label style="width:200px">16. No telpon </label>: {{$detailpegawai->tlp}}<br>
                        <label style="width:200px">17. Email</label>: {{$detailpegawai->email}}<br>
                        <label style="width:200px">18. Unit Kerja </label>: {{$detailpegawai->nama_unit}}<br>
                        <label style="width:200px">19. Perkiraan Pensiun</label>: {{$detailpegawai->pensiun}}<br>
                        <label style="width:200px">20. Status </label>: {{$detailpegawai->nama_status}}<br>
                      </div>

                      <!-- keluarga -->
                      <div id="menukeluarga" class="tab-pane fade">
                        <ul class="nav nav-tabs">
                          <li class="btn btn-outline-warning"><a data-toggle="tab" href="#pasangan">Suami /Istri </a></li>
                          <li class="btn btn-outline-warning"><a data-toggle="tab" href="#anak">Anak</a></li>
                          <li class="btn btn-outline-warning"><a data-toggle="tab" href="#tua">Orang tua</a></li>
                        </ul>

                        <div class="tab-content">
                          <div id="pasangan" class="tab-pane fade ">
                            <br><h4>Data Suami / Istri</h4><br><br>
                            <div class="table-responsive">
                              <table class="table table-bordered table-hover " id="tablepasangan">
                                  <thead>
                                      <tr>
                                          <th>Nama</th>
                                          <th>Hubungan</th>
                                          <th>Tempat Tanggal Lahir</th>
                                          <th>Pendidikan Terakhir</th>
                                          <th>Pekerjaan</th>                                
                                          <th >Opsi</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                  @foreach($pasangan as $pasangan)
                                      <tr>
                                      <td>{{$pasangan->keluarga}}</td>
                                      <td>{{$pasangan->hub}}</td>
                                      <td>{{$pasangan->tempat}} , {{date('d-M-Y', strtotime($pasangan->ttl))}}</td>
                                      <td>{{$pasangan->pendidikan}}</td>
                                      <td>{{$pasangan->pekerjaan}}</td>                            
                                      <td>
                                          <a href="{{route('pasangan.edit', $pasangan->id)}}" class="btn btn-success fa fa-edit" title="ubah"></a>
                                                                            
                                          <a href="/pasangan/hapus/{{ $pasangan->id }}" class="btn btn-danger fa fa-trash" title="hapus" onclick="return confirm('Anda yakin ingin menghapus data ini?')"></a>
                                      </td>
                                      </tr>
                                      @endforeach
                                  </tbody>
                              </table>                     
                            </div>
                          </div>

                          <div id="anak" class="tab-pane fade">
                            <br><h4>Data Anak</h4><br><br>
                            <div class="table-responsive">
                              <table class="table table-bordered table-hover " id="tableanak">
                                  <thead>
                                      <tr>
                                          <th>Nama</th>
                                          <th>Hubungan</th>
                                          <th>Tempat Tanggal Lahir</th>
                                          <th>Pendidikan Terakhir</th>
                                          <th>Pekerjaan</th>                                
                                          <th >Opsi</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                  @foreach($anak as $anak)
                                      <tr>
                                      <td>{{$anak->keluarga}}</td>
                                      <td>{{$anak->hub}}</td>
                                      <td>{{$anak->tempat}} , {{date('d-M-Y', strtotime($anak->ttl))}}</td>
                                      <td>{{$anak->pendidikan}}</td>
                                      <td>{{$anak->pekerjaan}}</td>                            
                                      <td>
                                          <a href="{{route('anak.edit', $anak->id)}}" class="btn btn-success fa fa-edit" title="ubah"></a>
                                                                            
                                          <a href="/anak/hapus/{{ $anak->id }}" class="btn btn-danger fa fa-trash" title="hapus" onclick="return confirm('Anda yakin ingin menghapus data ini?')"></a>
                                      </td>
                                      </tr>
                                      @endforeach
                                  </tbody>
                              </table>                     
                            </div>
                          </div>

                          <div id="tua" class="tab-pane fade">
                            <br><h4>Data Orang Tua</h4><br><br>
                            <div class="table-responsive">
                              <table class="table table-bordered table-hover " id="tableortu">
                                  <thead>
                                      <tr>
                                          <th>Nama</th>
                                          <th>Hubungan</th>
                                          <th>Tempat Tanggal Lahir</th>
                                          <th>Pendidikan Terakhir</th>
                                          <th>Pekerjaan</th>
                                          <th style="width : 5px">Opsi</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                  @foreach($ortu as $ortu)
                                      <tr>
                                      <td>{{$ortu->keluarga}}</td>
                                      <td>{{$ortu->hub}}</td>
                                      <td>{{$ortu->tempat}} , {{date('d-M-Y', strtotime($ortu->ttl))}}</td>
                                      <td>{{$ortu->pendidikan}}</td>
                                      <td>{{$ortu->pekerjaan}}</td>                            
                                      <td>
                                          <a href="{{route('keluarga.edit', $ortu->id)}}" class="btn btn-success fa fa-edit" title="ubah"></a>
                                                                            
                                          <a href="/keluarga/hapus/{{ $ortu->id }}" class="btn btn-danger fa fa-trash" title="hapus" onclick="return confirm('Anda yakin ingin menghapus data ini?')"></a>
                                      </td>
                                      </tr>
                                      @endforeach
                                  </tbody>
                              </table>                     
                            </div>
                          </div>                      
                        </div>
                      </div>

                      <!-- pendidikan -->
                      <div id="pendidikan" class="tab-pane fade">
                        <br><h4>pendidikan</h4><br>
                        <div class="table-responsive">
                          <table class="table table-bordered table-hover " id="tablependidikan">
                              <thead>
                                  <tr>
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
                              @foreach($pendidikan as $pendidikan)
                                  <tr>
                                  <td>{{$pendidikan->tingkat}}</td>
                                  <td>{{$pendidikan->sekolah}}</td>
                                  <td>{{$pendidikan->program}}</td>
                                  <td>{{$pendidikan->noijazah}}</td>
                                  <td>{{$pendidikan->tahun}}</td>
                                  <td><a href="{{ url('data_ijazah'.'/'.$pendidikan->fileijazah) }}" target="_blank">{{$pendidikan->fileijazah}}</td>
                                  <td>
                                        <a href="{{route('datapendidikan.edit', $pendidikan->id)}}" class="btn btn-success fa fa-edit" title="ubah"></a>
                                        
                                        <a href="/datapendidikan/hapus/{{ $pendidikan->id }}" class="btn btn-danger fa fa-trash" title="hapus" onclick="return confirm('Anda yakin ingin menghapus data ini?')"></a>
                                  </td>
                                  </tr>
                                  @endforeach
                              </tbody>
                          </table>                     
                        </div>
                      </div>

                      <!-- jabatan -->
                      <div id="jabatan" class="tab-pane fade">
                        <ul class="nav nav-tabs">
                          <li class="btn btn-outline-warning"><a data-toggle="tab" href="#fungsional">Fungsional</a></li>
                          <li class="btn btn-outline-warning"><a data-toggle="tab" href="#struktural">Struktural</a></li>
                        </ul>
                        <div class="tab-content">
                          <div id="fungsional" class="tab-pane fade ">
                            <br><h4>Jabatan Fungsional</h4><br>
                            <div class="table-responsive">
                              <table class="table table-bordered table-hover " id="tablefungsional">
                                  <thead>
                                      <tr>
                                          <th>Jabatan Fungsional</th>
                                          <th>Nomor SK</th>
                                          <th>TMT Jabatan</th>
                                          <th>File SK</th>
                                          <th >Opsi</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                  @foreach($fungsional as $fungsional)
                                      <tr>
                                      <td>{{$fungsional->fungsional}}</td>
                                      <td>{{$fungsional->sk}} - {{date('d-M-Y', strtotime($fungsional->tgl))}}</td>
                                      <td>{{date('d-M-Y', strtotime($fungsional->tmt))}}</td>
                                      <td><a href="{{ url('data_sk'.'/'.$fungsional->filesk) }}" target="_blank">{{$fungsional->filesk}}</td>
                                      <td>
                                            <a href="{{route('datafungsional.edit', $fungsional->id)}}" class="btn btn-success fa fa-edit" title="ubah"></a>                                                                   
                                            
                                            <a href="/datafungsional/hapus/{{ $fungsional->id }}" class="btn btn-danger fa fa-trash" title="hapus" onclick="return confirm('Anda yakin ingin menghapus data ini?')"></a>
                                      </td>
                                      </tr>
                                      @endforeach
                                  </tbody>
                              </table>                     
                            </div>
                          </div>
                          <div id="struktural" class="tab-pane fade">
                            <br><h4>Jabatan Struktural</h4><br>
                            <div class="table-responsive">
                              <table class="table table-bordered table-hover " id="tablestruktural">
                                  <thead>
                                      <tr>
                                          <th>Jabatan Struktural</th>
                                          <th>Nomor SK</th>
                                          <th>TMT Awal - Alhir</th>
                                          <th>File SK</th>
                                          <th style="width : 5px">Opsi</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                  @foreach($struktural as $struktural)
                                      <tr>
                                      <td>{{$struktural->struktural}}</td>
                                      <td>{{$struktural->sk}} - {{date('d-M-Y', strtotime($struktural->tgl))}}</td>
                                      <td>{{date('d-M-Y', strtotime($struktural->tmt))}} - {{date('d-M-Y', strtotime($struktural->tmt2))}}</td>
                                      <td><a href="{{ url('data_sk'.'/'.$struktural->filesk) }}" target="_blank">{{$struktural->filesk}}</td>
                                      <td>
                                            <a href="{{route('datastruktural.edit', $struktural->id)}}" class="btn btn-success fa fa-edit" title="ubah"></a>                                                                   
                                            
                                            <a href="/datastruktural/hapus/{{ $struktural->id }}" class="btn btn-danger fa fa-trash" title="hapus" onclick="return confirm('Anda yakin ingin menghapus data ini?')"></a>
                                      </td>
                                      </tr>
                                      @endforeach
                                  </tbody>
                              </table>                     
                            </div>
                          </div>                      
                        </div>
                      </div>

                      <!-- pangkat -->
                      <div id="pangkat" class="tab-pane fade">
                        <br><h4>Pangkat</h4><br>
                        <div class="table-responsive">
                          <table class="table table-bordered table-hover " id="tablepangkat">
                              <thead>
                                  <tr>
                                      <th>Pangkat / Golongan</th>
                                      <th>Nomor SK</th>
                                      <th>Pengesah</th>
                                      <th>TMT Pangkat</th>
                                      <th>File SK</th>
                                      <th style="width : 5px">Opsi</th>
                                  </tr>
                              </thead>
                              <tbody>
                              @foreach($pangkat as $pangkat)
                                  <tr>
                                  <td>{{$pangkat->pangkat}}</td>
                                  <td>{{$pangkat->sk}} - {{date('d-M-Y', strtotime($pangkat->tglsk))}}</td>
                                  <td>{{$pangkat->pengesah}}</td>
                                  <td>{{date('d-M-Y', strtotime($pangkat->tmt))}}</td>
                                  <td><a href="{{ url('data_sk'.'/'.$pangkat->filesk) }}" target="_blank">{{$pangkat->filesk}}</td>
                                  <td>
                                        <a href="{{route('datapangkat.edit', $pangkat->id)}}" class="btn btn-success fa fa-edit" title="ubah"></a>                                                                   
                                        
                                        <a href="/datapangkat/hapus/{{ $pangkat->id }}" class="btn btn-danger fa fa-trash" title="hapus" onclick="return confirm('Anda yakin ingin menghapus data ini?')"></a>
                                  </td>
                                  </tr>
                                  @endforeach
                              </tbody>
                          </table>                     
                        </div>
                      </div>

                      <!-- dokumen -->
                      <div id="dok" class="tab-pane fade">
                        <br><h4>Dokumen </h4><br>
                        <div class="table-responsive">
                          <table class="table table-bordered table-hover " id="tabledok">
                              <thead>
                                  <tr>
                                      <th>Kategori</th>
                                      <th>Nama Dokumen</th>
                                      <th>Keterangan</th>
                                      <th>File Dokumen</th>
                                      <th style="width : 5px">Opsi</th>
                                  </tr>
                              </thead>
                              <tbody>
                              @foreach($dok as $dok)
                                  <tr>
                                  <td>{{$dok->kategori}}</td>
                                  <td>{{$dok->namadok}}</td>
                                  <td>{{$dok->ket}}</td>
                                  <td><a href="{{ url('data_dok'.'/'.$dok->filedok) }}" target="_blank">{{$dok->filedok}}</td>
                                  <td>
                                        <a href="{{route('datadokumen.edit', $dok->id)}}" class="btn btn-success fa fa-edit" title="ubah"></a>
                                                                          
                                        <a href="/datadokumen/hapus/{{ $dok->id }}" class="btn btn-danger fa fa-trash" title="hapus" onclick="return confirm('Anda yakin ingin menghapus data ini?')"></a>
                                    </td>
                                  </tr>
                                  @endforeach
                              </tbody>
                          </table>                     
                        </div>
                      </div>    
                      
                      <!-- lainnya -->
                      <div id="lainnya" class="tab-pane fade">
                        <ul class="nav nav-tabs">
                          <li class="btn btn-outline-warning"><a data-toggle="tab" href="#jurnal">Jurnal publikasi</a></li>
                          <li class="btn btn-outline-warning"><a data-toggle="tab" href="#kepakaran">Kepakaran</a></li>
                          <li class="btn btn-outline-warning"><a data-toggle="tab" href="#penelitian">Penelitian</a></li>

                          <li class="btn btn-outline-warning"><a data-toggle="tab" href="#pelatihan">Pendidikan / Pelatihan</a></li>
                          <li class="btn btn-outline-warning"><a data-toggle="tab" href="#pengabdian">pengabdian</a></li>
                          <li class="btn btn-outline-warning"><a data-toggle="tab" href="#penghargaan">Penghargaan</a></li>

                          <li class="btn btn-outline-warning"><a data-toggle="tab" href="#penugasan">Penugasan</a></li>
                          <li class="btn btn-outline-warning"><a data-toggle="tab" href="#peraturan">Peraturan</a></li>
                          <li class="btn btn-outline-warning"><a data-toggle="tab" href="#studi">Studi Lanjut</a></li>
                        </ul>
                        
                        <div class="tab-content">                          
                          <!-- jurnal -->
                          <div id="jurnal" class="tab-pane fade ">
                            <br><h4>Data Jurnal</h4><br>
                            <div class="table-responsive">
                              <table class="table table-bordered table-hover " id="tablejurnal">
                                  <thead>
                                      <tr>
                                          <th>Nama Jurnal</th>
                                          <th>Judul Jurnal</th>
                                          <th>Tahun Jurnal</th>
                                          <th>File Jurnal</th>
                                          <th>Link Jurnal</th>
                                          <th >Opsi</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                  @foreach($jurnal as $jurnal)
                                      <tr>
                                      <td>{{$jurnal->namajurnal}}</td>
                                      <td>{{$jurnal->judul}}</td>
                                      <td>{{$jurnal->tahun}}</td>
                                      <td><a href="{{ url('data_jurnal'.'/'.$jurnal->filejurnal) }}" target="_blank">{{$jurnal->filejurnal}}</td>
                                      <td>{{$jurnal->link}}</td>
                                      <td>
                                            <a href="{{route('datajurnal.edit', $jurnal->id)}}" class="btn btn-success fa fa-edit" title="ubah"></a>
                                                                              
                                            <a href="/datajurnal/hapus/{{ $jurnal->id }}" class="btn btn-danger fa fa-trash" title="hapus" onclick="return confirm('Anda yakin ingin menghapus data ini?')"></a>
                                        </td>
                                      </tr>
                                      @endforeach
                                  </tbody>
                              </table>                     
                            </div>
                          </div>

                          <!-- kepakaran -->
                          <div id="kepakaran" class="tab-pane fade">
                            <br><h4>Data Kepakaran</h4><br>
                            <div class="table-responsive">
                              <table class="table table-bordered table-hover " id="tablekepakaran">
                                  <thead>
                                      <tr>
                                          <th>Bidang Ilmu</th>
                                          <th>Mata Kuliah</th>
                                          <th style="width : 5px">Opsi</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                  @foreach($kepakaran as $kepakaran)
                                      <tr>
                                      <td>{{$kepakaran->bidang}}</td>
                                      <td>{{$kepakaran->matakuliah}}</td>
                                      <td>
                                            <a href="{{route('datakepakaran.edit', $kepakaran->id)}}" class="btn btn-success fa fa-edit" title="ubah"></a>
                                                                              
                                            <a href="/datakepakaran/hapus/{{ $kepakaran->id }}" class="btn btn-danger fa fa-trash" title="hapus" onclick="return confirm('Anda yakin ingin menghapus data ini?')"></a>
                                        </td>
                                      </tr>
                                      @endforeach
                                  </tbody>
                              </table>                     
                            </div>
                          </div>
                          
                          <!-- penelitian -->
                          <div id="penelitian" class="tab-pane fade">
                          <br><h4>Data Penelitian</h4><br>
                          <div class="table-responsive">
                            <table class="table table-bordered table-hover " id="tablepenelitian">
                                <thead>
                                    <tr>
                                        <th>Judul Penelitian</th>
                                        <th>Sumber Dana</th>
                                        <th>Tahun</th>
                                        <th>File Penelitian</th>
                                        <th style="width : 5px">Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($penelitian as $penelitian)
                                    <tr>
                                    <td>{{$penelitian->judul}}</td>
                                    <td>{{$penelitian->sumberdana}}</td>
                                    <td>{{$penelitian->tahun}}</td>
                                    <td><a href="{{ url('data_penelitian'.'/'.$penelitian->filepenelitian) }}" target="_blank">{{$penelitian->filepenelitian}}</td>
                                    <td>
                                          <a href="{{route('datapenelitian.edit', $penelitian->id)}}" class="btn btn-success fa fa-edit" title="ubah"></a>
                                                                            
                                          <a href="/datapenelitian/hapus/{{ $penelitian->id }}" class="btn btn-danger fa fa-trash" title="hapus" onclick="return confirm('Anda yakin ingin menghapus data ini?')"></a>
                                      </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>                     
                          </div>
                          </div>     

                          <!-- pelatihan -->
                          <div id="pelatihan" class="tab-pane fade ">
                            <br><h4>Data Pelatihan</h4><br><br>
                            <div class="table-responsive">
                              <table class="table table-bordered table-hover " id="tablepelatihan">
                                  <thead>
                                      <tr>
                                          <th>Nama</th>
                                          <th>Nama Diklat</th>
                                          <th>Nama Penyelenggara</th>
                                          <th>Tanggal Penyelenggaraan</th>
                                          <th>Jumlah Jam</th>
                                          <th>No Sertifikat</th>
                                          <th>File Sertifikat</th>
                                          <th style="width : 5px">Opsi</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                  @foreach($pelatihan as $pelatihan)
                                      <tr>
                                      <td>{{$pelatihan->nama}}</td>
                                      <td>{{$pelatihan->namadiklat}}</td>
                                      <td>{{$pelatihan->penyelenggara}}</td>
                                      <td>{{date('d-M-Y', strtotime($pelatihan->tgl))}}</td>
                                      <td>{{$pelatihan->jam}}</td>
                                      <td>{{$pelatihan->nosertifikat}}</td>
                                      <td><a href="{{ url('data_pelatihan'.'/'.$pelatihan->filesertifikat) }}" target="_blank">{{$pelatihan->filesertifikat}}</td>
                                      <td>
                                            <a href="{{route('datapelatihan.edit', $pelatihan->id)}}" class="btn btn-success fa fa-edit" title="ubah"></a>
                                                                              
                                            <a href="/datapelatihan/hapus/{{ $pelatihan->id }}" class="btn btn-danger fa fa-trash" title="hapus" onclick="return confirm('Anda yakin ingin menghapus data ini?')"></a>
                                        </td>
                                      </tr>
                                      @endforeach
                                  </tbody>
                              </table>                     
                            </div>
                          </div>

                          <!-- pengabdian -->
                          <div id="pengabdian" class="tab-pane fade">
                            <br><h4>Data Pengabdian</h4><br><br>
                            <div class="table-responsive">
                              <table class="table table-bordered table-hover " id="tablepengabdian">
                                  <thead>
                                      <tr>
                                          <th>Nama</th>
                                          <th>Judul Pengabdian</th>
                                          <th>Sumber Dana</th>
                                          <th>Tahun</th>
                                          <th>File Pengabdian</th>
                                          <th style="width : 5px">Opsi</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                  @foreach($pengabdian as $pengabdian)
                                      <tr>
                                      <td>{{$pengabdian->nama}}</td>
                                      <td>{{$pengabdian->judul}}</td>
                                      <td>{{$pengabdian->sumberdana}}</td>
                                      <td>{{$pengabdian->tahun}}</td>
                                      <td><a href="{{ url('data_pengabdian'.'/'.$pengabdian->filepengabdian) }}" target="_blank">{{$pengabdian->filepengabdian}}</td>
                                      <td>
                                            <a href="{{route('datapengabdian.edit', $pengabdian->id)}}" class="btn btn-success fa fa-edit" title="ubah"></a>
                                                                              
                                            <a href="/datapengabdian/hapus/{{ $pengabdian->id }}" class="btn btn-danger fa fa-trash" title="hapus" onclick="return confirm('Anda yakin ingin menghapus data ini?')"></a>
                                        </td>
                                      </tr>
                                      @endforeach
                                  </tbody>
                              </table>                     
                            </div>
                          </div>

                          <!-- penghargaan -->
                          <div id="penghargaan" class="tab-pane fade">
                            <br><h4>Data Penghargaan</h4><br><br>
                            <div class="table-responsive">
                              <table class="table table-bordered table-hover " id="tablepenghargaan">
                                  <thead>
                                      <tr>
                                          <th>Nama</th>
                                          <th>Penghargaan</th>
                                          <th>Negara / Instansi Pemberi</th>
                                          <th>Tahun</th>
                                          <th>File Penghargaan</th>
                                          <th style="width : 5px">Opsi</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                  @foreach($penghargaan as $penghargaan)
                                      <tr>
                                      <td>{{$penghargaan->nama}}</td>
                                      <td>{{$penghargaan->penghargaan}}</td>
                                      <td>{{$penghargaan->instansi}}</td>
                                      <td>{{$penghargaan->tahun}}</td>
                                      <td><a href="{{ url('data_penghargaan'.'/'.$penghargaan->filesk) }}" target="_blank">{{$penghargaan->filesk}}</td>
                                      <td>
                                            <a href="{{route('datapenghargaan.edit', $penghargaan->id)}}" class="btn btn-success fa fa-edit" title="ubah"></a>
                                                                              
                                            <a href="/datapenghargaan/hapus/{{ $penghargaan->id }}" class="btn btn-danger fa fa-trash" title="hapus" onclick="return confirm('Anda yakin ingin menghapus data ini?')"></a>
                                        </td>
                                      </tr>
                                      @endforeach
                                  </tbody>
                              </table>                     
                            </div>
                          </div>  

                          <!-- penugasan -->
                          <div id="penugasan" class="tab-pane fade ">
                            <br><h4>Data Penugasan</h4><br><br>
                            <div class="table-responsive">
                              <table class="table table-bordered table-hover " id="tablepenugasan">
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
                                  @foreach($penugasan as $penugasan)
                                      <tr>
                                      <td>{{$penugasan->nama}}</td>
                                      <td>{{$penugasan->tujuan}}</td>
                                      <td>{{$penugasan->nosurat}} - {{date('d-M-Y', strtotime($penugasan->tgl))}} </td>
                                      <td>{{$penugasan->lama}}</td>
                                      <td><a href="{{ url('data_penugasan'.'/'.$penugasan->filesk) }}" target="_blank">{{$penugasan->filesk}}</td>
                                      <td>
                                            <a href="{{route('datapenugasan.edit', $penugasan->id)}}" class="btn btn-success fa fa-edit" title="ubah"></a>
                                                                              
                                            <a href="/datapenugasan/hapus/{{ $penugasan->id }}" class="btn btn-danger fa fa-trash" title="hapus" onclick="return confirm('Anda yakin ingin menghapus data ini?')"></a>
                                        </td>
                                      </tr>
                                      @endforeach
                                  </tbody>
                              </table>                     
                            </div>
                          </div>

                          <!-- peraturan -->
                          <div id="peraturan" class="tab-pane fade">
                            <br><h4>Data Pelatihan</h4><br><br>
                            <div class="table-responsive">
                              <table class="table table-bordered table-hover " id="tableperaturan">
                                  <thead>
                                      <tr>
                                          <th>No Peraturan</th>
                                          <th>Tentang</th>
                                          <th>Tahun</th>
                                          <th>File Peraturan</th>
                                          <th style="width : 5px">Opsi</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                  @foreach($peraturan as $peraturan)
                                      <tr>
                                      <td>{{$peraturan->no}}</td>
                                      <td>{{$peraturan->tentang}}</td>
                                      <td>{{$peraturan->tahun}}</td>
                                      <td><a href="{{ url('data_peraturan'.'/'.$peraturan->filesk) }}" target="_blank">{{$peraturan->filesk}}</td>
                                      <td>
                                            <a href="{{route('dataperaturan.edit', $peraturan->id)}}" class="btn btn-success fa fa-edit" title="ubah"></a>
                                                                              
                                            <a href="/dataperaturan/hapus/{{ $peraturan->id }}" class="btn btn-danger fa fa-trash" title="hapus" onclick="return confirm('Anda yakin ingin menghapus data ini?')"></a>
                                      </td>
                                      </tr>
                                      @endforeach
                                  </tbody>
                              </table>                     
                            </div>
                          </div>

                          <!-- study -->
                          <div id="studi" class="tab-pane fade">
                            <br><h4>Data Study</h4><br><br>
                            <div class="table-responsive">
                              <table class="table table-bordered table-hover " id="tablestudi">
                                  <thead>
                                      <tr>
                                          <th>Nama</th>
                                          <th>Tingkat</th>
                                          <th>Perguruan Tinggi</th>
                                          <th>Program Studi</th>
                                          <th>Tahun Masuk</th>
                                          <th>Negara</th>
                                          <th style="width : 5px">Opsi</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                  @foreach($study as $study)
                                      <tr>
                                      <td>{{$study->nama}}</td>
                                      <td>{{$study->tingkat}}</td>
                                      <td>{{$study->perguruan}}</td>
                                      <td>{{$study->program}}</td>
                                      <td>{{$study->tahun}}</td>
                                      <td>{{$study->negara}}</td>
                                      <td>
                                            <a href="{{route('datastudy.edit', $study->id)}}" class="btn btn-success fa fa-edit" title="ubah"></a>
                                                                              
                                            <a href="/datastudy/hapus/{{ $study->id }}" class="btn btn-danger fa fa-trash" title="hapus" onclick="return confirm('Anda yakin ingin menghapus data ini?')"></a>
                                        </td>
                                      </tr>
                                      @endforeach
                                  </tbody>
                              </table>                     
                            </div>
                          </div>                   
                        </div>
                      </div>

                      <div id="menu2" class="tab-pane fade">
                        <h3>Menu 2</h3>
                        <p>Membuat navigasi tabs dan pills bootstrap.</p>
                      </div>
                      
                    </div>

                    

                </div>
            </div>
          </div>
</div>
@endsection