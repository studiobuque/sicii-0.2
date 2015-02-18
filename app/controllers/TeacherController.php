<?php


class TeacherController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}
	
	
	public function desktop()
	{
		return View::make('teacher/desktop');
	}
	
	// -------------- -------------- -------------- -------------- --------------
	// Calificaciones
	public function ratings()
	{
		$degree = Degree::find(1);
		return View::make('teacher/ratings')->with('degree', $degree);
	}
	
	public function ratingsSubject($id)
	{
		$degree_id = 2;
		$subject = Subject::find($id);
		$degree = Degree::find($degree_id);
		$students = Profile::where('degree_id', '=', $degree->id )->get();
		
		return View::make('teacher/ratingsSubject')->with(array('degree' => $degree, 'subject' => $subject, 'students' => $students));
	}
	
	
	// -------------- -------------- -------------- -------------- --------------
	// Asesor Academico
	public function advisor()
	{
		$teacher = Auth::user()->profile;
		$temas = Tema::where('tema_id', '=', '0')->where('type', '=', 'partner')->where('degree_id', '=', $teacher->degree_id)->orderBy('updated_at', 'DESC')->paginate(5);
		
		return View::make('teacher/advisor')->with(array('temas' => $temas, 'teacher' => $teacher));
	}
	
	public function advisorPostView($id)
	{
		$teacher = Auth::user()->profile;
		$tema = Tema::find($id);
		
		return View::make('teacher/advisorPostView')->with(array('tema' => $tema, 'teacher' => $teacher));
	}
	
	public function advisorPostNew()
	{
		// Obtenemos los datos
		$teacher = Auth::user()->profile;
		$data = Input::all();
		$subject = Subject::find($data['subject_id']);
		// $data[tema_id]
		
		// Organizamos los datos del formulario
		$dataUpload =array(
			'title'			=> $data['title'],
			'descripcion'		=> $data['descripcion'],
			'profile_id'		=> $teacher->id,
			'type'			=> 'partner',
			
			'tema_id'		=> $data['tema_id'],
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
			
		// Validar el formulario con las reglas
		$validation = Validator::make($dataUpload, $rules);
		if ($validation) {
			
			// Crear nuevo tema
			if ($thema = Tema::create($dataUpload)) {
				return Redirect::route('teacher_advisor_post_view', array('id' => $thema->tema_id, 'alert_mensaje' => 'Se guardo correctamente tu respuesta', 'alert_estilo' => 'success', 'alert_ico' => 'ok'));
			}
			
		}
		
		return Redirect::back()->withInput()->withErrors($validation);
	}
	
	public function advisorPostEdit($id)
	{
		$teacher = Auth::user()->profile;
		$tema = Tema::find($id);
		
		return View::make('teacher/advisorPostEdit')->with(array('tema' => $tema, 'teacher' => $teacher));
	}
	
	public function advisorPostSave()
	{
		$data = Input::only('id', 'tema_id', 'title', 'descripcion', 'respuesta');
		
		// Organizamos los datos del formulario
		$descripcion = $data['descripcion'];
		$descripcion = strip_tags($descripcion, '<p><a><strong><em><ul><ol><li>');
		$descripcion = stripslashes($descripcion);
		
		$dataUpload =array(
			'id'			=> $data['id'],
			'title'			=> $data['title'],
			'descripcion'		=> $descripcion,
			
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
		
		// Buscamos el tema
		$tema = Tema::find($data['id']);
		
		if ($validation->passes()) {
			
			$tema->fill($dataUpload);
			
			if ($tema->save()) {
				
				return Redirect::route('teacher_advisor_post_view', array('id' => $data['tema_id'], 'alert_mensaje' => 'Se guardo correctamente', 'alert_estilo' => 'success', 'alert_ico' => 'ok'));
				
			}
			
		}
		
		return Redirect::back()->withInput()->withErrors($validation);
		
	}
	
	// -------------- -------------- -------------- -------------- --------------
	// Educacion en linea
	public function education()
	{
		$teacher = Auth::user()->profile;
		$educations = Education::all();
		
		return View::make('teacher/education')->with(array('educations' => $educations, 'teacher' => $teacher));
	}
	
	public function educationNew()
	{
		$teacher = Auth::user()->profile;
		
		$subject_id = 1;
		$subject = Subject::find($subject_id);
		$degree = Degree::find($subject->degree_id);
		// return json_encode(array("Profesor" => $teacher->first(), "Materias" => $subject, "Carreras" => $degree));
		// dd(array("Profesor" => $teacher->first(), "Materias" => $subject, "Carreras" => $degree));
		
		return View::make('teacher/educationNew')->with(array('subject' => $subject, 'teacher' => $teacher));
	}
	
	public function educationCreate()
	{
		// Obtenemos los datos
		$teacher = Auth::user()->profile;
		$data = Input::all();
		$subject = Subject::find($data['subject_id']);
		
		
		$dataUpload =array(
			'title'			=> $data['title'],
			'descripcion'		=> $data['descripcion'],
			'url'			=> $data['url'],
			'subject_id'		=> $subject->id,
			'degree_id'		=> $subject->degree_id,
			'lapse'			=> $subject->lapse,
			
		);
		
		// Creamos las reglas
		$rules = array(
			'title'			=> 'required',
			'descripcion'		=> 'required',
			// 'url'			=> 'required|url',
			'subject_id'		=> 'required|exists:subjects,id',
			'degree_id'		=> 'required|exists:degrees,id',
			'lapse'			=> 'required',
		);
		
		
		// Validar el formulario con las reglas
		$validation = Validator::make($dataUpload, $rules);
		if ($validation) {
		// dd(array($validation->messages(), $data));
			
			// Creamos uno nuevo
			$education = new Education;
			
			// Cargar los datos
			$education->fill($dataUpload);
			
			// Guardar los datos
			if ($education->save()) {
				
				// Redireccionar al editor
				return Redirect::route('teacher_education_edit', array($education->id));
			
			}
			
		}
		
		// Regresamos el mensaje con errores
		return Redirect::back()->withInput()->withErrors($validation);
		
	}
	
	public function educationEdit($id)
	{
		$teacher = Auth::user()->profile;
		$education = Education::find($id);
		
		return View::make('teacher/educationEdit')->with(array('education' => $education, 'teacher' => $teacher));
	}
	
	public function educationSave()
	{
		// Obtenemos los datos
		$teacher = Auth::user()->profile;
		$data = Input::all();
		$subject = Subject::find($data['subject_id']);
		
		
		$dataUpload =array(
			'title'			=> $data['title'],
			'descripcion'		=> $data['descripcion'],
			'url'			=> $data['url'],
			'subject_id'		=> $subject->id,
			'degree_id'		=> $subject->degree_id,
			'lapse'			=> $subject->lapse,
			
		);
		
		// Creamos las reglas
		$rules = array(
			'title'			=> 'required',
			'descripcion'		=> 'required',
			// 'url'			=> 'required|url',
			'subject_id'		=> 'required|exists:subjects,id',
			'degree_id'		=> 'required|exists:degrees,id',
			'lapse'			=> 'required',
		);
		
		
		// Validar el formulario con las reglas
		$validation = Validator::make($dataUpload, $rules);
		if ($validation) {
		// dd(array($validation->messages(), $data));
			
			// Creamos uno nuevo
			// $education = new Education;
			$education = Education::find($data['education_id']);
			
			// Cargar los datos
			$education->fill($dataUpload);
			
			// Guardar los datos
			if ($education->save()) {
				
				// Redireccionar al editor
				return Redirect::route('teacher_education_edit', array($education->id));
			
			}
			
		}
		
		// Regresamos el mensaje con errores
		return Redirect::back()->withInput()->withErrors($validation);
		
	}
	
	// -------------- -------------- -------------- -------------- --------------
	// General
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
