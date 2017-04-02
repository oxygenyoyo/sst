<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>SST Email</title>
    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
	
	<style>
	body {
		background: #f2f2f2;
	}
	.bg-white {
		background: white;
	}
	</style>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3 text-center">
				LOGO
			</div>
		</div>
		<div class="row">
			@yield('content')
		</div>
		<!-- /.row -->
	</div>
	<!-- Scripts -->
    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>