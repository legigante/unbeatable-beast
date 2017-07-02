<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Move extends Model
{
    protected $table = 'Moves';
	
	public function pokemons() 
	{
		return $this->belongsToMany('App\Pokemon', 'pokemons_moves', 'moveID', 'pokemonID');
	}
	
    public function type()
    {
        return $this->belongsTo('App\Type', 'typeID');
    }
}
