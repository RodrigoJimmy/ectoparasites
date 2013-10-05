@extends('layouts.scaffold')

@section('main')

<h1>Show Genre</h1>

<p>{{ link_to_route('genre.index', 'Return to all genres') }}</p>

<table class="table table-stripped table-bordered">
	<thead>
		<tr>
			<th>Name</th>
			<th>Subfamily</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $genre->name }}}</td>
			<td>{{{ $genre->subfamily->name }}}</td>
			<td>{{ link_to_route('genre.edit', 'Edit', array($genre->id), array('class' => 'btn btn-info')) }}</td>
			<td>
				{{ Form::open(array('method' => 'DELETE', 'route' => array('genre.destroy', $genre->id)))}}
				{{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
				{{ Form::close() }}
			</td>
		</tr>
	</tbody>
</table>

@stop