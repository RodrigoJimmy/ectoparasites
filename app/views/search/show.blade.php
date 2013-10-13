@extends('layouts.scaffold')

@section('main')

<h1>Show Search</h1>

<h4>Response Code</h4>
{{{ $search->response_code }}}

<h4>Parsed</h4>
{{{ $search->parsed }}}

<h4>Species</h4>
{{{ $search->species->name }}}

<h4>Created at</h4>
{{{ $search->created_at }}}

<h4>Updated at</h4>
{{{ $search->updated_at }}}

<h4>Response</h4>
{{{ $search->esponse }}}
@stop