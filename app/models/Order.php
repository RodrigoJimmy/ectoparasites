<?php

class Order extends Eloquent {
	protected $guarded = array();

	public static $rules = array();

	// relationships

	public function families()
	{
		return $this->hasMany('Family');
	}

	public function bioclass()
	{
		return $this->belongsTo('Bioclass', 'class_id');
	}
}
