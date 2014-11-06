<?php


class StudentController extends \BaseController {

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
		$student = Profile::find(1);
		
		return View::make('student/desktop')->with('student', $student);
	}
	
	public function rating()
	{
		$student = Profile::find(1);
		
		return View::make('student/rating')->with('student', $student);
	}
	
	public function subject()
	{
		$student = Profile::find(1);
		
		return View::make('student/subject')->with('student', $student);
	}
	
	public function pay()
	{
		$student = Profile::find(1);
		
		return View::make('student/pay')->with('student', $student);
	}
	
	public function education()
	{
		$student = Profile::find(1);
		
		return View::make('student/education')->with('student', $student);
	}
	
	// Listar las Materias
	public function listSubject($subject, $id)
	{
		// 
		$subjects = Subject::find($id);
		
		return View::make('student/subjets')->with('subjects', $subjects);
	}
	
	// Listar los Estudiantes
	public function listStudent($student, $id)
	{
		// $student = $this->SubjectRepo->find($id);
		$students = Profile::find($id);
		
		return View::make('student/students')->with('students', $students);
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
