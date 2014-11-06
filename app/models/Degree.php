<?php

class Degree extends \Eloquent {
	protected $guarded = array();

	public static $rules = array();
	
	// protected $perPage = 5;
	
	public function subjects()
	{
		return $this->hasMany('Subject');
	}
}
