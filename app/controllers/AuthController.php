<?php 

class AuthController extends BaseController {
	public function getIndex()
	{
		return View::make('auth.index');
	}

	public function postIndex()
	{
		if (Auth::attempt(Input::only(['email', 'password']))) {
			return Redirect::to('/')
				->with('message', 'Logged in.');
		}

		return Redirect::to('/auth')
			->with('message', 'Log-in attempt failed.');
	}

	public function getLogout()
	{
		Auth::logout();
		return Redirect::to('/auth')
			->with('message', 'Logged out.');
	}
}