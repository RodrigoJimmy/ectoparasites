@extends('layouts.taxonomy')

@section('main')

<h1>All Species</h1>

<p>{{ link_to_route('species.create', 'Add new species') }}</p>

@if ($species->count())
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Name</th>
				<th>Genre</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($species as $specie)
				<tr>
					<td>{{{ $specie->name }}}
					<td>{{{ $specie->genre->name }}}
					<td>{{ link_to_route('species.edit', 'Edit', array($specie->id), array('class' => 'btn btn-info')) }}</td>
					<td> 
						{{ Form::open(array('method' => 'DELETE', 'route' => array('species.destroy', $specie->id))) }}
						{{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
						{{ Form::close() }}
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no species
@endif

@stop