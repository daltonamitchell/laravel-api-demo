<?php

use Faker\Factory as Faker;

class ApiTester extends TestCase {

	/**
	 * Faker instance
	 * @var Faker
	 */
	protected $fake;

	/**
	 * @var integer
	 */
	protected $times = 1;

	public function __construct()
	{
		$this->fake = Faker::create();
	}

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
	 * @param  string $uri
	 * @return Response
	 */
	protected function getJson($uri)
	{
		return json_decode($this->call('GET', $uri)->getContent());
	}


	protected function assertObjectHasAtributes()
	{
		$args = func_get_args();
		$object = array_shift($args);

		foreach($args as $attribute)
		{
			$this->assertObjectHasAttribute($attribute, $object);
		}
	}

}