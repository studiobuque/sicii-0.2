<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFaltasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('faltas', function(Blueprint $table) {
			$table->increments('id');
			
			// Faltas
			$table->integer('faltas');
			
			// Usuario vinculado
			$table->integer('profile_id')->unsigned()->foreign('profile_id')->references('id')->on('profiles');
			
			// Materia vinculado
			$table->integer('subject_id')->unsigned()->foreign('subject_id')->references('id')->on('subjects');
			$table->integer('degree_id')->unsigned()->foreign('degree_id')->references('id')->on('degrees');
			$table->string('lapse');
			
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
		Schema::drop('faltas');
	}

}
