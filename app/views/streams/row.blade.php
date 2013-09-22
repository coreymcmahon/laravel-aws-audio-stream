<tr>
	<td>{{ $stream->id }}</td>
	<td>{{ $stream->name }}</td>
	<td>{{ $stream->original_name }}</td>
	<td>{{ $stream->filesize }}</td>
	<td>{{ User::find($stream->user_id)->email }}</td>
	<td><a href="/streams/{{ $stream->id }}/play">Play</a></td>
</tr>