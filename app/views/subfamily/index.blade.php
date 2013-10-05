@extends('layouts.scaffold')

@section('main')

<h1>All Subfamilies</h1>

<p>{{ link_to_route('subfamily.create', 'Add new subfamily') }}</p>

@if ($subfamilies->count())
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Name</th>
				<th>Old World</th>
				<th>New World</th>
				<th>Family</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($subfamilies as $subfamily)
				<tr>
					<td>{{{ $subfamily->name }}}
					<td>{{{ $subfamily->old_world }}}
					<td>{{{ $subfamily->new_world }}}
					<td>{{{ $subfamily->family->name }}}
					<td>{{ link_to_route('subfamily.edit', 'Edit', array($subfamily->id), array('class' => 'btn btn-info')) }}</td>
					<td> 
						{{ Form::open(array('method' => 'DELETE', 'route' => array('subfamily.destroy', $subfamily->id))) }}
						{{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
						{{ Form::close() }}
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no subfamilies
@endif

@stop