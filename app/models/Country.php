<?php

class Country extends Eloquent {

	protected $table = 'countries';

	protected $guard = array();

	public $rules = array();

	// relationships
	public function continent()
	{
		$this->belongsTo('Continent');
	}

	public function states()
	{
		$this->hasMany('State');
	}
}