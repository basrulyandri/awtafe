<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('frontend/css')}}/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/css')}}/font-awesome-all.css">
    <link rel="stylesheet" href="{{asset('frontend/css')}}/rollo.css">
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/css')}}/sticky-footer-navbar.css">

    <title>E-LITERATUR</title>
  </head>
  <body>
    <header>
      <div class="collapse bg-info" id="navbarHeader">
        <div class="container">
          <div class="row">
            <div class="col-sm-8 col-md-7 py-4">
              <h4 class="text-white">Tentang Kami</h4>
              <p class="text-white">Adalah situs yang menyediakan literatur-literatur keilmuan Islam dalam bentuk digital yang dari Majelis Ualama Indonesia.</p>
            </div>
            <div class="col-sm-4 offset-md-1 py-4">
              <h4 class="text-white">Kontak</h4>
              <ul class="list-unstyled">
                <li><a href="#" class="text-white"><i class="fa fa-facebook"></i>Instagram</a></li>
                <li><a href="#" class="text-white"><i class="fa fa-facebook"></i>Facebook</a></li>
                <li><a href="#" class="text-white"><i class="fa fa-facebook"></i>Email</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="navbar navbar-dark bg-info shadow-sm">
        <div class="container d-flex justify-content-between">
          <a href="#" class="navbar-brand d-flex align-items-center">           
            <i class="fas fa-book-reader" style="margin-right: 5px;"> </i> <strong>   E-LITERATUR MUI</strong>
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
        </div>
      </div>
    </header>

   @yield('content')

   <footer class="footer">
      <div class="container">
        <span class="text-muted">Copyright @2018 Majelis Ulama Indonesia</span>
      </div>
    </footer>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{asset('frontend/js')}}/jquery.slim.min.js"></script>
    <script type="text/javascript" src="{{asset('frontend/js')}}/bootstrap.min.js"></script>
  </body>
</html>