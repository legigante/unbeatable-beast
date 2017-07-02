<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMovesEffectsTable extends Migration
{

    /**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('moves_effects', function(Blueprint $table)
		{
			$table->smallInteger('id')->unsigned()->autoIncrement();
			$table->smallInteger('moveID')->unsigned();
			$table->tinyInteger('effectID')->unsigned();
			$table->foreign('moveID')->references('id')->on('moves')
				->onDelete('restrict')
				->onUpdate('restrict');
			$table->foreign('effectID')->references('id')->on('effects')
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
		$table->dropIndex('moveID');
		$table->dropIndex('effectID');
		Schema::drop('moves_effects');
	}

}