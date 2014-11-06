<?php

use Faker\Factory as Faker;
use Sicii\Entities\Subject;
use Sicii\Entities\Degree;

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
		$degree_id = 1;
		foreach ($degrees as $degree) {
			Degree::create([
				'name' 		=> $degree,
				'description' 	=> $faker->paragraph($nbSentences = 6),
				'lapse' 		=> '8',
				'mode' 		=> 'semestral',
			]);
			
			foreach(range(1, 8) as $lapse){
				$subjectsNum = $faker->numberBetween($min = 3, $max = 6);
				foreach(range(1, $subjectsNum) as $subject_id){
					Subject::create([
						'name' => $faker->sentence($nbWords = 3),
						'description' => $faker->paragraph($nbSentences = 6),
						'parent' => '',
						'level' => '',
						'degree_id' => $degree_id,
						'lapse' => $lapse,
					]);
				}
					
			}
			
			$degree_id++;
		}
		
		/** Este no funciono, por que no relaciona bien las Carreras con sus Materias
		foreach(range(1, 20) as $profile){
			Degree::create([
				'name' 		=> $faker->sentence($nbWords = 3),
				'description' 	=> $faker->paragraph($nbSentences = 6),
				'lapse' 		=> '8',
			]);
		}
		
		$range = [1, 2, 3, 4];
		
		foreach ($degrees as $degree) {
			// foreach (range(1, 4) as $lapse) {
				Subject::create([
					'name' => $faker->word,
					'description' => $faker->sentence,
					'parent' => '',
					'level' => '',
					'degree' => $degree,
					'lapse' => 1
				]);
			// }
		}	*/
	}

}
