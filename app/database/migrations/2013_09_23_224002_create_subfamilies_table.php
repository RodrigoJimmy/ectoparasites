<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSubfamiliesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('subfamilies', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name')->unique();
			$table->boolean('old_world')->default(0);
			$table->boolean('new_world')->default(0);
			$table->integer('family_id')->unsigned();
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
		Schema::drop('subfamilies');
	}

}
