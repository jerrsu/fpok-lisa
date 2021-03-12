@section('js')
<script type="text/javascript">
  $(document).ready(function() {
    $('#table').DataTable({
      "iDisplayLength": 50
    });

} );
</script>

<script>
  var data = {
    labels: {!!json_encode($bulan)!!},
    datasets: [{
      label: 'Jumlah Pegawai',
      data: {!!json_encode($jumlah)!!},
      backgroundColor: [
        'rgba(255, 99, 132, 0.2)',
        'rgba(54, 162, 235, 0.2)',
        'rgba(255, 206, 86, 0.2)',
        'rgba(75, 192, 192, 0.2)',
        'rgba(153, 102, 255, 0.2)',
        'rgba(255, 159, 64, 0.2)'
      ],
      borderColor: [
        'rgba(255,99,132,1)',
        'rgba(54, 162, 235, 1)',
        'rgba(255, 206, 86, 1)',
        'rgba(75, 192, 192, 1)',
        'rgba(153, 102, 255, 1)',
        'rgba(255, 159, 64, 1)'
      ],
      borderWidth: 1
    }]
  };
  if ($("#lineCharts").length) {
    var lineChartCanvas = $("#lineCharts").get(0).getContext("2d");
    var lineChart = new Chart(lineChartCanvas, {
      type: 'line',
      data: data,
      options: options
    });
  }
  var options = {
    scales: {
      yAxes: [{
        ticks: {
          beginAtZero: true
        }
      }]
    },
    legend: {
      display: false
    },
    elements: {
      point: {
        radius: 0
      }
    }

  };
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
                  <h2 class="card-title mb-0">Data Jumlah Pegawai yang melakukan Cuti</h2>
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
                  <canvas id="lineCharts" height="80"></canvas>
                </div>
              </div>
            </div>
          </div>
        </div>
          
          

          
        
          
@endsection
