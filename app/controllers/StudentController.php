<?php


class StudentController extends \BaseController {
	
	public function desktop()
	{
		$student_id = Auth::user()->id;
		$student = Profile::find($student_id);
		
		return View::make('student/desktop')->with('student', $student);
	}
	
	public function rating()
	{
		$student_id = Auth::user()->id;
		$student = Profile::find($student_id);
		
		return View::make('student/rating')->with('student', $student);
	}
	
	public function subject()
	{
		$student_id = Auth::user()->id;
		$student = Profile::find($student_id);
		
		return View::make('student/subject')->with('student', $student);
	}
	
	public function pay()
	{
		$student_id = Auth::user()->id;
		$student = Profile::find($student_id);
		
		return View::make('student/pay')->with('student', $student);
	}
	
	public function education()
	{
		$student_id = Auth::user()->id;
		$student = Profile::find($student_id);
		
		return View::make('student/education')->with('student', $student);
	}
	
	public function comunity()
	{
		$student_id = Auth::user()->id;
		$student = Profile::find($student_id);
		
		return View::make('student/comunity')->with('student', $student);
	}
	public function comunityCreatePost()
	{
		$data = Input::all();
		$student_id = Auth::user()->id;
		$student = Profile::find($student_id);
		
		dd($data);
		
		// Regresamos el mensaje
		return Response::json($messages);
	}

}
