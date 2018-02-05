<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use GuzzleHttp\Client;

class Forecast extends Backend {

	function __construct() {
        parent::__construct();
    }

	public function index()
	{	
		//vd($this->session->userdata);
		$this->render->set_page('Forecast');
		$this->render->add_js('weather.js');
		$this->render->page('forecast');
	}

	public function full($lat, $lng)
	{	

		$client = new GuzzleHttp\Client(['base_uri' => 'http://api.openweathermap.org/data/2.5/']);
		$response = $client->request('GET', "forecast?lat=".$lat."&lon=".$lng."&units=metric&appid=baf40891cc08ca46649faffdb68dba38");
		$body = $response->getBody();

		if(!empty($body))
			$data['w_data'] = json_decode($body);
		else {
			$data['w_data'] = array();
		}
		$this->render->set_page('full_forecast');
		//$this->render->add_js('weather.js');
		$this->render->page('full_forecast', $data);
	
	}

}