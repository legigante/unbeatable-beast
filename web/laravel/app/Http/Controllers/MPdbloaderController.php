<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MPmisc\MPcurl;
use App\MPmisc\MPregex;
use App\MPmisc\MPfunctions;

use App\Type;
use App\Move;
use App\Pokemon;

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
		
		$data = ['types'=>[], 'moves'=>[], 'pokemons'=>[]];
		
		$o = new MPfunctions;
		$arr = $o->extractHtmlInfoPoke(false);
		
		// types
		$props = ['name'];
		foreach($arr['types'] as $el){
			$type = new Type;
			foreach($props as $prop){
				$type->$prop = $el;
			}
			$data['types'][] = $type;
		}

		// moves
		$props = ['name','description','pp','power','accuracy','effectPerCent'];
		foreach($arr['attacks'] as $el){
			$move = new Move;
			foreach($props as $prop){
				$move->$prop = $el[$prop];
			}
			$data['moves'][] = $move;
		}

		// pokemons
		$props = ['num','name','description','height','weight','baseHP','baseATT','baseDEF','baseSPE','baseVIT'];
		foreach($arr['poke'] as $el){
			$poke = new Pokemon;
			foreach($props as $prop){
				$poke->$prop = $el[$prop];
			}
			$data['pokemons'][] = $poke;
		}
		
		return view('MPdbloader/reportConf', ['report'=>'Load data confirmation', 'data'=>$data]);
    }

    /**
     * load data
     *
     * @return \Illuminate\Http\Response
     */
    public function loadConfirm()
    {
		if(false){
		//if(auth()->user()->name == 'moussa'){
			
			$o = new MPfunctions;
			$arr = $o->extractHtmlInfoPoke(true);
			
			
			// types
			$props = ['name'];
			foreach($arr['types'] as $el){
				$type = new Type;
				foreach($props as $prop){
					$type->$prop = $el;
				}
				$type->save();
			}
			
			
			// moves
			$props = ['name','description','pp','power','accuracy','effectPerCent'];
			foreach($arr['attacks'] as $el){
				$move = new Move;
				foreach($props as $prop){
					$move->$prop = $el[$prop];
				}
				$type = Type::where('name', $el['type'])->first();
				$move->type()->associate($type);
				$move->save();
			}
			
			// pokemons
			$props = ['num','name','description','height','weight','baseHP','baseATT','baseDEF','baseSPE','baseVIT'];
			foreach($arr['poke'] as $el){
				$poke = new Pokemon;
				foreach($props as $prop){
					$poke->$prop = $el[$prop];
				}
				$poke->save();
				// fk types
				$type = Type::where('name', $el['typeA'])->first();
				$poke->types()->attach([$type->id]);
				if($el['typeB']!=''){
					$type = Type::where('name', $el['typeB'])->first();
					$poke->types()->attach([$type->id]);
				}
				$poke->save();
				
				// fk moves
				foreach($el['attacks'] as $att){
					$move = Move::where('name', $att['name'])->first();
					$poke->moves()->attach([$move->id]);
					// add level using pivot
					$poke->moves()->updateExistingPivot($move->id, ['level'=>$att['level']]);
				}
				$poke->save();
			}
			
			return view('MPdbloader/report', ['report'=>'Load data', 'msg'=>'ok']);
		}else{
			return view('MPdbloader/error', ['errDesc'=>'On charge déjà la génération II ?']);
			//return view('MPdbloader/error', ['errDesc'=>'Vous devez être moussa pour effectuer cette action']);
		}
		
    }
}
