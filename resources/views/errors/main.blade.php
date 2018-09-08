<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{siteName()}} | @yield('title')</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="{!!url('assets')!!}/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{!!url('assets')!!}/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{!!url('assets')!!}/dist/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="{!!url('assets')!!}/dist/css/bas-style.css">

  </head>
  <body class="hold-transition skin-blue sidebar-mini">    
      <div class="content-wrapper">
      <!-- Content Wrapper. Contains page content -->

        @yield('content')
      </div><!-- /.content-wrapper -->
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 2.3.0
        </div>
        <strong>Copyright &copy; 2016 <a href="http://rolloic.com">Basrul Yandri</a>.</strong> All rights reserved.
      </footer>      
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->
    <script src="{!!url('assets')!!}/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->

    <script src="{!!url('assets')!!}/bootstrap/js/bootstrap.min.js"></script>


    <!-- AdminLTE App -->
    <script src="{!!url('assets')!!}/dist/js/app.min.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <!--<script src="{!!url('assets')!!}/dist/js/pages/dashboard.js"></script>-->
    <!-- AdminLTE for demo purposes -->
    <script src="{!!url('assets')!!}/dist/js/demo.js"></script>
    <script src="{!!url('assets')!!}/plugins/sweetalert/sweetalert.min.js"></script>
    <script type="text/javascript">
    @if(Session::has('success'))
    swal({title: "Success",
          type: 'success',
          text: "{{Session::get('success')}} !",
          timer: 3000,
          showConfirmButton: true });
    @endif

    @if(Session::has('warning'))
      swal({title: "SURE ?",
            type: 'warning',
            text: "{{Session::get('success')}} !",
            timer: 3000,
            showConfirmButton: true });
    @endif
    </script>
    @yield('footer')
  </body>
</html>
