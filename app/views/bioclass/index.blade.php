@extends('layouts.scaffold')

@section('main')

<h1>All Classes</h1>

<p>{{ link_to_route('class.create', 'Add new class') }}</p>

@if ($bioclasses->count())
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Name</th>
				<th>Phylum</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($bioclasses as $bioclass)
				<tr>
					<td>{{{ $bioclass->name }}}
					<td>{{{ $bioclass->phylum->name }}}
					<td>{{ link_to_route('class.edit', 'Edit', array($bioclass->id), array('class' => 'btn btn-info')) }}</td>
					<td> 
						{{ Form::open(array('method' => 'DELETE', 'route' => array('class.destroy', $bioclass->id))) }}
						{{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
						{{ Form::close() }}
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no classes
@endif

@stop