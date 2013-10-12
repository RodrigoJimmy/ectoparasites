@extends('layouts.scaffold')

@section('main')

<h1> All Searches </h1>

<p>{{ link_to_route('search.create', 'Add new search') }}</p>

@if ($searches->count())
	<table class="table table-stripped table-bordered">
		<thead>
			<tr>
				<th>Response Code</th>
				<th>Parsed</th>
				<th>Species</th>
				<th>Created at</th>
				<th>Updated at</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($searches as $search)
				<tr>
					<td>{{{ $search->response_code }}}</td>
					<td>{{{ $search->parsed }}}</td>
					<td>{{{ $search->species->name }}}</td>
					<td>{{{ $search->created_at }}}</td>
					<td>{{{ $search->updated_at }}}</td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no searches
@endif
@stop