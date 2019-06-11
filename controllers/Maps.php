<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Maps extends CI_Controller {



    public function index(){
    	
	$this->load->library('googlemaps');

		$config['center'] = '-7.617596,111.523367';
		$config['zoom'] = 'auto';
		$this->googlemaps->initialize($config);

		$marker = array();
		$marker['position'] = '-7.617596,111.523367';
		$this->googlemaps->add_marker($marker);
		$data['map'] = $this->googlemaps->create_map();
		
		$this->load->view('view_file', $data);
    }
}
?>