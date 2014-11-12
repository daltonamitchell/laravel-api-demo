<?php namespace Acme\Transformers;

class LessonTransformer extends Transformer
{
	/**
	 * Transform lesson data for output
	 * @param  array  $lesson
	 * @return array
	 */
	public function transform(array $lesson)
	{
		return [
			'title' => $lesson['title'],
			'body' => $lesson['body'],
			'active' => (boolean)$lesson['some_bool']
		];
	}

}