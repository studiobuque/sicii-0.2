<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function index()
	{
		if (Auth::check()) {
			$user = Auth::user();
			$profiles = $user->profile;
			// dd($profiles);
			
			if ( Auth::user()->type == 'student') {
				return Redirect::route('student');
			} elseif ( Auth::user()->type == 'teacher') {
				return Redirect::route('teacher');
			} elseif ( Auth::user()->type == 'admin') {
				return Redirect::route('administrator');
			} /*else {
				return View::make('desktop')->with('profiles', $profiles);
			}*/
		}
			
		return View::make('desktop');
		
	}
	
	public function login()
	{
		// Obtenemos los datos del formulario
		$data = Input::only('control', 'password', 'remember');
		
		// Ordenamos los datos del formulario para pasarlo autenticar
		$credentials = array('control' => $data['control'], 'password' => $data['password']);
		
		// Verificamos si estas correctos los datos del formulario
		if (Auth::attempt($credentials, $data['remember'])) //
		{
			// return Redirect::back();
			
			if ( Auth::user()->type == 'student') {
				return Redirect::route('student');
			} elseif ( Auth::user()->type == 'teacher') {
				return Redirect::route('teacher');
			} elseif ( Auth::user()->type == 'admin') {
				return Redirect::route('administrator');
			} else {
				return Redirect::route('student');
			}
			
			// return Redirect::route('desktop');

		}
		
		// Si no esta correcto, regresamos con los errores
		return Redirect::back()->withInput()->with('login_error', 1);
	}

	public function logout()
	{
		Auth::logout();
		return Redirect::route('home');
	}

	public function profile()
	{
		// $profile = Auth::user();
		$profile = Auth::user()->profile;
		
		// dd($profile->toArray());

		// return Response::json($profile);
		return View::make('profile')->with('profile', $profile);
	}
	
	public function profileSave()
	{
		$data = Input::all();
		$profile = Auth::user()->profile;
		
		// $manager = Profile($data);
		$manager = Profile::find($profile->id);
		$manager->fill($data);
		$manager->save();
		
		// dd($manager);
		
		// return Response::json($data);
		return View::make('profile')->with('profile', $manager);
		return Redirect::route('profile');
	}


}
