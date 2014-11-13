<?php

trait Factory {

	/**
	 * @var integer
	 */
	protected $times = 1;

	/**
	 * Specify number of times to run something
	 * @param  int $count
	 */
	protected function times($count)
	{
		$this->times = $count;

		return $this;
	}

	/**
	 * Make new DB record for testing
	 * @param  		 $type
	 * @param  array $fields
	 * @throws BadMethodCallException
	 */
	protected function make($type, array $fields = [])
	{
		while ($this->times--) {
			$stub = array_merge($this->getStub(), $fields);

			$type::create($stub);
		}
	}

}