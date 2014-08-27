<?php

class InterpretationController extends BaseController {

    public function __construct()
    {
        $this->beforeFilter('auth.token', array('except' => array('index', 'show')));
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($testId)
	{
        return Response::json(Interpretation::where('test_id', $testId)->get());
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store($testId)
	{
        $test = Test::find($testId);
        if (!$test) {
            return Response::json($test, 404, [], JSON_NUMERIC_CHECK);
        }
        $interpretation = new Interpretation;
        $interpretation->fill(Input::all());
        $interpretation = $test->interpretations()->save($interpretation);
        return Response::json($interpretation, 201, [], JSON_NUMERIC_CHECK);
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($testId, $interpretationId)
	{
        return Response::json(Interpretation::find($interpretationId));
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($testId, $interpretationId)
	{
        $interpretation = Interpretation::find($interpretationId);
        if (!$interpretation) {
            return Response::json($interpretation, 404, [], JSON_NUMERIC_CHECK);
        }
        $interpretation->fill(Input::all());
        $interpretation->save();
        return Response::json($interpretation, 200, [], JSON_NUMERIC_CHECK);
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($testId, $interpretationId)
	{
        $interpretation = Interpretation::find($interpretationId);
        if (!$interpretation) {
            return Response::json($interpretation, 404, [], JSON_NUMERIC_CHECK);
        }
        $interpretation->delete();
        return Response::json($interpretation, 200, [], JSON_NUMERIC_CHECK);
	}


}
