<!DOCTYPE html>
<html>
<head>
	<title>Refuel</title>
	@yield('header')

	<link rel="stylesheet" type="text/css" href="css/app.css">
	<script type="text/javascript" src="js/app.js"></script>


</head>
<body>



	@include('partials.navbar')

	<br><br>

<div class="col-md-8 col-md-offset-2">
	<div class="container-fluid">

		@yield('content')
	
	</div>
</div>

<div class="row"></div>


	@include('partials.footer')

	@yield('footer')
</body>
</html>