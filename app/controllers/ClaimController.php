<?php

class ClaimController extends BaseController {

    public function __construct()
    {
        $this->beforeFilter('auth.token', array('except' => array('index', 'show')));
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($testId, $interpretationId)
	{
        return Response::json(Claim::where('interpretation_id', $interpretationId)->get());
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store($testId, $interpretationId)
	{
        $interpretation = Interpretation::find($interpretationId);
        if (!$interpretation) {
            return Response::json($interpretation, 404, [], JSON_NUMERIC_CHECK);
        }
        $claim = new Claim;
        $claim->fill(Input::all());
        $claim = $interpretation->claims()->save($claim);
        return Response::json($claim, 201, [], JSON_NUMERIC_CHECK);
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($testId, $interpretationId, $claimId)
	{
        return Response::json(Claim::find($claimId));
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($testId, $interpretationId, $claimId)
	{
        $claim = Claim::find($claimId);
        if (!$claim) {
            return Response::json($claim, 404, [], JSON_NUMERIC_CHECK);
        }
        $claim->fill(Input::all());
        $claim->save();
        return Response::json($claim, 200, [], JSON_NUMERIC_CHECK);
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($testId, $interpretationId, $claimId)
	{
        $claim = Claim::find($claimId);
        if (!$claim) {
            return Response::json($claim, 404, [], JSON_NUMERIC_CHECK);
        }
        $claim->delete();
        return Response::json($claim, 200, [], JSON_NUMERIC_CHECK);
	}


}
