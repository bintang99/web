<?php  
/**
* 
*/
class Pendaftaranmodel extends CI_Model
{
	var $CI;
	var $data;
	function __construct()
	{
		parent::__construct();
		$this->CI =& get_instance();
	}


	function get_pendaftaran()
	{
		$siswa = $this->db->get('pendaftaran');
		return $siswa->result();
	}
	function delete_pendaftaran($id){
              $where = array('no_reg' => $id);
              $hapus = $this->db->delete('pendaftaran', $where);
              return $hapus;
	}

	function get_pendaftaran_by_id($id)
	{
		$this->db->where('no_reg', $id);
		$siswa = $this->db->get('pendaftaran');
		return $siswa->result();
	}

	function get_jml_pendaftaran()
	{
		$siswa = $this->db->get('pendaftaran');
		return $siswa->num_rows();
	}

	public function auto_inc()
	{
		$this->db->select('Right(pendaftaran.no_reg, 3) as kode ',false);
        $this->db->order_by('no_reg', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('pendaftaran');
	        if($query->num_rows()<>0){
	            $data = $query->row();
	            $kode = intval($data->kode)+1;
	        }else{
	            $kode = 1;

	        }
        $date 		= date('ym');
        $kodemax 	= str_pad($kode,3,"0",STR_PAD_LEFT);
        $kodejadi  	= "PSB".$date.$kodemax;
        return $kodejadi;
	}

	public function insert_pendaftaran($data)
	{
		$insert = $this->db->insert('pendaftaran', $data);
		return $insert;
	}

	public function get_daftar($kode)
	{
		$this->db->select('*');
		$this->db->from('pendaftaran');
		$this->db->where('no_reg', $kode);
		$query = $this->db->get();
		return $query->result();
	}

	public function update_pendaftaran($id, $data)
	{
		$this->db->where('no_reg', $id);
		$update = $this->db->update('pendaftaran', $data);
		return $update;
	}
	public function tampil_pendaftar(){
		$this->db->select('*');
		$this->db->from('pendaftaran');
		$this->db->join('tbjurusan', 'pendaftaran.id_jurusan = tbjurusan.id_jurusan');
		$result = $this->db->get()->result();
		return $result;
	}
}