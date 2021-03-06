<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Detail extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model(array('Galerimodel','Profilmodel','Jurusanmodel','Beritamodel','Setingmodel'));
		$this->load->library('pagination');
	}

	function baca($slug = ""){
		if($slug == ""){
			show_404();
		}else{
			$this->load->model('M_Blog');
			$baca = $this->M_Blog->get_slug($slug);
			$data['baca'] = $baca;
			$data['tefa'] = $this->Tefamodel->get_tefa();
			$data['set'] = $this->Setingmodel->get_sekolah();
			$this->load->view('web/layout/header',$data);
		    $this->load->view('web/layout/banner2');
		    $data['jurusan'] = $this->Jurusanmodel->get_jurusan();
	    	$data['profil'] = $this->Profilmodel->get_profil();
	    	$data['bterbaru'] = $this->Beritamodel->get_berita_terbaru();
	    	$data['kategori'] = $this->Beritamodel->get_kategori_brt();
			$home['tefa'] = $this->Tefamodel->get_tefa();
		    $this->load->view('web/layout/navbar',$data);
		    $this->load->view('web/single', $data);
		    $this->load->view('web/layout/footer',$data);
		}
	}
 function kategori(){
 	 if($this->uri->segment(3) == ""){
 	 	show_404();
 	 }else{

		//konfigurasi pagination
        $config['base_url'] = site_url('detail/kategori/'.$this->uri->segment(3)); //site url
         //total row
        $config['total_rows'] =  $this->db->count_all();
        $config['per_page'] = 3;  //show record per halaman
        $config["uri_segment"] = 4;  // uri parameter
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
       $data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;

       $data['data'] = $this->Beritamodel->berita($config['per_page'], $data['page']);
	   $data['pagination'] = $this->pagination->create_links();
			$data['set'] = $this->Setingmodel->get_sekolah();
   
			$this->load->view('web/layout/header',$data);
		    $this->load->view('web/layout/banner2');
		    $data['jurusan'] = $this->Jurusanmodel->get_jurusan();
	    	$data['profil'] = $this->Profilmodel->get_profil();
	    	$data['random'] = $this->Beritamodel->get_berita_random();
	    	$data['bterbaru'] = $this->Beritamodel->get_berita_terbaru();
			$data['tefa'] = $this->Tefamodel->get_tefa();
	    	$data['katagori1'] = $this->Beritamodel->get_by_uri($this->uri->segment(3));
	    	$data['kategori'] = $this->Beritamodel->get_kategori_brt();
	    	$data['kat'] = $this->Beritamodel->get_berita_by_kat($this->uri->segment(3)) or die(show_404());
		    $this->load->view('web/layout/navbar',$data);
		    $this->load->view('web/kategori', $data);
		    $this->load->view('web/layout/footer',$data);
 	 }
 }
}
