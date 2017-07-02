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
		return view('MPdbloader/report', ['msg'=>'test image']);
    }

    /**
     * import Cerebii html files.
     *
     * @return \Illuminate\Http\Response
     */
    public function cerebiiHtml()
    {
		return view('MPdbloader/report', ['msg'=>'test html']);
    }

    /**
     * display data to load and ask confirmation
     *
     * @return \Illuminate\Http\Response
     */
    public function load()
    {
		return view('MPdbloader/report', ['msg'=>'test load']);
    }

    /**
     * load data
     *
     * @return \Illuminate\Http\Response
     */
    public function loadConfirm()
    {
		return view('MPdbloader/report', ['msg'=>'test load confirm']);
    }
}
