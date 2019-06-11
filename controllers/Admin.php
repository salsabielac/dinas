<?php 


class Admin extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Admin_model');
		$this->load->library('form_validation');


	}

	public function index(){

		// $this->load->model('Kegiatan_model');
		// $data['anda'] = $this->Kegiatan_model->getKegiatan();
		// $this->load->view('ekstra/adm_dashboard',$data);

		$this->load->view('login');

	}

	public function kegiatan(){

		$this->form_validation->set_rules('nip','nip','trim|required');
		$this->form_validation->set_rules('nama','nama','trim|required');	
		$this->form_validation->set_rules('jabatan','jabatan','trim|required');
		$this->form_validation->set_rules('unit_kerja','unit_kerja','trim|required');
		$this->form_validation->set_rules('golongan','golongan','trim|required');	
		$this->form_validation->set_rules('deskripsi','deskripsi','trim|required');
		$this->form_validation->set_rules('uang_dinas','uang_dinas','trim|required');

		/*if ($this->form_validation->run() === FALSE) {
			$this->load->view('pegawai/form');
		}else {

			$config['upload_path'] = 'gambar/upload';
			$config['allowed_types'] = 'gif|jpg|png';
        	$config['max_size'] = '1000000000';

        	$this->load->library('upload', $config);

        	if(!$this->upload->do_upload('image')){
        		$err = array('error' => $this->upload->display_errors());
        		var_dump($err); 
        		var_dump($_POST);
        	}else{

	        $image_data = $this->upload->data();				
        	$this->Admin_model->kegiatan();
        	
        	$this->session->set_flashdata('msg_success', 'Story has been created');
        	redirect('admin/dashboard','refresh');
			}
		}*/
	}


	public function dashboard(){
		$this->load->model('Pegawai_model');
		$data['anda'] = $this->Kegiatan_model->getKegiatan();
		$this->load->view('ekstra/adm_dashboard',$data);
	}

	public function data_siswa(){
		$this->load->model('Ekstra_model');
		$data['anda'] = $this->Ekstra_model->siswa();
		$this->load->view('ekstra/adm_data_siswa',$data);
	}

	public function cekLogin()
	{
		$this->form_validation->set_rules('username', 'username', 'trim|required');
		$this->form_validation->set_rules('password', 'password', 'trim|required|callback_cekDb');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('login');
			//var_dump($_POST);
		}else{
			//redirect('Home','refresh');
			if ($this->session->userdata('logged_in')) {
				$session_data = $this->session->userdata('logged_in');
				redirect('admin/dashboard','refresh');
			}
			
		}
	}
	public function cekDb($password)
	{
		$username=$this->input->post('username');
		$result = $this->Admin_model->login($username,$password);
		if($result){
			$sess_array = array();
			foreach ($result as $row) {
				$sess_array = array(
					'id' => $row->id,
					// 'nis'=> $row->nis,
				);
				$this->session->set_userdata('logged_in',$sess_array);
			}
			return true;
		}else{
			$this->form_validation->set_message('cekDb',"Login Gagal ");
			return false;
		}
	}	

}