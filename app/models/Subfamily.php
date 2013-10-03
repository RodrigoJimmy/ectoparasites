<?php

class Subfamily extends Eloquent {
	protected $guarded = array();

	public static $rules = array();

	// relationships

	public function genres()
	{
		$this->hasMany('Genre');
	}

	public function family()
	{
		$this->belongsTo('Family');
	}
}
