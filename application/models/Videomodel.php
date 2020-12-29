<?php  
/**
* 
*/
class Videomodel extends CI_Model
{
	var $CI;
	var $data;
	function __construct()
	{
		parent::__construct();
		$this->CI =& get_instance();
	}

	
//video
	function get_video(){
		$this->db->order_by('id_video','DESC');
		$result = $this->db->get('tbvideo');
		return $result->result();
	}

	function get_video_1(){
		$this->db->order_by('id_video','DESC');
		$result = $this->db->get('tbvideo',1);
		return $result->result();
	}

	function get_video_4(){
		$this->db->order_by('id_video','DESC');
		$result = $this->db->get('tbvideo',4);
		return $result->result();
	}

	function get_jml_video(){
		$result = $this->db->get('tbvideo');
		return $result->num_rows();
	}

	function fill_data_video(){
		$data = array(
			'title' => $this->input->post('title'),
			'link_video' => $this->input->post('link'),
			);
		return $data;
	}

	function insert_video($data){
		$insert = $this->db->insert('tbvideo', $data);
		return $insert;
	}

	function get_by_id_video($id){
		$this->db->where('id_video',$id);
		return $this->db->get('tbvideo')->result();
	}

	function update_video($id, $data){
		$this->db->where('id_video',$id);
		$update = $this->db->update('tbvideo', $data);
		return $update;
	}

	function delete_video($id){
		$this->db->where('id_video',$id);
		$delete = $this->db->delete('tbvideo');
		return $delete;
	}

}