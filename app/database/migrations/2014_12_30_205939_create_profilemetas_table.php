<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProfilemetasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if (Schema::hasTable('profilemeta'))
		{
			Schema::rename('profilemeta', 'profilemetas');
		}
		/*Schema::create('profilemetas', function(Blueprint $table) {
			$table->increments('id');
			
			$table->timestamps();
		});*/
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		if (Schema::hasTable('profilemetas'))
		{
			Schema::rename('profilemetas', 'profilemeta');
		}
		// Schema::drop('profilemetas');
	}

}
