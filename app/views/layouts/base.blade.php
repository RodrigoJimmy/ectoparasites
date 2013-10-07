<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<link href="/packages/bootstrap/css/bootstrap.css" rel="stylesheet" media="screen">
		<style>
			table form { margin-bottom: 0; }
			form ul { margin-left: 0; list-style: none; }
			.error { color: red; font-style: italic; }
			body { padding-top: 20px; }
		</style>
	</head>

	<body>
		
		<div class="container">
			@yield('header')
			
			@if (Session::has('message'))
				<div class="flash alert">
					<p>{{ Session::get('message') }}</p>
				</div>
			@endif

			@yield('main')
			@yield('footer')
		</div>

		<script src="/packages/jquery/jquery-2.0.3.min.js"></script>
    	<script src="/packages/bootstrap/js/bootstrap.min.js"></script>
	</body>

</html>