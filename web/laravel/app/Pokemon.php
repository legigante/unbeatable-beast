<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pokemon extends Model
{
    protected $table = 'pokemons';
	public $timestamps = false;
	
	public function types() 
	{
		return $this->belongsToMany('App\Type', 'pokemons_types', 'pokemonID', 'typeID');
	}
	
	public function moves() 
	{
		return $this->belongsToMany('App\Move', 'pokemons_moves', 'pokemonID', 'moveID');
	}
}
