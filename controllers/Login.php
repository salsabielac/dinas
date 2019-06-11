<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_model');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$this->load->view('konten/login');
	}
	
	public function cekLogin()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nip', 'nip', 'trim|required');
		$this->form_validation->set_rules('password', 'password', 'trim|required|callback_cekDb');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('etc/comp');
			$this->load->view('konten/home');
			// var_dump($_POST);
		}else{
			//redirect('Home','refresh');
			// if ($this->session->userdata('logged_in')) {
			// 	$session_data = $this->session->userdata('logged_in');
				redirect('Home','refresh');
			}
			
		}

	public function cekDb($password)
	{
		$this->load->model('User_model');
		$nip=$this->input->post('nip');
		$result = $this->User_model->login($nip,$password);
		if($result){
			$sess_array = array();
			foreach ($result as $row) {
				$sess_array = array(
					'id' => $row->id,
					 'nip'=> $row->nip,
				);
				$this->session->set_userdata('logged_in',$sess_array);
			}
			return true;
		}else{
			$this->form_validation->set_message('cekDb',"Login Gagal ");
			return false;
		}
	}
	public function logout()
	{
		$this->session->unset_userdata('logged_in');
		$this->session->sess_destroy();
		redirect('Login','refresh');
	}
	
}