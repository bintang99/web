<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class Tefa extends CI_Controller
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

		$data['judul'] = 'Data Tefa';
		$data['tefadata'] = $this->Tefamodel->get_tefa();
		$this->load->view('admin/layout/header');
        $this->load->view('admin/layout/navbar');
		$this->load->view('admin/tefa',$data);
		$this->load->view('admin/layout/footer');
	}
	function tambah_tefa(){

		$data['judul'] = 'Tambah tefa';
		$this->load->view('admin/layout/header');
        $this->load->view('admin/layout/navbar');
		$this->load->view('admin/tambah_tefa',$data);
		$this->load->view('admin/layout/footer');
	}
	function edit_tefa($id =""){
		if($id == ""){
			redirect(base_url('backend/tefa'));
		}else{

		$data['judul'] = 'Edit tefa';
		$data['tefadata'] = $this->Tefamodel->get_by_id_tefa($id);
		$this->load->view('admin/layout/header');
        $this->load->view('admin/layout/navbar');
		$this->load->view('admin/edit_tefa',$data);
		$this->load->view('admin/layout/footer');
	 }
	}
	function add_tefa(){

		$config['upload_path'] 		= 'assets/upload/tefa/';
		$config['allowed_types'] 	= 'gif|jpg|png|jpeg|bmp';
		$config['max_size'] 		= '2048';
		$config['max_width'] 		= '1288';
		$config['max_height'] 		= '768';
		$config['file_name'] 		= rand(0,999999)."-".$this->input->post('judul');

			$this->upload->initialize($config);
				if ( ! $this->upload->do_upload('foto')) {
					$this->session->set_flashdata('error',$this->upload->display_errors());
					redirect(base_url('backend/tefa'));
				}else{
					$gbr = $this->upload->data();
					$foto = $gbr['file_name'];
					$seo = rand(0,999999)."-".$this->input->post('judul');
					$slug = slug($seo);
					$data = $this->Tefamodel->fill_data_tefa($foto, $slug);
					if ($this->Tefamodel->insert_tefa($data)) {
						$this->session->set_flashdata('sukses',"Data Berhasil Disimpan");
						redirect(base_url('backend/tefa'));
					}
				}
	}
	function update_tefa(){

		$id = $this->input->post('id_tefa');
		$foto_lama = $this->input->post('fotolama');

		if ($_FILES AND $_FILES['foto']['name']) {
			$config['upload_path'] 		= 'assets/upload/tefa/';
			$config['allowed_types'] 	= 'gif|jpg|png|jpeg|bmp';
			$config['max_size'] 		= '2048';
			$config['max_width'] 		= '1288';
			$config['max_height'] 		= '768';
			$config['file_name'] 		= rand(0,999999)."-".$this->input->post('judul');

				$this->upload->initialize($config);
					if ( ! $this->upload->do_upload('foto')) {
						$this->session->set_flashdata('error',$this->upload->display_errors());
						redirect(base_url('backend/tefa'));
					}else{
						unlink('assets/upload/tefa/'.$foto_lama);
						$gbr = $this->upload->data();
						$foto = $gbr['file_name'];
						$seo = rand(0,999999)."-".$this->input->post('judul');
						$slug = slug($seo);
						$data = $this->Tefamodel->fill_data_tefa($foto, $slug);
						if ($this->Tefamodel->update_tefa($id, $data)) {
							$this->session->set_flashdata('sukses',"Data Berhasil Diedit");
							redirect(base_url('backend/tefa'));
						}
					}
		}else{
			$id = $this->input->post('id_tefa');
			$seo = rand(0,999999)."-".$this->input->post('judul');
			$slug = slug($seo);
			$data = $this->Tefamodel->fill_data_tefa1($slug);
			if ($this->Tefamodel->update_tefa($id, $data)) {
				$this->session->set_flashdata('sukses', "Data Berhasil Diedit");
				redirect(base_url('backend/tefa'));
			}
		}
	}
	function hapus_tefa($id){
		$row = $this->Tefamodel->get_by_id_tefa($id);
		if ($row) {
			foreach ($row as $key) {
				unlink('assets/upload/tefa/'.$key->foto);
			}
			$this->Tefamodel->delete_tefa($id);
			$this->session->set_flashdata('sukses', "Data Berhasil Dihapus");
			redirect(base_url('backend/tefa'));
		}else{
			$this->session->set_flashdata('error', "Data Tidak Ditemukan");
			redirect(base_url('backend/tefa'));
		}
	}
}

?>