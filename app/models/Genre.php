<?php

class Genre extends Eloquent {
	protected $guarded = array();

	public static $rules = array();

	// relationships

	public function species()
	{
		$this->hasMany('Species');
	}

	public function subfamily()
	{
		$this->belongsTo('Subfamily');
	}
}
