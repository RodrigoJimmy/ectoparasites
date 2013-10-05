@extends('layouts.scaffold')

@section('main')

<h1>Edit Species</h1>

{{ Form::model($species, array('method' => 'PATCH', 'route' => array('species.update', $species->id))) }}
	<ul>
		<li>
			{{ Form::label('name', 'Name:') }}
			{{ Form::text('name') }}
		</li>

		<li>
			{{ Form::label('genre_id', 'Genre:') }}
			{{ Form::select('genre_id', $genres)}}
		</li>

		<li>
			{{ Form::submit('Update', array('class' => 'btn btn-info')) }}
			{{ link_to_route('species.show', 'Cancel', $species->id, array('class' => 'btn')) }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop