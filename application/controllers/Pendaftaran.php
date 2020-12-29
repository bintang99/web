<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pendaftaran extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model(array('Setingmodel','Gurumodel','Siswamodel','Beritamodel','Galerimodel','Slidemodel','Pendaftaranmodel','Jurusanmodel','Profilmodel'));
		define('FPDF_FONTPATH', $this->config->item('fonts_path'));
		
	}

	public function index()
	{
		$home['seting'] = $this->Setingmodel->get_sekolah();
		$this->load->view('web/layout/header',$home);
		$home['slide'] = $this->Slidemodel->get_slide();
		$home['jmlsiswa'] = $this->Siswamodel->get_jml_siswa();
		$home['jmlguru'] = $this->Gurumodel->get_jml_guru();
		$home['jmlpendaftaran'] = $this->Pendaftaranmodel->get_jml_pendaftaran();
		$home['jmlgaleri'] = $this->Galerimodel->get_jml_galeri();
		$home['berita'] = $this->Beritamodel->get_berita_terbaru();
		$home['guru'] = $this->Gurumodel->get_guru();
		$home['galeri'] = $this->Galerimodel->get_galeri();
		$data['jurusan'] = $this->Jurusanmodel->get_jurusan();
	    $data['profil'] = $this->Profilmodel->get_profil();
	    $nomor['data']  = $this->Pendaftaranmodel->auto_inc();
	    $nomor['captcha'] = $this->recaptcha->getWidget();
		$home['tefa'] = $this->Tefamodel->get_tefa();
	    $nomor['script_captcha'] = $this->recaptcha->getScriptTag();
		$this->load->view('web/layout/banner2',$home);
		$this->load->view('web/layout/navbar', $data);
		$this->load->view('web/pendaftaran', $nomor,$data);
		$this->load->view('web/layout/footer',$home);

	
	}
	public function registrasi()
	{
		$this->form_validation->set_rules('noreg', 'Masukan No registrasi dengan Benar !', 'required');
		$this->form_validation->set_rules('nama', 'Masukan Nama dengan Benar !', 'required|min_length[3]');
		$this->form_validation->set_rules('nisn', 'Masukan No NISN dengan Benar !', 'required|min_length[10]');
		$this->form_validation->set_rules('jk', 'Masukan Jenis Kelamin  dengan Benar !', 'required');
		$this->form_validation->set_rules('jurusan', 'Masukan jurusan  dengan Benar !', 'required');

		//$this->form_validation->set_rules('g-recaptcha-response', '', 'required');
		$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
		//$recaptcha = $this->input->post('g-recaptcha-response');
        //$response = $this->recaptcha->verifyResponse($recaptcha);
        //| !isset($response['success']) || $response['success'] <> true
		 if($this->form_validation->run() == FALSE){
		 	$this->index();

		 }else{
		 	$noreg 	= htmlspecialchars($this->input->post('noreg'));
			$nama 	= htmlspecialchars($this->input->post('nama'));
			$nisn 	= htmlspecialchars($this->input->post('nisn'));
			$gender = htmlspecialchars($this->input->post('jk'));
			$jurusan = htmlspecialchars($this->input->post('jurusan'));
			$data = array(
				'no_reg' 	=> $noreg,
				'nm_siswa' 	=> $nama,
				'nisn' 		=> $nisn,
				'jenkel' 	=> $gender,
				'id_jurusan' 	=> $jurusan,
				'tgl_daftar' => date('Y-m-d'),
			);

			$input = $this->Pendaftaranmodel->insert_pendaftaran($data);
			if ($input) {
				$this->session->set_userdata($data);
				redirect('pendaftaran/sukses/');
			} else {
				redirect('pendaftaran');
			}
		 }
	}

	public function sukses()
	{	
		$data['seting'] = $this->Setingmodel->get_sekolah();
		$this->load->view('web/layout/header',$data);
		$kode 				= $this->session->userdata('no_reg');;
		$data['id'] 		= $kode;
		$home['galeri'] 	= $this->Galerimodel->get_galeri();
		$data['jurusan'] 	= $this->Jurusanmodel->get_jurusan();
	    $data['profil'] 	= $this->Profilmodel->get_profil();
	    $data['daftar']  	= $this->Pendaftaranmodel->get_daftar($kode);
		$data['tefa'] = $this->Tefamodel->get_tefa();
	    $data['mod'] 		= "siswa";
		$this->load->view('web/layout/banner2',$home);
		$this->load->view('web/layout/navbar', $data);
		$this->load->view('web/sukses', $data);
		$this->load->view('web/layout/footer',$data);
	}

}
?>