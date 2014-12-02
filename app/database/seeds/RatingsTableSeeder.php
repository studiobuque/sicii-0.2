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
		
		$subjects = array('arquitectura', 'derecho', 'idiomas');
		$count = 0;
		
		$profiles = Profile::all();
		
		foreach($profiles as $profile) {
			$profile_name = $profile->first_name;
			$degree_id = $profile->degree->id;
			$degree_name = $profile->degree->name;
			echo "[ $profile_name : ($degree_id = $degree_name) ] ";
			
			// Ver las materias de la carrera solo del primer grado
			$subjects = Subject::where('degree_id', '=', $degree_id)->get();
			
			foreach($subjects as $subject) {
				
				$subject_id = $subject->id;
					
				$rating = Rating::create([
					'profile_id' 	=> $profile->id,
					'subject_id' 	=> $subject_id,
					'degree_id' 	=> $degree_id,
					'rating' 		=> $faker->randomFloat($nbMaxDecimals = 2, $min = 7, $max = 10),
					'lapse' 	=> '1'
				]);
				$materia = $rating->profile_id;
				$calificacion = $rating->rating;
				echo "$materia = $calificacion | ";
			}
		}
		
		echo "\n";
		
	}

}
