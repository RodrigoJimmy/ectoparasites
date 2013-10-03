@extends('layouts.scaffold')

@section('main')

<h1>Show Order</h1>

<p>{{ link_to_route('order.index', 'Return to all orders') }}</p>

<table class="table table-stripped table-bordered">
	<thead>
		<tr>
			<th>Name</th>
			<th>Class</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $order->name }}}</td>
			<td>{{{ $order->bioclass->name }}}</td>
			<td>{{ link_to_route('order.edit', 'Edit', array($order->id), array('class' => 'btn btn-info')) }}</td>
			<td>
				{{ Form::open(array('method' => 'DELETE', 'route' => array('order.destroy', $order->id)))}}
				{{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
				{{ Form::close() }}
			</td>
		</tr>
	</tbody>
</table>

@stop