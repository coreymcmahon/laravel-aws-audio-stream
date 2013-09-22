<!doctype html>
<html lang="en">
<head>
	<title>@yield('title', 'AWS Test')</title>
	<link rel="stylesheet" href="{{ asset('/css/bootstrap.css') }}"/>
	<link rel="stylesheet" href="{{ asset('/css/bootstrap-theme.css') }}"/>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="{{ asset('/js/bootstrap.js') }}"></script>
	@section('head-assets')
	@show
</head>
<body>
	
<div class="container">
	@if(Auth::check())
	<nav class="navbar navbar-inverse" role="navigation">
		<ul class="nav nav-pills">
			<li>
				<a href="{{ URL::action('StreamsController@index') }}">Streams</a>
			</li>
			<li class="pull-right">
				<a href="{{ URL::action('AuthController@getLogout') }}">Log out</a>
			</li>
		</ul>
	</nav>
	@endif

	<div id="content">@yield('content')</div>
</div>

<script>
@section('footer-scripts')
@show
</script>
</body>
</html>