<?php

class SubfamilyController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$subfamilies = Subfamily::all();

		return View::make('subfamily.index', compact('subfamilies'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$families = Family::lists('name', 'id');

		return View::make('subfamily.create')
			->with('families', $families);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Subfamily::$rules);

		if ($validation->passes())
		{
			Subfamily::create($input);

			return Redirect::route('subfamily.index');
		}

		return Redirect::route('subfamily.create')
			->withInput()
			->withErrors($validation)
			->with('message', 'There were validation errrors');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$subfamily = Subfamily::findOrFail($id);

		return View::make('subfamily.show', compact('subfamily'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$subfamily = Subfamily::find($id);
		$families  = Family::lists('name', 'id');

		if (is_null($subfamily))
		{
			return Redirect::route('subfamily.index');
		}

		return View::make('subfamily.edit', compact('subfamily'))
			->with('families', $families);
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
		$validation = Validator::make($input, Subfamily::$rules);

		if ($validation->passes())
		{
			$subfamily = Subfamily::find($id);
			$subfamily->update($input);

			return Redirect::route('subfamily.show', $id);
		}

		return Redirect::route('subfamily.edit', $id)
			->withInput()
			->withErrors($validation)
			->with('message', 'There were validation errros.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Subfamily::find($id)->delete();

		return Redirect::route('subfamily.index');
	}

}