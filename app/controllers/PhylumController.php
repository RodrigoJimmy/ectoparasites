<?php

class PhylumController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$phylums = Phylum::all();

		return View::make('phylum.index', compact('phylums'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('phylum.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Phylum::$rules);

		if ($validation->passes())
		{
			Phylum::create($input);

			return Redirect::route('phylum.index');
		}

		return Redirect::route('phylum.create')
			->withInput()
			->withErrors($validation)
			->with('message', 'There were validation errors');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$phylum = Phylum::findOrFail($id);

		return View::make('phylum.show', compact('phylum'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$phylum = Phylum::find($id);

		if (is_null($phylum))
		{
			return Redirect::route('phylum.index');
		}

		return View::make('phylum.edit', compact('phylum'));
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
		$validation = Validator::make($input, Phylum::$rules);

		if ($validation->passes())
		{
			$phylum = Phylum::find($id);
			$phylum->update($input);

			return Redirect::route('phylum.show', $id);
		}

		return Redirect::route('phylum.edit', $id)
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
		Phylum::find($id)->delete();

		return Redirect::route('phylum.index');
	}

}