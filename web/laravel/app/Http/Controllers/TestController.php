<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Pokemon;
use App\Type;
use App\Move;

use DB;

class TestController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
	
    /**
     * Test api.
     *
     * @return \Illuminate\Http\Response
     */
    public function api($id,$lvl)
    {
		$r = [];
		$pokemon = Pokemon::find($id);
		$types = $pokemon->types()->get();
		$moves = $pokemon->moves()->withPivot('level')->wherePivot('level','<=',$lvl)->get();
		$pokemon->types = $types;
		$pokemon->moves = $moves;
		
		return response()->json($pokemon, 200);
    }
	
    /**
     * Test api.
     *
     * @return \Illuminate\Http\Response
     */
    public function api2($id,$lvl)
    {
		$r = [];
		$pokemon = Pokemon::find($id);
		$types = $pokemon->types()->get();
		$moves = $pokemon->moves()->withPivot('level')->wherePivot('level','<=',$lvl)->get();
		$pokemon->types = $types;
		$pokemon->moves = $moves;
		
		return response()->json($pokemon, 200);
    }
	
	
}