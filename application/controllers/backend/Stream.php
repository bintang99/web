<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class Stream extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		if( $this->session->userdata('status')!='login'){
			echo "<script>alert('Anda Belum Login !!');window.location='".base_url('')."backend/Login';</script>";
		}

		$this->load->model('Streammodel');
		$this->load->library(array('FPDF','upload'));
		define('FPDF_FONTPATH', $this->config->item('fonts_path'));
		
	}

		function index(){

		$data['judul'] = 'Data Slide';
		$data['streaming'] = $this->Streammodel->streaming();
		$this->load->view('admin/layout/header');
        $this->load->view('admin/layout/navbar');
		$this->load->view('admin/streaming',$data);
		$this->load->view('admin/layout/footer');
	}
	
    function updatestream(){
    	$data = array(
    		'judul' => $this->input->post('judul'),
    		'link' => $this->input->post('link')
    	);
    	$update = $this->Streammodel->update_stream($data);
    	 if($update){
    	 	$this->session->set_flashdata('sukses',"Data Berhasil Diupdate");
			redirect(base_url('backend/stream'), 'refresh');
    	 }else{
    	 	$this->session->set_flashdata('sukses',"Data gagal Diupdate");
             redirect(base_url('backend/stream'), 'refresh');
    	 }
    }
}

?>