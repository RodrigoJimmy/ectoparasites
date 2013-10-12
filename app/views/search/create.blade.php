@extends('layouts.scaffold')

@section('main')

<h1>Create Search</h1>

{{ Form::open(array('route' => 'search.store')) }}
	<ul>
		<li>
			{{ Form::label('species_id[]', 'Species:') }}
			{{ Form::select('species_id[]', $species, array(), array('multiple' => 'multiple', 'size' => 10)) }}
		</li>

		<li>
			{{ Form::submit('Submit', array('class' => 'btn btn-info')) }}
		</li>
	</ul>
{{ Form::close() }}

@stop