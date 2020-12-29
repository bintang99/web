<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class Jurusan extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		if( $this->session->userdata('status')!='login'){
			echo "<script>alert('Anda Belum Login !!');window.location='".base_url('')."backend/Login';</script>";
		}
		$this->load->helper('slug');
		$this->load->model('Jurusanmodel');
		$this->load->library(array('FPDF','upload'));
		define('FPDF_FONTPATH', $this->config->item('fonts_path'));
		
	}

	function index(){

		$data['judul'] = 'Data jurusan';
		$data['jurusandata'] = $this->Jurusanmodel->get_jurusan();
		$this->load->view('admin/layout/header');
        $this->load->view('admin/layout/navbar');
		$this->load->view('admin/jurusan',$data);
		$this->load->view('admin/layout/footer');
	}
		
	function tambah_jurusan(){

		$data['judul'] = 'Tambah jurusan';
		$this->load->view('admin/layout/header');
        $this->load->view('admin/layout/navbar');
		$this->load->view('admin/tambah_jurusan',$data);
		$this->load->view('admin/layout/footer');
	}
	function edit_jurusan($id =""){
		if($id == ""){
			redirect(base_url('backend/jurusan'));
		}else{

		$data['judul'] = 'Edit jurusan';
		$data['jurusandata'] = $this->Jurusanmodel->get_by_id_jurusan($id);	
		$this->load->view('admin/layout/header');
        $this->load->view('admin/layout/navbar');
		$this->load->view('admin/edit_jurusan',$data);
		$this->load->view('admin/layout/footer');
	 }
	}
	function add_jurusan(){

		$config['upload_path'] 		= 'assets/upload/jurusan/';
		$config['allowed_types'] 	= 'gif|jpg|png|jpeg|bmp';
		$config['max_size'] 		= '2048';
		$config['max_width'] 		= '1288';
		$config['max_height'] 		= '768';
		$config['file_name'] 		= $this->input->post('nm_jurusan');

			$this->upload->initialize($config);
				if ( ! $this->upload->do_upload('gambar')) {
					$this->session->set_flashdata('error',$this->upload->display_errors());
					redirect(base_url('backend/jurusan'));
				}else{
					$gbr = $this->upload->data();
					$gambar = $gbr['file_name'];
					$seo = rand(0,999999)."-".$this->input->post('judul');
			        $slug = slug($seo);
					$data = $this->Jurusanmodel->fill_data_jurusan($gambar, $slug);
					if ($this->Jurusanmodel->insert_jurusan($data)) {
						$this->session->set_flashdata('sukses',"Data Berhasil Disimpan");
						redirect(base_url('backend/jurusan'));
					}
				}
	}

	function update_jurusan(){

		$id = $this->input->post('id_jurusan');
		$gambar_lama = $this->input->post('gambarlama');

		if ($_FILES AND $_FILES['gambar']['name']) {
			$config['upload_path'] 		= 'assets/upload/jurusan/';
			$config['allowed_types'] 	= 'gif|jpg|png|jpeg|bmp';
			$config['max_size'] 		= '2048';
			$config['max_width'] 		= '1288';
			$config['max_height'] 		= '768';
			$config['file_name'] 		= $this->input->post('id_jurusan');

				$this->upload->initialize($config);
					if ( ! $this->upload->do_upload('gambar')) {
						$this->session->set_flashdata('error',$this->upload->display_errors());
						redirect(base_url('backend/jurusan'));
					}else{
						unlink('assets/upload/jurusan/'.$gambar_lama);
						$gbr = $this->upload->data();
						$gambar = $gbr['file_name'];
						$seo = rand(0,999999)."-".$this->input->post('nm_jurusan');
			            $slug = slug($seo);
						$data = $this->Jurusanmodel->fill_data_jurusan($gambar, $slug);
						if ($this->Jurusanmodel->update_jurusan($id, $data)) {
							$this->session->set_flashdata('sukses',"Data Berhasil Diedit");
							redirect(base_url('backend/jurusan'));
						}
					}
		}else{
			$id = $this->input->post('id_jurusan');
			$seo = rand(0,999999)."-".$this->input->post('nm_jurusan');
			$slug = slug($seo);
			$data = $this->Jurusanmodel->fill_data_jurusan1($slug);
			if ($this->Jurusanmodel->update_jurusan($id, $data)) {
				$this->session->set_flashdata('sukses', "Data Berhasil Diedit");
				redirect(base_url('backend/jurusan'));
			}
		}
	}
	function hapus_jurusan($id){
		$row = $this->Jurusanmodel->get_by_id_jurusan($id);
		if ($row) {
			unlink('assets/upload/jurusan/'.$row->gambar);
			$this->Jurusanmodel->delete_jurusan($id);
			$this->session->set_flashdata('sukses', "Data Berhasil Dihapus");
			redirect(base_url('backend/jurusan'));
		}else{
			$this->session->set_flashdata('error', "Data Tidak Ditemukan");
			redirect(base_url('backend/jurusan'));
		}
	}
}

?>