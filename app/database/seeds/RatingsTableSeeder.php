<?php

use Faker\Factory as Faker;

class RatingsTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		// DB::table('ratings')->truncate();

		$ratings = array(

		);

		// Uncomment the below to run the seeder
		// DB::table('ratings')->insert($ratings);
		
		$faker = Faker::create('es_ES');
		
		$subjects = array('Arquitectura', 'Derecho', 'Idiomas');
		$count = 0;
		
		foreach(range(1, 20) as $profile) {
			foreach(range(1, 3) as $degree) {
				foreach(range(1, 4) as $lapse) {
					$count++;
					Rating::create([
						'profile_id' 	=> $profile,
						// 'subject_id' 	=> $count,
						'subject_id' 	=> $degree*$lapse,
						'rating' 		=> $faker->randomFloat($nbMaxDecimals = 2, $min = 7, $max = 10),
						'parcial' 	=> '1'
					]);
				}
			}
		}
		
	}

}
