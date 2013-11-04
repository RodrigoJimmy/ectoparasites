<?php

class State extends Eloquent {

	protected $table = 'states';

	protected $guarded = array();

	public $rules = array();

	// relationships
	public function country()
	{
		$this->belongsTo('Country');
	}

	public function collections()
	{
		$this->hasMany('Collection');
	}
}