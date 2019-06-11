<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Dinas extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Dinas_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->load->view('etc/comp');
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'dinas/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'dinas/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'dinas/index.html';
            $config['first_url'] = base_url() . 'dinas/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Dinas_model->total_rows($q);
        $dinas = $this->Dinas_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'dinas_data' => $dinas,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('dinas/list', $data);
    }

    public function read($id) 
    {
        $this->load->view('etc/comp');
        $row = $this->Dinas_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'no_transaksi' => $row->no_transaksi,
		'nip' => $row->nip,
		'nama_hotel' => $row->nama_hotel,
		'alamat_hotel' => $row->alamat_hotel,
		'lama_hari' => $row->lama_hari,
		'harga' => $row->harga,
		'total' => $row->total,
		'deskripsi' => $row->deskripsi,
	    );
            $this->load->view('dinas/read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('dinas'));
        }
    }

    public function create() 
    {
        $this->load->view('etc/comp');
        $data = array(
            'button' => 'Create',
            'action' => site_url('dinas/create_action'),
	    'id' => set_value('id'),
	    'no_transaksi' => set_value('no_transaksi'),
	    'nip' => set_value('nip'),
	    'nama_hotel' => set_value('nama_hotel'),
	    'alamat_hotel' => set_value('alamat_hotel'),
	    'lama_hari' => set_value('lama_hari'),
	    'harga' => set_value('harga'),
	    'total' => set_value('total'),
	    'deskripsi' => set_value('deskripsi'),
	);
        $this->load->view('dinas/form', $data);
    }
    
    public function create_action() 
    {
        $this->load->view('etc/comp');
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'no_transaksi' => $this->input->post('no_transaksi',TRUE),
		'nip' => $this->input->post('nip',TRUE),
		'nama_hotel' => $this->input->post('nama_hotel',TRUE),
		'alamat_hotel' => $this->input->post('alamat_hotel',TRUE),
		'lama_hari' => $this->input->post('lama_hari',TRUE),
		'harga' => $this->input->post('harga',TRUE),
		'total' => $this->input->post('total',TRUE),
		'deskripsi' => $this->input->post('deskripsi',TRUE),
	    );

            $this->Dinas_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('dinas'));
        }
    }
    
    public function update($id) 
    {
        $this->load->view('etc/comp');
        $row = $this->Dinas_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('dinas/update_action'),
		'id' => set_value('id', $row->id),
		'no_transaksi' => set_value('no_transaksi', $row->no_transaksi),
		'nip' => set_value('nip', $row->nip),
		'nama_hotel' => set_value('nama_hotel', $row->nama_hotel),
		'alamat_hotel' => set_value('alamat_hotel', $row->alamat_hotel),
		'lama_hari' => set_value('lama_hari', $row->lama_hari),
		'harga' => set_value('harga', $row->harga),
		'total' => set_value('total', $row->total),
		'deskripsi' => set_value('deskripsi', $row->deskripsi),
	    );
            $this->load->view('dinas/form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('dinas'));
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
		'no_transaksi' => $this->input->post('no_transaksi',TRUE),
		'nip' => $this->input->post('nip',TRUE),
		'nama_hotel' => $this->input->post('nama_hotel',TRUE),
		'alamat_hotel' => $this->input->post('alamat_hotel',TRUE),
		'lama_hari' => $this->input->post('lama_hari',TRUE),
		'harga' => $this->input->post('harga',TRUE),
		'total' => $this->input->post('total',TRUE),
		'deskripsi' => $this->input->post('deskripsi',TRUE),
	    );

            $this->Dinas_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('dinas'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Dinas_model->get_by_id($id);

        if ($row) {
            $this->Dinas_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('dinas'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('dinas'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('no_transaksi', 'no transaksi', 'trim|required');
	$this->form_validation->set_rules('nip', 'nip', 'trim|required');
	$this->form_validation->set_rules('nama_hotel', 'nama hotel', 'trim|required');
	$this->form_validation->set_rules('alamat_hotel', 'alamat hotel', 'trim|required');
	$this->form_validation->set_rules('lama_hari', 'lama hari', 'trim|required');
	$this->form_validation->set_rules('harga', 'harga', 'trim|required');
	$this->form_validation->set_rules('total', 'total', 'trim|required');
	$this->form_validation->set_rules('deskripsi', 'deskripsi', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "dinas.xls";
        $judul = "dinas";
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
	xlsWriteLabel($tablehead, $kolomhead++, "No Transaksi");
	xlsWriteLabel($tablehead, $kolomhead++, "Nip");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Hotel");
	xlsWriteLabel($tablehead, $kolomhead++, "Alamat Hotel");
	xlsWriteLabel($tablehead, $kolomhead++, "Lama Hari");
	xlsWriteLabel($tablehead, $kolomhead++, "Harga");
	xlsWriteLabel($tablehead, $kolomhead++, "Total");
	xlsWriteLabel($tablehead, $kolomhead++, "Deskripsi");

	foreach ($this->Dinas_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->no_transaksi);
	    xlsWriteNumber($tablebody, $kolombody++, $data->nip);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_hotel);
	    xlsWriteLabel($tablebody, $kolombody++, $data->alamat_hotel);
	    xlsWriteNumber($tablebody, $kolombody++, $data->lama_hari);
	    xlsWriteNumber($tablebody, $kolombody++, $data->harga);
	    xlsWriteNumber($tablebody, $kolombody++, $data->total);
	    xlsWriteLabel($tablebody, $kolombody++, $data->deskripsi);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Dinas.php */
/* Location: ./application/controllers/Dinas.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-05-15 18:52:11 */
/* http://harviacode.com */