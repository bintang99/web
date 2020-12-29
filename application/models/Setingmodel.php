<?php  
/**
* 
*/
class Setingmodel extends CI_Model
{
	var $CI;
	var $data;
	function __construct()
	{
		parent::__construct();
		$this->CI =& get_instance();
	}
	
	function get_sekolah()
	{
		$seting = $this->db->get_where('seting',array('id'=>'1'));
		return $seting->row_array();
	}



}