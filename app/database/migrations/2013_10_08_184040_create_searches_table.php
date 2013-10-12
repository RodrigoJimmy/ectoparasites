<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSearchesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('searches', function(Blueprint $table) {
			$table->increments('id');
			$table->text('response')->nullable();
			$table->integer('response_code')->nullable();
			$table->boolean('parsed')->default(false);
			$table->timestamps();
			
			//relationships
			$table->integer('species_id')->unsigned();
			$table->foreign('species_id')->references('id')->on('species');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('searches');
	}

}