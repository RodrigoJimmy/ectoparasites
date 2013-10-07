@extends('layouts.taxonomy')

@section('main')

<h1>Create Family</h1>

{{ Form::open(array('route' => 'family.store')) }}
	<ul>
		<li>
			{{ Form::label('name', 'Name:') }}
			{{ Form::text('name') }}
		</li>

		<li>
			{{ Form::label('year', 'Year:') }}
			{{ Form::text('year') }}
		</li>

		<li>
			{{ Form::label('order_id', 'Order:') }}
			{{ Form::select('order_id', $orders)}}
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