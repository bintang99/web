<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class Tefa_kegiatan extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		if( $this->session->userdata('status')!='login'){
			echo "<script>alert('Anda Belum Login !!');window.location='".base_url('')."backend/Login';</script>";
		}
		$this->load->helper('slug');
		$this->load->model('Tefamodel');
		$this->load->library(array('FPDF','upload'));
		define('FPDF_FONTPATH', $this->config->item('fonts_path'));
		
	}

	function index(){

		$data['judul'] = 'Data Tefa_kegiatan';
		$data['tefadata'] = $this->Tefamodel->get_tefa_kegiatan();
		$this->load->view('admin/layout/header');
        $this->load->view('admin/layout/navbar');
		$this->load->view('admin/tefa_kegiatan',$data);
		$this->load->view('admin/layout/footer');
	}
	function tambah_tefa_kegiatan(){

		$data['judul'] = 'Tambah tefa_kegiatan';
		$this->load->view('admin/layout/header');
        $this->load->view('admin/layout/navbar');
		$this->load->view('admin/tambah_tefa_kegiatan',$data);
		$this->load->view('admin/layout/footer');
	}
	function edit_tefa_kegiatan($id =""){
		if($id == ""){
			redirect(base_url('backend/tefa_kegiatan'));
		}else{

		$data['judul'] = 'Edit tefa_kegiatan';
		$data['tefadata'] = $this->Tefamodel->get_by_id_tefa_kegiatan($id);
		$this->load->view('admin/layout/header');
        $this->load->view('admin/layout/navbar');
		$this->load->view('admin/edit_tefa_kegiatan',$data);
		$this->load->view('admin/layout/footer');
	 }
	}
	function add_tefa_kegiatan(){

		$config['upload_path'] 		= 'assets/upload/tefa_kegiatan/';
		$config['allowed_types'] 	= 'gif|jpg|png|jpeg|bmp';
		$config['max_size'] 		= '2048';
		$config['max_width'] 		= '1288';
		$config['max_height'] 		= '768';
		$config['file_name'] 		= rand(0,999999)."-".$this->input->post('judul');

			$this->upload->initialize($config);
				if ( ! $this->upload->do_upload('foto')) {
					$this->session->set_flashdata('error',$this->upload->display_errors());
					redirect(base_url('backend/tefa_kegiatan'));
				}else{
					$gbr = $this->upload->data();
					$foto = $gbr['file_name'];
					$seo = rand(0,999999)."-".$this->input->post('judul');
					$slug = slug($seo);
					$data = $this->Tefamodel->fill_data_tefa_kegiatan($foto, $slug);
					if ($this->Tefamodel->insert_tefa_kegiatan($data)) {
						$this->session->set_flashdata('sukses',"Data Berhasil Disimpan");
						redirect(base_url('backend/tefa_kegiatan'));
					}
				}
	}
	function update_tefa_kegiatan(){

		$id = $this->input->post('id_tefa_kegiatan');
		$foto_lama = $this->input->post('fotolama');

		if ($_FILES AND $_FILES['foto']['name']) {
			$config['upload_path'] 		= 'assets/upload/tefa_kegiatan/';
			$config['allowed_types'] 	= 'gif|jpg|png|jpeg|bmp';
			$config['max_size'] 		= '2048';
			$config['max_width'] 		= '1288';
			$config['max_height'] 		= '768';
			$config['file_name'] 		= rand(0,999999)."-".$this->input->post('judul');

				$this->upload->initialize($config);
					if ( ! $this->upload->do_upload('foto')) {
						$this->session->set_flashdata('error',$this->upload->display_errors());
						redirect(base_url('backend/tefa_kegiatan'));
					}else{
						unlink('assets/upload/tefa_kegiatan/'.$foto_lama);
						$gbr = $this->upload->data();
						$foto = $gbr['file_name'];
						$seo = rand(0,999999)."-".$this->input->post('judul');
						$slug = slug($seo);
						$data = $this->Tefamodel->fill_data_tefa_kegiatan($foto, $slug);
						if ($this->Tefamodel->update_tefa_kegiatan($id, $data)) {
							$this->session->set_flashdata('sukses',"Data Berhasil Diedit");
							redirect(base_url('backend/tefa_kegiatan'));
						}
					}
		}else{
			$id = $this->input->post('id_tefa_kegiatan');
			$seo = rand(0,999999)."-".$this->input->post('judul');
			$slug = slug($seo);
			$data = $this->Tefamodel->fill_data_tefa_kegiatan1($slug);
			if ($this->Tefamodel->update_tefa_kegiatan($id, $data)) {
				$this->session->set_flashdata('sukses', "Data Berhasil Diedit");
				redirect(base_url('backend/tefa_kegiatan'));
			}
		}
	}
	function hapus_tefa_kegiatan($id){
		$row = $this->Tefamodel->get_by_id_tefa_kegiatan($id);
		if ($row) {
			foreach ($row as $key) {
				unlink('assets/upload/tefa_kegiatan/'.$key->foto);
			}
			$this->Tefamodel->delete_tefa_kegiatan($id);
			$this->session->set_flashdata('sukses', "Data Berhasil Dihapus");
			redirect(base_url('backend/tefa_kegiatan'));
		}else{
			$this->session->set_flashdata('error', "Data Tidak Ditemukan");
			redirect(base_url('backend/tefa_kegiatan'));
		}
	}
}

?>