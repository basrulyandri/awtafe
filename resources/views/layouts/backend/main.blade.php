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
    <link rel="stylesheet" href="{!!url('assets')!!}/plugins/sweetalert/sweetalert.css">
    <link rel="stylesheet" href="{{url('assets/plugins/datatables')}}/dataTables.bootstrap.min.css">

    @yield('header')

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
      @include('layouts.backend.navbar')
      <!-- Left side column. contains the logo and sidebar -->
      @include('layouts.backend.sidebar')
      <div class="content-wrapper">
      @include('layouts.backend.alert')
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
  
  <div class="modal fade" id="modalTambahKoleksi">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Tambah Koleksi</h4>
        </div>
        <div class="modal-body row">
          <div class="col-md-8 col-md-offset-2">
            <a href="{{route('fatwa.add')}}" class="btn btn-app bg-purple">
              <i class="fa fa-file-archive-o"></i> Fatwa
            </a>
            <a class="btn btn-app bg-olive">
              <i class="fa fa-archive"></i> Ijtima'
            </a>
            <a class="btn btn-app bg-navy">
              <i class="fa fa-book"></i> Buku
            </a>
            <a class="btn btn-app bg-maroon">
              <i class="fa fa-pencil"></i> Artikel
            </a>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>          
        </div>
      </div>
    </div>
  </div>
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
    <script src="{{url('assets/plugins/datatables')}}/jquery.dataTables.min.js"></script>
    <script src="{{url('assets/plugins/datatables')}}/dataTables.bootstrap.min.js"></script>
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

      $(document).ready(function(){
        $('ul.treeview-menu > li.active').parent().parent().addClass('active');

        console.log($('ul.treeview-menu:not(:has("li"))').parent().hide());
      });
    </script>
    @yield('footer')
  </body>
</html>
