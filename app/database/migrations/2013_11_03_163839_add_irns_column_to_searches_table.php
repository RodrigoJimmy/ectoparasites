<?php

use Illuminate\Database\Migrations\Migration;

class AddIrnsColumnToSearchesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('searches', function($table)
		{
			$table->integer('irns_found')->unsigned()->nullable()->after('parsed');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('searches', function($table)
		{
		    $table->dropColumn('irns_found');
		});	}

}