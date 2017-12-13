@if(Auth::user()->type == 'student')
	<h1>Welcome Student, {{ Auth::user()->name }}</h1>
@else
	<h1>Welcome Staff, {{ Auth::user()->name }} </h1>
	<a href="/logout" class="nav-link">Logout</a>
@endif