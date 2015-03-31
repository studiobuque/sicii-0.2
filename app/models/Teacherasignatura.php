<?php

class Teacherasignatura extends Eloquent {
	protected $guarded = array();

	public static $rules = array();
	
	
	public function subject()
	{
		return $this->hasOne('Subject', 'id', 'subject_id');
	}
}
