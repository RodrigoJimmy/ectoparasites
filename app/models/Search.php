<?php

class Search extends Eloquent {
	protected $guarded = array();

	public static $rules = array();

	//relationships

	public function irns()
	{
		return $this->hasMany('Irn');
	}

	public function species()
	{
		return $this->belongsTo('Species', 'species_id');
	}
}
