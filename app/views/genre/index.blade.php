@extends('layouts.scaffold')

@section('main')

<h1>All Genres</h1>

<p>{{ link_to_route('genre.create', 'Add new genre') }}</p>

@if ($genres->count())
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Name</th>
				<th>Subfamily</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($genres as $genre)
				<tr>
					<td>{{{ $genre->name }}}
					<td>{{{ $genre->subfamily->name }}}
					<td>{{ link_to_route('genre.edit', 'Edit', array($genre->id), array('class' => 'btn btn-info')) }}</td>
					<td> 
						{{ Form::open(array('method' => 'DELETE', 'route' => array('genre.destroy', $genre->id))) }}
						{{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
						{{ Form::close() }}
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no genres
@endif

@stop