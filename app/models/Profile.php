<?php


class Profile extends \Eloquent {
	protected $fillable = array('user_id', 'first_name', 'father_last_name', 'mother_last_name', 'address', 'phone', 'movile');
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
		return $this->hasOne('Rating');
	}
}
