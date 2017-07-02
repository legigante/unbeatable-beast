<?php

namespace App\MPmisc;

// handle http request
class MPregex{
	public $version = '1.x';
	public $help = 'lis la doc qui n\'existe pas enfoiré merde ! ';
	
	
	public $text;
	public $pattern;
	public $matches;
	public $options = '';
	private $opt = '';
	public $after = 0;
	public $before = 0;

	
	// flags
	private $arrOpt = [
		'm'=>false, // multiline
		'i'=>false // case insensitive
	];
	public $g = false; // global
	public $m = false;
	public $i = false;
	
	
	public function setOption($options){
		if(strpos($options,'g')!==false){
			$this->options = 'g';
			$this->g = true;
		}else{
			$this->g = false;
			$this->options = '';
		}		
		$this->opt = '';
		foreach($this->arrOpt as $key=>$el){
			if(strpos($options,$key)!==false){
				$this->arrOpt[$key] = (strpos($options,$key)!==false);
				$this->options .= $key;
				$this->opt .= $key;
				$this->$key = true;
			}else{
				$this->$key = false;
			}
		}
	}
	
	
	// $options = string gmi
	public function __construct($options = false){
		if($options != false){
			$this->setOption($options);
		}
	}
	public function __destruct(){

	}
	
	
	private function setAfter($after){
		$this->after = strpos($this->text, $after);
		if($this->after == false){
			$this->after = 0;
		}else{
			$this->after += strlen($after);
		}
	}
	private function setBefore($before){
		$this->before = strpos($this->text, $before, $this->after);
		if($this->before == false){
			$this->before = strlen($this->text);
		}else{
			$this->before -= 0;
		}
	}
	public function getTextBetween($a = false){
		if($a){
			echo htmlentities(substr($this->text,$this->after,$this->before-$this->after));
		}
		return substr($this->text,$this->after,$this->before-$this->after);
	}
	
	
	public function get($pattern = false, $s = ''){
		if($pattern != false){
			$this->pattern = $pattern;
		}
		if($s == ''){
			$s = $this->text;
		}
		if($this->g){
			
			/*
			echo htmlentities($this->pattern);
			nn();
			echo htmlentities($s);
			nn();
			*/
			
			preg_match_all('/'.$this->pattern.'/'.$this->opt,$s,$this->matches);
			$this->matches = $this->matches[1];
			return $this->matches;
		}else{
			preg_match('/'.$this->pattern.'/'.$this->opt,$s,$this->matches);
			return $this->matches[1];
		}
	}
	
	public function getBetween($pattern = false, $after, $before){
		if($pattern != false){
			$this->pattern = $pattern;
		}
		$this->setAfter($after);
		$this->setBefore($before);
		
		/*
		echo $this->after;
		nn();
		echo $this->before;
		nn();
		echo htmlentities(substr($this->text,$this->after,$this->before-$this->after));
		exit();
		*/
		
		if($this->g){
			preg_match_all('/'.$this->pattern.'/'.$this->opt, $this->getTextBetween(), $this->matches);
			//$this->matches = $this->matches[1];
		}else{
			preg_match('/'.$this->pattern.'/'.$this->opt, $this->getTextBetween(), $this->matches);
		}
		return count($this->matches)-1;
	}


	
	public function MPclean($s){
		return trim(preg_replace('/\t/','',preg_replace('/\n/', '', $s)));
	}
	
	
	
	public function splitBetween($pattern = false, $after, $before, $keepDelim = true){
		if($pattern != false){
			$this->pattern = $pattern;
		}
		$this->setAfter($after);
		$this->setBefore($before);
		
		/*
		echo $this->after;
		nn();
		echo $this->before;
		nn();
		echo htmlentities(substr($this->text,$this->after,$this->before-$this->after));
		exit();
		*/
		
		if($keepDelim){
			$s = preg_replace('/'.$pattern.'/',str_replace('\\','',$pattern).'_||MP||_',$this->getTextBetween());
		}else{
			$s = preg_replace('/'.$pattern.'/','_||MP||_',$this->getTextBetween());
		}
		
		return explode('_||MP||_',$s);
	}
	
	
	
}
