<?php

class Lesson extends \Eloquent {

	protected $fillable = ['title','body','some_bool'];

	/**
	 * @return mixed
	 */
	public function tags()
	{
		return $this->belongsToMany('Tag');
	}
}