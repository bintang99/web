<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tefa extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model(array('Setingmodel','Gurumodel','Siswamodel','Beritamodel','Galerimodel','Slidemodel','Pendaftaranmodel','Jurusanmodel','Profilmodel','Tefamodel'));
		$this->load->library(array('FPDF','upload'));
		define('FPDF_FONTPATH', $this->config->item('fonts_path'));
		$this->load->library('pagination');
		
	}

	public function detail($slug ="")
	{
		 if($slug != ""){
			 	$data['seting']=$this->Setingmodel->get_sekolah();
		 	    $this->load->view('web/layout/header',$data);
				$this->load->view('web/layout/banner2');
				$data['jurusan'] = $this->Jurusanmodel->get_jurusan();
		    	$data['profil'] = $this->Profilmodel->get_profil();
		    	$data['bterbaru'] = $this->Beritamodel->get_berita_terbaru();
		    	$data['kategori'] = $this->Beritamodel->get_kategori_brt();
		    	$data['tefa'] = $this->Tefamodel->get_tefa();
		    	$data['tefa_konten'] = $this->Tefamodel->get_by_slug_tefa($slug);
				$this->load->view('web/layout/navbar', $data);
				$this->load->view('web/tefa');
				$this->load->view('web/layout/footer',$data);
		 }else{
		 	show_404();
		 }
		
	}

	public function kegiatan()
	{
	//konfigurasi pagination
        $config['base_url'] = site_url('tefa/kegiatan'); //site url
        $config['total_rows'] = $this->db->count_all('tefa_kegiatan'); //total row
        $config['per_page'] = 3;  //show record per halaman
        $config["uri_segment"] = 3;  // uri parameter
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);
 
    // Membuat Style pagination 
      	$config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';

       $this->pagination->initialize($config);
       $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

       $data['data'] = $this->Tefamodel->tefa_kegiatan($config['per_page'], $data['page']);
       $data['pagination'] = $this->pagination->create_links();
		$data['seting']=$this->Setingmodel->get_sekolah();
		$this->load->view('web/layout/header',$data);
		$this->load->view('web/layout/banner2');
		$data['jurusan'] = $this->Jurusanmodel->get_jurusan();
    	$data['profil'] = $this->Profilmodel->get_profil();
    	$data['random'] = $this->Beritamodel->get_berita_terbaru();
    	$data['kategori'] = $this->Beritamodel->get_kategori_brt();
    	$data['tefa'] = $this->Tefamodel->get_tefa();
    	$data['tefa_kegitan'] = $this->Tefamodel->get_tefa_kegiatan();
		$this->load->view('web/layout/navbar', $data);
		$this->load->view('web/tefa_kegiatan');
		$this->load->view('web/layout/footer',$data);
	}

	public function baca($slug ="")
	{
		if($slug != ""){
			$data['seting']=$this->Setingmodel->get_sekolah();
			$this->load->view('web/layout/header',$data);
			$this->load->view('web/layout/banner2');
			$data['jurusan'] = $this->Jurusanmodel->get_jurusan();
	    	$data['profil'] = $this->Profilmodel->get_profil();
	    	$data['bterbaru'] = $this->Beritamodel->get_berita_terbaru();
	    	$data['kategori'] = $this->Beritamodel->get_kategori_brt();
	    	$data['tefa'] = $this->Tefamodel->get_tefa();
	    	$data['tefa_konten'] = $this->Tefamodel->get_by_slug_tefa_kegiatan($slug);
			$this->load->view('web/layout/navbar', $data);
			$this->load->view('web/tefa_kegiatan_baca');
			$this->load->view('web/layout/footer',$data);
		}else{
			show_404();
		}
		
	}


	public function gallery()
	{
	 	$data['jurusan'] = $this->Jurusanmodel->get_jurusan();
	 	$data['judul']   = "Galeri Teaching Factori";
	    $data['lihat'] = $this->Tefamodel->get_tefa_galeri();
	    $data['jurusan'] = $this->Jurusanmodel->get_jurusan();
    	$data['profil'] = $this->Profilmodel->get_profil();
    	$data['random'] = $this->Beritamodel->get_berita_terbaru();
    	$data['kategori'] = $this->Beritamodel->get_kategori_brt();
    	$data['tefa'] = $this->Tefamodel->get_tefa();
		$data['tefa_kegitan'] = $this->Tefamodel->get_tefa_kegiatan();
		$data['seting']=$this->Setingmodel->get_sekolah();
	    $this->load->view('web/layout/header',$data);
		$this->load->view('web/layout/banner2');
	    $data['profil'] = $this->Profilmodel->get_profil();
		$this->load->view('web/layout/navbar',$data);
		$this->load->view('web/tefa_galeri');
		$this->load->view('web/layout/footer',$data);
	}

}
