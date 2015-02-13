<?php


class AdministratorController extends \BaseController {
	
	public function desktop()
	{
		return View::make('administrator/desktop');
	}
	
	// -------------- -------------- -------------- -------------- --------------
	// Configuración
	public function config()
	{
		return View::make('administrator/config');
	}
	
	// Listar las Materias
	public function subject()
	{
		// Obtener las Materias
		$degrees = Degree::all();
		
		return View::make('administrator/subjets')->with('degrees', $degrees);
	}
	
	// Ver los datos de una Materia
	public function viewSubject($id)
	{
		// $student = $this->SubjectRepo->find($id);
		$subject = Subject::find($id);
		
		return View::make('administrator/subjet')->with('subject', $subject);
	}
	
	public function subjectEdit($id)
	{
		$subject = Subject::find($id);
		
		return View::make('administrator/subjetEdit')->with('subject', $subject);
	}
	
	public function subjectList($id)
	{
		$subjects = Subject::where('degree_id', '=', $id)->paginate(10);
		$degree = Degree::find($id);
		
		return View::make('administrator/subjectList')->with(array('subjects' => $subjects, 'degree' => $degree));
	}
	
	public function subjectSave()
	{
		// Obtenemos los datos del formulario
		$data = Input::only('id', 'name', 'description', 'lapse', 'degree_id');
		
		// Organizamos los datos del formulario
		$description = $data['description'];
		$description = strip_tags($description, '<p><a><strong><em><ul><ol><li>');
		$description = htmlspecialchars_decode($description, ENT_NOQUOTES);
		
		$dataUpload =array(
			'id'			=> $data['id'],
			'name'			=> $data['name'],
			'description'		=> $description,
			'lapse'			=> $data['lapse'],
			'degree_id'		=> $data['degree_id'],
			
		);
		
		// Creamos las reglas
		if ($data['id'] != false) {
			$rules = array(
				'name'		=> 'required',
				'description'	=> 'required',
				'lapse'		=> 'required',
			);
		} else {
			$rules = array(
				'id'		=> 'required|exists:subjects,id',
				'name'		=> 'required',
				'description'	=> 'required',
				'lapse'		=> 'required',
			);
		}
		
		
		// Validar el formulario con las reglas
		$validation = Validator::make($dataUpload, $rules);
		if ($validation) {
		// dd(array($validation->messages(), $data));
		
			// Buscamos el tema elegido
			// $subject = Subject::firstOrCreate(array('id' => $data['id']));
			$subject = Subject::firstOrNew(array('id' => $data['id']));
			
			$subject->fill($dataUpload);
			
			if ($subject->save()) {
				// dd($subject);
				return Redirect::route('administrator_subject_edit', array($subject->id));
			}
			
			
		}
			
		// Regresamos el mensaje con errores
		return Redirect::back()->withInput()->withErrors($validation);
		
	}
	
	public function degreeEdit($id)
	{
		$degree = Degree::find($id);
		
		return View::make('administrator/degreeEdit')->with('degree', $degree);
	}
	
	public function degreeSave()
	{
		$data = Input::all();
		$description = $data['description'];
		$description = htmlspecialchars_decode($description, ENT_NOQUOTES);
		$description = strip_tags($description, '<p><a><strong><em><ul><ol><li>');
		
		// Organizamos los datos del formulario
		$dataUpload =array(
			'id'			=> $data['id'],
			'name'			=> $data['name'],
			'mode'			=> $data['mode'],
			'description'		=> $description,
			
		);
		
		// Creamos las reglas
		$rules = array(
			'id'		=> 'required|exists:degrees,id',
			'name'		=> 'required',
			'description'	=> 'required',
		);
		
		// Validar el formulario con las reglas
		$validation = Validator::make($dataUpload, $rules);
		if ($validation) {
		// dd($validation->messages());
		
			// Buscamos el tema elegido
			$subject = Degree::firstOrCreate(array('id' => $data['id']));
			
			$subject->fill($dataUpload);
			
			if ($subject->save()) {
				// dd($subject);
				return Redirect::route('administrator_degree_edit', array('id' => $data['id']));
			}
			
			
		}
			
		// Regresamos el mensaje con errores
		return Redirect::back()->withInput()->withErrors($validation);
	}
	
	// -------------- -------------- -------------- -------------- --------------
	// Listar los Estudiantes
	public function listStudent()
	{
		// $student = $this->SubjectRepo->find($id);
		$students = Profile::all();
		
		return View::make('administrator/students')->with('students', $students);
	}
	
	// Ver los datos de un Estudiante
	public function viewStudent($student, $id)
	{
		// $student = $this->SubjectRepo->find($id);
		$student = Profile::find($id);
		
		return View::make('administrator/student')->with('student', $student);
	}
	
	// -------------- -------------- -------------- -------------- --------------
	// Usuarios Administradores
	
	// Ver las cuentas de los usuarios administradores.
	public function user()
	{
		$users = User::where('type', '=', 'admin')->get();
		
		return View::make('administrator/user')->with('users', $users);
	}
	
	// Ver una cuenta.
	public function userView($id)
	{
		$profile = Profile::find($id);
		
		return View::make('administrator/userView')->with('profile', $profile);
	}
	
	// Ver las cuentas de los usuarios administradores.
	public function userNew()
	{
		// $student = Profile::find($id);
		$data = Input::all();
		
		$rules = array(
			'first_name' 	=> 'required',
			'control' 	=> 'required',
			'email' 		=> 'required',
			'password' 	=> 'required'
		);
		
		$validator = Validator::make($data, $rules);
		// dd($validator);
		return Response::json($validator->messages());
		
		// return View::make('administrator/userNew');
	}
	
	// -------------- -------------- -------------- -------------- --------------
	// Profesores
	public function teacher()
	{
		// Buscar los profesores
		$users = User::where('type', '=', 'teacher')->get();
		
		return View::make('administrator/teacher')->with('users', $users);
	}
	
	public function teacherAsignar($id)
	{
		$profile = Profile::find($id);
		$degrees = Degree::all();
		
		return View::make('administrator/teacherAsignar')->with(array('profile' => $profile, 'degrees' => $degrees));
	}
	
	public function teacherAsignarSave()
	{
		$data = Input::all();
		
		$history = json_decode($data['history'], true);
		
		// Organizamos los datos del formulario
		$dataUpload =array(
			'profile_id'	=> $history['profile_id'],
			'degree_id'	=> $history['degree_id'],
			// 'subject_id'	=> $history['subject_id'],
			'lapse'		=> $history['lapse'],
			'status'		=> $data['status'],
		);
		
		// Creamos las reglas
		$rules = array(
			'profile_id'	=> 'required|exists:profiles,id',
			'degree_id'	=> 'required|exists:degrees,id',
			'subject_id'	=> 'required|exists:subjects,id',
			'lapse'		=> 'required',
		);
		
		// Comprobamos los datos
		$validation = Validator::make($dataUpload, $rules);
		if ($validation) {
			
			$asignar = Teacherasignatura::firstOrCreate(array('profile_id' => $history['profile_id'], 'degree_id' => $history['degree_id'], 'subject_id' => $history['subject_id'], 'lapse' => $history['lapse']));
			$asignar->fill($dataUpload);
			
			if ($asignar->save()) {
				return json_encode(array("save" => true, "status" => $data['status'], $asignar->get()));
			}
			
			return json_encode($asignar);
		}
		
		return json_encode(array($dataUpload, $validation->messages()));
		
		return View::make('administrator/teacherAsignar')->with(array('profile' => $profile, 'degrees' => $degrees));
	}
	
	// -------------- -------------- -------------- -------------- --------------
	// General
	public function adminConfig()
	{
		return View::make('administrator/config');
	}

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
