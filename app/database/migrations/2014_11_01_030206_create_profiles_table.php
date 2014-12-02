<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProfilesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('profiles', function(Blueprint $table) {
			$table->increments('id');
			// Usuario vinculado
			$table->integer('user_id')->unsigned()->foreign('user_id')->references('id')->on('users');
			// Carrera vinculada
			$table->integer('degree_id')->unsigned()->foreign('degree_id')->references('id')->on('degrees');
			// Todos los datos necesarios para la UCIL
			$table->string('first_name');
			$table->string('father_last_name');
			$table->string('mother_last_name');
			$table->string('address');
			$table->string('phone');
			$table->string('movile');
			
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('profiles');
	}

}
