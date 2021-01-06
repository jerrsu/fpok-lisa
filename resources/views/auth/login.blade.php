<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>FPOK</title>

  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="{{asset('vendors/iconfonts/mdi/css/materialdesignicons.min.css')}}">
  <link rel="stylesheet" href="{{asset('vendors/iconfonts/puse-icons-feather/feather.css')}}">
  <link rel="stylesheet" href="{{asset('vendors/css/vendor.bundle.base.css')}}">
  <link rel="stylesheet" href="{{asset('vendors/css/vendor.bundle.addons.css')}}">
  <link rel="stylesheet" href="{{asset('css/style.css')}}">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{asset('favicon.ico')}}" />

  <style>
  body{
    font-family: 'Lato', sans-serif !important;
  }
  </style>

</head>

<body>
<form method="POST" action="{{ route('login') }}">
{{ csrf_field() }}
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper auth-page">
    <div class="content-wrapper d-flex align-items-center justify-content-center auth theme-one" style="background-image: url({{ url('images/auth/login_1.jpg') }}); background-size: cover;">
    <!-- <div class="content-wrapper d-flex align-items-center justify-content-center auth theme-one" > -->

        <div class="row w-100">
          <div class="col-md-12" style="margin-bottom: 15px;">
          </div>
        <div class="col-lg-4 mx-auto " >
            <div class="auto-form-wrapper"> 
                <div class="form-group">
                <center>
                <img src="{{asset('images/logo/logologin.png')}}" width ="180" height="150"/></center>
                </div>

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                  <label class="label">Username</label>
                  <div class="input-group">
                    <input id="email" type="text" class="form-control" name="email" required autofocus placeholder="Username" style="border :1px solid #252526 ">
                    <div class="input-group-append">
                      <span class="input-group-text" style="border :1px solid #252526 ">
                        <i class="mdi mdi mdi-account"></i>
                      </span>
                    </div>
                  </div>
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                  <label class="label">Password</label>
                  <div class="input-group">
                    <input id="password" type="password" class="form-control" name="password" required placeholder="*********" style="border :1px solid #252526 ">
                    <div class="input-group-append">
                      <span class="input-group-text" style="border :1px solid #252526 ">
                        <i class="mdi mdi mdi-key"></i>
                      </span>
                    </div>
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                  </div>
                </div>
                <div class="form-group">
                  <button class="btn btn-danger  submit-btn btn-block" type="submit">Login</button>
                </div>
                <div class="form-group">
                  <center><a href="#" target="">Panduan dan tata cara pengisian FPOK</a></center>
                </div>
            </div>
            <br>
            <p class="footer-text text-center" style="color:white">Copyright © {{date('Y')}} <a href="#" target="">HRIS PFOK UPI</a> All rights reserved.</p>
          </div>
          
        </div>
        
      </div>
      <!-- content-wrapper ends Herziwp@gmail.com -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  </form>
  <script src="{{asset('vendors/js/vendor.bundle.base.js')}}"></script>
  <script src="{{asset('vendors/js/vendor.bundle.addons.js')}}"></script>
</body>

</html>

