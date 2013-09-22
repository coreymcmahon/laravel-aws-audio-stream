@extends('base')

@section('content')

	@if(Session::has('success_message'))
	<div class="text-success">{{ Session::get('success_message') }}</div>
	@endif

	@if(Session::has('error_message'))
	<div class="text-danger">{{ Session::get('error_message') }}</div>
	@endif
	
	@include('streams.rows', ['streams' => $streams])

	<a href="{{ URL::action('StreamsController@create') }}">Add Stream</a>

@stop