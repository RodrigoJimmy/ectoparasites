<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGenresTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('genres', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name')->unique();
			$table->integer('subfamily_id')->unsigned();
			$table->timestamps();

			$table->foreign('subfamily_id')->references('id')->on('subfamilies');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('genres');
	}

}
