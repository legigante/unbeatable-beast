<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePokemonstypesTable extends Migration
{

    /**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pokemons_types', function(Blueprint $table)
		{
			$table->smallInteger('id')->unsigned()->autoIncrement();
			$table->smallInteger('pokemonID')->unsigned();
			$table->tinyInteger('typeID')->unsigned();
			$table->foreign('pokemonID')->references('id')->on('pokemons')
				->onDelete('restrict')
				->onUpdate('restrict');
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
		$table->dropIndex('pokemonID');
		$table->dropIndex('typeID');
		Schema::drop('pokemons_types');
	}

}