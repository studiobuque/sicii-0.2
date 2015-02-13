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

Route::get('me', 			array('as' => 'me', 'uses' => 'BaseController@me'));
Route::get('newprofile', 		array('as' => 'newprofile', 'uses' => 'BaseController@newprofile'));


Route::get('/', 		array('as' => 'home', 'uses' => 'HomeController@index'));
	
// Ruta de usuario no conectados
Route::group(array('before' => 'guest'), function() {
	Route::post('login', 	array('as' => 'login', 'uses' => 'HomeController@login'));
	Route::get('login', 	array('as' => 'login_users', 'uses' => 'HomeController@index'));
});

// Rutas de los alumnos
Route::group(array('before' => 'student'), function () {
	// Route::get('/', 				array('as' => 'desktop', 'uses' => 'StudentController@desktop'));
	Route::get('alumno', 			array('as' => 'student', 'uses' => 'StudentController@desktop'));
	Route::get('alumno/calificaciones', 	array('as' => 'student_rating', 'uses' => 'StudentController@rating'));
	Route::get('alumno/calificaciones/actual', 	array('as' => 'student_rating_actual', 'uses' => 'StudentController@ratingActual'));
	Route::get('alumno/calificaciones/todas', 	array('as' => 'student_rating_todo', 'uses' => 'StudentController@ratingTodo'));
	Route::get('alumno/materia', 		array('as' => 'student_subject', 'uses' => 'StudentController@subject'));
	Route::get('alumno/pagos', 		array('as' => 'student_pay', 'uses' => 'StudentController@pay'));
	Route::get('alumno/realizar-pago', 	array('as' => 'student_payment', 'uses' => 'StudentController@desktop'));
	Route::get('alumno/clase', 		array('as' => 'student_clasroom', 'uses' => 'StudentController@desktop'));
	Route::get('alumno/foro', 		array('as' => 'student_ask', 'uses' => 'StudentController@desktop'));
	
	Route::get('alumno/educacion', 	array('as' => 'student_education', 'uses' => 'StudentController@education'));
	Route::get('alumno/educacion/ver/{id}', 	array('as' => 'student_education_view', 'uses' => 'StudentController@educationView'));
	
	Route::get('alumno/comunidad', 	array('as' => 'student_comunity', 'uses' => 'StudentController@comunity'));
	Route::get('alumno/comunidad/post-nuevo', 	array('as' => 'student_comunity_post', 'uses' => 'StudentController@comunityPost'));
	Route::post('alumno/comunidad/post-crear', 	array('as' => 'student_comunity_post_new', 'uses' => 'StudentController@comunityPostNew'));
	Route::get('alumno/comunidad/post-editar/{tipo}/{id}', array('as' => 'student_comunity_post_edit', 'uses' => 'StudentController@comunityPostEdit'));
	Route::post('alumno/comunidad/post-guardar', 	array('as' => 'student_comunity_post_save', 'uses' => 'StudentController@comunityPostSave'));
	Route::get('alumno/comunidad/post-ver/{id}', 	array('as' => 'student_comunity_post_view', 'uses' => 'StudentController@comunityPostView'));
	Route::get('alumno/comunidad/temas', array('as' => 'student_comunity_temas', 'uses' => 'StudentController@comunityPostTemas'));
	// Route::get('alumno/comunidad-lista', array('as' => 'student_comunity_temas', 'uses' => 'StudentController@comunityPostTemas'));
	
	Route::get('alumno/asesor', 		array('as' => 'student_partner', 'uses' => 'StudentController@partner'));
	Route::post('alumno/asesor/post-crear', array('as' => 'student_partner_post_new', 'uses' => 'StudentController@partnerPostNew'));
	Route::get('alumno/asesor/post-editar/{tipo}/{id}', array('as' => 'student_partner_post_edit', 'uses' => 'StudentController@partnerPostEdit'));
	Route::post('alumno/asesor/post-guardar', array('as' => 'student_partner_post_save', 'uses' => 'StudentController@partnerPostSave'));
	Route::get('alumno/asesor/post-ver/{id}', array('as' => 'student_partner_post_view', 'uses' => 'StudentController@partnerPostView'));
	Route::get('alumno/asesor/post-lista', array('as' => 'student_partner_post_list', 'uses' => 'StudentController@partnerPostList'));
	
	Route::get('alumno/na', array('as' => 'na', 'uses' => 'StudentController@na'));
});

		
// Rutas de los maestros
Route::group(array('before' => 'teacher'), function () {
	// Route::get('/', 				array('as' => 'desktop', 'uses' => 'TeacherController@desktop'));
	Route::get('maestro', 			array('as' => 'teacher', 'uses' => 'TeacherController@desktop'));
	
	Route::get('maestro/calificacion', 	array('as' => 'teacher_ratings', 'uses' => 'TeacherController@ratings'));
	Route::get('maestro/calificacion-materia/{id}', 	array('as' => 'teacher_ratings_subject', 'uses' => 'TeacherController@ratingsSubject'));
	
	Route::get('maestro/asesor', 		array('as' => 'teacher_advisor', 'uses' => 'TeacherController@advisor'));
	Route::post('maestro/asesor/post-new', array('as' => 'teacher_advisor_post_new', 'uses' => 'TeacherController@advisorPostNew'));
	Route::get('maestro/asesor/post-ver/{id}', array('as' => 'teacher_advisor_post_view', 'uses' => 'TeacherController@advisorPostView'));
	Route::get('maestro/asesor/post-editar/{id}', array('as' => 'teacher_advisor_post_edit', 'uses' => 'TeacherController@advisorPostEdit'));
	Route::post('maestro/asesor/post-guardar', array('as' => 'teacher_advisor_post_save', 'uses' => 'TeacherController@advisorPostSave'));
	
	Route::get('maestro/educacion', 	array('as' => 'teacher_education', 'uses' => 'TeacherController@education'));
	Route::get('maestro/educacion/nuevo', array('as' => 'teacher_education_new', 'uses' => 'TeacherController@educationNew'));
	Route::post('maestro/educacion/crear', array('as' => 'teacher_education_create', 'uses' => 'TeacherController@educationCreate'));
	Route::get('maestro/educacion/editar/{id}', array('as' => 'teacher_education_edit', 'uses' => 'TeacherController@educationEdit'));
	Route::post('maestro/educacion/guardar', array('as' => 'teacher_education_save', 'uses' => 'TeacherController@educationSave'));
});

// Rutas para los administradores
Route::group(array('before' => 'admin'), function () {
	// Route::get('/', array('as' => 'desktop', 'uses' => 'AdministratorController@desktop'));
	Route::get('admin', array('as' => 'administrator', 'uses' => 'AdministratorController@desktop'));
	
	// Configuración
	Route::get('admin/configuracion', array('as' => 'administrator_config', 'uses' => 'AdministratorController@config'));
	Route::get('admin-configuracion',  array('as' => 'administrator_config', 'uses' => 'AdministratorController@adminConfig'));
	
	// Configurar Materias y Carreras
	Route::get('admin/configuracion-materias', array('as' => 'administrator_subjects', 'uses' => 'AdministratorController@subject'));
	Route::get('admin/configuracion-materias-lista/{id}', array('as' => 'administrator_subjects_list', 'uses' => 'AdministratorController@subjectList'));
	Route::get('admin/configuracion-materia-editar/{id}', array('as' => 'administrator_subject_edit', 'uses' => 'AdministratorController@subjectEdit'));
	Route::post('admin/configuracion-materia-guardar', array('as' => 'administrator_subjects_save', 'uses' => 'AdministratorController@subjectSave'));
	Route::get('admin/configuracion-materia-ver/{id}', array('as' => 'administrator_subject', 'uses' => 'AdministratorController@viewSubject'));
	Route::get('admin/configuracion-carrera-editar/{id}', array('as' => 'administrator_degree_edit', 'uses' => 'AdministratorController@degreeEdit'));
	Route::post('admin/configuracion-carrera-guardar', array('as' => 'administrator_degree_save', 'uses' => 'AdministratorController@degreeSave'));
	
	// Control de alumnos
	Route::get('admin/alumnos', 		array('as' => 'administrator_students', 'uses' => 'AdministratorController@listStudent'));
	Route::get('admin/ver-alumno/{student}/{id}',  array('as' => 'administrator_student', 'uses' => 'AdministratorController@viewStudent'));
	
	// Control de Usuarios
	Route::get('admin/usuario', 		array('as' => 'administrator_user', 'uses' => 'AdministratorController@user'));
	Route::get('admin/usuario-ver/{id}', 	array('as' => 'administrator_user_view', 'uses' => 'AdministratorController@userView'));
	Route::post('admin/cuenta', 		array('as' => 'administrator_user_new', 'uses' => 'AdministratorController@userNew'));
	// Route::get('admin/cuenta-nueva', 	array('as' => 'administrator_user_new', 'uses' => 'AdministratorController@userNew'));
	
	// Control de Profesores
	Route::get('admin/teacher', 		array('as' => 'administrator_teacher', 'uses' => 'AdministratorController@teacher'));
	Route::get('admin/teacher-asignar/{id}', array('as' => 'administrator_teacher_asignar', 'uses' => 'AdministratorController@teacherAsignar'));
	Route::post('admin/teacher-asignar-guardar',	array('as' => 'administrator_teacher_asignar_save', 'uses' => 'AdministratorController@teacherAsignarSave'));
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
