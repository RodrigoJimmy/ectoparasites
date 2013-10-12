@extends('layouts.scaffold')

@section('main')

<h1> All Searches </h1>

<p>{{ link_to_route('search.create', 'Add new search') }}</p>
@stop