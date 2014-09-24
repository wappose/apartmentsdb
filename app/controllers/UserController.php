<?php

class UserController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /auth
	 *
	 * @return Response
	 */
	public function getLogin()
	{
		return View::make('user.login');
	}

	public function postLogin()
	{
		$input = Input::only('username', 'password');
		$rules = array('username' => 'required', 'password' => 'required');
		$v = Validator::make($input, $rules);
		if($v->fails())
		{
			return Redirect::back()->withErrors($v);
		}
		else
		{
			$auth_data = array('username' => $input['username'], 'password' => $input['password']);
			$remember = Input::has('remember_me') ? true : false;
			if(Auth::attempt($auth_data, $remember))
			{
    			return Redirect::intended('/');
    		}
			else
			{
				return Redirect::back()->withErrors(array('Login failed, no such user or password'));
			}
		}
	}

	public function getLogout()
	{
		Auth::logout();
		return Redirect::guest('/');
	}

	public function getRegister()
	{
		return View::make('user.register');
	}

	public function postRegister()
	{
		$input = Input::all();
		$rules = array('username' => 'required|unique:users',
			'email' => 'required|unique:users|email',
			'password' => 'required');

		$validator = Validator::make($input, $rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$user = new User();
		$user->username = $input['username'];
		$user->email = $input['email'];
		$user->password = Hash::make($input['password']);
		$user->save();

		return Redirect::to(URL::action('UserController@getLogin'));
	}

	public function getProfile() {
		return View::make('user.profile');

	}

}
