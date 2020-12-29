<?php  
/**
* 
*/
class Tefamodel extends CI_Model
{
	var $CI;
	var $data;
	function __construct()
	{
		parent::__construct();
		$this->CI =& get_instance();
	}

	
//tefa
	function get_tefa(){
		$result = $this->db->get('tefa_konten');
		return $result->result();
	}
	function get_tefa_terbaru(){
		$this->db->select('*');
		$this->db->from('tefa_konten');
		$result = $this->db->order_by('id_tefa', 'DESC')->limit(10)->get();
		return $result->result();
	}

	function get_tefa_random(){
		$this->db->select('*');
		$this->db->from('tefa_konten');
		$result = $this->db->order_by('id_tefa', 'RANDOM')->limit(10)->get();
		return $result->result();
	}
	function get_jml_tefa(){
		$result = $this->db->get('tefa_konten');
		return $result->num_rows();
	}

	function fill_data_tefa($foto, $slug){
		$data = array(
			'id_tefa' => $this->input->post('id_tefa'),
			'tgl' => $this->input->post('tgl'),
			'foto' => $foto,
			'judul' => $this->input->post('judul'),
			'des' => $this->input->post('des'),
			'slug' => $slug,
			);
		return $data;
	}
	function fill_data_tefa1($slug){
		$data = array(
			'id_tefa' => $this->input->post('id_tefa'),
			'tgl' => $this->input->post('tgl'),
			'judul' => $this->input->post('judul'),
			'des' => $this->input->post('des'),
			'slug' => $slug,
			);
		return $data;
	}

	function insert_tefa($data){
		$insert = $this->db->insert('tefa_konten', $data);
		return $insert;
	}

	function get_by_id_tefa($id){
		$this->db->where('id_tefa',$id);
		return $this->db->get('tefa_konten')->result();
	}

	function get_by_slug_tefa($slug){
		$this->db->where('slug',$slug);
		return $this->db->get('tefa_konten')->result();
	}

	function update_tefa($id, $data){
		$this->db->where('id_tefa',$id);
		$update = $this->db->update('tefa_konten', $data);
		return $update;
	}

	function delete_tefa($id){
		$this->db->where('id_tefa',$id);
		$delete = $this->db->delete('tefa_konten');
		return $delete;
	}
	
//tefa_kegiatan
	function get_tefa_kegiatan(){
		$result = $this->db->get('tefa_kegiatan');
		return $result->result();
	}
	function get_tefa_kegiatan_terbaru(){
		$this->db->select('*');
		$this->db->from('tefa_kegiatan');
		$result = $this->db->order_by('id', 'DESC')->limit(10)->get();
		return $result->result();
	}

	function get_tefa_kegiatan_random(){
		$this->db->select('*');
		$this->db->from('tefa_kegiatan');
		$result = $this->db->order_by('id', 'RANDOM')->limit(10)->get();
		return $result->result();
	}
	function get_jml_tefa_kegiatan(){
		$result = $this->db->get('tefa_kegiatan');
		return $result->num_rows();
	}

	function fill_data_tefa_kegiatan($foto, $slug){
		$data = array(
			'id' => $this->input->post('id'),
			'tgl' => $this->input->post('tgl'),
			'foto' => $foto,
			'judul' => $this->input->post('judul'),
			'des' => $this->input->post('des'),
			'slug' => $slug,
			);
		return $data;
	}
	function fill_data_tefa_kegiatan1($slug){
		$data = array(
			'id' => $this->input->post('id'),
			'tgl' => $this->input->post('tgl'),
			'judul' => $this->input->post('judul'),
			'des' => $this->input->post('des'),
			'slug' => $slug,
			);
		return $data;
	}

	function insert_tefa_kegiatan($data){
		$insert = $this->db->insert('tefa_kegiatan', $data);
		return $insert;
	}

	function get_by_id_tefa_kegiatan($id){
		$this->db->where('id',$id);
		return $this->db->get('tefa_kegiatan')->result();
	}

	function get_by_slug_tefa_kegiatan($slug){
		$this->db->where('slug',$slug);
		return $this->db->get('tefa_kegiatan')->result();
	}

	function update_tefa_kegiatan($id, $data){
		$this->db->where('id',$id);
		$update = $this->db->update('tefa_kegiatan', $data);
		return $update;
	}

	function delete_tefa_kegiatan($id){
		$this->db->where('id',$id);
		$delete = $this->db->delete('tefa_kegiatan');
		return $delete;
	}
	function tefa_kegiatan($limit, $start){
        $query = $this->db->get('tefa_kegiatan', $limit, $start);
        return $query;
    }

//tefa_galeri
	function get_tefa_galeri(){
		$result = $this->db->get('tefa_galeri');
		return $result->result();
	}
	function get_tefa_galeri_terbaru(){
		$this->db->select('*');
		$this->db->from('tefa_galeri');
		$result = $this->db->order_by('id', 'DESC')->limit(10)->get();
		return $result->result();
	}

	function get_tefa_galeri_random(){
		$this->db->select('*');
		$this->db->from('tefa_galeri');
		$result = $this->db->order_by('id', 'RANDOM')->limit(10)->get();
		return $result->result();
	}
	function get_jml_tefa_galeri(){
		$result = $this->db->get('tefa_galeri');
		return $result->num_rows();
	}

	function fill_data_tefa_galeri($foto){
		$data = array(
			'tgl' => $this->input->post('tgl'),
			'foto' => $foto,
			'des' => $this->input->post('des'),
			);
		return $data;
	}
	function fill_data_tefa_galeri1(){
		$data = array(
			'tgl' => $this->input->post('tgl'),
			'des' => $this->input->post('des'),
			);
		return $data;
	}

	function insert_tefa_galeri($data){
		$insert = $this->db->insert('tefa_galeri', $data);
		return $insert;
	}

	function get_by_id_tefa_galeri($id){
		$this->db->where('id',$id);
		return $this->db->get('tefa_galeri')->result();
	}

	function get_by_slug_tefa_galeri($slug){
		$this->db->where('slug',$slug);
		return $this->db->get('tefa_galeri')->result();
	}

	function update_tefa_galeri($id, $data){
		$this->db->where('id',$id);
		$update = $this->db->update('tefa_galeri', $data);
		return $update;
	}

	function delete_tefa_galeri($id){
		$this->db->where('id',$id);
		$delete = $this->db->delete('tefa_galeri');
		return $delete;
	}
	function tefa_galeri($limit, $start){
        $query = $this->db->get('tefa_galeri', $limit, $start);
        return $query;
    }
}
