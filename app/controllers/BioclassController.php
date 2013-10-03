<?php

class BioclassController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$bioclasses = Bioclass::all();

		return View::make('bioclass.index', compact('bioclasses'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$phylums = Phylum::lists('name', 'id');

		return View::make('bioclass.create')
			->with('phylums', $phylums);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Bioclass::$rules);

		if ($validation->passes())
		{
			Bioclass::create($input);

			return Redirect::route('class.index');
		}

		return Redirect::route('class.create')
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
		$class = Bioclass::findOrFail($id);

		return View::make('bioclass.show', compact('bioclass'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$bioclass = Bioclass::find($id);

		if (is_null($bioclass))
		{
			return Redirect::route('class.index');
		}

		return View::make('bioclass.edit', compact('bioclass'));
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
		$validation = Validator::make($input, Bioclass::$rules);

		if ($validation->passes())
		{
			$bioclass = Bioclass::find($id);
			$bioclass->update($input);

			return Redirect::route('class.show', $id);
		}

		return Redirect::route('class.edit', $id)
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
		Bioclass::find($id)->delete();

		return Redirect::route('class.index');
	}

}