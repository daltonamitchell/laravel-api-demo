<?php

class Lesson extends \Eloquent {

	protected $fillable = ['title','body'];

	/**
	 * @return mixed
	 */
	public function tags()
	{
		return $this->belongsToMany('Tag');
	}
}