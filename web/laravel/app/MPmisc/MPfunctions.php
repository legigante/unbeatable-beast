<?php


// !!!!!!!!!!!!!!!!!! GERER LES DOUBLONS DE MOVES



namespace App\MPmisc;


class MPfunctions{
	public $outputFolder = '../database/MPdbloader/';
	
	public function nn($n = 2){
		$i = 0;
		while($i<$n){
			echo '<br />';
			$i++;
		}
	}

	public function extractHtmlInfoPoke($htmlEntities){
		$oReg = new MPregex();
		
		$r = ['types'=>[],'poke'=>[],'attacks'=>[]];
		
		$i = 1;
		while($i<152){
			// read file
			$fPath = $this->outputFolder.'html/'.str_pad($i, 3, '0', STR_PAD_LEFT).'.html';
			$f = fopen($fPath, 'r');
			if($htmlEntities){
				$oReg->text = $oReg->MPclean(html_entity_decode(fread($f,filesize($fPath))));
			}else{
				$oReg->text = $oReg->MPclean(fread($f,filesize($fPath)));
			}
			fclose($f);

			$oReg->setOption('');
			$poke = array();
			$poke['pokeID'] = $i;
			$poke['species'] = $oReg->get('#'.str_pad($i, 3, '0', STR_PAD_LEFT).' - (.+)<\/title>');
			$poke['nameFR'] = $oReg->get('<b>French<\/b>:\s*<\/td><td>(.+?)<\/td>');
			$poke['nameDE'] = $oReg->get('<b>German<\/b>:\s*<\/td><td>(.+?)<\/td>');
			$poke['nameES'] = $poke['species'];
			$oReg->setOption('g');
			$oReg->getBetween('pokedex\/(.+?)\.','<td class="fooinfo">#'.str_pad($i, 3, '0', STR_PAD_LEFT).'</td>','</tr>');
			$poke['typeA'] = $oReg->matches[1][0];
			$poke['typeB'] = count($oReg->matches[1]) == 1 ? '' : $oReg->matches[1][1];
			$oReg->getBetween('<td.+?>([\d\D]+?)<\/td','<td class="foo">Capture Rate</td>','<table class="dextable">');
			$poke['description'] = $oReg->matches[1][0];
			$poke['height'] = str_replace('m','',$oReg->MPclean(explode('<br />',$oReg->matches[1][1])[1]));
			$poke['weight'] = str_replace('kg','',$oReg->MPclean(explode('<br />',$oReg->matches[1][2])[1]));
			$poke['capture rate'] = $oReg->matches[1][3];
			
			// stats
			$oReg->getBetween('>(\d+)<\/td>','class="fooinfo">Base Stats','</tr>');
			$poke['baseHP'] = $oReg->matches[1][0];
			$poke['baseATT'] = $oReg->matches[1][1];
			$poke['baseDEF'] = $oReg->matches[1][2];
			$poke['baseSPC'] = $oReg->matches[1][3];
			$poke['baseSPE'] = $oReg->matches[1][4];

			// attacks
			$poke['attacks'] = [];
			$arrSpe = $oReg->splitBetween('<\/tr>','Special Moves','<table class="dextable">');
			if(substr($arrSpe[0],0,3) == '<!D'){
				$arrCT = $oReg->splitBetween('<\/tr>','TM & HM Attacks','<table class="dextable">');
				$arrSpe = [];
			}else{
				$arrCT = $oReg->splitBetween('<\/tr>','TM & HM Attacks','Special Moves');
			}

			if(substr($arrCT[0],0,3) == '<!D'){
				$arrAtt = $oReg->splitBetween('<\/tr>','<th class="attheader">Effect %</th></tr>','</table>');
				$arrCT = [];
			}else{
				$arrAtt = $oReg->splitBetween('<\/tr>','<th class="attheader">Effect %</th></tr>','TM & HM Attacks');
			}
			

			
			
			// attacks
			foreach(array_merge($arrAtt,$arrCT) as $row){
				if($row!=''){
					$matches = $oReg->get('<td.+?>(.+?)<\/td', $row);
				}else{
					$matches = [];
				}
				/*
				var_dump($row);
				nn();
				var_dump($matches);
				nn();
				*/
				if(count($matches)>2){
					
					$arr = [];
					$arr['name'] = $oReg->get('">(.+?)<\/a>', $matches[1])[0];
					$arr['nameFR'] = '?';
					$arr['nameDE'] = '?';
					$arr['nameES'] = '?';
					$arr['level'] = is_numeric($matches[0]) ? $matches[0] : 0;
					$arr['type'] = $oReg->get('type\/(.+?)\.gif', $matches[2])[0];
					$arr['power'] = is_numeric($matches[3]) ? $matches[3] : 0;
					$arr['accuracy'] = $matches[4];
					$arr['pp'] = $matches[5];
					$arr['effect'] = '?';
					$arr['effectProbability'] = is_numeric($matches[6]) ? $matches[6] : 0;
					$poke['attacks'][] = $arr;
					
					$r['types'][$arr['type']] = $arr['type'];
				}else{
					if(count($matches)==1){
						if(isset($r['attacks'][$arr['name']]) == false){
							$arr['description'] = $matches[0];
							$r['attacks'][$arr['name']] = $arr;
						}else{
							if($r['attacks'][$arr['name']]['level'] > $arr['level']){
								$r['attacks'][$arr['name']]['level'] = $arr['level'];
							}
						}
					}
				}
			}
			

			// attacks spe
			foreach($arrSpe as $row){
				$matches = $oReg->get('<td.+?>(.+?)<\/td', $row);
				if(count($matches)>2){
					$arr = [];
					$arr['name'] = $oReg->get('">(.+?)<\/a>', $matches[0])[0];
					$arr['nameFR'] = '?';
					$arr['nameDE'] = '?';
					$arr['nameES'] = '?';
					$arr['level'] = is_numeric($matches[0]) ? $matches[0] : 0;
					$arr['type'] = $oReg->get('type\/(.+?)\.gif', $matches[1])[0];
					$arr['power'] = $matches[2];
					$arr['accuracy'] = $matches[3];
					$arr['pp'] = $matches[4];
					$arr['effect'] = '?';
					$arr['effectProbability'] = is_numeric($matches[5]) ? $matches[6] : 0;
					$poke['attacks'][] = $arr;
					
					$r['types'][$arr['type']] = $arr['type'];
				}else{
					if(count($matches)==1){
						if(isset($r['attacks'][$arr['name']]) == false){
							$arr['description'] = $matches[0];
							$r['attacks'][$arr['name']] = $arr;
						}else{
							if($r['attacks'][$arr['name']]['level'] > $arr['level']){
								$r['attacks'][$arr['name']]['level'] = $arr['level'];
							}
						}
					}
				}
			}
			
			$r['poke'][] = $poke;
			$i++;
		}
		


		return $r;
		
	}


	public function getCerebiiPics(){
		$i = 1;
		while($i<152){
			// dwnl pic
			$url = 'https://www.serebii.net/art/th/'.$i.'.png';
			$oHttp = new MPcurl(false,$url);
			$oHttp->openPic();
				
			// file writting
			$fPath = $this->outputFolder.'img/'.$i.'.png';
			$f = fopen($fPath, 'x');
			fputs($f, $oHttp->httpResponse);
			fclose($f);
			
			$i++;
		}
	}

	public function getCerebiiHtmlType(){
		// http query
		$url = 'https://www.serebii.net/attackdex-rby/';
		$oHttp = new MPcurl(true,$url);
		$oHttp->open();
		
		// file writting
		$fPath = $this->outputFolder.'html/types.html';
		$f = fopen($fPath, 'a');
		fputs($f, $oHttp->httpResponse);
		fclose($f);
	}
	
	public function getCerebiiHtmlPoke(){
		$i = 1;
		while($i<152){
			// http query
			$url = 'https://www.serebii.net/pokedex/'.str_pad($i, 3, '0', STR_PAD_LEFT).'.shtml';
			$oHttp = new MPcurl(true,$url);
			$oHttp->open();
			
			// file writting
			$fPath = $this->outputFolder.'html/'.str_pad($i, 3, '0', STR_PAD_LEFT).'.html';
			$f = fopen($fPath, 'a');
			fputs($f, $oHttp->httpResponse);
			fclose($f);
			
			$i++;
		}
	}
	
	// aucune info en plus que dans pokemon
	public function getCerebiiHtmlMove(){
		// read file
		$oReg = new MPregex();
		$fPath = $this->outputFolder.'html/types.html';
		$f = fopen($fPath, 'r');
		$oReg->text = $oReg->MPclean(html_entity_decode(fread($f,filesize($fPath))));
		fclose($f);
		
		// get attack list
		$oReg->setOption('g');
		$oReg->getBetween('value="(.+?)">(.+?)<','<OPTION><b>AttackDex: A','If you wish');
		
		// import html files
		$i = 152;
		while($i < count($oReg->matches[1])){
			// http query
			$url = 'https://www.serebii.net'.$oReg->matches[1][$i];
			$oHttp = new MPcurl(true,$url);
			$oHttp->open();
			
			// file writting
			$fPath = $this->outputFolder.'html/move'.$i.'.html';
			$f = fopen($fPath, 'a');
			fputs($f, $oHttp->httpResponse);
			fclose($f);
			
			$i++;
		}
	}
}
