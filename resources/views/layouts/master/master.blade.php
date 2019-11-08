<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- favicon
	============================================ -->		
	<link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">		
	<!-- Google Fonts
	============================================ -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&display=swap&subset=vietnamese" rel="stylesheet">
	<!-- Bootstrap CSS
	============================================ -->		
	<!-- <link rel="stylesheet" href="/vendor/laravel-admin/AdminLTE/bootstrap/css/bootstrap.min.css"> -->
	<link rel="stylesheet" href="/assets/themes/gid/css/bootstrap.min.css">
	<!-- Font Awesome CSS
	============================================ -->
	<link rel="stylesheet" href="/assets/themes/gid/css/font-awesome.min.css">
	<!-- Stroke 7 Icon CSS
	============================================ -->
	<link rel="stylesheet" href="/assets/themes/gid/css/pe-icon-7-stroke.css">
	<!-- owl.carousel CSS
	============================================ -->
	<link rel="stylesheet" href="/assets/themes/gid/css/owl.carousel.css">
	<link rel="stylesheet" href="/assets/themes/gid/css/owl.theme.css">
	<link rel="stylesheet" href="/assets/themes/gid/css/owl.transitions.css">
	<!-- nivo slider CSS
	============================================ -->
	<link rel="stylesheet" href="/assets/themes/gid/lib/css/nivo-slider.css" type="text/css" />
	<link rel="stylesheet" href="/assets/themes/gid/lib/css/preview.css" type="text/css" media="screen" />
	<!-- animate CSS
	============================================ -->
	<link rel="stylesheet" href="/assets/themes/gid/css/animate.css">
	<!-- preview CSS
	============================================ -->
	<link rel="stylesheet" href="/assets/themes/gid/css/preview.css">
	<!-- Venobox CSS
	============================================ -->	
	<link rel="stylesheet" href="/assets/themes/gid/css/venobox.css" media="screen" />
	<!-- style CSS
	============================================ -->
	<link rel="stylesheet" href="/assets/themes/gid/css/style.css">
	<!-- responsive CSS
	============================================ -->
	<link rel="stylesheet" href="/assets/themes/gid/css/responsive.css">
	<link rel="stylesheet" href="/vendor/laravel-admin/sweetalert2/dist/sweetalert2.css">
	
	<!-- modernizr JS
	============================================ -->		
	<script src="/assets/themes/gid/js/modernizr-2.8.3.min.js"></script>
	@yield('css')
	
	
</head>
<body>
    @include('layouts.master.header')
    @yield('content')
    @include('layouts.master.footer')
	<!-- jquery
	============================================ -->		
	<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
	<!-- bootstrap JS
	============================================ -->		
	<script src="/assets/themes/gid/js/bootstrap.bundle.min.js"></script>
	<!-- wow JS
	============================================ -->		
	<script src="/assets/themes/gid/js/wow.min.js"></script>
	<!-- price-slider JS
	============================================ -->		
	<script src="/assets/themes/gid/js/jquery-price-slider.js"></script>	
	<!-- jquery Venobox js
	============================================ -->
	<script src="/assets/themes/gid/js/venobox.js"></script>
	<!-- meanmenu JS
	============================================ -->		
	<script src="/assets/themes/gid/js/jquery.meanmenu.js"></script>
	<!-- countdown JS
	============================================ -->		
	<script src="/assets/themes/gid/js/jquery.countdown.min.js"></script>
	<!-- owl.carousel JS
	============================================ -->		
	<script src="/assets/themes/gid/js/owl.carousel.min.js"></script>	
	<!-- Nivo slider js
	============================================ --> 		
	<script src="/assets/themes/gid/lib/js/jquery.nivo.slider.js" ></script>
	<script src="/assets/themes/gid/lib/home.js" ></script>
	<!-- scrollUp JS
	============================================ -->		
	<script src="/assets/themes/gid/js/jquery.scrollUp.min.js"></script>
	<!-- plugins JS
	============================================ -->		
	<script src="/assets/themes/gid/js/plugins.js"></script>
	<script src="/vendor/laravel-admin/sweetalert2/dist/sweetalert2.min.js"></script>
	<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
	<!-- main JS
	============================================ -->		
	<script src="/js/helper.js"></script>
	<script src="/assets/themes/gid/js/main.js"></script>
	@yield('js')
</body>
</html>
