<?php

class Collector extends Eloquent {

	protected $table = 'collectors';

	protected $guarded = array();

	public $rules = array();

	// relationships

	public function collections() 
	{
		return $this->hasMany('Collection');
	}
}