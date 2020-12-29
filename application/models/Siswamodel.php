<?php  
/**
* 
*/
class Siswamodel extends CI_Model
{
	var $CI;
	var $data;
	function __construct()
	{
		parent::__construct();
		$this->CI =& get_instance();
	}


	function get_siswa()
	{
		$siswa = $this->db->get('tbsiswa');
		return $siswa->result();
	}

	function get_jml_siswa()
	{
		$siswa = $this->db->get('tbsiswa');
		return $siswa->num_rows();
	}

	function fill_data_siswa($gambar){
		$post = $this->input;
		$data = [
            'nis' => $post->post('nis'),
            'nisn' => $post->post('nisn'),
            'nm_siswa' => $post->post('nama'),
            'kelas' => $post->post('kelas'),
            'jurusan' => $post->post('jurusan'),
            'jenkel' => $post->post('jenkel'),
            'tgl_lahir' => $post->post('tgllahir'),
            'tempat_lahir' => $post->post('tmplahir'),
            'agama' => $post->post('agama'),
            'foto' => $gambar
         
		];
		return $data;
	}
	function fill_data_siswa1(){
		$post = $this->input;
		$data = [
            'nis' => $post->post('nis'),
            'nisn' => $post->post('nisn'),
            'nm_siswa' => $post->post('nama'),
            'kelas' => $post->post('kelas'),
            'jurusan' => $post->post('jurusan'),
            'jenkel' => $post->post('jenkel'),
            'tgl_lahir' => $post->post('tgllahir'),
            'tempat_lahir' => $post->post('tmplahir'),
            'agama' => $post->post('agama'),        
		];
		return $data;
	}
	function insert_siswa($data){
		$query = $this->db->insert('tbsiswa', $data);
		return $data;
	}
	function get_by_nis_siswa($nis){
		$this->db->where('nis',$nis);
		return $this->db->get('tbsiswa')->row();
	}
	function update_siswa($nis, $data){
		$this->db->where('nis',$nis);
		$update = $this->db->update('tbsiswa', $data);
		return $update;
	}

}