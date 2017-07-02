<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Move;

use DB;

class MoveController extends Controller
{
    private $model;

    public function __construct(Move $model)
    {
        //$this->middleware('auth');
		$this->model = $model;
    }

    public function index()
	{
		$move = $this->model->paginate(1000);
		
		$types = DB::table('types')->select('id', 'name')->get();
		$mapType = [];
		foreach($types as $type){
			$mapType[$type->id] = $type->name;
		}
		
	    return view('move.index', [
			'model' => $move, 'mapType'=>$mapType		]);
	}

	public function create()
	{
		$move = $this->model->newInstance();

	    return view('move.create', [
			'model' => $move	    ]);
	}

	public function store( $request)
	{
		$move = $this->model->newInstance();
		$move->fill($request->all());
		$move->save();

		return redirect()->route('move.index', [])
			->withSuccess('Move created!');
	}

	public function show($id)
	{
		$move = $this->model->findOrFail($id);
		$type = $move->type()->get()[0];
		$pokemons = $move->pokemons()->withPivot('level')->get();

	    return view('move.show', [
			'model' => $move, 'type'=>$type, 'pokemons'=>$pokemons		]);
	}

	public function edit($id)
	{
		$move = $this->model->findOrFail($id);

	    return view('move.edit', [
	        'model' => $move	    ]);
	}

	public function update( $request, $id)
	{
		$move = $this->model->findOrFail($id);
		$move->fill($request->all());
	    $move->save();

	    return redirect()->route('move.index', [])
			->withSuccess('Move updated!');
	}

	public function destroy($id)
	{
		$move = $this->model->findOrFail($id);
		$move->delete();

//		return redirect()->route('move.index', [])
//			->withSuccess('Move deleted!');
	}
}
