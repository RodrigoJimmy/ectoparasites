@extends('layouts.taxonomy')

@section('main')

<h1>Edit Order</h1>

{{ Form::model($order, array('method' => 'PATCH', 'route' => array('order.update', $order->id))) }}
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
			{{ Form::submit('Update', array('class' => 'btn btn-info')) }}
			{{ link_to_route('order.show', 'Cancel', $order->id, array('class' => 'btn')) }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop