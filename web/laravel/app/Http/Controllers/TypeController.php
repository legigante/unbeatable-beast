<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Type;

use DB;

class TypeController extends Controller
{
    private $model;

    public function __construct(Type $model)
    {
        //$this->middleware('auth');
		$this->model = $model;
    }

    public function index()
	{
		$type = $this->model->paginate(1000);

		
	    return view('type.index', [
			'model' => $type		]);
	}

	public function create()
	{
		$type = $this->model->newInstance();

	    return view('type.create', [
			'model' => $type	    ]);
	}

	public function store( $request)
	{
		$type = $this->model->newInstance();
		$type->fill($request->all());
		$type->save();

		return redirect()->route('type.index', [])
			->withSuccess('Type created!');
	}

	public function show($id)
	{
		$types = DB::table('types')->select('id', 'name')->get();
		$mapType = [];
		foreach($types as $type){
			$mapType[$type->id] = $type->name;
		}
		
		$type = $this->model->findOrFail($id);
		$moves = $type->moves()->get();
		$pokemons = $type->pokemons()->get();

	    return view('type.show', [
			'model' => $type, 'moves'=>$moves, 'pokemons'=>$pokemons, 'mapType'=>$mapType		]);
	}

	public function edit($id)
	{
		$type = $this->model->findOrFail($id);

	    return view('type.edit', [
	        'model' => $type	    ]);
	}

	public function update( $request, $id)
	{
		$type = $this->model->findOrFail($id);
		$type->fill($request->all());
	    $type->save();

	    return redirect()->route('type.index', [])
			->withSuccess('Type updated!');
	}

	public function destroy($id)
	{
		$type = $this->model->findOrFail($id);
		$type->delete();

//		return redirect()->route('types.index', [])
//			->withSuccess('Type deleted!');
	}
}
