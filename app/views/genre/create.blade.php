@extends('layouts.taxonomy')

@section('main')

<h1>Create Genres</h1>

{{ Form::open(array('route' => 'genre.store')) }}
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
			{{ Form::submit('Submit', array('class' => 'btn btn-info')) }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop