@extends('layouts.taxonomy')

@section('main')

<h1>Show Family</h1>

<p>{{ link_to_route('family.index', 'Return to all families') }}</p>

<table class="table table-stripped table-bordered">
	<thead>
		<tr>
			<th>Name</th>
			<th>Order</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $family->name }}}</td>
			<td>{{{ $family->order->name }}}</td>
			<td>{{ link_to_route('family.edit', 'Edit', array($family->id), array('class' => 'btn btn-info')) }}</td>
			<td>
				{{ Form::open(array('method' => 'DELETE', 'route' => array('family.destroy', $family->id)))}}
				{{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
				{{ Form::close() }}
			</td>
		</tr>
	</tbody>
</table>

@stop