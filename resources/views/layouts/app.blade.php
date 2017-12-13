<!DOCTYPE html>
<html>
<head>
	<title>Refuel</title>
	@yield('header')

	<link rel="stylesheet" type="text/css" href="css/app.css">

</head>
<body>

	<div class="navbar">
		
		<div class="navbar-brand container-fluid">
			
			<h3 class="center" id="logo">Refuel</h3>
			<p class="center" id="logo-sub">Ordering Sytem</p>

		</div>
		<ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#">Disabled</a>
      </li>
    </ul>

	</div>

	@yield('content')


	@yield('footer')
</body>
</html>