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
		$student = Auth::user()->profile;
		// $student = Auth::user()->profile;
		
		return View::make('student/education')->with('student', $student);
	}
	
	public function comunity()
	{
		$student = Auth::user()->profile;
		$temas = Tema::where('tema_id', '=', '0')->where('type', '=', 'comunity')->orderBy('updated_at', 'DESC')->paginate(5);;//all()->get()
		
		return View::make('student/comunity')->with(array('student' => $student, 'temas' => $temas));
	}
	
	public function comunityPostNew()
	{
		// Obtenemos los datos
		$data = Input::all();
		$student = Auth::user()->profile;
		$subject = Subject::find($data['subject_id']);
		
		// Si no es una respuesta
		if ( ! $data['respuesta']) {
			
			// Organizamos los datos del formulario
			$dataUpload =array(
				'title'			=> $data['title'],
				'descripcion'		=> $data['descripcion'],
				'profile_id'		=> $student->id,
				'type'			=> 'comunity',
				
				'subject_id'		=> $data['subject_id'],
				'degree_id'		=> $subject->degree_id,
				'lapse'			=> $subject->lapse,
				
			);
			
			// Creamos las reglas
			$rules = array(
				'title'			=> 'required',
				'descripcion'		=> 'required',
				'subject_id'		=> 'required',
			);
		// Si es una respuesta
		} else {
			
			// Organizamos los datos del formulario
			$dataUpload =array(
				'title'			=> $data['title'],
				'descripcion'		=> $data['descripcion'],
				'profile_id'		=> $student->id,
				'type'			=> 'comunity',
				
				'tema_id'		=> $data['tema_id'],
				'subject_id'		=> $data['subject_id'],
				'degree_id'		=> $subject->degree_id,
				'lapse'			=> $subject->lapse,
				
			);
			
			// Creamos las reglas
			$rules = array(
				'tema_id'		=> 'required',
				'title'			=> 'required',
				'descripcion'		=> 'required',
				'subject_id'		=> 'required',
			);
		}
		
		// Validar el formulario con las reglas
		$validation = Validator::make($dataUpload, $rules);
		if ($validation) {
			
			// Guardar en uno nuevo
			if ($thema = Tema::create($dataUpload)){
				
				// Si se guardo redirecionamos para verlo
				if ( ! $data['respuesta']) {
					return Redirect::route('student_comunity_post_view', array('id' => $thema->id));
				} else {
					return Redirect::route('student_comunity_post_view', array('id' => $thema->tema_id));
				}
			}	
		}
			
		// Regresamos el mensaje con errores
		return Redirect::back()->withInput()->withErrors($validation);
	}
	
	public function comunityPostEdit($tipo, $id)
	{
		$student = Auth::user()->profile;
		$tema = Tema::find($id);
		
		// dd($tema);
		
		return View::make('student/comunityPostEdit')->with(array('student' => $student, 'tema' => $tema, 'tipo' => $tipo));
		
	}
	
	public function comunityPostSave()
	{
		// Obtenemos los datos del formulario
		$data = Input::only('id', 'tema_id', 'title', 'descripcion', 'respuesta');
		
		// Organizamos los datos del formulario
		$dataUpload =array(
			'id'			=> $data['id'],
			'title'			=> $data['title'],
			'descripcion'		=> $data['descripcion'],
			
		);
			
		// Creamos las reglas
		$rules = array(
			'id'		=> 'required|exists:temas,id',
			'title'		=> 'required',
			'descripcion'	=> 'required',
		);
		
		// Validar el formulario con las reglas
		$validation = Validator::make($dataUpload, $rules);
		// dd($validation->messages());
		
		// Buscamos el tema elegido
		$tema = Tema::find($data['id']);
		
		if ($validation) {
			
			$tema->fill($dataUpload);
			
			if ($tema->save()) {
				
				
				if ( ! $data['respuesta']) {
					
					// Es una pregunta redirecionar a
					return Redirect::route('student_comunity_post_view', array('id' => $data['id']));
					
				} else {
					
					// Es una respuesta redirecionar a
					return Redirect::route('student_comunity_post_view', array('id' => $data['tema_id']));
					
				}
			}
		}
		
		
			
		return Redirect::back()->withInput()->withErrors($validation);
		// dd($validation->messages());
	}
	
	public function comunityPostView($id)
	{
		$student = Auth::user()->profile;
		$tema = Tema::find($id);
		
		return View::make('student/comunityPostView')->with(array('student' => $student, 'tema' => $tema));
	}
	
	public function comunityPostTemas()
	{
		// $tema = Tema::find($id);
		$temas = Tema::where('tema_id', '=', '0')->orderBy('updated_at', 'DESC')->paginate(10);;//all()->get()
		
		return View::make('student/comunityPostTemas')->with(array('student' => $student, 'tema' => $tema));
	}
	
}
