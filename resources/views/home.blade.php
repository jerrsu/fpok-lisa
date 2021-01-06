@section('js')
<script type="text/javascript">
  $(document).ready(function() {
    $('#table').DataTable({
      "iDisplayLength": 50
    });

} );
</script>

<script src="https://code.highcharts.com/highcharts.js"></script>

<script>
  var d = new Date();
  var n = d.getFullYear();
    
    Highcharts.chart('container', {
      chart: {
          type: 'areaspline'
      },
      title: {
          text: 'Data Jumlah pegawai yang cuti tahun ' +n
      },
      xAxis: {
          categories: {!!json_encode($bulan)!!},
          crosshair: true
      },
      yAxis: {
          min: 0,
          title: {
              text: 'Jumlah Pegawai'
          }
      },
      tooltip: {
          headerFormat: '<span style="font-size:14px">Bulan :{point.key}</span><table>',
          pointFormat: '<tr><td style="font-size:14px">Jumlah Pegawai: </td>' +
              '<td style="font-size:14px"><b>{point.y:1f} </b></td></tr>',
          footerFormat: '</table>',
          shared: true,
          useHTML: true
      },
      plotOptions: {
          column: {
              pointPadding: 0.2,
              borderWidth: 0
          }
      },
      series: [{
          name: 'Cuti',
          data: {!!json_encode($jumlah)!!}

      }]
    });
</script>
@stop
@extends('layouts.app')

@section('content')
<div class="row">
@if(Auth::user()->level == 1 or Auth::user()->level == 2)  
          <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
            <div class="card card-statistics" style="background-color : #2718B1">
                <div class="card-body">
                  <div class="clearfix">
                    <div class="float-left">
                    <i class="mdi mdi-account-location text-secondary icon-lg"></i>
                      
                    </div>
                    <div class="float-right">
                    <span class="menu-title" style="color:white">Pegawai</span>
                      <div class="fluid-container">
                        <h3 class="font-weight-medium text-right mb-0" style="color:white">{{$pegawai->count()}}</h3>
                      </div>
                    </div>
                  </div>
                  <p class="text-muted mt-3 mb-0">
                    <i class="mdi mdi-alert-octagon mr-1" aria-hidden="true"></i> Total seluruh pegawai
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
              <div class="card card-statistics" style="background-color : #2196F3">
                <div class="card-body">
                  <div class="clearfix">
                    <div class="float-left">
                      <i class="mdi mdi-receipt text-secondary icon-lg"></i>
                    </div>
                    <div class="float-right">
                    <span class="menu-title" style="color:white">Guru Besar</span>
                      <div class="fluid-container">
                        <h3 class="font-weight-medium text-right mb-0" style="color:white">
                        {{$jabatan_fungsional->where('idfungsional', 5)->count()}}
                        </h3>
                      </div>
                    </div>
                  </div>
                  <p class="text-muted mt-3 mb-0">
                    <i class="mdi mdi-calendar mr-1" aria-hidden="true" style="color:white"></i> Total seluruh GuruBesar
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
              <div class="card card-statistics" style="background-color : #AA6F17">
                <div class="card-body">
                  <div class="clearfix">
                    <div class="float-left">
                      <i class="mdi mdi-book text-secondary icon-lg" style="width: 40px;height: 40px;"></i>
                    </div>
                    <div class="float-right">
                    <span class="menu-title" style="color:white">Lektor Kepala</span>
                      <div class="fluid-container">
                        <h3 class="font-weight-medium text-right mb-0" style="color:white">{{$jabatan_fungsional->where('idfungsional', 4)->count()}}</h3>
                      </div>
                    </div>
                  </div>
                  <p class="text-muted mt-3 mb-0">
                    <i class="mdi mdi-book mr-1" aria-hidden="true" style="color:white"></i> Total seluruh Lektor Kepala
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
              <div class="card card-statistics" style="background-color : #DE4444">
                <div class="card-body">
                  <div class="clearfix">
                    <div class="float-left">
                    <i class="mdi mdi-poll-box text-secondary icon-lg"></i>
                    </div>
                    <div class="float-right">
                    <span class="menu-title" style="color:white">Lektor</span>
                      <div class="fluid-container">
                        <h3 class="font-weight-medium text-right mb-0" style="color:white">{{$jabatan_fungsional->where('idfungsional', 3)->count()}}</h3>
                      </div>
                    </div>
                  </div>
                  <p class="text-muted mt-3 mb-0">
                    <i class="mdi mdi-account mr-1" aria-hidden="true" style="color:white"></i> Total seluruh Lektor
                  </p>
                </div>
              </div>
            </div>
          </div>
          
          @endif

          <div class="row">
          <div class="col-md-12 grid-margin"> 
              <div class="card">
                <div class="card-body">
                  <div class="d-sm-flex justify-content-between align-items-center mb-4">
                    <h2 class="card-title mb-0">Grafik Jumlah Pengajuan Cuti</h2>
                    <div class="wrapper d-flex">
                      <div class="d-flex align-items-center mr-3">
                        <span class="dot-indicator bg-success"></span>
                        <p class="mb-0 ml-2 text-muted">{{date('F')}}</p>
                      </div>
                      <div class="d-flex align-items-center">
                        <span class="dot-indicator bg-primary"></span>
                        <p class="mb-0 ml-2 text-muted">{{date('Y')}}</p>
                      </div>
                    </div>
                  </div>
                  <div class="chart-container">
                    <div id="container" height="80"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          
        
          
@endsection
