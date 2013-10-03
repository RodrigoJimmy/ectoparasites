<?php

class OrderController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$orders = Order::all();
		
		return View::make('order.index', compact('orders'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$bioclasses = Bioclass::lists('name', 'id');

		return View::make('order.create')
			->with('bioclasses', $bioclasses);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Order::$rules);

		if ($validation->passes())
		{
			Order::create($input);

			return Redirect::route('order.index');
		}

		return Redirect::route('order.create')
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
		$order = Order::findOrFail($id);

		return View::make('order.show', compact('order'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$order = Order::find($id);
		$bioclasses = Bioclass::lists('name', 'id');

		if (is_null($order))
		{
			return Redirect::route('order.index');
		}

		return View::make('order.edit', compact('order'))
			->with('bioclasses', $bioclasses);
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
		$validation = Validator::make($input, Order::$rules);

		if ($validation->passes())
		{
			$order = Order::find($id);
			$order->update($input);

			return Redirect::route('order.show', $id);
		}

		return Redirect::route('order.edit', $id)
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
		Order::find($id)->delete();

		return Redirect::route('order.index');
	}

}