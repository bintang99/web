<?php  
/**
* 
*/
class Jurusanmodel extends CI_Model
{
	var $CI;
	var $data;
	function __construct()
	{
		parent::__construct();
		$this->CI =& get_instance();
	}

	
//jurusan
	function get_jurusan(){
		$result = $this->db->get('tbjurusan');
		return $result->result();
	}


	function get_jml_jurusan(){
		$result = $this->db->get('tbjurusan');
		return $result->num_rows();
	}

	function fill_data_jurusan($gambar, $slug){
		$data = array(
			'nm_jurusan' => $this->input->post('nm_jurusan'),
			'Deskripsi' => $this->input->post('deskripsi'),
			'gambar' => $gambar,
			'slug' => $slug,
			);
		return $data;
	}
	function fill_data_jurusan1($slug){
		$data = array(
			'nm_jurusan' => $this->input->post('nm_jurusan'),
			'Deskripsi' => $this->input->post('deskripsi'),
			'slug' => $slug,
			);
		return $data;
	}

	function insert_jurusan($data){
		$insert = $this->db->insert('tbjurusan', $data);
		return $insert;
	}

	function get_by_id_jurusan($id){
		$this->db->where('id_jurusan',$id);
		return $this->db->get('tbjurusan')->result();
	}

	function get_jurusan_by_slug($slug = NULL){
  		$query = $this->db->get_where('tbjurusan', array('slug' => $slug))->row();
  		return $query;
  	}

	function update_jurusan($id, $data){
		$this->db->where('id_jurusan',$id);
		$update = $this->db->update('tbjurusan', $data);
		return $update;
	}

	function delete_jurusan($id){
		$this->db->where('id_jurusan',$id);
		$delete = $this->db->delete('tbjurusan');
		return $delete;
	}


}