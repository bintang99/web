<?php
/**
* 
*/
Class Loginmodel extends CI_Model
{
	var $CI;
	function __construct()
	{
		parent::__construct();
		$this->CI =& get_instance();
	}
  function validasi($data){
  	return $this->db->get_where('tbuser', $data);
  }

  function loginsiswa($data){
  	return $this->db->get_where('pendaftaran', $data);
  }
}

?>