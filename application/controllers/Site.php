<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use GuzzleHttp\Client;

class Site extends Backend {

	function __construct() {
        parent::__construct();
        
        $this->data['test'] = 'Hola';
    }

	public function index()
	{	
		//vd($this->session->userdata);
		$this->render->set_page('site');
		$this->render->add_js('weather.js');
		$this->render->page('site');
	}

	public function get_weather($data)
	{	
		$client = new GuzzleHttp\Client(['base_uri' => 'http://api.openweathermap.org/data/2.5/']);
		$response = $client->request('GET', 'weather?lat=-34.88&lon=54&appid=baf40891cc08ca46649faffdb68dba38');
		$body = $response->getBody();

		vd(json_decode($body));
		$this->render->set_page('site');
		$this->render->add_js('weather.js');
		$this->render->page('site');
	}

	public function get_previous_search(){	
		$this->load->model('users_model');

		$table_data = $this->users_model->get_data_by_user_id($this->session->userdata('user_id'));
		if($table_data){
			$data['table_data'] = $table_data;
			$table = $this->load->view('table_data', $data, TRUE);
			if(!empty($table))
		  		ed(json_encode(array('status' => 'success', 'data' => $table )));
		  	else
		  		ed(json_encode(array('status' => 'error', 'message' => "No table Data" )));
		}		

	}

	public function remove_search($row_id){	
		$this->load->model('users_model');
		
		if($row_id){
			$this->users_model->delete_by_id($row_id);
	  		ed(json_encode(array('status' => 'success', 'message' => "data removed" )));
		}
		else
		  	ed(json_encode(array('status' => 'error', 'message' => "No Data" )));		
	}
	

	public function save_search_data(){
		$this->load->model('users_model');

		$w_data = $this->input->post('w_data');
		if(!empty($w_data)){
			$w_data = json_decode($w_data);
			$save_data = array();
			if(!empty($w_data->google_coord)){
				$save_data['lat'] = $w_data->google_coord->lat;
				$save_data['lng'] = $w_data->google_coord->lng;
			}
			else{
				$save_data['lat'] = $w_data->coord->lat;
				$save_data['lng'] = $w_data->coord->lon;
			}
			$save_data['city_name'] = $w_data->name;
			$save_data['user_id'] = $this->session->userdata('user_id');
	
			$result = $this->users_model->insert_search($save_data);
			if($result)
		  		ed(json_encode(array('status' => 'success', 'message' => "Data Saved" )));
		  	else
		  		ed(json_encode(array('status' => 'error', 'message' => "Sorry.. Data Could not be Saved" )));

		}else{
		  ed(json_encode(array('status' => 'error', 'message' => "No Weather Data" )));
		}
	}

}