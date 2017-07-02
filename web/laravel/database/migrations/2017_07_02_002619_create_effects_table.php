<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEffectsTable extends Migration
{

    /**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('effects', function(Blueprint $table)
		{
			$table->tinyInteger('id')->unsigned()->autoIncrement();
			$table->string('name',35)->unique();
			$table->string('description',25);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('effects');
	}

}