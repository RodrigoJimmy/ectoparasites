@extends('layouts.scaffold')

@section('main')

<h1>Show Phylum</h1>

<p>{{ link_to_route('phylum.index', 'Return to all phylums') }}</p>

<table class="table table-stripped table-bordered">
	<thead>
		<tr>
			<th>Name</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $phylum->name }}}</td>
			<td>{{ link_to_route('phylum.edit', 'Edit', array($phylum->id), array('class' => 'btn btn-info')) }}</td>
			<td>
				{{ Form::open(array('method' => 'DELETE', 'route' => array('phylum.destroy', $phylum->id)))}}
				{{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
				{{ Form::close() }}
			</td>
		</tr>
	</tbody>
</table>

@stop