@extends('layouts.taxonomy')

@section('main')

<h1>Edit Phylum</h1>

{{ Form::model($phylum, array('method' => 'PATCH', 'route' => array('phylum.update', $phylum->id))) }}
	<ul>
		<li>
			{{ Form::label('name', 'Name:') }}
			{{ Form::text('name') }}
		</li>

		<li>
			{{ Form::submit('Update', array('class' => 'btn btn-info')) }}
			{{ link_to_route('phylum.show', 'Cancel', $phylum->id, array('class' => 'btn')) }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop