<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePokemonsTable extends Migration
{

    /**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pokemons', function(Blueprint $table)
		{
			$table->smallInteger('id')->unsigned()->autoIncrement();
			$table->smallInteger('pokeID')->unsigned()->unique();
			$table->string('species',35)->unique();
			$table->string('description',255);
			$table->float('height',6,2);
			$table->float('weight',6,2);
			$table->smallInteger('baseHP')->unsigned();
			$table->smallInteger('baseATT')->unsigned();
			$table->smallInteger('baseDEF')->unsigned();
			$table->smallInteger('baseSPC')->unsigned();
			$table->smallInteger('baseSPE')->unsigned();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('pokemons');
	}

}