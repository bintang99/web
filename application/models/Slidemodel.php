<?php  
/**
* 
*/
class Slidemodel extends CI_Model
{
	var $CI;
	var $data;
	function __construct()
	{
		parent::__construct();
		$this->CI =& get_instance();
	}

//setup_slide
	function get_slide(){
		$result = $this->db->get('setup_slide');
		return $result->result();
	}

	function get_slide_1(){
		$result = $this->db->get('setup_slide',1);
		return $result->result();
	}

	function fill_data_slide($gambar){
		$data = array(
			'judul' => $this->input->post('judul'),
			'gambar' => $gambar,
			'deskripsi' => $this->input->post('deskripsi'),
			);
		return $data;
	}

	function fill_data_slide1(){
		$data = array(
			'judul' => $this->input->post('judul'),
			'deskripsi' => $this->input->post('deskripsi'),
			);
		return $data;
	}

	function insert_slide($data){
		$insert = $this->db->insert('setup_slide', $data);
		return $insert;
	}

	function get_by_id_slide($id){
		$this->db->where('id_slide',$id);
		return $this->db->get('setup_slide')->row();
	}

	function update_slide($id, $data){
		$this->db->where('id_slide',$id);
		$update = $this->db->update('setup_slide', $data);
		return $update;
	}

	function delete_slide($id){
		$this->db->where('id_slide',$id);
		$delete = $this->db->delete('setup_slide');
		return $delete;
	}

}
?>