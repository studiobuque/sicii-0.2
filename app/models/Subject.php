<?php

class Subject extends Eloquent {
	protected $guarded = array();

	public static $rules = array();
	
	// protected $perPage = 3;
	
	public function profiles()
	{
		return $this->hasMany('Profile');
		// return $this->belongsTo('Profile');
	}
	public function rating()
	{
		return $this->hasOne('Rating');
	}
	public function degree()
	{
		return $this->belongsTo('Degree');
	}
}
