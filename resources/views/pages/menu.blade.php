@extends('layouts.app')

@section('title', 'Menu/Manage')

@section('content')

<br>
<br>

<div class="row">

	@foreach($items as $item)

	@include('partials.item')

	@endforeach

	@if (auth()->user()->type == 'staff')
	<div class="col-md-4">
		<div class="panel panel-defualt">
			<div class="panel-body">
				<div class="col-md-12" style="height: 250px">

					<a href="dashboard/additem">
						<button class="centerVert btn btn-success" style="font-size: 35px;">
							<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
						</button>
					</a>

				</div>
			</div></div>
		</div>
		@endif
	</div>

	@endsection

	@section('footer')
	<script type="text/javascript">
		var counter = 0;
		function addToCart(id) {
			counter += 1;
			console.log(id);
			document.cookie = "id=" + id + ";";
			location.reload();
			var cart = document.getElementById('cart');
			cart.innerHTML = cart.innerHTML + counter;
		}

	</script>
	@endsection