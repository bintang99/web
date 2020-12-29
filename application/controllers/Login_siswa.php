<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_siswa extends CI_Controller
{
	function __construct(){
  	 parent::__construct();
  	  $this->load->model(array('loginmodel', 'Jurusanmodel', 'Profilmodel','Setingmodel'));
  	}
	public function index()
	{
		$home['seting'] = $this->Setingmodel->get_sekolah();
		$home['jurusan'] = $this->Jurusanmodel->get_jurusan();
		$home['profil'] = $this->Profilmodel->get_profil();
		$home['mod'] = "siswa";
	    $this->load->view('web/layout/header',$home);
		$this->load->view('web/layout/banner2');
		$this->load->view('web/layout/navbar', $home);
		$this->load->view('login/v_siswalogin');
		$this->load->view('web/layout/footer',$home);
	}

	function cek_login(){
		$data = array(
            'no_reg' => $this->input->post('noreg'),
            'nisn' => $this->input->post('password')
		);

		$valid = $this->loginmodel->loginsiswa($data);
		 if($valid->num_rows() == 1){
		  	 foreach ($valid->result() as $key) {
		  	 	$session_data['status'] = 'Online';
		  	 	$session_data['no_reg'] = $key->no_reg;
		  	 	$session_data['nm_siswa'] = $key->nm_siswa;
		  	 	$session_data['ijazah'] = $key->ijazah;
		  	 	$this->session->set_userdata($session_data);
		  	 }
		  	 if($this->session->userdata('status') == 'Online'){
		  	 	if ($key->ijazah != NULL) {
		  	 		redirect(base_url('siswa/profile'));
		  	 	}else{
		  	 		redirect(base_url('siswa'));	
		  	 	}
		  	 }
		  }else{
		  	 	echo "<script>alert('Gagal Login: Cek ID pendaftaran , password!');history.go(-1);</script>";
		  }
	}

	
	public function logout(){
		$this->session->sess_destroy();
		redirect('login_siswa');
	}

}