@extends('layouts.scaffold')

@section('main')

<h1>All Families</h1>

<p>{{ link_to_route('family.create', 'Add new family') }}</p>

@if ($families->count())
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Name</th>
				<th>Order</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($families as $family)
				<tr>
					<td>{{{ $family->name }}}
					<td>{{{ $family->order->name }}}
					<td>{{ link_to_route('family.edit', 'Edit', array($family->id), array('class' => 'btn btn-info')) }}</td>
					<td> 
						{{ Form::open(array('method' => 'DELETE', 'route' => array('family.destroy', $family->id))) }}
						{{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
						{{ Form::close() }}
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no families
@endif

@stop