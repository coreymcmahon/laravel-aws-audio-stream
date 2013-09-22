@extends('base')

@section('content')
	@if(Session::has('message'))
	<div>{{ Session::get('message') }}</div>
	@endif

	
	
@stop