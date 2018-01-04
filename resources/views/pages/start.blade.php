@extends('layouts.app')

@section('title', 'Welcome')

@section('content')

<div class="page-header">
	<h1 class="title center">Welcome to Refuel Ordering <br><small>An online system to get the food you want when you want it</small></h1>
</div>
<div class="row">
	<div class="col-md-6">
		
		<h3 class="center title">Very Imformative Stuff about the website before signing up!</h3>
		<p class="subtitle">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>

	</div>


	<div class="col-md-6">

		<h3 class="center aleo">Register an intrest</h3>
		<form class="center"> <!-- Open Form-->

			<!-- First row of quote form-->
			<div class="row">
				<div class="col-md-6">
					<div class="input-group center">
						<label for="fullName">Name</label>
						<input type="text" class="form-control" name="fullName" placeholder="Full name" required>
					</div>
				</div>

				<div class="col-md-6">

					<div class="input-group center">
						<label for="fullName">Email</label>
						<input type="email" class="form-control" name="fullName" placeholder="Email" required="true">
					</div>
				</div>
			</div><!-- End Row-->

			<br>
			<div class="row">

				<div class="col-md-12">
					<div class="input-group center">
						<label for="instName">Institution Name</label>
						<input type="text" name="instName" class="form-control" placeholder="Institution">
					</div>
				</div>

			</div>

			<br>

			<div class="row">

				<div class="col-md-6">
					<label for="refer">How did you hear about us?</label>

				</div>

				<div class="col-md-6">
					<select name="refer" class="form-control center">
						<option value="InsM">Institution Manager</option>
						<option value="Web">Web Ad</option>
						<option value="expo">Expo</option>
						<option value="other">Other</option>

					</select>


				</div>

			</div>

			<br>

			<div class="row">
				<div class="col-md-6 col-md-offset-3">
					<div class="btn-group center">
						<button class="form-control btn btn-primary" type="submit">Get a Quote!</button>
					</div>
				</div>
				
			</div>
		</form><!-- Close Form -->
	</div>

</div>

<br><br>

<div class="row">

	<div class="col-md-4">
		<div class="panel panel-default">
			<div class="panel-body">
				<h3>Screenshot 1</h3>
				<img src="http://via.placeholder.com/300x200">
			</div>
		</div>
	</div>
		<div class="col-md-4">
		<div class="panel panel-default">
			<div class="panel-body">
				<h3>Screenshot 2</h3>
				<img src="http://via.placeholder.com/300x200">
			</div>
		</div>
	</div>
		<div class="col-md-4">
		<div class="panel panel-default">
			<div class="panel-body">
				<h3>Screenshot 3</h3>
				<img src="http://via.placeholder.com/300x200">
			</div>
		</div>
	</div>

</div>



@endsection