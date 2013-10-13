<?php

class FamilyController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$families = Family::all();

		return View::make('family.index', compact('families'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$orders = Order::lists('name', 'id');

		return View::make('family.create')
			->with('orders', $orders);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Family::$rules);

		if ($validation->passes())
		{
			Family::create($input);

			return Redirect::route('family.index');
		}

		return Redirect::route('family.create')
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
		$family = Family::findOrFail($id);

		return View::make('family.show', compact('family'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$family = Family::find($id);
		$orders = Order::lists('name', 'id');

		if (is_null($family))
		{
			return Redirect::route('family.index');
		}

		return View::make('family.edit', compact('family'))
			->with('orders', $orders);
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
		$validation = Validator::make($input, Family::$rules);

		if ($validation->passes())
		{
			$family = Family::find($id);
			$family->update($input);

			return Redirect::route('family.show', $id);
		}

		return Redirect::route('family.edit', $id)
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
		Family::find('id')->delete();

		return Redirect::route('family.index');
	}

}