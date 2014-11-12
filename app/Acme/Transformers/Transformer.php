<?php namespace Acme\Transformers;

abstract class Transformer
{
	/**
	 * Transform collection of objects for output
	 * @param  array  $items
	 * @return mixed
	 */
	public function transformCollection(array $items)
	{
		return array_map([$this, 'transform'], $items);
	}

	public abstract function transform($item);
}