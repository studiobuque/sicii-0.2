<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTemasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('temas', function(Blueprint $table) {
			$table->increments('id');
			
			$table->integer('tema_id');
			$table->string('title');
			$table->longText('descripcion');
			$table->enum('type', array('comunity', 'partner'));
			
			// Usuario vinculado
			$table->integer('profile_id')->unsigned()->foreign('profile_id')->references('id')->on('profiles');
			
			// Materia vinculado como categorias
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
		Schema::drop('temas');
	}

}
