@extends('layouts.taxonomy')

@section('main')

<h1>Create Phylum</h1>

{{ Form::open(array('route' => 'phylum.store')) }}
	<ul>
		<li>
			{{ Form::label('name', 'Name:') }}
			{{ Form::text('name') }}
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