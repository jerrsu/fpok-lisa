<ul class="nav" >
  @if(Auth::user()->level == 1 or Auth::user()->level == 2 or Auth::user()->level == 4)  
  <li class="nav-item {{ setActive(['/', 'home']) }}"> 
    <a class="nav-link " style="background-color:#252526;" href="{{url('/')}}">
      <i class="menu-icon mdi mdi-television" aria-expanded="false"></i>
      <span class="menu-title">Dashboard</span>
    </a>
  </li>
  
  <li class="nav-item {{ setActive(['anggota*', 'buku*', 'user*','jabatan*','struktural*','pangkatGolongan*','role*']) }}">
    <a class="nav-link " style="background-color:#252526;" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
      <i class="menu-icon mdi mdi-database-plus"></i>
      <span class="menu-title">Master Data</span>
      <i class="menu-arrow"></i>
    </a>
    <div class="collapse {{ setShow(['anggota*', 'buku*', 'user*','jabatan*','struktural*','pangkatGolongan*','role*']) }}" id="ui-basic">
      <ul class="nav flex-column sub-menu  " style="background-color:#252526;">
        <!-- <li class="nav-item">
          <a class="nav-link bg-dark {{ setActive(['anggota*']) }}" href="{{route('anggota.index')}}"style="color:white" >Data Anggota</a>
        </li>
        <li class="nav-item">
          <a class="nav-link bg-dark {{ setActive(['buku*']) }}" href="{{route('buku.index')}}" style="color:white" >Data Buku</a>
        </li> -->
        @if(Auth::user()->level == 4 or Auth::user()->level == 1)   
        <li class="nav-item">
          <a class="nav-link {{ setActive(['user*']) }}" href="{{route('user.index')}}" style="background-color:#252526;" >Data User</a>
        </li>
        @endif
        <li class="nav-item">
          <a class="nav-link  {{ setActive(['jabatan*']) }}" style="background-color:#252526;"href="{{route('jabatan.index')}}">Jabatan Fungsional</a>
        </li>
        <li class="nav-item">
          <a class="nav-link  {{ setActive(['struktural*']) }}" style="background-color:#252526;"href="{{route('struktural.index')}}" >Jabatan Struktural</a>
        </li>
        <li class="nav-item">
          <a class="nav-link  {{ setActive(['pangkatGolongan*']) }}"style="background-color:#252526;" href="{{route('pangkatGolongan.index')}}">Pangkat Golongan</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ setActive(['pendidikan*']) }}"style="background-color:#252526;" href="{{route('pendidikan.index')}}" >Pendidikan</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ setActive(['status*']) }}"style="background-color:#252526;" href="{{route('status.index')}}">Status</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ setActive(['unitKerja*']) }}"style="background-color:#252526;" href="{{route('unitKerja.index')}}">Unit Kerja</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ setActive(['role*']) }}"style="background-color:# ;" href="{{route('role.index')}}" >User</a>
        </li>
      </ul>
    </div>
  </li>
  @endif

  <li class="nav-item {{ setActive(['dataPegawai*']) }}">
    <a class="nav-link" style="background-color:#252526;" href="{{route('dataPegawai.index')}}" >
      <i class="menu-icon mdi mdi-backup-restore"></i>
      <span class="menu-title" >Data Pegawai</span>
    </a>
  </li>
  
  <li class="nav-item {{ setActive(['pasangan*','anak*','keluarga*','datapendidikan*','datafungsional*','datastruktural*','datapangkat*','datadokumen*','datajurnal*','datakepakaran*','datapelatihan*','datapenelitian*','datapengabdian*','datapenghargaan*','datapenugasan*','dataperaturan*','datastudy*']) }}">
    <a class="nav-link" style="background-color:#252526;" data-toggle="collapse" href="#ui-basic2" aria-expanded="false" aria-controls="ui-basic">
      <i class="menu-icon mdi mdi-account-multiple"></i>
      <span class="menu-title">Kepegawaian</span>
      <i class="menu-arrow" ></i>
      </a>
    <div class="collapse {{ setShow(['pasangan*','anak*','keluarga*','datapendidikan*','datafungsional*','datastruktural*','datapangkat*','datadokumen*','datajurnal*','datakepakaran*','datapelatihan*','datapenelitian*','datapengabdian*','datapenghargaan*','datapenugasan*','dataperaturan*','datastudy*']) }}" id="ui-basic2">
      <ul class="nav flex-column sub-menu " style="background-color:#252526;">          
        <li class="nav-item">
          <a class="nav-link {{ setActive(['pasangan*']) }}" href="{{route('pasangan.index')}}" style="background-color:#252526" >Data Suami/Istri</a>
        </li>               
        <li class="nav-item">
          <a class="nav-link {{ setActive(['anak*']) }}" href="{{route('anak.index')}}" style="background-color:#252526">Data Anak</a>
        </li> 
        <li class="nav-item">
          <a class="nav-link {{ setActive(['keluarga*']) }}" href="{{route('keluarga.index')}}" style="background-color:#252526">Data Orang Tua</a>
        </li>    
        <li class="nav-item">
          <a class="nav-link {{ setActive(['datapendidikan*']) }}" href="{{route('datapendidikan.index')}}" style="background-color:#252526;">Riwayat Pendidikan</a>
        </li>  
        <li class="nav-item">
          <a class="nav-link {{ setActive(['datafungsional*']) }}" href="{{route('datafungsional.index')}}" style="background-color:#252526;">Jabatan Fungsional</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ setActive(['datastruktural*']) }}" href="{{route('datastruktural.index')}}" style="background-color:#252526;">Jabatan Struktural</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ setActive(['datapangkat*']) }}" href="{{route('datapangkat.index')}}" style="background-color:#252526;">Pangkat/ Golongan</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ setActive(['datadokumen*']) }}" href="{{route('datadokumen.index')}}" style="background-color:#252526;">Dokumen</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ setActive(['datajurnal*']) }}" href="{{route('datajurnal.index')}}" style="background-color:#252526;">Jurnal/ Publikasi</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ setActive(['datakepakaran*']) }}" href="{{route('datakepakaran.index')}}" style="background-color:#252526;">Kepakaran</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ setActive(['datapenelitian*']) }}" href="{{route('datapenelitian.index')}}"style="background-color:#252526;">Penelitian</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ setActive(['datapelatihan*']) }}" href="{{route('datapelatihan.index')}}"style="background-color:#252526;">Pendidikan dan Pelatihan</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ setActive(['datapengabdian*']) }}" href="{{route('datapengabdian.index')}}"style="background-color:#252526;">Data Pengabdian</a>
        </li>
        <!-- <li class="nav-item">
          <a class="nav-link{{ setActive(['datapengabdian*']) }}" href="{{route('datapengabdian.index')}}"style="background-color:#252526;">Pengabdian</a>
        </li> -->
        <li class="nav-item">
          <a class="nav-link {{ setActive(['datapenghargaan*']) }}" href="{{route('datapenghargaan.index')}}"style="background-color:#252526;">Penghargaan</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ setActive(['datapenugasan*']) }}" href="{{route('datapenugasan.index')}}"style="background-color:#252526;">Penugasan</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ setActive(['dataperaturan*']) }}" href="{{route('dataperaturan.index')}}"style="background-color:#252526;">Peraturan Kepegawaian</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ setActive(['datastudy*']) }}" href="{{route('datastudy.index')}}"style="background-color:#252526;">Study Lanjut</a>
        </li>
        <!-- <li class="nav-item">
          <a class="nav-link{{ setActive(['datastudy*']) }}" href="{{route('datastudy.index')}}"style="background-color:#252526;">Study Lanjut</a>
        </li> -->
      </ul>
    </div>    
  </li>
  @if(Auth::user()->level == 1 or Auth::user()->level == 2)  
  <li class="nav-item {{ setActive(['arsipcuti*','pengajuancuti*']) }}">
    <a class="nav-link" style="background-color:#252526;"data-toggle="collapse" href="#ui-basic3" aria-expanded="false" aria-controls="ui-basic">
      <i class="menu-icon mdi mdi-camera-front-variant"></i>
      <span class="menu-title"  >Cuti</span>
      <i class="menu-arrow" ></i>
    </a>
    <div class="collapse {{ setShow(['arsipcuti*','pengajuancuti*']) }}" id="ui-basic3">
      <ul class="nav flex-column sub-menu " style="background-color:#252526;">
        <li class="nav-item">
          <a class="nav-link {{ setActive(['pengajuancuti*']) }}" href="{{route('pengajuancuti.index')}}"style="background-color:#252526;" >Pengajuan Cuti</a>
        </li>      
        <li class="nav-item">
          <a class="nav-link {{ setActive(['arsipcuti*']) }}" href="{{route('arsipcuti.index')}}"style="background-color:#252526;" >Arsip Cuti</a>
        </li>          
      </ul>
    </div>    
  </li>

  <li class="nav-item {{ setActive(['kehadiran*']) }}">
    <a class="nav-link" style="background-color:#252526;" href="{{route('kehadiran.index')}}" >
      <i class="menu-icon mdi mdi-backup-restore"></i>
      <span class="menu-title" >Data Kehadiran</span>
    </a>
  </li>

  <li class="nav-item {{ setActive(['arsipkgb*','pengajuankgb*']) }}">
    <a class="nav-link " style="background-color:#252526;" data-toggle="collapse" href="#ui-basic4" aria-expanded="false" aria-controls="ui-basic">
      <i class="menu-icon mdi mdi-animation"></i>
      <span class="menu-title"style="background-color:#252526;">KGB</span>
      <i class="menu-arrow" ></i>
    </a>
    <div class="collapse {{ setShow(['arsipkgb*','pengajuankgb*']) }}" id="ui-basic4">
      <ul class="nav flex-column sub-menu" style="background-color:#252526;">
        <li class="nav-item">
          <a class="nav-link {{ setActive(['pengajuankgb*']) }}" href="{{route('pengajuankgb.index')}}"style="background-color:#252526;" >Pengajuan KGB</a>
        </li>      
        <li class="nav-item">
          <a class="nav-link {{ setActive(['arsipkgb*']) }}" href="{{route('arsipkgb.index')}}"style="background-color:#252526;">Arsip KGB</a>
        </li>          
      </ul>
    </div>    
  </li>

  <li class="nav-item {{ setActive(['dataskp*']) }}">
    <a class="nav-link" style="background-color:#252526;" href="{{route('dataskp.index')}}">
      <i class="menu-icon mdi mdi-clipboard-text"></i>
      <span class="menu-title"style="background-color:#252526;">SKP</span>
    </a>
  </li>
  @endif
  <!-- <li class="nav-item {{ setActive(['transaksi*']) }}">
    <a class="nav-link" href="{{route('transaksi.index')}}">
      <i class="menu-icon mdi mdi-backup-restore"></i>
      <span class="menu-title"style="color:white" >Transaksi</span>
    </a>
  </li> -->

  <!-- <li class="nav-item">
    <a class="nav-link" data-toggle="collapse" href="#ui-laporan" aria-expanded="false" aria-controls="ui-laporan">
      <i class="menu-icon mdi mdi-table"></i>
      <span class="menu-title" >Laporan</span>
      <i class="menu-arrow"></i>
    </a>
    <div class="collapse" id="ui-laporan">
      <ul class="nav flex-column sub-menu">
        <li class="nav-item">
          <a class="nav-link" href="{{url('laporan/trs')}}" >Laporan Transaksi</a>
        </li>        
        <li class="nav-item">
          <a class="nav-link" href="">Laporan Anggota</a>
        </li>       
          <li class="nav-item">
          <a class="nav-link" href="{{url('laporan/buku')}}" >Laporan Buku</a>
        </li>
      </ul>
    </div>
  </li> -->
         
</ul>