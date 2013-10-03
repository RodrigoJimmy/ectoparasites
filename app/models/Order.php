<?php

class Order extends Eloquent {
	protected $guarded = array();

	public static $rules = array();

	// relationships

	public function families()
	{
		$this->hasMany('Family');
	}

	public function bioclass()
	{
		$this->belongsTo('Bioclass', 'class_id');
	}
}
