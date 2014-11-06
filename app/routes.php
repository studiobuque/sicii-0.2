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

Route::get('/', array('as' => 'home', 'uses' => 'HomeController@index'));

Route::get('administrador', 				array('as' => 'administrator', 'uses' => 'AdministratorController@listSubject'));
Route::get('administrador/materias', 			array('as' => 'administrator-subjects', 'uses' => 'AdministratorController@listSubject'));
Route::get('administrador/materia/{subject}/{id}', 	array('as' => 'administrator-subject', 'uses' => 'AdministratorController@viewSubject'));
Route::get('administrador/alumnos', 			array('as' => 'administrator-students', 'uses' => 'AdministratorController@listStudent'));
Route::get('administrador/alumno/{student}/{id}', 	array('as' => 'administrator-student', 'uses' => 'AdministratorController@viewStudent'));

Route::get('alumno', 			array('as' => 'student', 'uses' => 'StudentController@desktop'));
Route::get('alumno/calificaciones', 	array('as' => 'student-rating', 'uses' => 'StudentController@rating'));
Route::get('alumno/materia', 		array('as' => 'student-subject', 'uses' => 'StudentController@subject'));
Route::get('alumno/pagos', 		array('as' => 'student-pay', 'uses' => 'StudentController@pay'));
Route::get('alumno/realizar-pago/', 	array('as' => 'student-payment', 'uses' => 'StudentController@desktop'));
Route::get('alumno/educacion', 	array('as' => 'student-education', 'uses' => 'StudentController@education'));
Route::get('alumno/clase', 		array('as' => 'student-clasroom', 'uses' => 'StudentController@desktop'));
Route::get('alumno/foro', 		array('as' => 'student-ask', 'uses' => 'StudentController@desktop'));
Route::get('alumno/cominidad', 	array('as' => 'student-ask-comunity', 'uses' => 'StudentController@desktop'));
Route::get('alumno/asesor', 		array('as' => 'student-ask-partner', 'uses' => 'StudentController@desktop'));

