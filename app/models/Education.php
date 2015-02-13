<?php

class Education extends Eloquent {
	protected $guarded = array();

	public static $rules = array();
	
	public function subjects()
	{
		return $this->hasMany('Subject');
		// return $this->belongsTo('Subject');
	}
	
	public function subject()
	{
		// return $this->hasOne('Subject');
		return $this->belongsTo('Subject');
	}
	
}
