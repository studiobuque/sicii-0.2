<?php

/*
|--------------------------------------------------------------------------
| Application & Route Filters
|--------------------------------------------------------------------------
|
| Below you will find the "before" and "after" events for the application
| which may be used to do any work before or after a request into your
| application. Here you may also register your custom route filters.
|
*/

App::before(function($request)
{
	//
});


App::after(function($request, $response)
{
	//
});

/*
|--------------------------------------------------------------------------
| Authentication Filters
|--------------------------------------------------------------------------
|
| The following filters are used to verify that the user of the current
| session is logged into this application. The "basic" filter easily
| integrates HTTP Basic authentication for quick, simple checking.
|
*/

Route::filter('auth', function()
{
	if (Auth::guest()) return Redirect::guest('login');
});


Route::filter('auth.basic', function()
{
	return Auth::basic();
});

/*
|--------------------------------------------------------------------------
| Guest Filter
|--------------------------------------------------------------------------
|
| The "guest" filter is the counterpart of the authentication filters as
| it simply checks that the current user is not logged in. A redirect
| response will be issued if they are, which you may freely change.
|
*/

Route::filter('guest', function()
{
	if (Auth::check()) return Redirect::to('/');
});

/*
|--------------------------------------------------------------------------
| CSRF Protection Filter
|--------------------------------------------------------------------------
|
| The CSRF filter is responsible for protecting your application against
| cross-site request forgery attacks. If this special token in a user
| session does not match the one given in this request, we'll bail.
|
*/

Route::filter('csrf', function()
{
	if (Session::token() != Input::get('_token'))
	{
		throw new Illuminate\Session\TokenMismatchException;
	}
});


/*
|--------------------------------------------------------------------------
| Filtrar por tipo de usuario
|--------------------------------------------------------------------------
*/

Route::filter('student', function()
{
	if (Auth::check()) {
		if (  Auth::user()->type != 'student'){
			return View::make('error404');//->with('err', $err)
			// Pasa
		} else {
			// return Redirect::route('student');
			
		}
	} else {
		return Redirect::route('login');
	}
});

Route::filter('teacher', function()
{
	if (Auth::check()) {
		if (  Auth::user()->type != 'teacher'){
			return View::make('error404');//->with('err', $err)
			// return Auth::check() && Auth::user()->type == 'student';
		} else {
			// return Redirect::route('teacher');
			
		}
	} else {
		return Redirect::route('login');
	}
});

Route::filter('admin', function()
{
	if (Auth::check()) {
		if (  Auth::user()->type != 'admin'){
			return View::make('error404'); //->with('err', $err)
			// return Auth::check() && Auth::user()->type == 'admin';
		} else {
			// return Redirect::route('admin');
			
		}
	} else {
		return Redirect::route('login');
	}
});
function is_student()
{
	return Auth::user()->type == 'student';
}

function is_teacher()
{
	return Auth::user()->type == 'teacher';
}

function is_admin()
{
	return Auth::user()->type == 'admin';
}
