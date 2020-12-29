<?php  
/**
* 
*/
class Penggunamodel extends CI_Model
{
	var $CI;
	var $data;
	function __construct()
	{
		parent::__construct();
		$this->CI =& get_instance();
	}

	function get_pengguna(){
		$result = $this->db->get('tbuser');
		return $result->result();
	}

	function get_jml_pengguna(){
		$result = $this->db->get('tbuser');
		return $result->num_rows();
	}

	public function kd_pengguna()
	{
		$query_ = $this->db->select('RIGHT(tbuser.iduser, 4) as kode', FALSE);
		$query_ = $this->db->from('tbuser');
		$query_ = $this->db->order_by('iduser','DESC');    
		$query_ = $this->db->limit(1);    
		$query_ = $this->db->get('');      //cek dulu apakah ada sudah ada kode di tabel.    
		if($query_->num_rows() <> 0){      
			//jika kode ternyata sudah ada.      
			$data_ = $query_->row();      
			$kode_ = intval($data_->kode) + 1;    
		}else {      
			//jika kode belum ada      
			$kode_ = 1;    
		}
			$kodemax_ = str_pad($kode_, 4, "0", STR_PAD_LEFT); // angka 5 menunjukkan jumlah digit angka 0
			$kodehasil_ = "GR".$kodemax_;
			return $kodehasil_;  
	}

	function fill_data_pengguna(){
		$data = array(
			'iduser' => $this->input->post('iduser'),
			'namalengkap' => $this->input->post('nama'),
			'u' => $this->input->post('user'),
			'p' => $this->input->post('pass'),
			'level' => $this->input->post('level'),
			);
		return $data;
	}

	function insert_pengguna($data){
		$insert = $this->db->insert('tbuser', $data);
		return $insert;
	}

	function get_by_id_pengguna($id){
		$this->db->where('iduser',$id);
		return $this->db->get('tbuser')->result();
	}

	function update_pengguna($id, $data){
		$this->db->where('iduser',$id);
		$update = $this->db->update('tbuser', $data);
		return $update;
	}

	function delete_pengguna($id){
		$this->db->where('iduser',$id);
		$delete = $this->db->delete('tbuser');
		return $delete;
	}



}