<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model(array('Galerimodel','Profilmodel','Jurusanmodel','Beritamodel','Setingmodel'));
		$this->load->library('pagination');
	}

	function index()
	{
		$data['jurusan'] = $this->Jurusanmodel->get_jurusan();
	   	//$this->load->model('Galerimodel');
		$data['galeri'] = $this->Galerimodel->get_galeri();
		$data['set'] = $this->Setingmodel->get_sekolah();
	    $this->load->view('web/layout/header',$data);
		$this->load->view('web/layout/banner2');
		//$data['jurusan'] = $this->Jurusanmodel->get_jurusan();
	    $data['profil'] = $this->Profilmodel->get_profil();
		$data['tefa'] = $this->Tefamodel->get_tefa();
	    //$data['kategori'] = $this->Beritamodel->get_kategori_brt();
		$this->load->view('web/layout/navbar',$data);
		$this->load->view('web/gallery', $data);
		$this->load->view('web/layout/footer',$data);
	}

	public function lihatgaleri()
	{
	 	$data['jurusan'] = $this->Jurusanmodel->get_jurusan();
	 	$data['judul']   = "Galeri ".$this->uri->segment(3);
		$data['tefa'] = $this->Tefamodel->get_tefa();
		$data['set'] = $this->Setingmodel->get_sekolah();
	   	//$this->load->model('Galerimodel');
	    $data['lihat'] = $this->Galerimodel->lihat_galeri($this->uri->segment(3));
	    $this->load->view('web/layout/header',$data);
		$this->load->view('web/layout/banner2');
		//$data['jurusan'] = $this->Jurusanmodel->get_jurusan();
	    $data['profil'] = $this->Profilmodel->get_profil();
	    //$data['kategori'] = $this->Beritamodel->get_kategori_brt();
		$this->load->view('web/layout/navbar',$data);
		$this->load->view('web/gallery2', $data);
		$this->load->view('web/layout/footer',$data);
	}

}
