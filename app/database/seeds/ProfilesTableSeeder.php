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
		
		foreach(range(1, 20) as $index)
		{
			$user = User::create( array(
				'first_name' 		=> $faker->firstName,
				'last_name' 		=> $faker->lastName,
				'control' 		=> $faker->numerify($string = '########'),
				'email' 			=> $faker->freeEmail,
				'password' 		=> \Hash::make('123456'),
				'type' 			=> 'student'	// ['admin', 'teacher', 'student']);
			) );
			
			Profile::create( array(
				'user_id'	=> $user->id,
				'subjects_id'	=> $faker->numberBetween($min = 1, $max = 3),
				'address'	=> $faker->streetAddress,
				'phone'		=> $faker->phoneNumber,
				'movile'		=> $faker->phoneNumber
			) );
		}
	}

}
