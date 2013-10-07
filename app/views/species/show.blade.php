@extends('layouts.taxonomy')

@section('main')

<h1>Show Species</h1>

<p>{{ link_to_route('species.index', 'Return to all species') }}</p>

<table class="table table-stripped table-bordered">
	<thead>
		<tr>
			<th>Name</th>
			<th>Genre</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $species->name }}}</td>
			<td>{{{ $species->genre->name }}}</td>
			<td>{{ link_to_route('species.edit', 'Edit', array($species->id), array('class' => 'btn btn-info')) }}</td>
			<td>
				{{ Form::open(array('method' => 'DELETE', 'route' => array('species.destroy', $species->id)))}}
				{{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
				{{ Form::close() }}
			</td>
		</tr>
	</tbody>
</table>

@stop