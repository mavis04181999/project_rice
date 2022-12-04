<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">

	<title>{{ config('app.name', 'Rice Stress Prone Areas Information Hub') }}</title>

	<!-- Fonts -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

	<!-- Styles -->
	<link rel="stylesheet" href="{{ asset('css/app.css') }}">

	<!-- Scripts -->
	<script src="{{ asset('js/app.js') }}" defer></script>


	{{-- <script src="{{ asset('DataTables/DataTables-1.12.1/js/dataTables.bootstrap5.js') }}" ></script> --}}

	{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.js" integrity="sha512-CX7sDOp7UTAq+i1FYIlf9Uo27x4os+kGeoT7rgwvY+4dmjqV0IuE/Bl5hVsjnQPQiTOhAX1O2r2j5bjsFBvv/A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}

	{{-- <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script> --}}

	@yield('scripts')

</head>
<body class="font-sans antialiased">

	<div id="preloader"></div>

	@include('layouts.navigation')

	{{ $slot }}

	<section id="footer">
		<footer class="text-center bg-gray-50 mt-8 py-4 text-sm">
			<span>&copy;</span> 2022 Department of Agriculture Regional Office 5, All rights reserved
		</footer>
	</section>
	
</body>
</html>

<script>
	var loader = document.getElementById('preloader');

	window.onload = function ()
	{
		loader.style.display = "none";
	}

</script>