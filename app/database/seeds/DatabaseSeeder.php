<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Add tables to be seeded here 
	 * @var array
	 */
	private $tables = [
		'lessons',
		'tags',
		'lesson_tag'
	];

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{

		Eloquent::unguard();

		$this->call('LessonsTableSeeder');
		$this->call('TagsTableSeeder');
		$this->call('LessonTagTableSeeder');
	}

	/**
	 * Clean DB before seeding
	 */
	private function cleanDatabase()
	{
		DB::statement('SET FOREIGN_KEY_CHECKS=0');

		foreach ($this->tables as $tableName) {
			DB::table($tableName)->truncate();
		}

		DB::statement('SET FOREIGN_KEY_CHECKS=1');
	}
}
