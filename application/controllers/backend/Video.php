
<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class Video extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		if( $this->session->userdata('status')!='login'){
			echo "<script>alert('Anda Belum Login !!');window.location='".base_url('')."backend/Login';</script>";
		}
		$this->load->helper('slug');
		$this->load->model('Videomodel');
		$this->load->library(array('FPDF','upload'));
		define('FPDF_FONTPATH', $this->config->item('fonts_path'));
		
	}
//video
	function index(){

		$data['judul'] = 'Data video';
		$data['videodata'] = $this->Videomodel->get_video();
		$this->load->view('admin/layout/header');
        $this->load->view('admin/layout/navbar');
		$this->load->view('admin/video',$data);
		$this->load->view('admin/layout/footer');
	}

	function addvideo(){
		$data = $this->Videomodel->fill_data_video();
		if ($this->Videomodel->insert_video($data)) {
			$this->session->set_flashdata('sukses',"Data Berhasil Disimpan");
			redirect(base_url('backend/Video'));
		}
	}

	function updatevideo(){

		$id = $this->input->post('id_video');
		$data = $this->Videomodel->fill_data_video();
		if ($this->Videomodel->update_video($id, $data)) {
			$this->session->set_flashdata('sukses', "Data Berhasil Diedit");
			redirect(base_url('backend/Video'));
		}
	}
	function hapusvideo($id){
		$row = $this->Videomodel->get_by_id_video($id);
		if ($row) {
			unlink('assets/upload/video/'.$row->gambar);
			$this->Videomodel->delete_video($id);
			$this->session->set_flashdata('sukses', "Data Berhasil Dihapus");
			redirect(base_url('backend/Video'));
		}else{
			$this->session->set_flashdata('error', "Data Tidak Ditemukan");
			redirect(base_url('backend/Video'));
		}
	}
}