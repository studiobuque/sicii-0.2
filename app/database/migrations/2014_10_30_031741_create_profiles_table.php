<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('profiles', function(Blueprint $table)
		{
			$table->increments('id');
			// Usuario vinculado
			$table->integer('user_id')->unsigned()->foreign('user_id')->references('id')->on('users');
			// Carrera designada, por la materia en nivel 1
			$table->integer('subjects_id')->unsigned()->foreign('subjects_id')->references('id')->on('subjects');
			
			// Todos los datos necesarios para la UCIL
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
		//
	}

}
