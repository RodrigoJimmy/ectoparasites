<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSpeciesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('species', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name')->unique();
			$table->integer('genre_id')->unsigned();
			$table->timestamps();

			$table->foreign('genre_id')->references('id')->on('genres');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('species');
	}

}
