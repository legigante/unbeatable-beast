<?php


// handle http request
class MPcurl{
	public $version = '1.x';
	public $help = 'lis la doc qui n\'existe pas enfoiré de merde ! ';

	public $httpCode;
	public $httpResponse;

	private $pUrl = '';
	private $pHttp = false;
	private $pUTF8 = true;

	public function __construct($utf8=true, $url=false){
		$this->pUTF8 = $utf8;
		if($url != false){
			$this->pUrl = $url;
			$this->pHttp = curl_init($url);
		}
	}
	public function __destruct(){

	}

	public function open($url = '', $timeout = 15000){
		if($url != ''){
			$this->$pUrl = $url;
		}
		$this->pHttp = curl_init($this->pUrl);
		curl_setopt($this->pHttp, CURLOPT_FRESH_CONNECT, true);
		curl_setopt($this->pHttp, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($this->pHttp, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($this->pHttp, CURLOPT_TIMEOUT, $timeout);
		curl_setopt($this->pHttp, CURLOPT_CONNECTTIMEOUT, $timeout);
		curl_setopt($this->pHttp, CURLOPT_FOLLOWLOCATION, true);
		curl_setopt($this->pHttp, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($this->pHttp, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 6.1; fr; rv:1.9.2.13) Gecko/20101203 Firefox/3.6.13');

		if($this->pUTF8){
			$this->httpResponse = utf8_decode(curl_exec($this->pHttp));
		}else{
			$this->httpResponse = curl_exec($this->pHttp);
		}
		$this->httpCode = curl_getinfo($this->pHttp, CURLINFO_HTTP_CODE);
		curl_close($this->pHttp);
	}

	public function openPic($url = '', $timeout = 15000){
		if($url != ''){
			$this->$pUrl = $url;
		}
		$this->pHttp = curl_init($this->pUrl);
		curl_setopt($this->pHttp, CURLOPT_FRESH_CONNECT, true);
		curl_setopt($this->pHttp, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($this->pHttp, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($this->pHttp, CURLOPT_TIMEOUT, $timeout);
		curl_setopt($this->pHttp, CURLOPT_CONNECTTIMEOUT, $timeout);
		curl_setopt($this->pHttp, CURLOPT_FOLLOWLOCATION, true);
		curl_setopt($this->pHttp, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($this->pHttp, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 6.1; fr; rv:1.9.2.13) Gecko/20101203 Firefox/3.6.13');

		curl_setopt($this->pHttp, CURLOPT_BINARYTRANSFER,1);
		$this->httpResponse = curl_exec($this->pHttp);
		$this->httpCode = curl_getinfo($this->pHttp, CURLINFO_HTTP_CODE);
		curl_close($this->pHttp);

	}
}

?>
