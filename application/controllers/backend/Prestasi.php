<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class Prestasi extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		if( $this->session->userdata('status')!='login'){
			echo "<script>alert('Anda Belum Login !!');window.location='".base_url('')."backend/Login';</script>";
		}

		$this->load->model('Prestasimodel');
		$this->load->library(array('FPDF','upload'));
		define('FPDF_FONTPATH', $this->config->item('fonts_path'));
		
	}

	function index(){

		$data['judul'] = 'Data prestasi';
		$data['prestasidata'] = $this->Prestasimodel->get_prestasi();
		$this->load->view('admin/layout/header');
		$this->load->view('admin/layout/header');
        $this->load->view('admin/layout/navbar');
		$this->load->view('admin/prestasi',$data);
		$this->load->view('admin/layout/footer');
	}
	function edit_prestasi($id){

		$data['judul'] = 'Edit prestasi';
		$data['prestasidata'] = $this->Prestasimodel->get_by_id_prestasi($id);
		$this->load->view('admin/layout/header');
        $this->load->view('admin/layout/navbar');
		$this->load->view('admin/edit_prestasi',$data);
		$this->load->view('admin/layout/footer');
	}
		function addprestasi(){

		$config['upload_path'] 		= 'assets/upload/prestasi/';
		$config['allowed_types'] 	= 'gif|jpg|png|jpeg|bmp';
		$config['max_size'] 		= '2048';
		$config['max_width'] 		= '1288';
		$config['max_height'] 		= '1288';
		$config['file_name'] 		= $this->input->post('id_prestasi');

			$this->upload->initialize($config);
				if ( ! $this->upload->do_upload('gambar')) {
					$this->session->set_flashdata('error',$this->upload->display_errors());
					redirect(base_url('backend/prestasi'));
				}else{
					$gbr = $this->upload->data();
					$gambar = $gbr['file_name'];
					$data = $this->Prestasimodel->fill_data_prestasi($gambar);
					if ($this->Prestasimodel->insert_prestasi($data)) {
						$this->session->set_flashdata('sukses',"Data Berhasil Disimpan");
						redirect(base_url('backend/prestasi'));
					}
				}
	}
		function updateprestasi(){

		$id = $this->input->post('id_prestasi');
		$gambar_lama = $this->input->post('gambarlama');

		if ($_FILES AND $_FILES['gambar']['name']) {
			$config['upload_path'] 		= 'assets/upload/prestasi/';
			$config['allowed_types'] 	= 'gif|jpg|png|jpeg|bmp';
			$config['max_size'] 		= '2048';
			$config['max_width'] 		= '1288';
			$config['max_height'] 		= '768';
			$config['file_name'] 		= $id;

				$this->upload->initialize($config);
					if ( ! $this->upload->do_upload('gambar')) {
						$this->session->set_flashdata('error',$this->upload->display_errors());
						redirect(base_url('Admin/dtprestasi'));
					}else{
						unlink('assets/upload/prestasi/'.$gambar_lama);
						$gbr = $this->upload->data();
						$foto = $gbr['file_name'];
						$data = $this->Prestasimodel->fill_data_prestasi($foto);
						if ($this->Prestasimodel->update_prestasi($id, $data)) {
							$this->session->set_flashdata('sukses',"Data Berhasil Diedit");
							redirect(base_url('backend/prestasi'));
						}
					}
		}else{
			$id = $this->input->post('id_prestasi');
			$data = $this->Prestasimodel->fill_data_prestasi1();
			if ($this->Prestasimodel->update_prestasi($id, $data)) {
				$this->session->set_flashdata('sukses', "Data Berhasil Diedit");
				redirect(base_url('backend/prestasi'));
			}
		}
	}
		function hapusprestasi($id){
		$row = $this->Prestasimodel->get_by_id_prestasi($id);
		if ($row) {
			unlink('assets/upload/prestasi/'.$row->gambar);
			$this->Prestasimodel->delete_prestasi($id);
			$this->session->set_flashdata('sukses', "Data Berhasil Dihapus");
			redirect(base_url('backend/prestasi'));
		}else{
			$this->session->set_flashdata('error', "Data Tidak Ditemukan");
			redirect(base_url('backend/prestasi'));
		}
	}

}

?>