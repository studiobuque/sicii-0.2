<?php


class AdministratorController extends \BaseController {
	
	public function desktop()
	{
		return View::make('administrator/desktop');
	}
	
	// Listar las Materias
	public function listSubject()
	{
		// Obtener las Materias
		$degrees = Degree::all();
		
		return View::make('administrator/subjets')->with('degrees', $degrees);
	}
	
	// Ver los datos de una Materia
	public function viewSubject($student, $id)
	{
		// $student = $this->SubjectRepo->find($id);
		$subject = Subject::find($id);
		
		return View::make('administrator/subjet')->with('subject', $subject);
	}
	
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
	
	// Ver las cuentas de los usuarios administradores.
	public function user()
	{
		
		return View::make('administrator/userNew');
	}
	
	// Ver las cuentas de los usuarios administradores.
	public function userNew()
	{
		// $student = Profile::find($id);
		$data = Input::all();
		
		$rules = array(
			'first_name' => 'required',
			'control' => 'required',
			'email' => 'required',
			'password' => 'required'
		);
		
		$validator = Validator::make($data, $rules);
		// dd($validator);
		return Response::json($validator->messages());
		
		// return View::make('administrator/userNew');
	}
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
