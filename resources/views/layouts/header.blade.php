<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<title>Jobs Art</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="A responsive website template made exclusively by jobsart">
	<meta name="author" content="jobsart">
	
	<!-- FAVICON -->
	<link rel="shortcut icon" href="{{ asset('assets/themes/jobsart/favicons/favicon.ico')}}">
	<meta name="msapplication-config" content="{{ asset('assets/themes/jobsart/favicons/browserconfig.xml')}}">

	<!-- CSS -->
	<link rel="stylesheet" href="{{ asset('assets/themes/jobsart/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{ asset('assets/themes/jobsart/css/font-awesome.min.css')}}">
	<link rel="stylesheet" href="{{ asset('assets/themes/jobsart/css/animate.min.css')}}">
	<link rel="stylesheet" href="{{ asset('assets/themes/jobsart/css/responsive.css')}}">
	<link rel="stylesheet" href="{{ asset('assets/themes/jobsart/css/lightbox.css')}}">
	<link rel="stylesheet" href="{{ asset('assets/themes/jobsart/css/main.css')}}">

	<!--[if lt IE 9]>
	<script src="{{ asset('assets/themes/jobsart/js/html5shiv.js') }}"></script>
	<script src="{{ asset('assets/themes/jobsart/js/respond.min.js') }}"></script>
	<![endif]-->
	
	<!-- Header scripts -->
	<script src="{{ asset('assets/themes/jobsart/js/modernizr-2.8.3.min.js') }}"></script>
	<script src="{{ asset('assets/themes/jobsart/js/queryloader2.min.js') }}"></script>

	<!-- =========================
	   Preloader
	============================== -->
	<script>
	    window.addEventListener('DOMContentLoaded', function() {
	        "use strict";
	        new QueryLoader2(document.querySelector("body"), {
	            barColor: "#e64e3e",
	            backgroundColor: "#fff",
	            percentage: true,
	            barHeight: 1,
	            minimumTime: 200,
	            fadeOutTime: 1000
	        });
	    });
	</script>
</head> <!-- head -->