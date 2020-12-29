<?php  
/**
* 
*/
class Beritamodel extends CI_Model
{
	var $CI;
	var $data;
	function __construct()
	{
		parent::__construct();
		$this->CI =& get_instance();
	}

	
//Berita
	function get_berita_terbaru(){
		$this->db->select('*');
		$this->db->from('tbberita');
		$this->db->join('tbberita_kategori', 'tbberita.id_ktg_berita = tbberita_kategori.id_ktg_berita');
		$result = $this->db->order_by('id_berita', 'DESC')->limit(10)->get();
		return $result->result();
	}

	function get_berita_random(){
		$this->db->select('*');
		$this->db->from('tbberita');
		$this->db->join('tbberita_kategori', 'tbberita.id_ktg_berita = tbberita_kategori.id_ktg_berita');
		$result = $this->db->order_by('id_berita', 'RANDOM')->limit(10)->get();
		return $result->result();
	}
	function get_kategori_brt(){
		return $this->db->get('tbberita_kategori')->result();
	}
  function get_berita_by_kat($uri){
  	    $this->db->select('*');
		$this->db->from('tbberita');
		$this->db->join('tbberita_kategori', 'tbberita.id_ktg_berita = tbberita_kategori.id_ktg_berita');
		$this->db->where('tbberita_kategori.slug_kat', $uri);
		$query = $this->db->get()->result();
		return $query;
  }
  function get_by_uri($uri){
  	    $this->db->select('*');
		$this->db->from('tbberita');
		$this->db->join('tbberita_kategori', 'tbberita.id_ktg_berita = tbberita_kategori.id_ktg_berita');
		$this->db->where('tbberita_kategori.slug_kat', $uri);
		$query = $this->db->get()->row();
		return $query;
  }
	function get_jml_berita(){
		$result = $this->db->get('tbberita');
		return $result->num_rows();
	}

	public function id_berita()
	{
		$query_ = $this->db->select('RIGHT(tbberita.id_berita, 4) as kode', FALSE);
		$query_ = $this->db->from('tbberita');
		$query_ = $this->db->order_by('id_berita','DESC');    
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

	function fill_data_berita($gambar, $slug){
		$data = array(
			'id_berita' => $this->input->post('id_berita'),
			'id_ktg_berita' => $this->input->post('id_ktg_berita'),
			'tgl_input' => date('Y-m-d') ,
			'gambar' => $gambar,
			'judul' => $this->input->post('judul'),
			'konten' => $this->input->post('konten'),
			'slug' => $slug,
			'iduser' => $this->session->userdata('nama'),
			);
		return $data;
	}
	function fill_data_berita1(){
		$data = array(
			'id_berita' => $this->input->post('id_berita'),
			'id_ktg_berita' => $this->input->post('id_ktg_berita'),
			'tgl_input' => date('Y-m-d H:m:s') ,
			'judul' => $this->input->post('judul'),
			'konten' => $this->input->post('konten'),
			'iduser' => $this->session->userdata('nama'),
			);
		return $data;
	}

	function insert_berita($data){
		$insert = $this->db->insert('tbberita', $data);
		return $insert;
	}

	function get_by_id_berita($id){
		$this->db->where('id_berita',$id);
		return $this->db->get('tbberita')->result();
	}

	function update_berita($id, $data){
		$this->db->where('id_berita',$id);
		$update = $this->db->update('tbberita', $data);
		return $update;
	}

	function delete_berita($id){
		$this->db->where('id_berita',$id);
		$delete = $this->db->delete('tbberita');
		return $delete;
	}


//Kategori berita
	function get_ktg_berita(){
		$result = $this->db->get('tbberita_kategori');
		return $result->result();
	}

	function fill_data_ktg_berita($slug){
		$data = array(
			'kategori' => $this->input->post('kategori'),
			'slug_kat' => $slug
			);
		return $data;
	}

	function insert_ktg_berita($data){
		$insert = $this->db->insert('tbberita_kategori', $data);
		return $insert;
	}

	function get_by_id_ktg_berita($id){
		$this->db->where('id_ktg_berita',$id);
		return $this->db->get('tbberita_kategori')->row();
	}

	function update_ktg_berita($id, $data){
		$this->db->where('id_ktg_berita',$id);
		$update = $this->db->update('tbberita_kategori', $data);
		return $update;
	}

	function delete_ktg_berita($id){
		$this->db->where('id_ktg_berita',$id);
		$delete = $this->db->delete('tbberita_kategori');
		return $delete;
	}
	 function berita($limit, $start){
        $query = $this->db->order_by('id_berita', 'DESC')->get('tbberita', $limit, $start);
        return $query;
    }


}