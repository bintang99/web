<?php  
/**
* 
*/
class GaleriModel extends CI_Model
{
	var $CI;
	var $data;
	function __construct()
	{
		parent::__construct();
		$this->CI =& get_instance();
	}


//galeri
	function get_galeri(){
		$this->db->select('*');
		$this->db->from('tbgaleri');
		$this->db->join('tbgaleri_kategori', 'tbgaleri.id_ktg_galeri = tbgaleri_kategori.id_ktg_galeri');
		$this->db->group_by('tbgaleri_kategori.kategori');
		$this->db->limit(8);
		$result = $this->db->get();
		return $result->result();
	}

	function get_jml_galeri(){
		$result = $this->db->get('tbgaleri_kategori');
		return $result->num_rows();
	}

	function get_galeri_8(){
		$this->db->select('*');
		$this->db->from('tbgaleri');
		$this->db->join('tbgaleri_kategori', 'tbgaleri.id_ktg_galeri = tbgaleri_kategori.id_ktg_galeri');
		$this->db->group_by('tbgaleri_kategori.kategori');
		$this->db->limit(8);
		$result = $this->db->get();
		return $result->result();
	}

	public function id_galeri()
	{
		$query_ = $this->db->select('RIGHT(tbgaleri.id_galeri, 4) as kode', FALSE);
		$query_ = $this->db->from('tbgaleri');
		$query_ = $this->db->order_by('id_galeri','DESC');    
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
			$kodehasil_ = "GLR".$kodemax_;
			return $kodehasil_;  
	}

	function fill_data_galeri($gambar){
		$data = array(
			'id_galeri' => $this->input->post('id_galeri'),
			'id_ktg_galeri' => $this->input->post('id_ktg_galeri'),
			'tgl' => $this->input->post('tgl') ,
			'deskripsi' => $this->input->post('deskripsi'),
			'gambar' => $gambar,
			);
		return $data;
	}
	function fill_data_galeri1(){
		$data = array(
			'id_galeri' => $this->input->post('id_galeri'),
			'id_ktg_galeri' => $this->input->post('id_ktg_galeri'),
			'tgl' => $this->input->post('tgl') ,
			'deskripsi' => $this->input->post('deskripsi'),
			);
		return $data;
	}

	function insert_galeri($data){
		$insert = $this->db->insert('tbgaleri', $data);
		return $insert;
	}

	function get_by_id_galeri($id){
		$this->db->where('id_galeri',$id);
		return $this->db->get('tbgaleri')->result();
	}

	function update_galeri($id, $data){
		$this->db->where('id_galeri',$id);
		$update = $this->db->update('tbgaleri', $data);
		return $update;
	}

	function delete_galeri($id){
		$this->db->where('id_galeri',$id);
		$delete = $this->db->delete('tbgaleri');
		return $delete;
	}

	public function lihat_galeri($uri)
	{
		$this->db->select('*');
		$this->db->from('tbgaleri');
		$this->db->join('tbgaleri_kategori', 'tbgaleri.id_ktg_galeri = tbgaleri_kategori.id_ktg_galeri');
		$this->db->where('tbgaleri_kategori.kategori', $uri);
		$query = $this->db->get()->result();
		return $query;
	}

//Kategori galeri
	function get_ktg_galeri(){
		$result = $this->db->get('tbgaleri_kategori');
		return $result->result();
	}

	function fill_data_ktg_galeri(){
		$data = array(
			'kategori' => $this->input->post('kategori'),
			);
		return $data;
	}

	function insert_ktg_galeri($data){
		$insert = $this->db->insert('tbgaleri_kategori', $data);
		return $insert;
	}

	function get_by_id_ktg_galeri($id){
		$this->db->where('id_ktg_galeri',$id);
		return $this->db->get('tbgaleri_kategori')->row();
	}

	function update_ktg_galeri($id, $data){
		$this->db->where('id_ktg_galeri',$id);
		$update = $this->db->update('tbgaleri_kategori', $data);
		return $update;
	}

	function delete_ktg_galeri($id){
		$this->db->where('id_ktg_galeri',$id);
		$delete = $this->db->delete('tbgaleri_kategori');
		return $delete;
	}

}
?>