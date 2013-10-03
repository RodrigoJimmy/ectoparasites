<?php

class Family extends Eloquent {
	protected $guarded = array();

	public static $rules = array();

	// relationships

	public function subfamilies()
	{
		$this->hasMany('Subfamily');
	}

	public function order()
	{
		$this->belongsTo('Order');
	}
}
