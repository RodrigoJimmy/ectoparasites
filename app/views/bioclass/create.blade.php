@extends('layouts.scaffold')

@section('main')

<h1>Create Class</h1>

{{ Form::open(array('route' => 'class.store')) }}
	<ul>
		<li>
			{{ Form::label('name', 'Name:') }}
			{{ Form::text('name') }}
		</li>

		<li>
			{{ Form::label('phylum_id', 'Phylum:') }}
			{{ Form::select('phylum_id', $phylums)}}
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