@extends('layouts.app')

@section('title', 'Menu/Manage')

@section('content')

<br>
<br>

<div class="row">

	@foreach($items as $item)

@include('partials.item')

	@endforeach

	<div class="col-md-4">
		<div class="panel panel-defualt">
			<div class="panel-body">
				<div class="col-md-12" style="height: 250px">
<a href="dashboard/additem"><button class="centerVert btn btn-success" style="font-size: 35px"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></button></a>
</div>
</div></div>
</div>
</div>

@endsection