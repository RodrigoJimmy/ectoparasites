<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSubfamilesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('subfamiles', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name');
			$table->boolean('old_world');
			$table->boolean('new_world');
			$table->timestamps();

			$table->foreign('family_id')->references('id')->on('families');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('subfamiles');
	}

}
