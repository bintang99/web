<?php  
/**
* 
*/
class Streammodel extends CI_Model
{
	var $CI;
	var $data;
	function __construct()
	{
		parent::__construct();
		$this->CI =& get_instance();
	}

	
//streaming
	function streaming(){
		$this->db->order_by('id','DESC');
		$result = $this->db->get('tbstream');
		return $result->result();
	}
	function ambil_streaming(){
		$this->db->order_by('id','DESC');
		$result = $this->db->get('tbstream');
		return $result->row();
	}

	function update_stream($data){
		$this->db->where('id', '1');
		$sql = $this->CI->db->update('tbstream', $data);
		return $sql;
	}

}