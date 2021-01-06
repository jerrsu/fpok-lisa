<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>FPOK</title>
  <!-- plugins:css -->
  
  <link rel="stylesheet" href="{{asset('vendors/iconfonts/mdi/css/materialdesignicons.min.css')}}">
  <link rel="stylesheet" href="{{asset('vendors/css/vendor.bundle.base.css')}}">
  <link rel="stylesheet" href="{{asset('vendors/css/vendor.bundle.addons.css')}}">
  <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">

  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{asset('css/style.css')}}">
  <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
  <link rel="stylesheet" href="{{ asset('css/select2.css')}}">
  <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap4.min.css')}}"> 
  
  <style>
  body{
    font-family: 'Lato', sans-serif !important;
  }
  .navbar.default-layout {
    background:#252526 !important;
  }
  </style>
  @section('css')

  @show
  <!-- endinject -->
  <!-- <link rel="shortcut icon" href="{{asset('favicon.ico')}}" /> -->
  <link rel="shortcut icon" href="{{asset('images/logo/ico2.ico')}}" />
</head>
<body>
    <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row navbar-dark "  >
      <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center" style="background-color:#252526;" >
        
        <a class="navbar-brand brand-logo " href="/" style="color: #fff">
          <img src="{{asset('images/logo/logosidebar.svg')}}" />
        </a>        
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="icon-menu"></span>
          <i class="fa fa-align-justify" style="color: #fff;"></i>
        </button>
      </div>

      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end" style="background-color:#252526;">
        <ul class="navbar-nav navbar-nav-right ">
         
          <li class="nav-item dropdown d-none d-xl-inline-block">
            <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
              <span class="profile-text d-none d-md-inline-flex">Welcome - {{Auth::user()->name}} </span>
                  <img class="img-xs rounded-circle"  src="{{asset('images/user/default.png')}}" width="40" height="40" alt="profile image">
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
              <a class="dropdown-item p-0">
                <div class="d-flex border-bottom">
                 
                </div>
              </a>
              <a class="dropdown-item" style="margin-top: 20px;" href="{{route('user.edit', Auth::user()->id)}}">
               Edit Profile
              </a>
              <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                 Sign Out

                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      {{ csrf_field() }}
                  </form>
              </a>
            </div>
          </li>
        </ul>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" style="background-color:#252526;" id="sidebar" >
      @section('sidebar')
          @include('layouts.sidebar',['user' => Auth::User()])
      @show
      </nav>
      <div class="main-panel">
        <div class="content-wrapper">
          @yield('content')
        </div>
        <footer class="footer">
          <div class="container-fluid clearfix">
            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © {{date('Y')}}
            <a href="#" target="">HRIS PFOK UPI</a>. All rights reserved.</span>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <script src="{{asset('vendors/js/vendor.bundle.base.js')}}"></script>
  <script src="{{asset('vendors/js/vendor.bundle.addons.js')}}"></script>
  <script src="{{asset('js/off-canvas.js')}}"></script>
  <script src="{{asset('js/misc.js')}}"></script>
  <script src="{{asset('js/dashboard.js')}}"></script>
  <script src="{{asset('js/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('js/dataTables.bootstrap4.min.js')}}"></script>
  <script src="{{asset('js/sweetalert2.all.js')}}"></script>
  <script src="{{asset('js/select2.min.js')}}"></script>
  <script src="{{asset('js/chart.js')}}"></script>
  @include('sweetalert::alert')
  @section('js')
 

  @show
  
</body>

</html>
                         
   