<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Plafon extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Plafon_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->load->view('etc/comp');
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'plafon/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'plafon/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'plafon/index.html';
            $config['first_url'] = base_url() . 'plafon/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Plafon_model->total_rows($q);
        $plafon = $this->Plafon_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'plafon_data' => $plafon,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('plafon/list', $data);
    }

    public function read($id) 
    {
        $this->load->view('etc/comp');
        $row = $this->Plafon_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'plafon' => $row->plafon,
		'pendidikan' => $row->pendidikan,
		'masa_kerja' => $row->masa_kerja,
		'jabatan' => $row->jabatan,
		'uang_dinas' => $row->uang_dinas,
	    );
            $this->load->view('plafon/read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('plafon'));
        }
    }

    public function create() 
    {
        $this->load->view('etc/comp');
        $data = array(
            'button' => 'Create',
            'action' => site_url('plafon/create_action'),
	    'id' => set_value('id'),
	    'plafon' => set_value('plafon'),
	    'pendidikan' => set_value('pendidikan'),
	    'masa_kerja' => set_value('masa_kerja'),
	    'jabatan' => set_value('jabatan'),
	    'uang_dinas' => set_value('uang_dinas'),
	);
        $this->load->view('plafon/form', $data);
    }
    
    public function create_action() 
    {
        $this->load->view('etc/comp');
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'plafon' => $this->input->post('plafon',TRUE),
		'pendidikan' => $this->input->post('pendidikan',TRUE),
		'masa_kerja' => $this->input->post('masa_kerja',TRUE),
		'jabatan' => $this->input->post('jabatan',TRUE),
		'uang_dinas' => $this->input->post('uang_dinas',TRUE),
	    );

            $this->Plafon_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('plafon'));
        }
    }
    
    public function update($id) 
    {
        $this->load->view('etc/comp');
        $row = $this->Plafon_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('plafon/update_action'),
		'id' => set_value('id', $row->id),
		'plafon' => set_value('plafon', $row->plafon),
		'pendidikan' => set_value('pendidikan', $row->pendidikan),
		'masa_kerja' => set_value('masa_kerja', $row->masa_kerja),
		'jabatan' => set_value('jabatan', $row->jabatan),
		'uang_dinas' => set_value('uang_dinas', $row->uang_dinas),
	    );
            $this->load->view('plafon/form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('plafon'));
        }
    }
    
    public function update_action() 
    {
        $this->load->view('etc/comp');
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'plafon' => $this->input->post('plafon',TRUE),
		'pendidikan' => $this->input->post('pendidikan',TRUE),
		'masa_kerja' => $this->input->post('masa_kerja',TRUE),
		'jabatan' => $this->input->post('jabatan',TRUE),
		'uang_dinas' => $this->input->post('uang_dinas',TRUE),
	    );

            $this->Plafon_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('plafon'));
        }
    }
    
    public function delete($id) 
    {
        $this->load->view('etc/comp');
        $row = $this->Plafon_model->get_by_id($id);

        if ($row) {
            $this->Plafon_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('plafon'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('plafon'));
        }
    }

    public function _rules() 
    {
        $this->load->view('etc/comp');
	$this->form_validation->set_rules('plafon', 'plafon', 'trim|required');
	$this->form_validation->set_rules('pendidikan', 'pendidikan', 'trim|required');
	$this->form_validation->set_rules('masa_kerja', 'masa kerja', 'trim|required');
	$this->form_validation->set_rules('jabatan', 'jabatan', 'trim|required');
	$this->form_validation->set_rules('uang_dinas', 'uang dinas', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->view('etc/comp');
        $this->load->helper('exportexcel');
        $namaFile = "plafon.xls";
        $judul = "plafon";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Plafon");
	xlsWriteLabel($tablehead, $kolomhead++, "Pendidikan");
	xlsWriteLabel($tablehead, $kolomhead++, "Masa Kerja");
	xlsWriteLabel($tablehead, $kolomhead++, "Jabatan");
	xlsWriteLabel($tablehead, $kolomhead++, "Uang Dinas");

	foreach ($this->Plafon_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->plafon);
	    xlsWriteLabel($tablebody, $kolombody++, $data->pendidikan);
	    xlsWriteNumber($tablebody, $kolombody++, $data->masa_kerja);
	    xlsWriteLabel($tablebody, $kolombody++, $data->jabatan);
	    xlsWriteNumber($tablebody, $kolombody++, $data->uang_dinas);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Plafon.php */
/* Location: ./application/controllers/Plafon.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-05-18 18:08:22 */
/* http://harviacode.com */