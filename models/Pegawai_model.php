<?php
class Ekstra_model extends CI_Model
{

	public function insertEkstra(){
		$object = array
		(
			'fk_siswa'     => $this->input->post('fk_siswa'),
			'nama_ekskul'  => $this->input->post('pilih_ekstra'),
		);
		$this->db->insert('tb_ekstra',$object);
	}

	public function ekstraSiswa($id){
		$this->db->select('*');
		$this->db->from('tb_ekstra');
		$this->db->join('tb_siswa','tb_siswa.id = tb_ekstra.fk_siswa','left');
		$this->db->where('fk_siswa',$id);
		$read = $this->db->get();
        return $read->result();
	}

	public function siswa(){
		$this->db->select('*');
		$this->db->from('tb_ekstra');
		$this->db->join('tb_siswa','tb_siswa.id = tb_ekstra.fk_siswa','left');
		
		$read = $this->db->get();
        return $read->result();
	}

	public function getbyId(){

		$this->db->from('tb_siswa');
		$this->db->where('id',$id);
		$getById = $this->db->get();

		if($getById->num_rows() == 1){
			return $getById->result();
		}else{
			return false;
		}
	}

	public function getEkstra(){
		$query=$this->db->get('ekstra');
		return $query->result();
	}

	public function updateById($id){
		$object=array
		(
			'name'=>$this->input->post('name'),
			'address'=>$this->input->post('address'),
			'email'=>$this->input->post('email'),
			'telephone'=>$this->input->post('telephone'),
			'class'=>$this->input->post('class'),
			'ekstra'=>$this->input->post('ekstra'),
		);
		$this->db->where('id',$id);
		$this->db->update('ekstra',$object);
	}

	public function delete($id){
		$this->db->where('id',$id);
		$this->db->delete('ekstra');
	}
}
?>