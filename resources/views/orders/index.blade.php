@extends('layouts.blank')

@section('content')

@foreach($orders as $order)
@if($order->ordered)
<div style="background-color: black;margin-left: 10px" class="col-md-4">

	<p class="subtitle" style="color: white;">{{$order->id}}</p>

	@foreach($order->orderItems as $item)

	<p>{{$item->item->name}}</p>
	<p>{{$item->item->id}}</p>

	@endforeach

	<p>{{$order->user->name}}</p>

	@if($order->completed < 3)

	<div style="background-color: green;">y</div>

	@else

	<div style="background-color: red;">n</div>

	@endif
	
	<a href="/{{$order->id}}/complete"><button class="btn btn-danger">Complete Order</button></a>
</div>

@endif
@endforeach


@endsection