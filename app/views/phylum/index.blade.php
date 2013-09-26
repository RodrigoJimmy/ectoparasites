@extends('layouts.scaffold')

@section('main')

<h1>All Phylums</h1>

<p>{{ link_to_route('phylum.create', 'Add new phylum') }}</p>

@if ($phylums->count())
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Name</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($phylums as $phylum)
				<tr>
					<td>{{{ $phylum->name }}}
					<td>{{ link_to_route('phylum.edit', 'Edit', array($phylum->id), array('class' => 'btn btn-info')) }}</td>
					<td> 
						{{ Form::open(array('method' => 'DELETE', 'route' => array('phylum.destroy', $phylum->id))) }}
						{{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
						{{ Form::close() }}
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no phylums
@endif

@stop