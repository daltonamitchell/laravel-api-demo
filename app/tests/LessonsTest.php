<?php

class LessonsTest extends ApiTester {

	/** @test **/
	public function it_fetches_lessons()
	{
		// arrange
		$this->times(1)->makeLesson();

		// act
		$this->getJson('api/v1/lessons');

		// assert
		$this->assertResponseOk();
	}

	/** @test **/
	public function it_fetches_a_single_lesson()
	{
		$this->makeLesson();

		$lesson = $this->getJson('api/v1/lessons/1')->data;

		$this->assertResponseOk();

		$this->assertObjectHasAttributes($lesson, 'title', 'body', 'active');
	}


	private function makeLesson($lessonFields = [])
	{
		$lesson = array_merge([
			'title' => $this->fake->sentence,
			'body' => $this->fake->paragraph,
			'some_bool' => $this->fake->boolean
		], $lessonFields);

		while($this->times--) Lesson::create($lesson);
	}



}
