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
		Schema::create('ratings', function(Blueprint $table) {
			$table->increments('id');
			
			// Usuario vinculado
			$table->integer('profile_id')->unsigned()->foreign('profile_id')->references('id')->on('profiles');
			
			// Materia vinculado
			$table->integer('subject_id')->unsigned()->foreign('subject_id')->references('id')->on('subjects');
			$table->integer('degree_id')->unsigned()->foreign('degree_id')->references('id')->on('degrees');
			$table->string('lapse');
			
			// Calificación
			$table->decimal('rating', 2, 2);
			
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
		Schema::drop('ratings');
	}

}
