<?php

class Continent extends Eloquent {

	protected $table = 'continents';

	protected $guarded = array();

	public $rules = array();

	//relationships
	public function region()
	{
		$this->belongsTo('Region');
	}

	public function countries()
	{
		$this->hasMany('Country');
	}
}