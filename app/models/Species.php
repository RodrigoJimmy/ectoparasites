<?php

class Species extends Eloquent {

	protected $table = 'species';
	
	protected $guarded = array();

	public static $rules = array();

	// relationships

	public function searches()
	{
		return $this->hasMany('Search');
	}

	public function collections()
	{
		return $this->hasMany('Collection');
	}

	public function genre()
	{
		return $this->belongsTo('Genre');
	}


}
