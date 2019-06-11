<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->load->view('etc/comp');
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'user/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'user/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'user/index.html';
            $config['first_url'] = base_url() . 'user/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->User_model->total_rows($q);
        $user = $this->User_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'user_data' => $user,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('user/list', $data);
    }

    public function read($id) 
    {
        $this->load->view('etc/comp');
        $row = $this->User_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'name' => $row->name,
		'nip' => $row->nip,
		'email' => $row->email,
		'password' => $row->password,
		'id_jabatan' => $row->id_jabatan,
		'id_unit_kerja' => $row->id_unit_kerja,
		'id_golongan' => $row->id_golongan,
		'uang_dinas' => $row->uang_dinas,
		'deskripsi' => $row->deskripsi,
		'role' => $row->role,
	    );
            $this->load->view('user/read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('user'));
        }
    }

    public function create() 
    {
        $this->load->view('etc/comp');
        $data = array(
            'button' => 'Create',
            'action' => site_url('user/create_action'),
	    'id' => set_value('id'),
	    'name' => set_value('name'),
	    'nip' => set_value('nip'),
	    'email' => set_value('email'),
	    'password' => set_value('password'),
	    'id_jabatan' => set_value('id_jabatan'),
	    'id_unit_kerja' => set_value('id_unit_kerja'),
	    'id_golongan' => set_value('id_golongan'),
	    'uang_dinas' => set_value('uang_dinas'),
	    'deskripsi' => set_value('deskripsi'),
	    'role' => set_value('role'),
	);
        $this->load->view('user/form', $data);
    }
    
    public function create_action() 
    {
        $this->load->view('etc/comp');
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'name' => $this->input->post('name',TRUE),
		'nip' => $this->input->post('nip',TRUE),
		'email' => $this->input->post('email',TRUE),
		'password' => $this->input->post('password',TRUE),
		'id_jabatan' => $this->input->post('id_jabatan',TRUE),
		'id_unit_kerja' => $this->input->post('id_unit_kerja',TRUE),
		'id_golongan' => $this->input->post('id_golongan',TRUE),
		'uang_dinas' => $this->input->post('uang_dinas',TRUE),
		'deskripsi' => $this->input->post('deskripsi',TRUE),
		'role' => $this->input->post('role',TRUE),
	    );

            $this->User_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('user'));
        }
    }
    
    public function update($id) 
    {
        $this->load->view('etc/comp');
        $row = $this->User_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('user/update_action'),
		'id' => set_value('id', $row->id),
		'name' => set_value('name', $row->name),
		'nip' => set_value('nip', $row->nip),
		'email' => set_value('email', $row->email),
		'password' => set_value('password', $row->password),
		'id_jabatan' => set_value('id_jabatan', $row->id_jabatan),
		'id_unit_kerja' => set_value('id_unit_kerja', $row->id_unit_kerja),
		'id_golongan' => set_value('id_golongan', $row->id_golongan),
		'uang_dinas' => set_value('uang_dinas', $row->uang_dinas),
		'deskripsi' => set_value('deskripsi', $row->deskripsi),
		'role' => set_value('role', $row->role),
	    );
            $this->load->view('user/form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('user'));
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
		'name' => $this->input->post('name',TRUE),
		'nip' => $this->input->post('nip',TRUE),
		'email' => $this->input->post('email',TRUE),
		'password' => $this->input->post('password',TRUE),
		'id_jabatan' => $this->input->post('id_jabatan',TRUE),
		'id_unit_kerja' => $this->input->post('id_unit_kerja',TRUE),
		'id_golongan' => $this->input->post('id_golongan',TRUE),
		'uang_dinas' => $this->input->post('uang_dinas',TRUE),
		'deskripsi' => $this->input->post('deskripsi',TRUE),
		'role' => $this->input->post('role',TRUE),
	    );

            $this->User_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('user'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->User_model->get_by_id($id);

        if ($row) {
            $this->User_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('user'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('user'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('name', 'name', 'trim|required');
	$this->form_validation->set_rules('nip', 'nip', 'trim|required');
	$this->form_validation->set_rules('email', 'email', 'trim|required');
	$this->form_validation->set_rules('password', 'password', 'trim|required');
	$this->form_validation->set_rules('id_jabatan', 'id jabatan', 'trim|required');
	$this->form_validation->set_rules('id_unit_kerja', 'id unit kerja', 'trim|required');
	$this->form_validation->set_rules('id_golongan', 'id golongan', 'trim|required');
	$this->form_validation->set_rules('uang_dinas', 'uang dinas', 'trim|required');
	$this->form_validation->set_rules('deskripsi', 'deskripsi', 'trim|required');
	$this->form_validation->set_rules('role', 'role', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "user.xls";
        $judul = "user";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Name");
	xlsWriteLabel($tablehead, $kolomhead++, "Nip");
	xlsWriteLabel($tablehead, $kolomhead++, "Email");
	xlsWriteLabel($tablehead, $kolomhead++, "Password");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Jabatan");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Unit Kerja");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Golongan");
	xlsWriteLabel($tablehead, $kolomhead++, "Uang Dinas");
	xlsWriteLabel($tablehead, $kolomhead++, "Deskripsi");
	xlsWriteLabel($tablehead, $kolomhead++, "Role");

	foreach ($this->User_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->name);
	    xlsWriteNumber($tablebody, $kolombody++, $data->nip);
	    xlsWriteLabel($tablebody, $kolombody++, $data->email);
	    xlsWriteLabel($tablebody, $kolombody++, $data->password);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_jabatan);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_unit_kerja);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_golongan);
	    xlsWriteNumber($tablebody, $kolombody++, $data->uang_dinas);
	    xlsWriteLabel($tablebody, $kolombody++, $data->deskripsi);
	    xlsWriteNumber($tablebody, $kolombody++, $data->role);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file User.php */
/* Location: ./application/controllers/User.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-05-15 18:52:13 */
/* http://harviacode.com */