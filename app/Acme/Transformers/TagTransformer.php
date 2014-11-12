<?php namespace Acme\Transformers;


class TagTransformer extends Transformer {

	/**
	 * Transform tag data for output
	 * @param  array  $lesson
	 * @return array
	 */
	public function transform($tag)
	{
		return [
			'name' => $tag['name']
		];
	}

}