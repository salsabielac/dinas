<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Divisions extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Divisions_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'divisions/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'divisions/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'divisions/index.html';
            $config['first_url'] = base_url() . 'divisions/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Divisions_model->total_rows($q);
        $divisions = $this->Divisions_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'divisions_data' => $divisions,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('divisions/divisions_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Divisions_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'division_name' => $row->division_name,
		'parent' => $row->parent,
	    );
            $this->load->view('divisions/divisions_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('divisions'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('divisions/create_action'),
	    'id' => set_value('id'),
	    'division_name' => set_value('division_name'),
	    'parent' => set_value('parent'),
	);
        $this->load->view('divisions/divisions_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'division_name' => $this->input->post('division_name',TRUE),
		'parent' => $this->input->post('parent',TRUE),
	    );

            $this->Divisions_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('divisions'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Divisions_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('divisions/update_action'),
		'id' => set_value('id', $row->id),
		'division_name' => set_value('division_name', $row->division_name),
		'parent' => set_value('parent', $row->parent),
	    );
            $this->load->view('divisions/divisions_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('divisions'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'division_name' => $this->input->post('division_name',TRUE),
		'parent' => $this->input->post('parent',TRUE),
	    );

            $this->Divisions_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('divisions'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Divisions_model->get_by_id($id);

        if ($row) {
            $this->Divisions_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('divisions'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('divisions'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('division_name', 'division name', 'trim|required');
	$this->form_validation->set_rules('parent', 'parent', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "divisions.xls";
        $judul = "divisions";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Division Name");
	xlsWriteLabel($tablehead, $kolomhead++, "Parent");

	foreach ($this->Divisions_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->division_name);
	    xlsWriteNumber($tablebody, $kolombody++, $data->parent);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Divisions.php */
/* Location: ./application/controllers/Divisions.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-05-15 18:52:12 */
/* http://harviacode.com */