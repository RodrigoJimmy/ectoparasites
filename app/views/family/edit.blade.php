@extends('layouts.taxonomy')

@section('main')

<h1>Edit Family</h1>

{{ Form::model($family, array('method' => 'PATCH', 'route' => array('family.update', $family->id))) }}
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
			{{ Form::submit('Update', array('class' => 'btn btn-info')) }}
			{{ link_to_route('family.show', 'Cancel', $family->id, array('class' => 'btn')) }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop