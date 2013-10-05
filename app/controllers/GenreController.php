<?php

class GenreController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$genres = Genre::all();

		return View::make('genre.index', compact('genres'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$subfamilies = Subfamily::lists('name', 'id');

		return View::make('genre.create')
			->with('subfamilies', $subfamilies);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Genre::$rules);

		if ($validation->passes())
		{
			Genre::create($input);

			return Redirect::route('genre.index');
		}

		return Redirect::route('genre.create')
			->withInput()
			->withErrors($validation)
			->with('message', 'There were validation errors.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$genre = Genre::findOrFail($id);

		return View::make('genre.show', compact('genre'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$genre = Genre::find($id);
		$subfamilies = Subfamily::lists('name', 'id');

		if (is_null($genre))
		{
			return Redirect::route('genre.index');
		}

		return View::make('genre.edit', compact('genre'))
			->with('subfamilies', $subfamilies);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$input = array_except(Input::all(), '_method');
		$validation = Validator::make($input, Genre::$rules);

		if ($validation->passes())
		{
			$genre = Genre::find($id);
			$genre->update($input);

			return Redirect::route('genre.show', $id);
		}

			return Redirect::route('genre.edit', $id)
				->withInput()
				->withErrors($validation)
				->with('message', 'There were validation errors.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Genre::find($id)->delete();

		return Redirect::route('genre.index');
	}

}