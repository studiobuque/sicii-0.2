<?php

use Faker\Factory as Faker;

class ProfilesTableSeeder extends Seeder {

	public function run()
	{
		/*
		// Uncomment the below to wipe the table clean before populating
		// DB::table('profiles')->truncate();

		$profiles = array(

		);

		// Uncomment the below to run the seeder
		// DB::table('profiles')->insert($profiles);
		*/
		
		$faker = Faker::create('es_ES');
		
		foreach(range(1, 20) as $users_num) {
			$user = User::create( array(
				'control' 		=> 3 . $faker->numerify($string = '########'),
				'email' 			=> $faker->freeEmail,
				'password' 		=> \Hash::make('123456'),
				'type' 			=> 'student'	// ['admin', 'teacher', 'student']);
			) );
			
			Profile::create( array(
				'first_name' 		=> $faker->firstName,
				'father_last_name' 		=> $faker->lastName,
				'mother_last_name' 		=> $faker->lastName,
				'user_id'	=> $user->id,
				'degree_id'	=> $faker->numberBetween($min = 1, $max = 3),
				'address'	=> $faker->streetAddress,
				'phone'		=> $faker->phoneNumber,
				'movile'		=> $faker->phoneNumber
			) );
		}
	}

}
