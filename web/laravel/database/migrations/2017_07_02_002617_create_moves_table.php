<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMovesTable extends Migration
{

    /**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('moves', function(Blueprint $table)
		{
			$table->smallInteger('id')->unsigned()->autoIncrement();
			$table->tinyInteger('typeID');
			$table->string('name',35)->unique();
			$table->string('description',25);
			$table->tinyInteger('pp');
			$table->smallInteger('power');
			$table->tinyInteger('accuracy');
			$table->tinyInteger('effectPerCent');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		$table->dropIndex('typeID');
		Schema::drop('moves');
	}

}