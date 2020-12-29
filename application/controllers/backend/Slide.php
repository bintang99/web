<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class Slide extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		if( $this->session->userdata('status')!='login'){
			echo "<script>alert('Anda Belum Login !!');window.location='".base_url('')."backend/Login';</script>";
		}

		$this->load->model('Slidemodel');
		$this->load->library(array('FPDF','upload'));
		define('FPDF_FONTPATH', $this->config->item('fonts_path'));
		
	}

		function index(){

		$data['judul'] = 'Data Slide';
		$data['slidedata'] = $this->Slidemodel->get_slide();
		$this->load->view('admin/layout/header');
        $this->load->view('admin/layout/navbar');
		$this->load->view('admin/setup_slide',$data);
		$this->load->view('admin/layout/footer');
	}
		function addslide(){

		$config['upload_path'] 		= 'assets/upload/slide/';
		$config['allowed_types'] 	= 'gif|jpg|png|jpeg|bmp';
		$config['max_size'] 		= '2048';
		$config['max_width'] 		= '1288';
		$config['max_height'] 		= '768';
		$config['file_name'] 		= $this->input->post('judul');

			$this->upload->initialize($config);
				if ( ! $this->upload->do_upload('gambar')) {
					$this->session->set_flashdata('error',$this->upload->display_errors());
					redirect(base_url('backend/slide/dtslide'));
				}else{
					$gbr = $this->upload->data();
					$gambar = $gbr['file_name'];
					$data = $this->Slidemodel->fill_data_slide($gambar);
					if ($this->Slidemodel->insert_slide($data)) {
						$this->session->set_flashdata('sukses',"Data Berhasil Disimpan");
						redirect(base_url('backend/slide/'));
					}
				}
	}
		function updateslide(){

		$id = $this->input->post('id_slide');
		$foto_lama = $this->input->post('gambarlama');

		if ($_FILES AND $_FILES['gambar']['name']) {
			$config['upload_path'] 		= 'assets/upload/slide/';
			$config['allowed_types'] 	= 'gif|jpg|png|jpeg|bmp';
			$config['max_size'] 		= '2048';
			$config['max_width'] 		= '1288';
			$config['max_height'] 		= '768';
			$config['file_name'] 		= $id;

				$this->upload->initialize($config);
					if ( ! $this->upload->do_upload('gambar')) {
						$this->session->set_flashdata('error',$this->upload->display_errors());
						redirect(base_url('backend/slide/'));
					}else{
						unlink('assets/upload/slide/'.$foto_lama);
						$gbr = $this->upload->data();
						$gambar = $gbr['file_name'];
						$data = $this->Slidemodel->fill_data_slide($gambar);
						if ($this->Slidemodel->update_slide($id, $data)) {
							$this->session->set_flashdata('sukses',"Data Berhasil Diedit");
							redirect(base_url('backend/slide/'));
						}
					}
		}else{
			$id = $this->input->post('id_slide');
			$data = $this->Slidemodel->fill_data_slide1();
			if ($this->Slidemodel->update_slide($id, $data)) {
				$this->session->set_flashdata('sukses', "Data Berhasil Diedit");
				redirect(base_url('backend/slide/'));
			}
		}
	}
		function hapusslide($id){
		$row = $this->Slidemodel->get_by_id_slide($id);
		if ($row) {
			unlink('assets/upload/slide/'.$row->gambar);
			$this->Slidemodel->delete_slide($id);
			$this->session->set_flashdata('sukses', "Data Berhasil Dihapus");
			redirect(base_url('backend/slide/'));
		}else{
			$this->session->set_flashdata('error', "Data Tidak Ditemukan");
			redirect(base_url('backend/slide/'));
		}
	}


}

?>