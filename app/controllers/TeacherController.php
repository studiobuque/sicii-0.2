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
		// $student = Profile::find(1);
		
		return View::make('teacher/desktop');
	}
	
	public function ratings()
	{
		// $student = Profile::find(1);
		// return View::make('student/subject')->with('student', $student);
		return View::make('teacher/ratings');
	}
	
	public function education()
	{
		// $student = Profile::find(1);
		// return View::make('student/subject')->with('student', $student);
		return View::make('teacher/education');
	}
	
	public function advisor()
	{
		// $student = Profile::find(1);
		// return View::make('student/subject')->with('student', $student);
		return View::make('teacher/advisor');
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
