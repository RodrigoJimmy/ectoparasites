<?php

class Family extends Eloquent {
	protected $guarded = array();

	public static $rules = array();

	// relationships

	public function subfamilies()
	{
		return $this->hasMany('Subfamily');
	}

	public function order()
	{
		return $this->belongsTo('Order');
	}
}
