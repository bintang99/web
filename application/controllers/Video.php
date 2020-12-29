<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Video extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model(array('Setingmodel','Videomodel','Profilmodel','Jurusanmodel','Beritamodel', 'Streammodel'));
		$this->load->library('pagination');
	}

	function index(){
		$data = array();
		$data['seting']=$this->Setingmodel->get_sekolah();
		$data['jurusan'] = $this->Jurusanmodel->get_jurusan();
		$this->load->model('Galerimodel');
		$data['video'] = $this->Videomodel->get_video();
		$data['tefa'] = $this->Tefamodel->get_tefa();
		$this->load->view('web/layout/header',$data);
		$this->load->view('web/layout/banner2');
		$data['jurusan'] = $this->Jurusanmodel->get_jurusan();
		$data['profil'] = $this->Profilmodel->get_profil();
		$data['kategori'] = $this->Beritamodel->get_kategori_brt();
		$this->load->view('web/layout/navbar',$data);
		$this->load->view('web/video', $data);
		$this->load->view('web/layout/footer',$data);
	}
	function streaming(){
		$data = array();
		$data['jurusan'] = $this->Jurusanmodel->get_jurusan();
		$this->load->model('Galerimodel');
		$data['video'] = $this->Videomodel->get_video();
		$data['tefa'] = $this->Tefamodel->get_tefa();
		$data['seting']=$this->Setingmodel->get_sekolah();
		$this->load->view('web/layout/header',$data);
		$this->load->view('web/layout/banner2');
		$data['jurusan'] = $this->Jurusanmodel->get_jurusan();
		$data['profil'] = $this->Profilmodel->get_profil();
		$data['kategori'] = $this->Beritamodel->get_kategori_brt();
		$data['streaming'] = $this->Streammodel->streaming();
		$this->load->view('web/layout/navbar',$data);
		$this->load->view('web/streaming', $data);
		$this->load->view('web/layout/footer',$data);
	}

}
