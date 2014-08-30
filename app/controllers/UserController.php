<?php

class UserController extends BaseController {

    public function __construct()
    {
        $this->beforeFilter('auth.token', array('except' => array('postReset', 'postRemind')));
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return Response::json(User::all(), 200, [], JSON_NUMERIC_CHECK);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $user = new User();
        $user->fill(Input::all());
        $user->password = Hash::make(sha1(time()));
        $user->save();

        Password::remind(Input::only('email'), function($message)
        {
            $message->subject(Config::get('app.frontend_url') . ' uusi salasana');
        });

        return Response::json($user, 201, [], JSON_NUMERIC_CHECK);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $user = User::find($id);
        if (!$user) {
            return Response::json($user, 404, [], JSON_NUMERIC_CHECK);
        }
        return Response::json($user, 200, [], JSON_NUMERIC_CHECK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        if (!$user) {
            return Response::json($user, 404, [], JSON_NUMERIC_CHECK);
        }
        // Can't delete self
        if($user->id == Auth::user()->id) {
            return Response::json($user, 403, [], JSON_NUMERIC_CHECK);
        }
        $user->delete();
        return Response::json($user, 200, [], JSON_NUMERIC_CHECK);
    }

    /**
     * Handle a POST request to remind a user of their password.
     *
     * @return Response
     */
    public function postRemind()
    {
        $response = Password::remind(Input::only('email'), function($message)
        {
            $message->subject(Config::get('app.frontend_url') . ' uusi salasana');
        });

        return Response::json(null, 200, [], JSON_NUMERIC_CHECK);
    }

    /**
     * Handle a POST request to reset a user's password.
     *
     * @return Response
     */
    public function postReset()
    {
        $credentials = Input::only(
            'email', 'password', 'password_confirmation', 'token'
        );

        $response = Password::reset($credentials, function($user, $password)
        {
            $user->password = Hash::make($password);

            $user->save();
        });

        switch ($response)
        {
            case Password::INVALID_PASSWORD:
            case Password::INVALID_TOKEN:
            case Password::INVALID_USER:
                return Response::json(null, 400, [], JSON_NUMERIC_CHECK);

            case Password::PASSWORD_RESET:
                return Response::json(null, 200, [], JSON_NUMERIC_CHECK);
        }
    }
}
