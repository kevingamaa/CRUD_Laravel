<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	  <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<title> PRMC - @yield('title')</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">

</head>

<body class="p-5">
	<div class="container-fluid">
		<div class="row-fluid">
			@component('component.component_navbar',["current" => $current ])
			@endcomponent

			<main role="main">
				@hasSection('body')
					@yield('body')
				@endif
			</main>
		</div>
	</div>
	<script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
</body>
</html>