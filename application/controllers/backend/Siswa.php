<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class Siswa extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		if( $this->session->userdata('status')!='login'){
			echo "<script>alert('Anda Belum Login !!');window.location='".base_url('')."backend/Login';</script>";
		}

		$this->load->model('Siswamodel');
		$this->load->library(array('FPDF','upload'));
		define('FPDF_FONTPATH', $this->config->item('fonts_path'));
		
	}

		function index(){

		$data['judul'] = 'Data Siswa';
		$data['siswadata'] = $this->Siswamodel->get_siswa();
		$this->load->view('admin/layout/header');
        $this->load->view('admin/layout/navbar');
		$this->load->view('admin/siswa',$data);
		$this->load->view('admin/layout/footer');
	}
	function addsiswa(){
		$config['upload_path'] 		= 'assets/upload/siswa/';
		$config['allowed_types'] 	= 'gif|jpg|png|jpeg|bmp';
		$config['max_size'] 		= '2048';
		$config['max_width'] 		= '1288';
		$config['max_height'] 		= '768';
		$config['file_name'] 		= $this->input->post('id_berita');

			$this->upload->initialize($config);
				if ( ! $this->upload->do_upload('foto')) {
					$this->session->set_flashdata('error',$this->upload->display_errors());
					redirect(base_url('backend/siswa'));
				}else{
					$gbr = $this->upload->data();
					$gambar = $gbr['file_name'];
					$data = $this->Siswamodel->fill_data_siswa($gambar);
					if ($this->Siswamodel->insert_siswa($data)) {
						$this->session->set_flashdata('sukses',"Data Berhasil Disimpan");
						redirect(base_url('backend/siswa'));
					}
				}
	}
	function updatesiswa(){
	 	$nis = $this->input->post('nis');
		$foto_lama = $this->input->post('fotolama');

		if ($_FILES AND $_FILES['foto']['name']) {
			$config['upload_path'] 		= 'assets/upload/siswa/';
			$config['allowed_types'] 	= 'gif|jpg|png|jpeg|bmp';
			$config['max_size'] 		= '2048';
			$config['max_width'] 		= '1288';
			$config['max_height'] 		= '768';
			$config['file_name'] 		= $this->input->post('nis');

				$this->upload->initialize($config);
					if ( ! $this->upload->do_upload('foto')) {
						$this->session->set_flashdata('error',$this->upload->display_errors());
						redirect(base_url('backend/siswa'));
					}else{
						unlink('assets/upload/guru/'.$foto_lama);
						$gbr = $this->upload->data();
						$foto = $gbr['file_name'];
						$data = $this->Siswamodel->fill_data_siswa($gambar);
						if ($this->Siswamodel->update_siswa($nis, $data)) {
							$this->session->set_flashdata('sukses',"Data Berhasil Diedit");
							redirect(base_url('backend/siswa'));
						}
					}
		}else{
			$id = $this->input->post('nis');
			$data = $this->Siswamodel->fill_data_siswa1();
			if ($this->Siswamodel->update_siswa($id, $data)) {
				$this->session->set_flashdata('sukses', "Data Berhasil Diedit");
				redirect(base_url('backend/siswa'));
			}
		}
      
	}
 	function hapus_siswa($nis){
		$row = $this->Siswamodel->get_by_nis_siswa($nis);
		if ($row) {
			unlink('assets/upload/guru/'.$row->foto);
			$where = array('nis' => $nis);
			$this->db->delete('tbsiswa', $where);

			$this->session->set_flashdata('sukses', "Data Berhasil Dihapus");
			redirect(base_url('backend/siswa'));
		}else{
			$this->session->set_flashdata('error', "Data Tidak Ditemukan");
			redirect(base_url('backend/siswa'));
		}
	}


}

?>