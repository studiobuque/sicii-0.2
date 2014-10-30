<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRatingsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ratings', function(Blueprint $table)
		{
			$table->increments('id');
			
			// Perfil vinculado
			$table->integer('profile_id')->unsigned()->foreign('user_id')->references('id')->on('profiles');
			// Materia vinculada
			$table->integer('subject_id')->unsigned()->foreign('user_id')->references('id')->on('subjects');
			
			$table->decimal('rating', 2, 2);
			$table->integer('parcial');
			
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