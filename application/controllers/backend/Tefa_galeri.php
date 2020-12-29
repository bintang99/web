<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class Tefa_galeri extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		if( $this->session->userdata('status')!='login'){
			echo "<script>alert('Anda Belum Login !!');window.location='".base_url('')."backend/Login';</script>";
		}

		$this->load->model('Tefamodel');
		$this->load->library(array('FPDF','upload'));
		define('FPDF_FONTPATH', $this->config->item('fonts_path'));
		
	}

	function index(){

		$data['judul'] = 'Data Galeri Teacging Factori';
		$data['galeridata'] = $this->Tefamodel->get_tefa_galeri();
		$this->load->view('admin/layout/header');
		$this->load->view('admin/layout/header');
        $this->load->view('admin/layout/navbar');
		$this->load->view('admin/tefa_galeri',$data);
		$this->load->view('admin/layout/footer');
	}
	function edit_tefa_galeri($id){

		$data['judul'] = 'Edit galeri';
		$data['galeridata'] = $this->Tefamodel->get_by_id_tefa_galeri($id);
		$this->load->view('admin/layout/header');
        $this->load->view('admin/layout/navbar');
		$this->load->view('admin/edit_tefa_galeri',$data);
		$this->load->view('admin/layout/footer');
	}
	function addgaleri(){

		$config['upload_path'] 		= 'assets/upload/tefa_galeri/';
		$config['allowed_types'] 	= 'gif|jpg|png|jpeg|bmp';
		$config['max_size'] 		= '2048';
		$config['max_width'] 		= '1288';
		$config['max_height'] 		= '768';
		$config['file_name'] 		= rand(0,999999);

			$this->upload->initialize($config);
				if ( ! $this->upload->do_upload('gambar')) {
					$this->session->set_flashdata('error',$this->upload->display_errors());
					redirect(base_url('backend/galery'));
				}else{
					$gbr = $this->upload->data();
					$gambar = $gbr['file_name'];
					$data = $this->Tefamodel->fill_data_tefa_galeri($gambar);
					if ($this->Tefamodel->insert_tefa_galeri($data)) {
						$this->session->set_flashdata('sukses',"Data Berhasil Disimpan");
						redirect(base_url('backend/tefa_galeri'));
					}
				}
	}
	function updategaleri(){

		$id = $this->input->post('id');
		$gambar_lama = $this->input->post('gambarlama');

		if ($_FILES AND $_FILES['gambar']['name']) {
			$config['upload_path'] 		= 'assets/upload/tefa_galeri/';
			$config['allowed_types'] 	= 'gif|jpg|png|jpeg|bmp';
			$config['max_size'] 		= '2048';
			$config['max_width'] 		= '1288';
			$config['max_height'] 		= '768';
			$config['file_name'] 		= rand(0,999999);

				$this->upload->initialize($config);
					if ( ! $this->upload->do_upload('gambar')) {
						$this->session->set_flashdata('error',$this->upload->display_errors());
						redirect(base_url('Admin/dtgaleri'));
					}else{
						unlink('assets/upload/tefa_galeri/'.$gambar_lama);
						$gbr = $this->upload->data();
						$foto = $gbr['file_name'];
						$data = $this->Tefamodel->fill_data_tefa_galeri($foto);
						if ($this->Tefamodel->update_tefa_galeri($id, $data)) {
							$this->session->set_flashdata('sukses',"Data Berhasil Diedit");
							redirect(base_url('backend/tefa_galeri'));
						}
					}
		}else{
			$id = $this->input->post('id');
			$data = $this->Tefamodel->fill_data_tefa_galeri1();
			if ($this->Tefamodel->update_tefa_galeri($id, $data)) {
				$this->session->set_flashdata('sukses', "Data Berhasil Diedit");
				redirect(base_url('backend/tefa_galeri'));
			}
		}
	}
	function hapusgaleri($id){
		$row = $this->Tefamodel->get_by_id_tefa_galeri($id);
		if ($row) {
			foreach ($row as $key) {
				unlink('assets/upload/tefa_galeri/'.$key->foto);
			}
			$this->Tefamodel->delete_tefa_galeri($id);
			$this->session->set_flashdata('sukses', "Data Berhasil Dihapus");
			redirect(base_url('backend/tefa_galeri'));
		}else{
			$this->session->set_flashdata('error', "Data Tidak Ditemukan");
			redirect(base_url('backend/tefa_galeri'));
		}
	}
}

?>