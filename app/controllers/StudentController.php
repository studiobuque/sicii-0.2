<?php


class StudentController extends \BaseController {
	
	public function desktop()
	{
		$student = Auth::user()->profile;
		
		return View::make('student/desktop')->with('student', $student);
	}
	
	public function rating()
	{
		$student = Auth::user()->profile;
		
		return View::make('student/rating')->with('student', $student);
	}
	
	public function subject()
	{
		$student = Auth::user()->profile;
		
		return View::make('student/subject')->with('student', $student);
	}
	
	public function pay()
	{
		$student = Auth::user()->profile;
		
		return View::make('student/pay')->with('student', $student);
	}
	
	public function education()
	{
		// $student = Auth::user()->profile;
		
		return View::make('student/education');
	}
	
	public function comunity()
	{
		$student = Auth::user()->profile;
		$temas = Tema::all();		
		
		return View::make('student/comunity')->with(array('student' => $student, 'temas' => $temas));
	}
	
	public function comunityPostNew()
	{
		$data = Input::all();
		$student = Auth::user()->profile;
		$subject = Subject::find($data['subject_id']);
		
		
		// Obtenemos todos los datos del formulario
		// $data = Input::only('title', 'descripcion', 'gender', 'style', 'brand_id');
		
		// Organizamos los datos del formulario
		$dataUpload =[
			'title'			=> $data['title'],
			'descripcion'		=> $data['descripcion'],
			'profile_id'		=> $student->id,
			'type'			=> 'comunity',
			
			'subject_id'		=> $data['subject_id'],
			'degree_id'		=> $subject->degree_id,
			'lapse'			=> $subject->lapse,
			
		];
		
		// Creamos las reglas
		$rules = [
			'title'		=> 'required',
			'descripcion'		=> 'required',
			'subject_id'		=> 'required',
		];
		
		// Validar el formulario con las reglas
		$validation = Validator::make($dataUpload, $rules);
		if ($validation) {
			
			// si es creada la pregunta
			if ($thema = Tema::create($dataUpload)){
				// Regresamos el mensaje
				return Redirect::route('student_comunity_post_edit', ['id' => $thema->id]);
			}	
		}
			
		// Regresamos el mensaje con errores
		return Redirect::back()->withInput()->withErrors($validation);
		// return Response::json($messages);
	}

	public function comunityPostEdit($id)
	{
		$student = Auth::user()->profile;
		$tema = Tema::find($id);
		
		// dd($tema);
		
		return View::make('student/comunityPostEdit')->with(array('student' => $student, 'tema' => $tema));
		
	}
	
	public function comunityPostSave()
	{
		// $data = Input::all();
		$data = Input::only('id', 'degree_id');
		// id
		
		// $tema = Tema::find($id);
		dd($data[id]);
	}
	
	public function comunityPostView($id)
	{
		$student = Auth::user()->profile;
		$tema = Tema::find($id);
		
		return View::make('student/comunityPostView')->with(array('student' => $student, 'tema' => $tema));
	}
	
}
