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
			$table->tinyInteger('typeID')->unsigned();
			$table->string('name',35)->unique();
			$table->string('description',255);
			$table->tinyInteger('pp')->unsigned();
			$table->smallInteger('power')->unsigned();
			$table->tinyInteger('accuracy')->unsigned();
			$table->tinyInteger('effectProbability')->unsigned();
			$table->foreign('typeID')->references('id')->on('types')
				->onDelete('restrict')
				->onUpdate('restrict');
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