<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class Galery extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		if( $this->session->userdata('status')!='login'){
			echo "<script>alert('Anda Belum Login !!');window.location='".base_url('')."backend/Login';</script>";
		}

		$this->load->model('Galerimodel');
		$this->load->library(array('FPDF','upload'));
		define('FPDF_FONTPATH', $this->config->item('fonts_path'));
		
	}

	function index(){

		$data['judul'] = 'Data Galeri';
		$data['galeridata'] = $this->Galerimodel->get_galeri();
		$data['kategori'] = $this->Galerimodel->get_ktg_galeri();
		$data['idgaleri'] = $this->Galerimodel->id_galeri();
		$this->load->view('admin/layout/header');
		$this->load->view('admin/layout/header');
        $this->load->view('admin/layout/navbar');
		$this->load->view('admin/galeri',$data);
		$this->load->view('admin/layout/footer');
	}
	function edit_galeri($id){

		$data['judul'] = 'Edit galeri';
		$data['galeridata'] = $this->Galerimodel->get_by_id_galeri($id);
		$data['kategori'] = $this->Galerimodel->get_ktg_galeri();
		$this->load->view('admin/layout/header');
        $this->load->view('admin/layout/navbar');
		$this->load->view('admin/edit_galeri',$data);
		$this->load->view('admin/layout/footer');
	}
		function addgaleri(){

		$config['upload_path'] 		= 'assets/upload/galeri/';
		$config['allowed_types'] 	= 'gif|jpg|png|jpeg|bmp';
		$config['max_size'] 		= '2048';
		$config['max_width'] 		= '1288';
		$config['max_height'] 		= '768';
		$config['file_name'] 		= $this->input->post('id_galeri');

			$this->upload->initialize($config);
				if ( ! $this->upload->do_upload('gambar')) {
					$this->session->set_flashdata('error',$this->upload->display_errors());
					redirect(base_url('backend/galery'));
				}else{
					$gbr = $this->upload->data();
					$gambar = $gbr['file_name'];
					$data = $this->Galerimodel->fill_data_galeri($gambar);
					if ($this->Galerimodel->insert_galeri($data)) {
						$this->session->set_flashdata('sukses',"Data Berhasil Disimpan");
						redirect(base_url('backend/galery'));
					}
				}
	}
		function updategaleri(){

		$id = $this->input->post('id_galeri');
		$gambar_lama = $this->input->post('gambarlama');

		if ($_FILES AND $_FILES['gambar']['name']) {
			$config['upload_path'] 		= 'assets/upload/galeri/';
			$config['allowed_types'] 	= 'gif|jpg|png|jpeg|bmp';
			$config['max_size'] 		= '2048';
			$config['max_width'] 		= '1288';
			$config['max_height'] 		= '768';
			$config['file_name'] 		= $this->input->post('id_galeri');

				$this->upload->initialize($config);
					if ( ! $this->upload->do_upload('gambar')) {
						$this->session->set_flashdata('error',$this->upload->display_errors());
						redirect(base_url('Admin/dtgaleri'));
					}else{
						unlink('assets/upload/galeri/'.$gambar_lama);
						$gbr = $this->upload->data();
						$foto = $gbr['file_name'];
						$data = $this->Galerimodel->fill_data_galeri($gambar);
						if ($this->Galerimodel->update_galeri($id, $data)) {
							$this->session->set_flashdata('sukses',"Data Berhasil Diedit");
							redirect(base_url('backend/galery'));
						}
					}
		}else{
			$id = $this->input->post('id_galeri');
			$slug = slug(md5($this->input->post('id_galeri')));
			$data = $this->Galerimodel->fill_data_galeri1($slug);
			if ($this->Galerimodel->update_galeri($id, $data)) {
				$this->session->set_flashdata('sukses', "Data Berhasil Diedit");
				redirect(base_url('backend/galery'));
			}
		}
	}
		function hapusgaleri($id){
		$row = $this->Galerimodel->get_by_id_galeri($id);
		if ($row) {
			unlink('assets/upload/galeri/'.$row->gambar);
			$this->Galerimodel->delete_galeri($id);
			$this->session->set_flashdata('sukses', "Data Berhasil Dihapus");
			redirect(base_url('backend/galery'));
		}else{
			$this->session->set_flashdata('error', "Data Tidak Ditemukan");
			redirect(base_url('backend/galery'));
		}
	}
	//kategori galery 
	function dt_ktg_galeri(){

		$data['judul'] = 'Data Kategori Galeri';
		$data['ktgdata'] = $this->Galerimodel->get_ktg_galeri();
		$this->load->view('admin/layout/header');
        $this->load->view('admin/layout/navbar');
		$this->load->view('admin/ktg_galeri',$data);
		$this->load->view('admin/layout/footer');
	}
	function add_ktg_galeri(){

		$data = $this->Galerimodel->fill_data_ktg_galeri();
		if ($this->Galerimodel->insert_ktg_galeri($data)) {
			$this->session->set_flashdata('sukses',"Data Berhasil Disimpan");
			redirect(base_url('backend/galery/dt_ktg_galeri'));
		}
	}
	function edit_ktg_galeri(){

		$id = $this->input->post('id_ktg_galeri');
		$data = $this->Galerimodel->fill_data_ktg_galeri();
		if ($this->Galerimodel->update_ktg_galeri($id, $data)) {
			$this->session->set_flashdata('sukses', "Data Berhasil Diedit");
			redirect(base_url('backend/galery/dt_ktg_galeri'));
		}
	}
	function hapus_ktg_galeri($id){
		$row = $this->Galerimodel->get_by_id_ktg_galeri($id);

		if ($row) {
			$this->Galerimodel->delete_ktg_galeri($id);
			$this->session->set_flashdata('sukses', "Data Berhasil Dihapus");
			redirect(base_url('backend/galery/dt_ktg_galeri'));
		}else{
			$this->session->set_flashdata('error', "Data Tidak Ditemukan");
			redirect(base_url('backend/galery/dt_ktg_galeri'));
		}
	}

}

?>