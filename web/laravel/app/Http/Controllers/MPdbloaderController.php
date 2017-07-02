<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MPdbloaderController extends Controller
{
    /**
     * Main menu.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		return view('MPdbloader/index');
    }

    /**
     * Cerebii crawler menu.
     *
     * @return \Illuminate\Http\Response
     */
    public function cerebii()
    {
		return view('MPdbloader/cerebii');
    }

    /**
     * import Cerebii images.
     *
     * @return \Illuminate\Http\Response
     */
    public function cerebiiImg()
    {
		if(auth()->user()->name == 'moussa'){
			return view('MPdbloader/report', ['report'=>'Import images', 'msg'=>'test image']);
		}else{
			return view('MPdbloader/error', ['errDesc'=>'Vous devez être moussa pour effectuer cette action']);
		}
    }

    /**
     * import Cerebii html files.
     *
     * @return \Illuminate\Http\Response
     */
    public function cerebiiHtml()
    {
		if(auth()->user()->name == 'moussa'){
			return view('MPdbloader/report', ['report'=>'Import html files', 'msg'=>'test html']);
		}else{
			return view('MPdbloader/error', ['errDesc'=>'Vous devez être moussa pour effectuer cette action']);
		}
    }

    /**
     * display data to load and ask confirmation
     *
     * @return \Illuminate\Http\Response
     */
    public function load()
    {
		return view('MPdbloader/report', ['report'=>'Load data confirmation', 'msg'=>'test load']);
    }

    /**
     * load data
     *
     * @return \Illuminate\Http\Response
     */
    public function loadConfirm()
    {
		if(auth()->user()->name == 'moussa'){
			return view('MPdbloader/report', ['report'=>'Load data', 'msg'=>'test load confirm']);
		}else{
			return view('MPdbloader/error', ['errDesc'=>'Vous devez être moussa pour effectuer cette action']);
		}
		
    }
}
