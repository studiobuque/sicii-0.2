<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTeacherasignaturasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('teacherasignaturas', function(Blueprint $table) {
			$table->increments('id');
			
			// Usuario vinculado
			$table->integer('profile_id')->unsigned()->foreign('profile_id')->references('id')->on('profiles');
			
			// Materia vinculada
			$table->integer('degree_id')->unsigned()->foreign('degree_id')->references('id')->on('degrees');
			$table->integer('subject_id')->unsigned()->foreign('subject_id')->references('id')->on('subjects');
			$table->string('lapse');
			$table->string('status');
			
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
		Schema::drop('teacherasignaturas');
	}

}
