
@extends('layouts.blank')
	
@section('content')
	<h1 class="col-md-12 title" style="text-align: center;">HTTP ERROR 403: Forbidden</h1>

	<h1 class="col-md-12 title" style="text-align: center;">You don't have access to this page</h1>

	<p class="col-md-12 subtitle" style="text-align: center;">Please log in with an account with higher access rights below</p>

	<div class="col-md-12">
	<a class="col-md-12 center" href="/login"><img class="google-button" src="/img/googlebutton.png" style="text-align: center;"></a>
</div>

@endsection

