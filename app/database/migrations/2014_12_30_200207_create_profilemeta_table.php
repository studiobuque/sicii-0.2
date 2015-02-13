<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProfilemetaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('profilemeta', function(Blueprint $table) {
			$table->increments('id');
			
			// Usuario vinculado
			$table->integer('profile_id')->unsigned()->foreign('profile_id')->references('id')->on('profiles');
			
			$table->string('key');
			$table->longText('value');
			
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
		Schema::drop('profilemeta');
	}

}
