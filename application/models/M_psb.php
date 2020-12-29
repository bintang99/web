<?php

 class M_psb extends CI_Model
 {
 	function tampil_psb(){
 		$query = $this->db->query("SELECT * FROM  pendaftaran");
 		return $query;
 	}
 	function psb_id($id){
 		$query = $this->db->query("SELECT * FROM pendaftaran WHERE pendaftaran.no_reg='$id'");
 		return $query;
 	}
 	function ujian($id)
 	{
 		$query = $this->db->query("SELECT * FROM ujian_masuk WHERE no_reg='$id'");
 		return $query;
 	}
 } 

?>