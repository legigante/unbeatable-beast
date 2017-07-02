<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Pokemon;

use DB;

class PokemonController extends Controller
{
    private $model;

    public function __construct(Pokemon $model)
    {
        //$this->middleware('auth');
		$this->model = $model;
    }

    public function index()
	{
		$pokemon = $this->model->paginate(1000);

	    return view('pokemon.index', [
			'model' => $pokemon		]);
	}

	public function create()
	{
		$pokemon = $this->model->newInstance();

	    return view('pokemon.create', [
			'model' => $pokemon	    ]);
	}

	public function store( $request)
	{
		$pokemon = $this->model->newInstance();
		$pokemon->fill($request->all());
		$pokemon->save();

		return redirect()->route('pokemons.index', [])
			->withSuccess('Pokemon created!');
	}

	public function show($id)
	{
		$pokemon = $this->model->findOrFail($id);

	    return view('pokemon.show', [
			'model' => $pokemon		]);
	}

	public function edit($id)
	{
		$pokemon = $this->model->findOrFail($id);

	    return view('pokemon.edit', [
	        'model' => $pokemon	    ]);
	}

	public function update( $request, $id)
	{
		$pokemon = $this->model->findOrFail($id);
		$pokemon->fill($request->all());
	    $pokemon->save();

	    return redirect()->route('pokemons.index', [])
			->withSuccess('Pokemon updated!');
	}

	public function destroy($id)
	{
		$pokemon = $this->model->findOrFail($id);
		$pokemon->delete();

//		return redirect()->route('pokemons.index', [])
//			->withSuccess('Pokemon deleted!');
	}
}
