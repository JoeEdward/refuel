@extends('layouts.app')

@section('title', 'Add Item')

@section('content')

<br>

<div class="col-md-8 col-md-offset-2">



	<h2>Add An Item</h2>

	@include('partials.errors')

	<form method="POST" action="/dashboard/additem" enctype="multipart/form-data">

		{{ csrf_field() }}

		<label for="name">Item Name*</label>
		<div class="input-group center">
			<input type="text" name="name" class="form-control" required><br>

		</div>

		<br><br>

		<label for="type">Item Type*</label>
		<div class="input-group center">


			<select name="type" class="form-control">

				<option>Pizza</option>

			</select><br>


		</div>
		<a href="/dashboard/manage">Add More Items Here</a>
		<br><br>

		<label for="desc">Item Description*</label>
		<div class="input-group center">

			<textarea type="text" name="desc" class="form-control"></textarea>

		</div>

		<label for="cal">Average Calorie Count</label>
		<div class="input-group center">

			<input type="number" name="cal" class="form-control">

		</div>

		<label for="price">Price* </label>
		<div class="input-group center">
			<input type="text" name="price" class="form-control">
		</div>

		<label for="allergies">Dietry Issues:</label>
		<div class="input-group center">

			<div class="row">
				<div class="col-md-3">
					<p class="col-md-6">None:</p><input class="col-md-3" type="checkbox" name="allergies[none]">
				</div>
								<div class="col-md-3">
					<p class="col-md-6">Vegan:</p><input class="col-md-3" type="checkbox" name="allergies[vegan]">
				</div>
								<div class="col-md-3">
					<p class="col-md-8">Vegetarian:</p><input class="col-md-3" type="checkbox" name="allergies[vegi]">
				</div> 
								<div class="col-md-3">
					<p class="col-md-6">Nuts:</p><input class="col-md-3" type="checkbox" name="allergies[nut]">
				</div>

			</div>
		</div>

		<label for="image">Image*</label>
		<div class="input-group center">

			<input type="file" name="image" class="form-control">

		</div>


		<br><br><br>

		<div class="input-group center">

			<button class="btn btn-primary" type="submit">Add</button>

		</div>

	</form>

</div>

@endsection

