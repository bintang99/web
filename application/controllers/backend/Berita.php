<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class Berita extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		if( $this->session->userdata('status')!='login'){
			echo "<script>alert('Anda Belum Login !!');window.location='".base_url('')."backend/Login';</script>";
		}
		$this->load->helper('slug');
		$this->load->model('Beritamodel');
		$this->load->library(array('FPDF','upload'));
		define('FPDF_FONTPATH', $this->config->item('fonts_path'));
		
	}

		function index(){

		$data['judul'] = 'Data Berita';
		$data['beritadata'] = $this->Beritamodel->get_berita_terbaru();
		$data['kategori'] = $this->Beritamodel->get_ktg_berita();
		$this->load->view('admin/layout/header');
        $this->load->view('admin/layout/navbar');
		$this->load->view('admin/berita',$data);
		$this->load->view('admin/layout/footer');
	}
		function tambah_berita(){

		$data['judul'] = 'Tambah Berita';
		$data['idberita'] = $this->Beritamodel->id_berita();
		$data['kategori'] = $this->Beritamodel->get_ktg_berita();
		$this->load->view('admin/layout/header');
        $this->load->view('admin/layout/navbar');
		$this->load->view('admin/tambah_berita',$data);
		$this->load->view('admin/layout/footer');
	}
	function edit_berita($id =""){
		if($id == ""){
			redirect(base_url('backend/berita'));
		}else{

		$data['judul'] = 'Edit Berita';
		$data['beritadata'] = $this->Beritamodel->get_by_id_berita($id);
		$data['kategori'] = $this->Beritamodel->get_ktg_berita();
		$this->load->view('admin/layout/header');
        $this->load->view('admin/layout/navbar');
		$this->load->view('admin/edit_berita',$data);
		$this->load->view('admin/layout/footer');
	 }
	}
	function add_berita(){

		$config['upload_path'] 		= 'assets/upload/berita/';
		$config['allowed_types'] 	= 'gif|jpg|png|jpeg|bmp';
		$config['max_size'] 		= '2048';
		$config['max_width'] 		= '1288';
		$config['max_height'] 		= '768';
		$config['file_name'] 		= $this->input->post('id_berita');

			$this->upload->initialize($config);
				if ( ! $this->upload->do_upload('gambar')) {
					$this->session->set_flashdata('error',$this->upload->display_errors());
					redirect(base_url('backend/berita'));
				}else{
					$gbr = $this->upload->data();
					$gambar = $gbr['file_name'];
					$seo = rand(0,999999)."-".$this->input->post('judul');
					$slug = slug($seo);
					$data = $this->Beritamodel->fill_data_berita($gambar, $slug);
					if ($this->Beritamodel->insert_berita($data)) {
						$this->session->set_flashdata('sukses',"Data Berhasil Disimpan");
						redirect(base_url('backend/berita'));
					}
				}
	}
	function update_berita(){

		$id = $this->input->post('id_berita');
		$gambar_lama = $this->input->post('gambarlama');

		if ($_FILES AND $_FILES['gambar']['name']) {
			$config['upload_path'] 		= 'assets/upload/berita/';
			$config['allowed_types'] 	= 'gif|jpg|png|jpeg|bmp';
			$config['max_size'] 		= '2048';
			$config['max_width'] 		= '1288';
			$config['max_height'] 		= '768';
			$config['file_name'] 		= $this->input->post('id_berita');

				$this->upload->initialize($config);
					if ( ! $this->upload->do_upload('gambar')) {
						$this->session->set_flashdata('error',$this->upload->display_errors());
						redirect(base_url('backend/berita'));
					}else{
						unlink('assets/upload/berita/'.$gambar_lama);
						$gbr = $this->upload->data();
						$foto = $gbr['file_name'];
						$seo = rand(0,999999)."-".$this->input->post('judul');
						$slug = slug($seo);
						$data = $this->Beritamodel->fill_data_berita($foto, $slug);
						if ($this->Beritamodel->update_berita($id, $data)) {
							$this->session->set_flashdata('sukses',"Data Berhasil Diedit");
							redirect(base_url('backend/berita'));
						}
					}
		}else{
			$id = $this->input->post('id_berita');
			$seo = rand(0,999999)."-".$this->input->post('judul');
			$slug = slug($seo);
			$data = $this->Beritamodel->fill_data_berita1();
			if ($this->Beritamodel->update_berita($id, $data)) {
				$this->session->set_flashdata('sukses', "Data Berhasil Diedit");
				redirect(base_url('backend/berita'));
			}
		}
	}
	function hapus_berita($id){
		$row = $this->Beritamodel->get_by_id_berita($id);
		if ($row) {
			foreach ($row as $key) {
				unlink('assets/upload/berita/'.$key->gambar);
			}
			$this->Beritamodel->delete_berita($id);
			$this->session->set_flashdata('sukses', "Data Berhasil Dihapus");
			redirect(base_url('backend/berita'));
		}else{
			$this->session->set_flashdata('error', "Data Tidak Ditemukan");
			redirect(base_url('backend/berita'));
		}
	}
	//kategori berita 
	function dt_ktg_berita(){

		$data['judul'] = 'Data Kategori Berita';
		$data['ktgdata'] = $this->Beritamodel->get_ktg_berita();
		$this->load->view('admin/layout/header');
        $this->load->view('admin/layout/navbar');
		$this->load->view('admin/ktg_berita',$data);
		$this->load->view('admin/layout/footer');
	}
	function add_ktg_berita(){
        $seo = rand(0,9999)."-".$this->input->post('kategori');
        $slug = slug($seo);
		$data = $this->Beritamodel->fill_data_ktg_berita($slug);
		if ($this->Beritamodel->insert_ktg_berita($data)) {
			$this->session->set_flashdata('sukses',"Data Berhasil Disimpan");
			redirect(base_url('backend/berita/dt_ktg_berita'));
		}
	}
	function edit_ktg_berita(){
        $seo = rand(0,9999)."-".$this->input->post('kategori');
        $slug = slug($seo);
		$id = $this->input->post('id_ktg_berita');
		$data = $this->Beritamodel->fill_data_ktg_berita($slug);
		if ($this->Beritamodel->update_ktg_berita($id, $data)) {
			$this->session->set_flashdata('sukses', "Data Berhasil Diedit");
			redirect(base_url('backend/berita/dt_ktg_berita'));
		}
	}
	function hapus_ktg_berita($id){
		$row = $this->Beritamodel->get_by_id_ktg_berita($id);

		if ($row) {
			$this->Beritamodel->delete_ktg_berita($id);
			$this->session->set_flashdata('sukses', "Data Berhasil Dihapus");
			redirect(base_url('backend/berita/dt_ktg_berita'));
		}else{
			$this->session->set_flashdata('error', "Data Tidak Ditemukan");
			redirect(base_url('backend/berita/dt_ktg_berita '));
		}
	}



}

?>