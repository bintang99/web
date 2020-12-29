<?php  
/**
* 
*/
class Gurumodel extends CI_Model
{
	var $CI;
	var $data;
	function __construct()
	{
		parent::__construct();
		$this->CI =& get_instance();
	}

	function get_guru(){
		$result = $this->db->get('tbguru');
		return $result->result();
	}

	function get_jml_guru(){
		$result = $this->db->get('tbguru');
		return $result->num_rows();
	}

	public function kd_guru()
	{
		$query_ = $this->db->select('RIGHT(tbguru.id_guru, 4) as kode', FALSE);
		$query_ = $this->db->from('tbguru');
		$query_ = $this->db->order_by('id_guru','DESC');    
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

	function fill_data_guru($foto){
		$data = array(
			'id_guru' => $this->input->post('id_guru'),
			'nm_guru' => $this->input->post('namagr'),
			'alamat' => $this->input->post('alamatgr'),
			'foto' => $foto,
			'mapel' => $this->input->post('mapel'),
			);
		return $data;
	}

	function fill_data_guru1(){
		$data = array(
			'id_guru' => $this->input->post('id_guru'),
			'nm_guru' => $this->input->post('namagr'),
			'alamat' => $this->input->post('alamatgr'),
			'mapel' => $this->input->post('mapel'),
			);
		return $data;
	}

	function insert_guru($data){
		$insert = $this->db->insert('tbguru', $data);
		return $insert;
	}

	function get_by_id_guru($id){
		$this->db->where('id_guru',$id);
		return $this->db->get('tbguru')->row();
	}

	function update_guru($id, $data){
		$this->db->where('id_guru',$id);
		$update = $this->db->update('tbguru', $data);
		return $update;
	}

	function delete_guru($id){
		$this->db->where('id_guru',$id);
		$delete = $this->db->delete('tbguru');
		return $delete;
	}



}