<?php

class SpeciesController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$species = Species::all();

		return View::make('species.index', compact('species'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$genres = Genre::lists('name', 'id');

		return View::make('species.create')
			->with('genres', $genres);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Species::$rules);

		if ($validation->passes())
		{
			Species::create($input);

			return Redirect::route('species.index');
		}

		return Redirect::route('species.create')
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
		$species = Species::findOrFail($id);

		return View::make('species.show', compact('species'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$species = Species::find($id);
		$genres = Genre::lists('name', 'id');

		if (is_null($species))
		{
			return Redirect::route('species.index');
		}

		return View::make('species.edit', compact('species'))
				->with('genres', $genres);
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
		$validation = Validator::make($input, Species::$rules);

		if ($validation->passes())
		{
			$species = Species::find($id);
			$species->update($input);

			return Redirect::route('species.show', $id);
		}

		return Redirect::route('species.edit', $id)
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
		Species::find($id)->delete();

		return Redierct::route('species.index');
	}

}