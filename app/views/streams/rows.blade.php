<table class="table table-striped">
	<thead>
		<tr>
			<td>ID</td>
			<td>S3 Name</td>
			<td>Original name</td>
			<td>Filesize</td>
			<td>User</td>
			<td></td>
		</tr>
	</thead>
	<tbody>
		@if(count($streams) === 0)
		<tr><td colspan="6">No streams to display.</td></tr>
		@else

		@foreach($streams as $stream)
			@include('streams.row', ['stream' => $stream])
		@endforeach

		@endif
	</tbody>
</table>