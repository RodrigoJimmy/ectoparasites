<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateIrnsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('irns', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('irn')->unsigned()->unique();
			$table->text('response')->nullable();
			$table->integer('response_code')->nullable();
			$table->boolean('parsed')->default(false);
			$table->timestamps();

			//relationships
			$table->integer('search_id')->unsigned();
			$table->foreign('search_id')->references('id')->on('searches');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('irns');
	}

}