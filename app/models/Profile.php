<?php


class Profile extends \Eloquent {
	protected $guarded = array();

	public static $rules = array();
	
	// protected $perPage = 3;
	
	public function user()
	{
		return $this->hasOne('User', 'id', 'user_id');
	}
	
	public function degree()
	{
		return $this->belongsTo('Degree');
	}
	
	public function rating()
	{
		return $this->hasMany('Rating');
	}
}
