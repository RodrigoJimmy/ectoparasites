@extends('layouts.scaffold')

@section('header')
	@parent
	<ul class="nav nav-tabs">
	  <li class="{{ Request::segment(1) == 'phylum' ? 'active' : '' }}"><a href="/phylum">Phylum</a></li>
	  <li class="{{ Request::segment(1) == 'class' ? 'active' : '' }}"><a href="/class">Class</a></li>
	  <li class="{{ Request::segment(1) == 'order' ? 'active' : '' }}"><a href="/order">Order</a></li>
	  <li class="{{ Request::segment(1) == 'family' ? 'active' : '' }}"><a href="/family">Family</a></li>
	  <li class="{{ Request::segment(1) == 'subfamily' ? 'active' : '' }}"><a href="/subfamily">Subfamily</a></li>
	  <li class="{{ Request::segment(1) == 'genre' ? 'active' : '' }}"><a href="/genre">Genre</a></li>
	  <li class="{{ Request::segment(1) == 'species' ? 'active' : '' }}"><a href="/species">Species</a></li>
	</ul>
@stop