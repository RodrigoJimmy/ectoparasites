<?php

class Bioclass extends Eloquent {
	
	protected $table = 'classes';

	protected $guarded = array();

	public static $rules = array();

	// relationships
	public function orders()
	{
		return $this->hasMany('Order');
	}

	public function phylum()
	{
		return $this->belongsTo('Phylum');
	}
}
