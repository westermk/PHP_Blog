<?php

class WeatherController extends Controller{
	public $zipCode;
	public $response;
	
	public function defaultTask(){
		$this->set('result', false);
	}
	
	public function getResults(){
		$xml = simplexml_load_file('http://wsf.cdyne.com/WeatherWS/Weather.asmx/GetCityForecastByZIP?ZIP='.$_POST['ZIP']);
		
		$this->set('result', true);
		$this->set('weather', $xml);
	}
}

?>