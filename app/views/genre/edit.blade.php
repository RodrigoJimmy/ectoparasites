@extends('layouts.scaffold')

@section('main')

<h1>Edit Genre</h1>

{{ Form::model($genre, array('method' => 'PATCH', 'route' => array('genre.update', $genre->id))) }}
	<ul>
		<li>
			{{ Form::label('name', 'Name:') }}
			{{ Form::text('name') }}
		</li>

		<li>
			{{ Form::label('subfamily_id', 'Subamily:') }}
			{{ Form::select('subfamily_id', $subfamilies)}}
		</li>

		<li>
			{{ Form::submit('Update', array('class' => 'btn btn-info')) }}
			{{ link_to_route('genre.show', 'Cancel', $genre->id, array('class' => 'btn')) }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop