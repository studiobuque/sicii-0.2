<?php

// use Sicii\Google;

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
		$teacher = Auth::user()->profile;
		$degree = Degree::find(1);
		// $asignar = Teacherasignatura::where('profile_id', '=', $profile->id)->where('subject_id', '=', $subject->id)->first();
		$asignar = Teacherasignatura::where('profile_id', '=', $teacher->id)->get();
		
		return View::make('teacher/ratings')->with(array('degree' => $degree, 'teacher' => $teacher, 'asignar' => $asignar));
	}
	
	public function ratingsSubject($id)
	{
		$subject = Subject::find($id);
		$students = Profile::where('degree_id', '=', $subject->degree->id )->get();
		
		return View::make('teacher/ratingsSubject')->with(array('subject' => $subject, 'students' => $students));
	}
	
	public function ratingsSubjectSave()
	{
		
		$data = Input::all();
		$subject = Subject::find($data['subject_id']);
		$students = Profile::where('degree_id', '=', $subject->degree->id )->get();
		
		
		
		// Iterar cada alumno
		foreach ($students as $student) {
			
			$calificar = Rating::where('profile_id', '=', $student->id)->where('subject_id', '=', $data['subject_id'])->first();
			$key = 'studetRating_' . $student->id;
			
			// Si tiene calificación
			if (! empty($data[$key])){
				
				if(! empty($calificar)){
					
					if( intval($calificar->rating) != $data[$key]) {
						
						$calificar->fill(array(
							'rating' => $data[$key] 
						));
						$calificar->save();
					}
					
				} else {
					
					$calificar = Rating::create(array(
						'profile_id' => $student->id,
						'subject_id' => $subject->id,
						'degree_id' => $subject->degree->id,
						'lapse' => $subject->lapse,
						'rating' => $data[$key]
					));
				}
			}
		}
		
		return Redirect::route('teacher_ratings_subject', array('id' => $data['subject_id'], 'alert_mensaje' => 'Se guardo correctamente', 'alert_estilo' => 'success', 'alert_ico' => 'ok'));
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
	
	/*
	 * Agregar clases a laravel
	 * http://bit.ly/1ALzXeA
	 */
	
	/*
	private $ga;
	
	// public function __construct( GA_Service $ga ){
	public function __construct( Google $ga ){
		$this->ga = $ga;
	}
	*/
 
	public function educationBroadcast()
	{
		/*
		 * You can acquire an OAuth 2.0 client ID and client secret from the
		 * {{ Google Cloud Console }} <{{ https://cloud.google.com/console }}>
		 * For more information about using OAuth 2.0 to access Google APIs, please see:
		 * <https://developers.google.com/youtube/v3/guides/authentication>
		 * Please ensure that you have enabled the YouTube Data API for your project.
		 */
		
		// $htmlBody = "";
		$client_id = Config::get('google.client_id');
		$client_secret = Config::get('google.client_secret');
		$redirect = filter_var(route('teacher_education_broadcast'), FILTER_SANITIZE_URL);
		$key_file_location = base_path() . Config::get('google.key_file_location');
		
		$client = new \Google_Client();
		$client->setClientId($client_id);
		$client->setClientSecret($client_secret);
		$client->setScopes('https://www.googleapis.com/auth/youtube');
		$client->setRedirectUri($redirect);
		// echo '<h2>$client</h2>'; var_dump(array($client)); echo "<hr>";
		
		if (Input::has('code')) {
			// if (strval($_SESSION['state']) !== strval($_GET['state'])) {
			if (strval(Session::get('state')) !== strval(Input::get('state')) ){
				die('The session state did not match.');
			}
			
			$client->authenticate(Input::get('code'));
			// $_SESSION['token'] = $client->getAccessToken();
			Session::put('state', $client->getAccessToken());
			// header('Location: ' . $redirect);
			// return Response::make('')->header('Location: ', filter_var($redirect, FILTER_SANITIZE_URL));
			
		} else {
			echo '<h2>No hay datos en _GET code</h2>'; echo "<hr>";
		}
		
		if (Session::has('token')) {
			echo '<h2>_SESSION = $state</h2>'; var_dump(Session::get('state')); echo "<hr>";
			
			// $client->setAccessToken($_SESSION['token']);
			$client->setAccessToken(Session::get('token'));
		} else {
			echo '<h2>No hay datos en _SESSION state</h2>'; var_dump(Session::all()); echo "<hr>";
		}/**/
		
		if ($client->getAccessToken()) {
			echo '<h2>$client->getAccessToken</h2>'; var_dump($client->getAccessToken()); echo "<hr>";
			
			try {
				// Define an object that will be used to make all API requests.
				$htmlBody = "";
				
				// $youtube = new Google_Service_YouTube($client);
				// echo '<h2>$youtube</h2>'; var_dump($youtube); echo "<hr>";
				
				$broadcastSnippet = new Google_Service_YouTube_LiveBroadcastSnippet($client);
				$broadcastSnippet->setTitle('New Broadcast');
				$broadcastSnippet->setScheduledStartTime('2034-01-30T00:00:00.000Z');
				$broadcastSnippet->setScheduledEndTime('2034-01-31T00:00:00.000Z');
				echo '<h2>$broadcastSnippet</h2>'; var_dump($broadcastSnippet); echo "<hr>";
				
				// Create an object for the liveBroadcast resource's status, and set the
				// broadcast's status to "private".
				$status = new Google_Service_YouTube_LiveBroadcastStatus();
				$status->setPrivacyStatus('private');
				echo '<h2>$status</h2>'; var_dump($status); echo "<hr>";
				
				// Create the API request that inserts the liveBroadcast resource.
				$broadcastInsert = new Google_Service_YouTube_LiveBroadcast();
				$broadcastInsert->setSnippet($broadcastSnippet);
				$broadcastInsert->setStatus($status);
				$broadcastInsert->setKind('youtube#liveBroadcast');
				echo '<h2>$broadcastInsert</h2>'; var_dump($broadcastInsert); echo "<hr>";

				// Execute the request and return an object that contains information
				// about the new broadcast.
				$broadcastsResponse = $youtube->liveBroadcasts->insert('snippet,status',
						$broadcastInsert, array());

				/*
				// Create an object for the liveStream resource's snippet. Specify a value
				// for the snippet's title.
				$streamSnippet = new Google_Service_YouTube_LiveStreamSnippet();
				$streamSnippet->setTitle('New Stream');

				// Create an object for content distribution network details for the live
				// stream and specify the stream's format and ingestion type.
				$cdn = new Google_Service_YouTube_CdnSettings();
				$cdn->setFormat("1080p");
				$cdn->setIngestionType('rtmp');

				// Create the API request that inserts the liveStream resource.
				$streamInsert = new Google_Service_YouTube_LiveStream();
				$streamInsert->setSnippet($streamSnippet);
				$streamInsert->setCdn($cdn);
				$streamInsert->setKind('youtube#liveStream');

				// Execute the request and return an object that contains information
				// about the new stream.
				$streamsResponse = $youtube->liveStreams->insert('snippet,cdn,status',
						$streamInsert, array());

				// Bind the broadcast to the live stream.
				$bindBroadcastResponse = $youtube->liveBroadcasts->bind(
						$broadcastsResponse['id'],'id,contentDetails',
						array(
								'streamId' => $streamsResponse['id'],
						));

				$htmlBody .= "<h3>Added Broadcast</h3><ul>";
				$htmlBody .= sprintf('<li>%s published at %s (%s)</li>',
						$broadcastsResponse['snippet']['title'],
						$broadcastsResponse['snippet']['publishedAt'],
						$broadcastsResponse['id']);
				$htmlBody .= '</ul>';

				$htmlBody .= "<h3>Added Stream</h3><ul>";
				$htmlBody .= sprintf('<li>%s (%s)</li>',
						$streamsResponse['snippet']['title'],
						$streamsResponse['id']);
				$htmlBody .= '</ul>';

				$htmlBody .= "<h3>Bound Broadcast</h3><ul>";
				$htmlBody .= sprintf('<li>Broadcast (%s) was bound to stream (%s).</li>',
						$bindBroadcastResponse['id'],
						$bindBroadcastResponse['contentDetails']['boundStreamId']);
				$htmlBody .= '</ul>';
				*/
				
				// echo '<h2>$broadcastSnippet</h2>'; var_dump($broadcastSnippet); echo "<hr>";
				
			} catch (Google_ServiceException $e) {
				$htmlBody .= sprintf('<p>A service error occurred: <code>%s</code></p>',
						htmlspecialchars($e->getMessage()));
			} catch (Google_Exception $e) {
				$htmlBody .= sprintf('<p>An client error occurred: <code>%s</code></p>',
						htmlspecialchars($e->getMessage()));
			}
			
		} else {
			
			// If the user hasn't authorized the app, initiate the OAuth flow
			$state = mt_rand();
			$client->setState($state);
			// $_SESSION['state'] = $state;
			Session::put('state', $state);
			$authUrl = $client->createAuthUrl();
			
			echo '<h1>Usuario no esta autorizado</h1>';
			echo '<h2>$state</h2>'; var_dump($state); echo "<hr>";
			echo '<h2>createAuthUrl</h2>'; var_dump($authUrl); echo "<hr>";
			
			$htmlBody = <<<END
			<h3>Authorization Required</h3>
			<p>You need to <a href="$authUrl">authorize access</a> before proceeding.<p>
END;
			
		}
		
		
		return $htmlBody;
		
		if($client->isAccessTokenExpired()) {
			echo '<h2>Access Token Expired</h2>'; // Debug
			
			/*$client->authenticate();
			$NewAccessToken = json_decode($client->getAccessToken());
			// $client->refreshToken($NewAccessToken->refresh_token);*/
			
			
			$authUrl = $client->createAuthUrl();
			// header('Location: ' . filter_var($authUrl, FILTER_SANITIZE_URL));
			return Response::make('', 302)->header('Location: ', filter_var($authUrl, FILTER_SANITIZE_URL));
			
			/*
			<iframe width="420" height="315" src="http://www.youtube.com/embed/AlxB98fDDjc" frameborder="0" allowfullscreen></iframe>
			http://youtu.be/AlxB98fDDjc
			*/
		}/**/

		
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
