<!doctype html>
<html lang="en">
 
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title')</title>
    <!-- css -->
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/vendor/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/libs/css/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/vendor/fonts/circular-std/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/vendor/fonts/fontawesome/css/fontawesome-all.css')}}">
    <!-- Toastr -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <!-- /toastr -->
    <!-- /css -->
</head>
<body>
	<div class="dashboard-main-wrapper">
		<!-- navbar -->
		@include('layouts.includes._navbar')
		<!-- /navbar -->
		<!-- sidebar -->
		@include('layouts.includes._sidebar')
		<!-- /sidebar -->
		<!-- dashboard -->
		@yield('content')
		<!-- /dashboard -->
	</div>
	<!-- Java Script -->
	<!-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> -->
	<script src="{{asset('frontend/vendor/jquery/jquery-3.3.1.min.js')}}"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
	<script src="{{asset('sweetalert/sweetalert.min.js')}}"></script>
	<!-- Alert -->
	<script>
		@if(Session::has('sukses'))
			toastr.success("{{Session::get('sukses')}}", 'Selamat')
		@endif
	</script>
	<!-- /alert -->
	<!-- Logout -->
	<script type="text/javascript">
		$('.keluar').click(function(){
			swal({
				  title: "Yakin!",
				  text: "Ingin Keluar?",
				  icon: "info",
				  buttons: true,
				  dangerMode: true,
				})
				.then((willDelete) => {
				  if (willDelete) {
				  	window.location = "/logout";
				  }
				});
		});
	</script>
	<!-- /logout -->
	<!-- /javascript -->
	@yield('footer')
</body>
</html>