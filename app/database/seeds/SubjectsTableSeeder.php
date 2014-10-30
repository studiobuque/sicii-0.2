<?php

use Faker\Factory as Faker;

class SubjectsTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		// DB::table('subjects')->truncate();

		$subjects = array(
			//
		);

		// Uncomment the below to run the seeder
		// DB::table('subjects')->insert($subjects);
		
		$faker = Faker::create('es_ES');
		
		$degrees = array('Arquitectura', 'Derecho', 'Idiomas');
		$range = [1, 2, 3, 4];
		
		foreach ($degrees as $degree) {
			foreach (range(1, 4) as $lapse) {
				Subject::create([
					'name' => $faker->word,
					'description' => $faker->sentence,
					'parent' => '',
					'level' => '',
					'degree' => $degree,
					'lapse' => 1
				]);
			}
		}	
	}

}
