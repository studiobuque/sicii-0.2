<?php

class Tema extends Eloquent {
	protected $guarded = array();

	public static $rules = array();
	
	public function degree()
	{
		return $this->belongsTo('Degree');
	}
	
	public function subject()
	{
		return $this->belongsTo('Subject');
	}
	
	public function profile()
	{
		return $this->belongsTo('Profile');
	}
	
}
