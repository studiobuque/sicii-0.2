<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSubjectsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('subjects', function(Blueprint $table) {
			$table->increments('id');
			
			$table->string('name');
			$table->string('description');
			$table->string('parent');
			$table->tinyInteger('level');
			$table->integer('degree_id')->unsigned()->foreign('degree_id')->references('id')->on('degrees');
			$table->integer('lapse');
			
			
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
		Schema::drop('subjects');
	}

}
