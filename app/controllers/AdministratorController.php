<?php


class AdministratorController extends \BaseController {
	
	public function desktop()
	{
		$usuario = "administrador";
		return View::make('administrator/desktop')->with('usuario', $usuario);
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
	
	// Incripción de alumnos
	public function viewStudentInscription()
	{
		return View::make('administrator/studentInscription');
	}
	
	// Incripción de alumnos
	public function viewStudentInscriptionNew()
	{
		$data = Input::all();
		
		/*
		// 'control', 'first_name', 'father_last_name', 'mother_last_name', 'address', 'phone', 'movile', 'subject_id', 'lapse'
		foreach ($data as $key => $val) {
			# code...
			// var_dump($key);
			echo '&#39;' . $key . '&#39; => &#39;&#39;, </br> ';
		}
		exit();
		*/
		
		// Organizamos los datos del formulario
		$dataUpload =array(
			// 'control' => , 'first_name' => , 'father_last_name' => , 'mother_last_name' => , 'address' => , 'phone' => , 'movile' => , 'subject_id' => , 'lapse' => ,
			'control' 		=> $data['control'], 
			'email' 			=> $data['email'], 
			'first_name' 		=> $data['first_name'], 
			'father_last_name' 	=> $data['father_last_name'], 
			'mother_last_name' 	=> $data['mother_last_name'], 
			'address' 		=> $data['address'], 
			'phone' 		=> $data['phone'], 
			'movile' 		=> $data['movile'], 
			'degree_id' 		=> $data['degree_id'], 
			'lapse' 			=> $data['lapse'], 
			
		);
		
		
		// Creamos las reglas
		$rules = array(
			'control' 		=> 'required|unique:users,control', 
			'email' 			=> 'required|email|unique:users,email', 
			'first_name' 		=> 'required', 
			'father_last_name' 	=> 'required', 
			'mother_last_name' 	=> 'required', 
			'address' 		=> 'required', 
			'phone' 		=> 'required', 
			'movile' 		=> 'required', 
			'degree_id' 		=> 'required|exists:degrees,id', 
			'lapse' 			=> 'required', 
		);
		
		
		// Validar el formulario con las reglas
		$validation = Validator::make($dataUpload, $rules);
		
		if ($validation->passes()) {
			//
			
			// dd(array("Mesnajes : " => $validation->messages(),'Paso? : ' => $validation->passes(), 'datos' => $dataUpload ));
			
			$user = User::create( array(
				'control' 		=> $data['control'], 
				'email' 			=> $data['email'],
				'password' 		=> $data['password'],
				'type' 			=> 'student'	// ['admin', 'teacher', 'student']);
			) );
			
			$profile = Profile::create( array(
				'user_id'		=> $user->id,
				'first_name' 		=> $data['first_name'],
				'father_last_name' 	=> $data['father_last_name'],
				'mother_last_name' 	=> $data['mother_last_name'],
				'degree_id'		=> $data['degree_id'],
				'address'		=> $data['address'],
				'phone'			=> $data['phone'],
				'movile'			=> $data['movile']
			) );
			
			// administrator_student_inscription_documentation
			return Redirect::route('administrator_student_inscription_documentation', array('control' => $user->control, 'id' => $user->id, 'alert_mensaje' => 'Se creó correctamente el alumno', 'alert_estilo' => 'success', 'alert_ico' => 'ok'));
		}
		
		// Regresamos el mensaje con errores
		return Redirect::back()->withInput()->withErrors($validation);
		// return View::make('administrator/studentInscription');
	}
	
	// Incripción de alumnos - subir la documentación
	public function viewStudentInscriptionDocumentation($control, $id)
	{
		// $users = User::where('type', '=', 'admin')->get();
		$user = User::find($id);
		
		return View::make('administrator/studentInscriptionDocumentation')->with(array('user' => $user));
	}
	
	// Incripción de alumnos - subir la documentación
	public function viewStudentInscriptionDocumentationNew()
	{
		$data = Input::all();
		$file = Input::file("image");
		$user = User::find($data['profile_id']);
		
		/*
		foreach ($data as $key => $val) {
			# code...
			// var_dump($key);
			echo '&#39;' . $key . '&#39; => &#39;&#39;, </br> ';
		}
		exit();
		*/
		
		/*
		Laravel 4.1 
		$file->getFilename();
		$file->getClientOriginalName();
		$file->getClientSize();
		$file->getClientMimeType();
		$file->guessClientExtension();
		$file->getRealPath();
		*/
		
		if (Input::hasFile('image')){
			
			// Crear un nombre unico y codificamos el id
			$profile_id = $data['profile_id'];
			$profile_id_md5 = md5($data['profile_id']);
			$file_unqid = uniqid();
			$file_extension = $file->getClientOriginalExtension();
			
			$file_name = "$profile_id" . "_$file_unqid.$file_extension";
			
			// Organizamos los datos del formulario
			$dataUpload =array(
				'profile_id'	=> $data['profile_id'],
				'filename'	=> $file
			);
			
			// Creamos las reglas
			$rules = array(
				'profile_id'	=> 'required|exists:profiles,id',
				'filename'	=> 'required|mimes:jpeg'
			);
			
			// Validar el formulario con las reglas
			$validation = Validator::make($dataUpload, $rules);
			
			// Si la validacion es correcta
			if ($validation->passes()) {
				
				// Instanciamos una Foto y le pasamos los valores
				$documentation = new Documentation;
				$documentation->profile_id = $dataUpload['profile_id'];
				$documentation->filename = $file_name;
				
				// Si se guarda
				if ( $documentation->save() ) {
					
					// Si movemos la imagen a la carpeta de perfiles y le damos el nuevo nombre
					if ( $file->move("uploads/documentation/", $file_name) ) {
						
						return Redirect::route('administrator_student_inscription_documentation', array('control' => $user->control, 'id' => $user->id, 'alert_mensaje' => 'El documento se guardo correctamente', 'alert_estilo' => 'success', 'alert_ico' => 'ok'));
						
					}
					
				}
				
				dd(array('Archivo: ' => $file, 'Datos: ' => $data));
				
			}
				
			
			// dd(array('Validation: ' => $validation->messages(), 'file name: ' => $file_name, 'Archivo: ' => $file, 'Datos: ' => $data));
		
		} // if (Input::hasFile('image'))
		
		// Regresamos el mensaje con errores
		return Redirect::back()->withInput()->withErrors($validation)->with(array('alert_mensaje' => 'Fallo la carga del documento', 'alert_estilo' => 'danger', 'alert_ico' => 'remove'));
		
		
		$user = User::find($id);
		
		return Redirect::route('administrator_student_inscription_documentation', array('control' => $user->control, 'id' => $user->id, 'alert_mensaje' => 'Se creó correctamente el alumno', 'alert_estilo' => 'success', 'alert_ico' => 'ok'));
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
		$mensaje = array();
		// $history = json_decode($data['history'], true);
		
		$profile = Profile::find($data['profile_id']);
		$degrees = Degree::all();
		// $subjects = Subject::all();
		// dd(array($data, $user ));
		
		/*
		*/
		// Organizamos los datos del formulario
		$dataUpload =array(
			'profile_id'	=> $data['profile_id'],
			// 'degree_id'	=> $history['degree_id'],
			// 'subject_id'	=> $history['subject_id'],
			// 'lapse'		=> $history['lapse'],
			// 'status'		=> $data['status'],
		);
		
		// Creamos las reglas
		$rules = array(
			'profile_id'	=> 'required|exists:profiles,id',
			// 'degree_id'	=> 'required|exists:degrees,id',
			// 'subject_id'	=> 'required|exists:subjects,id',
			// 'lapse'		=> 'required',
		);
		
		// Comprobamos los datos
		$validation = Validator::make($dataUpload, $rules);
		if ($validation->passes()) {
			
			// Pasar las carreras
			foreach ($degrees as $degree) {
				// Pasar las materias
				foreach ($degree->subjects as $subject) {
					
					$asignar = Teacherasignatura::where('profile_id', '=', $profile->id)->where('subject_id', '=', $subject->id)->first();
					$key = 'subject_' . $subject->id;
					
					// Si el select esta encendido
					if (! empty($data[$key])) {
						
						// Si la materia esta guardada
						if(! empty($asignar)){
							// Guardar true
							// var_dump(array('key' => $key, 'profile_id' => $profile->id, 'subject_id' => $subject->id, 'lapse' => $subject->lapse,  'degree_id' => $subject->degree->id, 'status' => $asignar->status, 'asign_id' => $asignar->id));
							
							$asignar->fill(array(
								'status' => 'true', 
							));
							
							if ($asignar->save()) {
								$mensaje[] = array('profile_id' => $profile->id, 'subject_id' => $subject->id, 'lapse' => $subject->lapse,  'degree_id' => $subject->degree->id, 'alert_mensaje' => 'Se guardo correctamente', 'alert_estilo' => 'success', 'alert_ico' => 'ok');
								// return Redirect::route('administrator_teacher_asignar', array('id' => $data['profile_id'], 'alert_mensaje' => 'Se guardo correctamente', 'alert_estilo' => 'success', 'alert_ico' => 'ok'));
							} else {
								// return Redirect::route('administrator_teacher_asignar', array('id' => $data['profile_id'], 'alert_mensaje' => 'Fallo al guardar', 'alert_estilo' => 'danger', 'alert_ico' => 'remove'));
								$mensaje[] = array('profile_id' => $profile->id, 'subject_id' => $subject->id, 'lapse' => $subject->lapse,  'degree_id' => $subject->degree->id, 'alert_mensaje' => 'Se guardo correctamente', 'alert_estilo' => 'danger', 'alert_ico' => 'remove');
							}
							
						// Si no
						} else {
							//Crear
							// var_dump(array('key' => $key, 'profile_id' => $profile->id, 'subject_id' => $subject->id, 'lapse' => $subject->lapse,  'degree_id' => $subject->degree->id, 'status' => 'true'));
							
							$asignar = Teacherasignatura::create(array(
								'profile_id' => $profile->id,
								'degree_id' => $subject->degree->id,
								'subject_id' => $subject->id,
								'lapse' => $subject->lapse,
								'status' => 'true',
							));
							
						}
					// No esta seleccionado
					} else {
						// Si la materia esta guardada
						if(! empty($asignar)){
							// Guardar false
							// var_dump(array('key' => $key, 'profile_id' => $profile->id, 'subject_id' => $subject->id, 'lapse' => $subject->lapse,  'degree_id' => $subject->degree->id, 'status' => $asignar->status, 'asign_id' => $asignar->id));
							
							$asignar->fill(array(
								'status' => 'false', 
							));
							
							if ($asignar->save()) {
								$mensaje[] = array('profile_id' => $profile->id, 'subject_id' => $subject->id, 'lapse' => $subject->lapse,  'degree_id' => $subject->degree->id, 'alert_mensaje' => 'Se guardo correctamente', 'alert_estilo' => 'success', 'alert_ico' => 'ok');
								// return Redirect::route('administrator_teacher_asignar', array('id' => $data['profile_id'], 'alert_mensaje' => 'Se guardo correctamente', 'alert_estilo' => 'success', 'alert_ico' => 'ok'));
							} else {
								// return Redirect::route('administrator_teacher_asignar', array('id' => $data['profile_id'], 'alert_mensaje' => 'Fallo al guardar', 'alert_estilo' => 'danger', 'alert_ico' => 'remove'));
								$mensaje[] = array('profile_id' => $profile->id, 'subject_id' => $subject->id, 'lapse' => $subject->lapse,  'degree_id' => $subject->degree->id, 'alert_mensaje' => 'Se guardo correctamente', 'alert_estilo' => 'danger', 'alert_ico' => 'remove');
							}
							
						}
						
					}
				}
			}
				
			/*
			$asignar = Teacherasignatura::firstOrCreate(array('profile_id' => $history['profile_id'], 'degree_id' => $history['degree_id'], 'subject_id' => $history['subject_id'], 'lapse' => $history['lapse']));
			$asignar->fill($dataUpload);
			
			if ($asignar->save()) {
				return json_encode(array("save" => true, "status" => $data['status'], $asignar->get()));
			}
			
			return json_encode($asignar);
			*/
		}
		
		// var_dump($mensaje);
		// return json_encode(array($dataUpload, $validation->messages()));
		// return View::make('administrator/teacherAsignar')->with(array('profile' => $profile, 'degrees' => $degrees));
		return Redirect::route('administrator_teacher_asignar', array('id' => $data['profile_id'], 'alert_mensaje' => 'Se guardaron las materias', 'alert_estilo' => 'warning', 'alert_ico' => 'exclamation-sign'));
		
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
