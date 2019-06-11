<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Golongan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Golongan_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'golongan/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'golongan/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'golongan/index.html';
            $config['first_url'] = base_url() . 'golongan/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Golongan_model->total_rows($q);
        $golongan = $this->Golongan_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'golongan_data' => $golongan,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('golongan/golongan_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Golongan_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'nama_golongan' => $row->nama_golongan,
	    );
            $this->load->view('golongan/golongan_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('golongan'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('golongan/create_action'),
	    'id' => set_value('id'),
	    'nama_golongan' => set_value('nama_golongan'),
	);
        $this->load->view('golongan/golongan_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nama_golongan' => $this->input->post('nama_golongan',TRUE),
	    );

            $this->Golongan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('golongan'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Golongan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('golongan/update_action'),
		'id' => set_value('id', $row->id),
		'nama_golongan' => set_value('nama_golongan', $row->nama_golongan),
	    );
            $this->load->view('golongan/golongan_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('golongan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'nama_golongan' => $this->input->post('nama_golongan',TRUE),
	    );

            $this->Golongan_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('golongan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Golongan_model->get_by_id($id);

        if ($row) {
            $this->Golongan_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('golongan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('golongan'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama_golongan', 'nama golongan', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "golongan.xls";
        $judul = "golongan";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Golongan");

	foreach ($this->Golongan_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_golongan);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Golongan.php */
/* Location: ./application/controllers/Golongan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-05-15 18:52:12 */
/* http://harviacode.com */