<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('hello');
});

Route::resource('phylum', 'PhylumController');
Route::resource('class', 'BioclassController');
Route::resource('order', 'OrderController');
Route::resource('family', 'FamilyController');
Route::resource('subfamily', 'SubfamilyController');
Route::resource('genre', 'GenreController');
Route::resource('species', 'SpeciesController');
Route::resource('search', 'SearchController');
Route::get('taxonomy', function() {
	return Redirect::route('phylum.index');
});