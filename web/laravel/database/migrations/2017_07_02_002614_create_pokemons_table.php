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
			$table->smallInteger('num')->unsigned()->unique();
			$table->string('name',35)->unique();
			$table->string('description',25);
			$table->float('height',6,2);
			$table->float('weight',6,2);
			$table->smallInteger('baseHP');
			$table->smallInteger('baseATT');
			$table->smallInteger('baseDEF');
			$table->smallInteger('baseSPE');
			$table->smallInteger('baseVIT');
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