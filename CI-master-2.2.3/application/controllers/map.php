<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Map extends CI_Controller {

	public function index()
	{
		$this->load->view('home');
	}

	public function navPage()
	{
		$this->load->view('nav');
	}

	public function direction()
	{
		$post = $this->input->post();
		$res = file_get_contents("https://maps.googleapis.com/maps/api/directions/json?origin=".urlencode($post['from'])."&destination=".urlencode($post['destination'])."&departure_time=".time()."&mode=transit&key=AIzaSyBlx58-OS5jPeJuM8b1g7opLr7VSP-2zAs");
		$this->output->set_content_type('application/json')
			->set_output($res);
	}

	public function get_price()
	  {
	   //get coordinates
	    $post = $this->input->post();
	    $cor_from= file_get_contents("http://maps.google.com/maps/api/geocode/json?address=".urlencode($post['from'])."&sensor=false");
	    $corjson_from = json_decode($cor_from);
	    $cor_to= file_get_contents("http://maps.google.com/maps/api/geocode/json?address=".urlencode($post['destination'])."&sensor=false");
	    $corjson_to = json_decode($cor_to);
	    $locationU = array();
	    $locationU[0] = $corjson_from->results[0]->geometry->location->lat;
	    $locationU[1] = $corjson_from->results[0]->geometry->location->lng;
	    $locationU[2] = $corjson_to->results[0]->geometry->location->lat;
	    $locationU[3] = $corjson_to->results[0]->geometry->location->lng;

	    //get price estimate from uber
	    $url = "api.uber.com/v1/estimates/price?start_latitude=".$locationU[0]."&start_longitude=".$locationU[1]."&end_latitude=".$locationU[2]."&end_longitude=".$locationU[3]."&server_token=f0jOyEgXbWvsB0RsKOKTI3rFDBgfWJmZVWCxN3Jn";
	    $ch = curl_init();

	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
	    curl_setopt($ch, CURLOPT_URL, $url);
	    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
	    $data = curl_exec($ch);
	    $info = curl_getinfo($ch);
	    curl_close($ch);
	    echo $data;
	  }
}

?>