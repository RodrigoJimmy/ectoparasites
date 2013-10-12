<?php

class Irn extends Eloquent {
	protected $guarded = array();

	public static $rules = array();

	//relationships

	public function search()
	{
		return $this->belongsTo('Search');
	}
}
