<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('User_model');
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['nip'] = $session_data['nip'];
		}else{
			redirect('login','refresh');
		}
	}

    public function index(){
    	 $this->load->view('etc/comp');
    	$this->load->view('konten/home');
    }

}