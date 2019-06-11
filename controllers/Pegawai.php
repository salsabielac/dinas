<?php 
/**
 * 
 */
class Pegawai extends CI_Controller
{
	
	function __construct(argument)
	{
		parent::__construct();
		$this->load->helper('url', 'form')
		$this->load->library('form_validation');
		$this->load->model('Pegawai_model');
	}

	public function index(){
		
		$this->load->view('etc/comp');
    	$this->load->view('konten/home');
	}

	public function tampil(){
		$this->load->model('ekstra_model');
		$object['ekstra_object']=$this->ekstra_model->getEkstra();
		$this->load->view('uas/header');
		$this->load->view('uas/tampil.php', $object);
		$this->load->view('uas/footer');
	}

	public function create(){
		$this->load->view('uas/header');
		$this->form_validation->set_rules('name', 'name', 'trim|required');
		if($this->form_validation->run()==FALSE){
			$this->load->view('pegawai_daftar');
			//var_dump($_POST);
		}else{
			$this->ekstra_model->insertPegawai();
			$this->session->set_flashdata('msg_success', 'Yay, data berhasil disimpan');
			redirect('pegawai_list');
		}
		$this->load->view('uas/footer');
	}

	public function update($id){
		// $this->load->view('uas/header');
		$this->form_validation->set_rules('name', 'name', 'trim|required');
		$this->form_validation->set_rules('address', 'address', 'trim|required');
		$this->form_validation->set_rules('email', 'email', 'trim|required');
		$this->form_validation->set_rules('telephone', 'telephone', 'trim|required');
		$this->form_validation->set_rules('class', 'class', 'trim|required');
		$this->form_validation->set_rules('ekstra', 'ekstra', 'trim|required');
		$data['ekstra']=$this->ekstra_model->getEkstra($id);
		if($this->form_validation->run()==FALSE){
			$this->load->view('pegawai_edit', $data);
		}else{
			$this->ekstra_model->updateById($id);
			$this->load->view('pegawai_list');
		}
		// $this->load->view('uas/footer');
	}

	public function delete($id){
		// $this->load->view('uas/header');
		$this->ekstra_model->delete($id);
		$this->session->set_flashdata('msg_success', 'Data berhasil dihapus');
		$this->load->view('uas/pegawai_list');
		// $this->load->view('uas/footer');
	}
}

 ?>