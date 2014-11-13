<?php

use Faker\Factory as Faker;

abstract class ApiTester extends TestCase {

	/**
	 * Faker instance
	 * @var Faker
	 */
	protected $fake;

	public function __construct()
	{
		$this->fake = Faker::create();
	}

	/**
	 * @param  string $uri
	 * @param  string $method
	 * @param  array $params
	 * @return Response
	 */
	protected function getJson($uri, $method = 'GET', $params = [])
	{
		return json_decode($this->call($method, $uri, $params)->getContent());
	}

	/**
	 * Check multiple attributes exist on an object
	 */
	protected function assertObjectHasAttributes()
	{
		$args = func_get_args();
		$object = array_shift($args);

		foreach($args as $attribute)
		{
			$this->assertObjectHasAttribute($attribute, $object);
		}
	}

	/**
	 * @throws BadMethodCallException
	 */
	protected function getStub()
	{
		throw new BadMethodCallException("Create your own getStub method to declare your fields.", 1);
		
	}
}