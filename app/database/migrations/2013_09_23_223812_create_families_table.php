<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFamiliesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('families', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name')->unique();
			$table->date('year');
			$table->integer('order_id')->unsigned();
			$table->timestamps();

			$table->foreign('order_id')->references('id')->on('orders');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('families');
	}

}
