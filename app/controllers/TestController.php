<?php

class TestController extends BaseController {

    public function __construct()
    {
        $this->beforeFilter('auth.token', array('except' => array('index', 'show')));
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return Response::json(Test::with('interpretations', 'interpretations.claims')->get(), 200, [], JSON_NUMERIC_CHECK);
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
        $test = new Test;
        $test->fill(Input::all());
        $test->save();
        return Response::json($test, 200, [], JSON_NUMERIC_CHECK);
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        return Response::json(Test::with('interpretations', 'interpretations.claims')->find($id), 200, [], JSON_NUMERIC_CHECK);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
