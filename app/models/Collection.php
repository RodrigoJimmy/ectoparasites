<?php

class Collection extends Eloquent {

	protected $table = 'collections';

	protected $guarded = array();

	public $rules = array();

	// relationships
	public species()
	{
		$this->belongsTo('Species');
	}

	public collector()
	{
		$this->belongsTo('Collector');
	}

	public state()
	{
		$this->belongsTo('State');
	}

	public function host()
	{
		$this->belongsTo('host');
	}
}