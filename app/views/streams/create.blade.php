@extends('base')


@section('content')

<h2>Upload</h2>
<div>

{{ Form::open(['files' => true, 'method' => 'POST', 'url' => '/streams']) }}
	<div class="form-group">
		{{ Form::label('file', 'Select a file:') }}
		{{ Form::file('file', ['class' => '']) }}
	</div>
	{{ Form::submit('Upload', ['class' => 'btn btn-primary']) }}
{{ Form::close() }}
</div>

@stop