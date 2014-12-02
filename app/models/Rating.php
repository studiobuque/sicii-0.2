<?php

class Rating extends Eloquent {
	protected $guarded = array();

	public static $rules = array();
	
	public function subjectsLapse($degree_id, $profile_id, $lapse)
	{
		return $this->where('name', 'John')->where('name', 'John')->get();
	}
}
