<?php

class Host extends Eloquent {

	protected $table = 'hosts';

	protected $guarded = array();

	public $rules = array();

	// relationships

	public function collections() 
	{
		$this->hasMany('Collection');
	}
}