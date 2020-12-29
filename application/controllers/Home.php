<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model(array('Setingmodel','Gurumodel','Siswamodel','Beritamodel','Galerimodel','Slidemodel','Prestasimodel','Jurusanmodel','Profilmodel','Videomodel', 'Streammodel'));
		$this->load->library(array('FPDF','upload'));
		define('FPDF_FONTPATH', $this->config->item('fonts_path'));
		
	}

	public function index()
	{

		$home['slide'] = $this->Slidemodel->get_slide();
		$home['jmljurusan'] = $this->Jurusanmodel->get_jml_jurusan();
		$home['jmlguru'] = $this->Gurumodel->get_jml_guru();
		$home['jmlprestasi'] = $this->Prestasimodel->get_jml_prestasi();
		$home['jmlgaleri'] = $this->Galerimodel->get_jml_galeri();
		$home['berita'] = $this->Beritamodel->get_berita_terbaru();
		$home['guru'] = $this->Gurumodel->get_guru();
		$home['galeri'] = $this->Galerimodel->get_galeri_8();
		$home['jurusan'] = $this->Jurusanmodel->get_jurusan();
		$home['profil'] = $this->Profilmodel->get_profil();
		$home['profil1'] = $this->Profilmodel->get_profil_1();
		$home['video'] = $this->Videomodel->get_video_4();
		$home['video1'] = $this->Videomodel->get_video_1();
		$home['tefa'] = $this->Tefamodel->get_tefa();
		$home['streaming'] = $this->Streammodel->ambil_streaming();
		$home['set'] = $this->Setingmodel->get_sekolah();
		
		$this->load->view('web/layout/header',$home);
		$this->load->view('web/layout/banner1',$home);
		$this->load->view('web/layout/navbar', $home);
		$this->load->view('web/home');
		$this->load->view('web/layout/footer',$home);
	}
}
