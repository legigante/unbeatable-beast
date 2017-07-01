<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePokemonsMovesTable extends Migration
{

    /**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pokemons_moves', function(Blueprint $table)
		{
			$table->smallInteger('id')->unsigned()->autoIncrement();
			$table->smallInteger('pokemonID')->unsigned();
			$table->smallInteger('moveID')->unsigned();
            $table->tinyInteger('level');
			$table->foreign('pokemonID')->references('id')->on('pokemons')
				->onDelete('restrict')
				->onUpdate('restrict');
			$table->foreign('moveID')->references('id')->on('moves')
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
		$table->dropIndex('pokemonID');
		$table->dropIndex('moveID');
		Schema::drop('pokemons_moves');
	}

}
