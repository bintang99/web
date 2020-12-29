<?php  
/**
* 
*/
class Prestasimodel extends CI_Model
{
	var $CI;
	var $data;
	function __construct()
	{
		parent::__construct();
		$this->CI =& get_instance();
	}

	
//prestasi
	function get_prestasi(){
		$result = $this->db->get('tbprestasi');
		return $result->result();
	}

	function get_prestasi_random(){
		$this->db->select('*');
		$this->db->from('tbprestasi');
		$result = $this->db->order_by('id_prestasi', 'RANDOM')->get();
		return $result->result();
	}

	function get_jml_prestasi(){
		$result = $this->db->get('tbprestasi');
		return $result->num_rows();
	}

	public function id_prestasi()
	{
		$query_ = $this->db->select('RIGHT(tbprestasi.id_prestasi, 4) as kode', FALSE);
		$query_ = $this->db->from('tbprestasi');
		$query_ = $this->db->order_by('id_prestasi','DESC');    
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
			$kodehasil_ = "BRT".$kodemax_;
			return $kodehasil_;  
	}

	function fill_data_prestasi($gambar){
		$data = array(
			'nm_prestasi' => $this->input->post('nm_prestasi'),
			'ke' => $this->input->post('ke'),
			'gambar' => $gambar,
			'deskripsi' => $this->input->post('deskripsi'),
			'tgl_input' => date('Ymd'),
			);
		return $data;
	}
	function fill_data_prestasi1(){
		$data = array(
			'nm_prestasi' => $this->input->post('nm_prestasi'),
			'ke' => $this->input->post('ke'),
			'deskripsi' => $this->input->post('deskripsi'),
			'tgl_input' => date('Ymd'),
			);
		return $data;
	}

	function insert_prestasi($data){
		$insert = $this->db->insert('tbprestasi', $data);
		return $insert;
	}

	function get_by_id_prestasi($id){
		$this->db->where('id_prestasi',$id);
		return $this->db->get('tbprestasi')->result();
	}

	function update_prestasi($id, $data){
		$this->db->where('id_prestasi',$id);
		$update = $this->db->update('tbprestasi', $data);
		return $update;
	}

	function delete_prestasi($id){
		$this->db->where('id_prestasi',$id);
		$delete = $this->db->delete('tbprestasi');
		return $delete;
	}


//Kategori prestasi
	function get_ktg_prestasi(){
		$result = $this->db->get('tbprestasi_kategori');
		return $result->result();
	}

	function fill_data_ktg_prestasi(){
		$data = array(
			'kategori' => $this->input->post('kategori'),
			);
		return $data;
	}

	function insert_ktg_prestasi($data){
		$insert = $this->db->insert('tbprestasi_kategori', $data);
		return $insert;
	}

	function get_by_id_ktg_prestasi($id){
		$this->db->where('id_ktg_prestasi',$id);
		return $this->db->get('tbprestasi_kategori')->row();
	}

	function update_ktg_prestasi($id, $data){
		$this->db->where('id_ktg_prestasi',$id);
		$update = $this->db->update('tbprestasi_kategori', $data);
		return $update;
	}

	function delete_ktg_prestasi($id){
		$this->db->where('id_ktg_prestasi',$id);
		$delete = $this->db->delete('tbprestasi_kategori');
		return $delete;
	}
	 function prestasi($limit, $start){
        $query = $this->db->get('tbprestasi', $limit, $start);
        return $query;
    }


}