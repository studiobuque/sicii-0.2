<?php

class StudentController extends \BaseController {
	
	public function desktop()
	{
		$student = Auth::user()->profile;
		$educations = Education::where('tema_id', '=', '0')->orderBy('created_at', 'DESC')->paginate(3);
		$partners = Tema::where('tema_id', '=', '0')->where('type', '=', 'partner')->orderBy('created_at', 'DESC')->paginate(3);
		$comunitys = Tema::where('tema_id', '=', '0')->where('type', '=', 'comunity')->orderBy('created_at', 'DESC')->paginate(3);
		
		
		return View::make('student/desktop')->with(array('student' => $student, 'educations' => $educations, 'partners' => $partners, 'comunitys' => $comunitys));
	}
	
	public function na()
	{
		$student = Auth::user()->profile;
		
		
	}
	
	public function subject()
	{
		$student = Auth::user()->profile;
		
		return View::make('student/subject')->with('student', $student);
	}
	
	// -------------- -------------- -------------- -------------- --------------
	// Calificaciones
	public function rating()
	{
		$student = Auth::user()->profile;
		$subjects = Subject::where('degree_id', '=', $student->degree_id)->where('lapse', '=', $student->lapse)->get();
		$las_calificaciones = Rating::where('profile_id', '=', $student->id)->where('degree_id', '=', $student->degree_id)->where('lapse', '=', $student->lapse)->get(); // 
		$calificacion = array();
		
		// var_dump($las_calificaciones); // $student->lapse,$student->degree_id, 
		
		
		foreach ($las_calificaciones as $la_calificacion) {
			$subject_id = $la_calificacion->subject->id;
			$calificacion_id = $la_calificacion->id;
			$calificacion_rating = $la_calificacion->rating;
			
			$calificacion[$subject_id] = $calificacion_rating;
			// var_dump($la_calificacion, $la_calificacion->subject->id); echo "<hr>"; // ->id rating
		}
		
		// var_dump($calificacion); echo "<hr>";
		// exit();
		
		return View::make('student/rating')->with(array('student' => $student, 'subjects' => $subjects, 'calificacion' => $calificacion));
	}
	
	public function ratingActual()
	{
		$student = Auth::user()->profile;
		
		return View::make('student/ratingActual')->with('student', $student);
	}
	
	public function ratingTodo()
	{
		$student = Auth::user()->profile;
		
		return View::make('student/ratingTodo')->with('student', $student);
	}
	
	// -------------- -------------- -------------- -------------- --------------
	// Pagos
	public function pay()
	{
		$student = Auth::user()->profile;
		
		return View::make('student/pay')->with('student', $student);
	}
	
	// -------------- -------------- -------------- -------------- --------------
	// Educacion en linea
	public function education()
	{
		$student = Auth::user()->profile;
		// $educations = Education::where('degree_id', '=', $student->degree->id)->get();
		$educations = Education::where('tema_id', '=', '0')->orderBy('created_at', 'DESC')->paginate(5);
		//$temas = Tema::where('tema_id', '=', '0')->where('type', '=', 'partner')->orderBy('created_at', 'DESC')->paginate(5);;//all()->get()
		// dd($educations);
		
		return View::make('student/education')->with('student', $student)->with('educations', $educations);
	}
	
	public function educationView($id)
	{
		$student = Auth::user()->profile;
		// $educations = Education::where('degree_id', '=', $student->degree->id)->get();
		$education = Education::find($id);
		
		return View::make('student/educationView')->with('student', $student)->with('education', $education);
	}
	
	// -------------- -------------- -------------- -------------- --------------
	// Comunidad
	public function comunity()
	{
		$student = Auth::user()->profile;
		$temas = Tema::where('tema_id', '=', '0')->where('type', '=', 'comunity')->orderBy('created_at', 'DESC')->paginate(5);//all()->get()
		
		return View::make('student/comunity')->with(array('student' => $student, 'temas' => $temas));
	}
	
	public function comunityPost()
	{
		$student = Auth::user()->profile;
		// $subject = Subject::find($data['subject_id']);
		
		return View::make('student/comunityPost')->with(array('student' => $student));
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
				'descripcion'		=> 'required',
				'title'			=> 'required',
				'subject_id'		=> 'required',
			);
		}
		
		// Validar el formulario con las reglas
		$validation = Validator::make($dataUpload, $rules);
		if ($validation->passes()) {
			
			// Guardar uno nuevo
			if ($thema = Tema::create($dataUpload)){
				
				// Si se guardo redirecionamos para verlo
				if ( ! $data['respuesta']) {
					return Redirect::route('student_comunity_post_view', array('id' => $thema->id, 'alert_mensaje' => 'Se guardo correctamente tu aporte', 'alert_estilo' => 'success', 'alert_ico' => 'ok'));
				} else {
					return Redirect::route('student_comunity_post_view', array('id' => $thema->tema_id, 'alert_mensaje' => 'Se guardo correctamente tu respuesta', 'alert_estilo' => 'success', 'alert_ico' => 'ok'));
				}
			}	
		}
			
		// Regresamos el mensaje con errores
		return Redirect::back()->withInput()->withErrors($validation);// 'alert_estilo' => 'danger', 'alert_ico' => 'remove'))
	}
	
	public function comunityPostEdit($tipo, $id)
	{
		$student = Auth::user()->profile;
		$tema = Tema::find($id);
		Input::merge(array('description', 'manual Value something something here'));
		// dd($tema);
		
		return View::make('student/comunityPostEdit')->with(array('student' => $student, 'tema' => $tema, 'tipo' => $tipo));
		
	}
	
	public function comunityPostSave()
	{
		// Obtenemos los datos del formulario
		$data = Input::only('id', 'tema_id', 'title', 'descripcion', 'respuesta');
		
		// Organizamos los datos del formulario
		$description = $data['descripcion'];
		$description = strip_tags($description, '<p><a><strong><em><ul><ol><li>');
		$description = stripslashes($description);
		
		$dataUpload =array(
			'id'			=> $data['id'],
			'title'			=> $data['title'],
			'descripcion'		=> $description,
			
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
		
		if ($validation->passes()) {
			
			$tema->fill($dataUpload);
			
			if ($tema->save()) {
				
				
				if ( ! $data['respuesta']) {
					
					// Es una pregunta redirecionar a
					return Redirect::route('student_comunity_post_view', array('id' => $data['id'], 'alert_mensaje' => 'Se guardo correctamente', 'alert_estilo' => 'success', 'alert_ico' => 'ok'));
					// 'alert' => json_encode(array('mensage' => 'Se guardo correctamente', 'estilo' => 'success', 'is_ico' => true, 'ico' => 'ok'))
					
				} else {
					
					// Es una respuesta redirecionar a
					return Redirect::route('student_comunity_post_view', array('id' => $data['tema_id'], 'alert_mensaje' => 'Se guardo correctamente', 'alert_estilo' => 'success', 'alert_ico' => 'ok'));
					
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
		$student = Auth::user()->profile;
		// $tema = Tema::find($id);
		// $temas = Tema::where('tema_id', '=', '0')->orderBy('created_at', 'DESC')->paginate(10); //all()->get()
		$temas = Tema::where('tema_id', '=', '0')->where('type', '=', 'comunity')->orderBy('created_at', 'DESC')->paginate(10); //all()->get()
		
		return View::make('student/comunityPostTemas')->with(array('student' => $student, 'temas' => $temas));
	}
	
	// -------------- -------------- -------------- -------------- --------------
	// Asesor Academico
	public function partner()
	{
		$student = Auth::user()->profile;
		$temas = Tema::where('tema_id', '=', '0')->where('type', '=', 'partner')->where('profile_id', '=', $student->id)->orderBy('created_at', 'DESC')->paginate(5);
		
		return View::make('student/partner')->with(array('student' => $student, 'temas' => $temas));
	}
	
	public function partnerPostNew()
	{
		// Obtenemos los datos
		$data = Input::all();
		$student = Auth::user()->profile;
		$subject = Subject::find($data['subject_id']);
		
		
		// Organizamos los datos del formulario
		$descripcion = $data['descripcion'];
		$descripcion = strip_tags($descripcion, '<p><a><strong><em><ul><ol><li>');
		$descripcion = stripslashes($descripcion);
		
		if ( ! $data['respuesta']) {
			
			// Si no es una pregunta
			
			// Organizamos los datos del formulario
			$dataUpload =array(
				'title'			=> $data['title'],
				'descripcion'		=> $descripcion,
				'profile_id'		=> $student->id,
				'type'			=> 'partner',
				
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
		} else {
			
			// Si es una respuesta
			
			// Organizamos los datos del formulario
			$dataUpload =array(
				'title'			=> $data['title'],
				'descripcion'		=> $descripcion,
				'profile_id'		=> $student->id,
				'type'			=> 'partner',
				
				'tema_id'		=> $data['tema_id'],
				'subject_id'		=> $data['subject_id'],
				'degree_id'		=> $subject->degree_id,
				'lapse'			=> $subject->lapse,
				
			);
			
			// Creamos las reglas
			$rules = array(
				// 'title'			=> 'required',
				'tema_id'		=> 'required',
				'descripcion'		=> 'required',
				'subject_id'		=> 'required',
			);
		}
		
		
		// Validar el formulario con las reglas
		$validation = Validator::make($dataUpload, $rules);
		if ($validation->passes()) {
			
			// Guardar en uno nuevo
			if ($thema = Tema::create($dataUpload)){
				
				// Si se guardo redirecionamos para verlo
				if ( ! $data['respuesta']) {
					return Redirect::route('student_partner_post_view', array('id' => $thema->id, 'alert_mensaje' => 'Se guardo correctamente', 'alert_estilo' => 'success', 'alert_ico' => 'ok'));
				} else {
					return Redirect::route('student_partner_post_view', array('id' => $thema->tema_id, 'alert_mensaje' => 'Se guardo correctamente tu respuesta', 'alert_estilo' => 'success', 'alert_ico' => 'ok'));
				}
			}	
		}
			
		// Regresamos el mensaje con errores
		return Redirect::back()->withInput()->withErrors($validation);
	}
	
	public function partnerPostList()
	{
		$student = Auth::user()->profile;
		$temas = Tema::where('tema_id', '=', '0')->where('type', '=', 'partner')->where('profile_id', '=', $student->id)->orderBy('created_at', 'DESC')->paginate(10);;//all()->get()
		
		return View::make('student/partnerPostList')->with(array('student' => $student, 'temas' => $temas));
	}
	
	public function partnerPostView($id)
	{
		$student = Auth::user()->profile;
		$tema = Tema::find($id);
		
		
		return View::make('student/parnerPostView')->with(array('student' => $student, 'tema' => $tema));
		
	}
	
	public function partnerPostEdit($tipo, $id)
	{
		$student = Auth::user()->profile;
		$tema = Tema::find($id);
		
		// dd($tema);
		
		return View::make('student/parnerPostEdit')->with(array('student' => $student, 'tema' => $tema, 'tipo' => $tipo));
	}
	
	public function partnerPostSave()
	{
		// Obtenemos los datos del formulario
		$data = Input::only('id', 'tema_id', 'title', 'descripcion', 'respuesta');
		
		// Organizamos los datos del formulario
		$description = $data['descripcion'];
		$description = strip_tags($description, '<p><a><strong><em><ul><ol><li>');
		// $description = htmlspecialchars_decode($description, ENT_NOQUOTES);
		$description = stripslashes($description);
		
		$dataUpload =array(
			'id'			=> $data['id'],
			'title'			=> $data['title'],
			'descripcion'		=> $description,
			
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
		
		if ($validation->passes()) {
			
			$tema->fill($dataUpload);
			
			if ($tema->save()) {
				
				
				if ( ! $data['respuesta']) {
					
					// Es una pregunta redirecionar a
					return Redirect::route('student_partner_post_view', array('id' => $data['id'], 'alert_mensaje' => 'Se guardo correctamente', 'alert_estilo' => 'success', 'alert_ico' => 'ok'));
					
				} else {
					
					// Es una respuesta redirecionar a
					return Redirect::route('student_partner_post_view', array('id' => $data['tema_id'], 'alert_mensaje' => 'Se guardo correctamente', 'alert_estilo' => 'success', 'alert_ico' => 'ok'));
					
				}
			}
		}
		
		
			
		return Redirect::back()->withInput()->withErrors($validation);
		// dd($validation->messages());
		
	}
	
}
