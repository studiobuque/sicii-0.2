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
	
	public function ratings()
	{
		$degree = Degree::find(2);
		return View::make('teacher/ratings')->with('degree', $degree);
	}
	
	public function ratingsSubject($id)
	{
		$subject = Subject::find($id);
		// dd($subject);
		$degree = Degree::find(2);
		$students = Profile::where('degree_id', '=', $degree->id )->get();
		
		return View::make('teacher/ratingsSubject')->with(array('degree' => $degree, 'subject' => $subject, 'students' => $students));
	}
	
	public function education()
	{
		return View::make('teacher/education');
	}
	
	public function advisor()
	{
		$teacher = Auth::user()->profile;
		$temas = Tema::where('tema_id', '=', '0')->where('type', '=', 'partner')->orderBy('updated_at', 'DESC')->paginate(5);
		
		return View::make('teacher/advisor')->with('temas', $temas);
	}
	
	public function advisorPostView($id)
	{
		$teacher = Auth::user()->profile;
		$tema = Tema::find($id);
		
		return View::make('teacher/advisorPostView')->with('tema', $tema);
	}
	
	public function advisorPostNew()
	{
		// Obtenemos los datos
		$teacher = Auth::user()->profile;
		$data = Input::all();
		$subject = Subject::find($data['subject_id']);
		// $data[tema_id]
		
		// Si no es una respuesta
		if ( ! $data['respuesta'])
		{
			dd('No es respuesta');
			
		} else {
			
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
		}
		
		// Validar el formulario con las reglas
		$validation = Validator::make($dataUpload, $rules);
		if ($validation) {
			
			// Crear nuevo tema
			if ($thema = Tema::create($dataUpload)) {
				return Redirect::route('teacher_advisor_post_view', array('id' => $thema->tema_id));
			}
			
		}
			
		// $respuesta = array(json_decode(json_encode($teacher), true), json_decode(json_encode($data), true));
		$respuesta = json_decode(json_encode($teacher), true);
		return Response::json($validation->mesaj);
		// dd($data, ' - - > ',$teacher);
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
