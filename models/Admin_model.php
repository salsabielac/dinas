<?php 
class Admin_model extends CI_Model {

		public function login($nip,$password){
			$this->db->where('nip',$nip);
			$this->db->where('password',md5($password));
			$query = $this->db->get('admin');
			if ($query->num_rows() == 1) {
				return $query->result();
			}else{
				return false;
			}
		}

		public function pegawai(){
			$mamam = array(
					  'nip'   => $this->input->post('nip'),
					  'nama'   => $this->input->post('nama'),
					  'jabatan'     => $this->input->post('jabatan'),
					  'unit_kerja'          => $this->input->post('unit_kerja'),
					  'golongan'   => $this->input->post('golongan'),
					  'deskripsi'   => $this->input->post('deskripsi'),
					  'uang_dinas'     => $this->input->post('uang_dinas')
			);
		$this->db->insert('pegawai',$mamam);
		}

		public function edit_pegawai($id){
			$mamam = array(
					  'nip'   => $this->input->post('nip'),
					  'nama'   => $this->input->post('nama'),
					  'jabatan'     => $this->input->post('jabatan'),
					  'unit_kerja'   => $this->input->post('unit_kerja'),
					  'golongan'   => $this->input->post('golongan'),
					  'deskripsi'     => $this->input->post('deskripsi'),
					  'uang_dinas'          => $this->input->post('uang_dinas')
			);
				$this->db->where('id',$id);
				$this->db->update('pegawai',$mamam);
		}

		public function getById($id){
			$this->db->from('pegawai');
			$this->db->where('id',$id);
			$getById = $this->db->get();

			if($getById->num_rows() == 1){
				return $getById->result();
			}else{
				return false;
			}
	}

	public function delete($id){
		$this->db->where('id',$id);
		$this->db->delete('pegawai');
	}

}