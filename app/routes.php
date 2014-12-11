<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', 		array('as' => 'home', 'uses' => 'HomeController@index'));
	
// Ruta de usuario no conectados
Route::group(array('before' => 'guest'), function() {
	Route::post('login', 	array('as' => 'login', 'uses' => 'HomeController@login'));
	Route::get('login', 	array('as' => 'login_users', 'uses' => 'HomeController@index'));
});

// Rutas de los alumnos
Route::group(array('before' => 'student'), function () {
	// Route::get('/', 				array('as' => 'desktop', 'uses' => 'StudentController@desktop'));
	/*Route::get('/', 	function() {
		dd('aquí');
		return Redirect::route('student');
	});*/
	Route::get('alumno', 			array('as' => 'student', 'uses' => 'StudentController@desktop'));
	Route::get('alumno/calificaciones', 	array('as' => 'student_rating', 'uses' => 'StudentController@rating'));
	Route::get('alumno/materia', 		array('as' => 'student_subject', 'uses' => 'StudentController@subject'));
	Route::get('alumno/pagos', 		array('as' => 'student_pay', 'uses' => 'StudentController@pay'));
	Route::get('alumno/realizar-pago', 	array('as' => 'student_payment', 'uses' => 'StudentController@desktop'));
	Route::get('alumno/educacion', 	array('as' => 'student_education', 'uses' => 'StudentController@education'));
	Route::get('alumno/clase', 		array('as' => 'student_clasroom', 'uses' => 'StudentController@desktop'));
	Route::get('alumno/foro', 		array('as' => 'student_ask', 'uses' => 'StudentController@desktop'));
	
	Route::get('alumno/comunidad', 	array('as' => 'student_comunity', 'uses' => 'StudentController@comunity'));
	Route::post('alumno/comunidad-post-crear', 	array('as' => 'student_comunity_post_new', 'uses' => 'StudentController@comunityPostNew'));
	Route::get('alumno/comunidad-post-editar/{tipo}/{id}', array('as' => 'student_comunity_post_edit', 'uses' => 'StudentController@comunityPostEdit'));
	Route::post('alumno/comunidad-post-save', 	array('as' => 'student_comunity_post_save', 'uses' => 'StudentController@comunityPostSave'));
	Route::get('alumno/comunidad-post-vier/{id}', 	array('as' => 'student_comunity_post_view', 'uses' => 'StudentController@comunityPostView'));
	Route::get('alumno/comunidad-temas', array('as' => 'student_comunity_temas', 'uses' => 'StudentController@comunityPostTemas'));
	// Route::get('alumno/comunidad-lista', array('as' => 'student_comunity_temas', 'uses' => 'StudentController@comunityPostTemas'));
	
	Route::get('alumno/asesor', 		array('as' => 'student_partner', 'uses' => 'StudentController@partner'));
	Route::post('alumno/asesor-post-crear', array('as' => 'student_partner_post_new', 'uses' => 'StudentController@partnerPostNew'));
});

		
// Rutas de los maestros
Route::group(array('before' => 'teacher'), function () {
	// Route::get('/', 				array('as' => 'desktop', 'uses' => 'TeacherController@desktop'));
	Route::get('maestro', 			array('as' => 'teacher', 'uses' => 'TeacherController@desktop'));
	Route::get('maestro/calificacion', 	array('as' => 'teacher_ratings', 'uses' => 'TeacherController@ratings'));
	Route::get('maestro/calificacion-materia/{id}', 	array('as' => 'teacher_ratings_subject', 'uses' => 'TeacherController@ratingsSubject'));
	Route::get('maestro/educacion', 	array('as' => 'teacher_education', 'uses' => 'TeacherController@education'));
	Route::get('maestro/asesor', 		array('as' => 'teacher_advisor', 'uses' => 'TeacherController@advisor'));
	Route::get('maestro/asesor-post-ver/{id}', array('as' => 'teacher_advisor_post_view', 'uses' => 'TeacherController@advisorPostView'));
	Route::post('maestro/asesor-post-new', array('as' => 'teacher_advisor_post_new', 'uses' => 'TeacherController@advisorPostNew'));
});

// Rutas para los administradores
Route::group(array('before' => 'admin'), function () {
	// Route::get('/', 				array('as' => 'desktop', 'uses' => 'AdministratorController@desktop'));
	Route::get('admin', 			array('as' => 'administrator', 'uses' => 'AdministratorController@desktop'));
	Route::get('admin/materias', 		array('as' => 'administrator_subjects', 'uses' => 'AdministratorController@listSubject'));
	Route::get('admin/materia/{subject}/{id}', 	
						array('as' => 'administrator_subject', 'uses' => 'AdministratorController@viewSubject'));
	Route::get('admin/alumnos', 		array('as' => 'administrator_students', 'uses' => 'AdministratorController@listStudent'));
	Route::get('admin/ver-alumno/{student}/{id}', 	
						array('as' => 'administrator_student', 'uses' => 'AdministratorController@viewStudent'));
	Route::get('admin/cuenta', 		array('as' => 'administrator_user', 'uses' => 'AdministratorController@user'));
	Route::post('admin/cuenta', 		array('as' => 'administrator_user_new', 'uses' => 'AdministratorController@userNew'));
	// Route::get('admin/cuenta-nueva', 	array('as' => 'administrator_user_new', 'uses' => 'AdministratorController@userNew'));
	Route::get('admin-configuracion', 			array('as' => 'administrator_config', 'uses' => 'AdministratorController@adminConfig'));
});
	
Route::group(array('before' => 'auth'), function() {
	
	Route::get('perfil', 	array('as' => 'profile', 'uses' => 'HomeController@profile'));
	Route::post('perfil', 	array('as' => 'profile_save', 'uses' => 'HomeController@profileSave'));
	
	// Ruta pasa deconectarse
	Route::get('logout', 	array('as' => 'logout', 'uses' => 'HomeController@logout'));
	
});

App::missing( function($err) 
{
	// return Response::view('error404')->with('err' => $err);
	// dd($err);
	return View::make('error404')->with('err', $err);
}); 
