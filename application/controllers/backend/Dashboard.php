<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class Dashboard extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		if( $this->session->userdata('status')!='login'){
			echo "<script>alert('Anda Belum Login !!');window.location='".base_url('')."backend/Login';</script>";
		}

		$this->load->model(array('Gurumodel','Siswamodel','Beritamodel','Galerimodel','Slidemodel','Pendaftaranmodel'));
		$this->load->library(array('FPDF','upload'));
		define('FPDF_FONTPATH', $this->config->item('fonts_path'));
		
	}

		function index(){

		$this->load->view('admin/layout/header');
        $this->load->view('admin/layout/navbar');
        $data['siswa'] = $this->Siswamodel->get_jml_siswa();
        $data['guru'] = $this->Gurumodel->get_jml_guru();
        $data['berita'] = $this->Beritamodel->get_jml_Berita();
        $data['pendaftaran'] = $this->Pendaftaranmodel->get_jml_pendaftaran();
        $data['hackel'] = $this->db->get('tbhackel')->result();
        $this->load->view('admin/dashboard', $data);
        $this->load->view('admin/layout/footer');
	}
 function hapus($id){
 	$where = array('id' => $id);
 	$hapus = $this->db->delete('tbhackel', $where);
 	  if($hapus){
 	  	$this->session->set_flashdata('sukses', "Data Berhasil Dihapus");
			redirect(base_url('backend/dashboard'));
 	  }else{
 	  	$this->session->set_flashdata('error', "Data gagal di hapus !");
			redirect(base_url('backend/dashboard'));
 	  }
 }

}

?>