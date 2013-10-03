<?php

class Subfamily extends Eloquent {
	protected $guarded = array();

	public static $rules = array();

	// relationships

	public function genres()
	{
		return $this->hasMany('Genre');
	}

	public function family()
	{
		return $this->belongsTo('Family');
	}
}
