<html><head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>{{siteName()}} | @yield('title')</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="{!!url('assets')!!}/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{!!url('assets')!!}/dist/css/AdminLTE.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition lockscreen">
<!-- Automatic element centering -->
<div class="lockscreen-wrapper">
  <div class="lockscreen-logo">
    <a href="{{route('page.home')}}"><b>Error</b> 404</a>
  </div>
  <!-- User name -->
  <div class="lockscreen-name">Halaman tidak ditemukan</div>

  <!-- START LOCK SCREEN ITEM -->
  <div class="lockscreen-item">
    <!-- lockscreen image -->
    <div class="lockscreen-image">
      <img src="{!!url('assets/uploads')!!}/{!!logoUrl()!!}" alt="User Image">
    </div>
    <!-- /.lockscreen-image -->

    <!-- lockscreen credentials (contains the form) -->
    <div class="lockscreen-credentials">
      <h3>STAI BINAMADANI</h3>
    </div>
    <!-- /.lockscreen credentials -->

  </div>
  <!-- /.lockscreen-item -->
  
  <div class="text-center">
    <a href="{{route('page.home')}}">Kembali ke halaman Utama</a>
  </div>
  <div class="lockscreen-footer text-center">
    Copyright © 2016 <b><a href="{{route('page.home')}}" class="text-black">STAI Binamadani</a></b> Powered By <a href="http://rolloic.com">Rollo ITC</a><br>
    All rights reserved
  </div>
</div>
<!-- /.center -->

<!-- jQuery 2.2.3 -->
<script src="{!!url('assets')!!}/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="{!!url('assets')!!}/bootstrap/js/bootstrap.min.js"></script>


</body></html>
