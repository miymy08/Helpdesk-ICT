<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>HELPDESK ICT | SELESAI DAFTAR</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<style>
    .center {
      display: block;
      margin-left: auto;
      margin-right: auto;
      /* width: 50%; */
    }
    img {
      width: 135px;
      height: 190px;
    }
</style>
<body class="hold-transition login-page" style="background-image: url('{{asset('images/test2.png')}}');">

<div class="login-box">
    <div class="row">
        <img src="{{asset('images/penang.png')}}" class="center" >
    </div>
  <div class="login-logo">
    <a href="{{ROUTE('login')}}"><b>HELPDESK ICT</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body text-center">
      <h3 class="login-box-msg text-success">Maklumbalas berjaya dihantar</h3> <br>
       <h5> Terima kasih atas maklumbalas anda.</h5>
       <h5> Sila klik butang Log Masuk untuk ke halaman log masuk.</h5>
        <br>
        <div class="text-center">
            <a type="button" class="btn btn-primary" href="{{route('login')}}">Log Masuk</a>
        </div>


    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('dist/js/adminlte.min.js')}}"></script>

</body>
</html>
