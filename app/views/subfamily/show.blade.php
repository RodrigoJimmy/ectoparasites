@extends('layouts.scaffold')

@section('main')

<h1>Show Subfamily</h1>

<p>{{ link_to_route('subfamily.index', 'Return to all subfamilies') }}</p>

<table class="table table-stripped table-bordered">
	<thead>
		<tr>
			<th>Name</th>
			<th>Family</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $subfamily->name }}}</td>
			<td>{{{ $subfamily->family->name }}}</td>
			<td>{{ link_to_route('subfamily.edit', 'Edit', array($subfamily->id), array('class' => 'btn btn-info')) }}</td>
			<td>
				{{ Form::open(array('method' => 'DELETE', 'route' => array('subfamily.destroy', $subfamily->id)))}}
				{{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
				{{ Form::close() }}
			</td>
		</tr>
	</tbody>
</table>

@stop