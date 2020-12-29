<?php  
/**
* 
*/
class M_Blog extends CI_Model
{
	function get_slug($slug = NULL){
  		$query = $this->db->get_where('tbberita', array('slug' => $slug))->row();
  		return $query;
  	}
}