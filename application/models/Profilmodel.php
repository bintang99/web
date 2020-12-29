<?php  
/**
* 
*/
class Profilmodel extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}


	function get_profil()
	{
		$result = $this->db->get('tbprofil');
		return $result->result();
	}

	function get_profil_1()
	{
		$result = $this->db->get('tbprofil',1);
		return $result->result();
	}

	function fill_data_profile($slug){
		$data = array(
			'judul' => $this->input->post('judul'),
			'deskripsi' => $this->input->post('des'),
			'slug' => $slug
			);
		return $data;
	}
	function simpan_profile($data){
		return $this->db->insert('tbprofil', $data);
	}
	function get_slug($slug = NULL){
  		$query = $this->db->get_where('tbprofil', array('slug' => $slug))->row();
  		return $query;
  	}
  	function get_by_id_profile($id){
		$this->db->where('id',$id);
		return $this->db->get('tbprofil')->result();
	}
   function update_profile($id, $data){
		$this->db->where('id',$id);
		$update = $this->db->update('tbprofil', $data);
		return $update;
	}


}