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
		$move = $this->model->paginate();

	    return view('move.index', [
			'model' => $move		]);
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

	    return view('move.show', [
			'model' => $move		]);
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
