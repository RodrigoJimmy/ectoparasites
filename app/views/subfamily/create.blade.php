@extends('layouts.taxonomy')

@section('main')

<h1>Create Subfamily</h1>

{{ Form::open(array('route' => 'subfamily.store')) }}
	<ul>
		<li>
			{{ Form::label('name', 'Name:') }}
			{{ Form::text('name') }}
		</li>

		<li>
			{{ Form::hidden('old_world', 0); }}
			{{ Form::label('old_world', 'Old World:') }}
			{{ Form::checkbox('old_world', '1') }}
		</li>

		<li>
			{{ Form::hidden('new_world', 0); }}
			{{ Form::label('new_world', 'New World:') }}
			{{ Form::checkbox('new_world', '1') }}

		</li>

		<li>
			{{ Form::label('family_id', 'Family:') }}
			{{ Form::select('family_id', $families)}}
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