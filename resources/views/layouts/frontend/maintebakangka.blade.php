<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>{{siteName()}} {{PTName()}}</title>
	<meta name="description" content="Sekolah Tinggi Agama Islam di Tangerang Banten" />
	<meta name="keywords" content="Sekolah tinggi, agama islam, tangerang" />
	<meta name="author" content="Rollo IT Consultant" />
	<meta property="og:url"           content="{{route('games.tebak.angka')}}" />
	<meta property="og:type"          content="website" />
	<meta property="og:title"         content="Games Tebak Angka Binamadani" />
	<meta property="og:description"   content="Games tebak angka dari sekolah tinggi Agama Islam Binamadani Tangerang" />
	<meta property="og:image"         content="http://yoursmiles.org/msmile/think/m1708.gif" />
	<!-- Favicons (created with http://realfavicongenerator.net/)-->
	<link rel="apple-touch-icon" sizes="57x57" href="img/favicons/apple-touch-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="img/favicons/apple-touch-icon-60x60.png">
	<link rel="icon" type="image/png" href="{!!url('assets-frontend')!!}/img/favicons/favicon-32x32.png" sizes="32x32">
	<link rel="icon" type="image/png" href="{!!url('assets-frontend')!!}/img/favicons/favicon-16x16.png" sizes="16x16">
	<link rel="manifest" href="{!!url('assets-frontend')!!}/img/favicons/manifest.json">
	<link rel="shortcut icon" href="{!!url('assets-frontend')!!}/img/favicons/favicon.ico">
	<meta name="msapplication-TileColor" content="#00a8ff">
	<meta name="msapplication-config" content="{!!url('assets-frontend')!!}/img/favicons/browserconfig.xml">
	<meta name="theme-color" content="#ffffff">
	<!-- Normalize -->
	<link rel="stylesheet" type="text/css" href="{!!url('assets-frontend')!!}/css/normalize.css">
	<!-- Bootstrap -->
	<link rel="stylesheet" type="text/css" href="{!!url('assets-frontend')!!}/css/bootstrap.css">
	<!-- Owl -->
	<link rel="stylesheet" type="text/css" href="{!!url('assets-frontend')!!}/css/owl.css">
	<!-- Animate.css -->
	<link rel="stylesheet" type="text/css" href="{!!url('assets-frontend')!!}/css/animate.css">
	<!-- Font Awesome -->
	<link rel="stylesheet" type="text/css" href="{!!url('assets-frontend')!!}/fonts/font-awesome-4.1.0/css/font-awesome.min.css">
	<!-- Elegant Icons -->
	<link rel="stylesheet" type="text/css" href="{!!url('assets-frontend')!!}/fonts/eleganticons/et-icons.css">
	<!-- Main style -->
	<link rel="stylesheet" type="text/css" href="{!!url('assets-frontend')!!}/css/cardio.css">
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
	@yield('header')
</head>

<body>
	<div class="preloader">
		<img src="{!!url('assets-frontend')!!}/img/loader.gif" alt="Preloader image">
	</div>
	@include('layouts.frontend.navbar')

	
	@yield('content')
	@include('layouts.frontend.footer')
	<!-- Scripts -->

	<script src="{!!url('assets-frontend')!!}/js/jquery-1.11.1.min.js"></script>
	<!-- jQuery UI 1.11.4 -->
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
	<script src="{!!url('assets-frontend')!!}/js/owl.carousel.min.js"></script>
	<script src="{!!url('assets-frontend')!!}/js/bootstrap.min.js"></script>
	<script src="{!!url('assets-frontend')!!}/js/wow.min.js"></script>
	<script src="{!!url('assets-frontend')!!}/js/typewriter.js"></script>
	<script src="{!!url('assets-frontend')!!}/js/jquery.onepagenav.js"></script>
	<script src="{!!url('assets-frontend')!!}/js/main.js"></script>
	@yield('footer')
</body>

</html>
