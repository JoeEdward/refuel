@extends('layouts.app')

@section('title', 'Item')

@section('content')
<br>

<div class="panel panel-defualt">
	<div class="panel-body">
		<div class="row">
			<div class="col-md-5">
				<h3>{{$item->name}}</h3>
				<p><strong>Item Description:</strong></p>
				<p>{{$item->description}}</p>
				<p><strong>Price: </strong></p>
				<p>£{{$item->price}}</p>
				@if (auth()->user()->type == "student")
				
				<p><strong>Allergies:</strong></p>
				<p>{{$item->allergies}}</p>
				
				@else

				<p><strong>Item type:</strong></p>
				<p>{{$item->type}}</p>

				@endif
			</div>
			<div class="col-md-5">
				<img src="{{ Storage::url($item->img)}} " class="img-rounded" style="width: 90%; height: auto">
			</div>
			<div class="col-md-2">

				@if(auth()->user()->type == 'staff')<!--Hide Edit and delete buttons from Students-->

					<a href="/item/{{$item->id}}/edit"><button class="btn btn-primary">Edit</button></a>
					<button class="btn btn-danger" onclick="remove()">Delete</button>

				@endif

			</div>
		</div>
		<a href="/cart/additem/{{$item->id}}"><button class="btn btn-success col-md-12">Add to cart</button></a>
	</div>
</div>

<div class="panel panel-defualt">
	<div class="panel-body">
		<div class="col-md-10">
			<h3>Extras</h3>
		</div>
		<div class="col-md-2">
			@if(auth()->user()->type == 'staff')
			<a href="#"><button class="btn btn-primary">Edit</button></a>
			@endif
		</div>
	</div>
</div>
@endsection

@section('footer')
<script type="text/javascript">

	function remove() {
		if(confirm('Are You Sure You Want To Delete {{$item->name}}?')) {
			window.location.replace('/item/{{$item->id}}/delete');
		}
	}
</script>
@endsection