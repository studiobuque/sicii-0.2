<?php namespace Google;

class Google {

	public function __construct( Google_Client $client ){
		$this->client = $client;
		$this->init();
	}
 
	private function init(){
		$redirect = filter_var('http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'], FILTER_SANITIZE_URL);
		
		$this->client->setClientId(Config::get('google.client_id') );
		$this->client->setClientSecret(Config::get('google.client_secret'));
		
		// $this->client->setDeveloperKey(Config::get('analytics.api_key'));
		$this->client->setRedirectUri( route('teacher_education_broadcast') ); 	// teacher_education_broadcast  // $redirect // 'http://localhost:8000/login'
		$this->client->setScopes(array('https://www.googleapis.com/auth/youtube'));
	}
	
	//authenticate
	public function isLoggedIn(){
		if (isset($_SESSION['token'])) {
			$this->client->setAccessToken($_SESSION['token']);
			return true;
		}
	 
		return $this->client->getAccessToken();
	}
	
	//login
	public function login( $code ){     $this->client->authenticate($code);
		$token = $this->client->getAccessToken();
		$_SESSION['token'] = $token;
				 
		return token;
	}
	
	//getLoginUrl
	public function getLoginUrl(){
		$authUrl = $this->client->createAuthUrl();
		return $authUrl;
	}
	
	public static function conectar()
	{
		// 
	}
	
}