@extends('base')

@section('content')

<div>
	<h2>Please Log In</h2>
{{ Form::open(['method' => 'POST']) }}
	
	@if(Session::has('message'))
	<div>{{ Session::get('message') }}</div>
	@endif
	
	<div>
		<div>{{ Form::label('email', 'Email') }}</div>
		<div>{{ Form::text('email') }}</div>
	</div>
	<div>
		<div>{{ Form::label('password', 'Password') }}</div>
		<div>{{ Form::password('password') }}</div>
	</div>
	<div>{{ Form::submit() }}</div>
{{ Form::close() }}
</div>

@stop