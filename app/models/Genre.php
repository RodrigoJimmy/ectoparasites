<?php

class Genre extends Eloquent {
	protected $guarded = array();

	public static $rules = array();

	// relationships

	public function species()
	{
		return $this->hasMany('Species');
	}

	public function subfamily()
	{
		return $this->belongsTo('Subfamily');
	}
}
