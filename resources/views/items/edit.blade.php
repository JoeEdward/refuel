@extends('layouts.app')

@section('title', 'Update')

@section('content')

<h3 class="center">Update An Item</h3>

@include('partials.errors')
	
	<form action="/item/{{$item->id}}/update" method="POST" enctype="multipart/form-data"> 

		{{ csrf_field() }}


	<div class="input-group col-md-6 col-md-offset-3"><br>
		<label for="name">Name</label>
		<input class="form-control" id="name" name="name" type="text">
	</div>

		<div class="input-group col-md-6 col-md-offset-3"><br>
		<label for="desc">Description</label>
		<textarea class="form-control" id="desc" name="desc" type="text"></textarea>
	</div>

		<div class="input-group col-md-6 col-md-offset-3"><br>
		<label for="type">Type</label>
		<select name="type" id="type" class="form-control">
			<option>Pizza</option>
			<option>Test</option>
		</select>
	</div>

		<div class="input-group col-md-6 col-md-offset-3"><br>
		<label for="cal">Average Calorie Count</label>
		<input class="form-control" id="cal" name="cal" type="number">
	</div>

		<div class="input-group col-md-6 col-md-offset-3"><br>
		<label for="image">Image</label>
		<input class="form-control" id="image" name="image" type="file">
	</div><br>
	<div class="input-group col-md-6 col-md-offset-3">
	<label for="img">Current Image</label><br>
	<img src="{{Storage::url($item->img)}}" style="width: 100%; height: auto">
</div>
	<br>
	<button type="submit" class="btn btn-success col-md-6 col-md-offset-3">Update</button>
	</form>

@endsection

@section('footer')
	<script>
		
		$(document).ready(function() {    
    	$("#name").val("{{$item->name}}"); 
    	$("#desc").val("{{$item->description}}"); 
    	$("#type").val("{{$item->type}}");
    	$("#cal").val("{{$item->cal}}");
});

	</script>
@endsection