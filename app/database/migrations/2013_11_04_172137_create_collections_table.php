<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCollectionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('collections', function(Blueprint $table)
		{
			$table->increments('id');

			$table->integer('species_id')->unsigned();
			$table->integer('host_id')->unsigned();
			$table->integer('state_id')->unsigned();
			$table->integer('collector_id')->unsigned();
			$table->string('precise_location')->nullable();
			$table->date('collection_start_date');
			$table->date('collection_end_date');
			$table->string('lot_number');
			$table->string('site_number');
			$table->integer('elevation');
			$table->timestamps();

			$table->foreign('species_id')->references('id')->on('species');
			$table->foreign('host_id')->references('id')->on('hosts');
			$table->foreign('state_id')->references('id')->on('states');
			$table->foreign('collector_id')->references('id')->on('collectors');

		});	
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('collections');
	}

}