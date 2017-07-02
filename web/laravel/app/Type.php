<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $table = 'types';
	public $timestamps = false;
	
	public function pokemons() 
	{
		return $this->belongsToMany('App\Pokemon', 'pokemons_types', 'typeID', 'pokemonID');
	}
	
    public function Moves()
    {
        return $this->hasMany('App\Move', 'typeID');
    }
}
