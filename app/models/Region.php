<?php

class Region extends Eloquent {

	protected $table = 'regions';

	protected $guarded = array();

	public $rules = array();

	//relationships
	public function continents()
	{
		$this->hasMany('Continent');
	}

}