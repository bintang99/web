<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kontak extends CI_Controller {

function __construct()
	{
		parent::__construct();
		$this->load->model(array('Galerimodel','Profilmodel','Jurusanmodel','Beritamodel','Setingmodel'));
		$this->load->library('pagination');
	}

 function index(){
	 $data['seting']= $this->Setingmodel->get_sekolah();
		$data['jurusan'] = $this->Jurusanmodel->get_jurusan();
 	   	$this->load->model('Galerimodel');
 	    $data['galeri'] = $this->Galerimodel->get_galeri();
		$data['tefa'] = $this->Tefamodel->get_tefa();
 	    $this->load->view('web/layout/header',$data);
		$this->load->view('web/layout/banner2');
		$data['jurusan'] = $this->Jurusanmodel->get_jurusan();
	    $data['profil'] = $this->Profilmodel->get_profil();
	    $data['kategori'] = $this->Beritamodel->get_kategori_brt();
		$this->load->view('web/layout/navbar',$data);
		$this->load->view('web/kontak', $data);
		$this->load->view('web/layout/footer',$data);
 }

}
