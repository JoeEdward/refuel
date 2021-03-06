	<nav class="navbar navbar-default navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" id="logo" href="/">Refuel</a>
			</div>

			@if(Auth::check())
				<ul class="nav navbar-nav navbar-right">
				<li><a href="/logout">Logout <span class="glyphicon glyphicon-log-out"></span></a></li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ auth()->user()->name }} <span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="/dashboard">Dashboard</a></li>
						<li><a href="/cart">Orders</a></li>
						<li><a href="/dashboard/manage">Account</a></li>
						<li><a href="/menu">Menu</a></li>
					</ul>
				</li>
				<li><a href="/cart" id="cart">Cart 

					{{-- @if(count(auth()->user()->orders[0]) == null)
					<span class="label label-success">New!</span>
					@endif --}}
				</a></li>
			@else
			<ul class="nav navbar-nav navbar-right">
				<li><a href="/login">Register</a></li>
				<li><a href="/login">Login</a></li>
			</ul>

			@endif
</ul>
</div>
</nav>