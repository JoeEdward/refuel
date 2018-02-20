@extends('layouts.app')

@section('content')
<br>

@foreach(auth()->user()->orders as $order)
	
	@if(date('d', strtotime($order->created_at)) == date('d'))
		
		@if($order == null)	

		<h1 class="title">You have no orders.</h1>

		@else

		<h1 class="title">Order</h1>

		<p class="subtitle" style="color: green"> Current Total: £{{ $order->price }} </p>



		@foreach($order->orderItems as $item)

			@if(date('d', strtotime($item->created_at)) == date('d'))

			<div class="panel panel-default">
				<div class="panel-heading">
					<div class="row">
					<div class="col-md-6">
					<h1 class="title">{{ $item->item->name }}</h1>
				</div>
				<div class="col-md-6">

					<a href="/cart/{{$item->id}}"><button style="float: right;" class="btn btn-danger">Remove From Cart</button></a>
				</div>
			</div>

				</div>
				<div class="panel-body">

					<p class="sub-heading">£{{ $item->item->price }}</p>

				</div>
			</div>

			@endif

		@endforeach
		@endif
	@endif

	<a href="/cart/placeOrder/{{$order->id}}"><button class="btn btn-success col-md-12">Place Order</button></a>
@endforeach


@endsection