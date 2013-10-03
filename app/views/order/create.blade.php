@extends('layouts.scaffold')

@section('main')

<h1>Create Order</h1>

{{ Form::open(array('route' => 'order.store')) }}
	<ul>
		<li>
			{{ Form::label('name', 'Name:') }}
			{{ Form::text('name') }}
		</li>

		<li>
			{{ Form::label('class_id', 'Class:') }}
			{{ Form::select('class_id', $bioclasses)}}
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