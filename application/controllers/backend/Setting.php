<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class Setting extends CI_Controller

{
 function __construct(){

 	parent::__construct();
 	if( $this->session->userdata('status')!='login'){
			echo "<script>alert('Anda Belum Login !!');window.location='".base_url('')."Login';</script>";
        }
        $this->load->model('Setingmodel');
    
 }
 function index(){
    $data['set'] = $this->Setingmodel->get_sekolah();
    $data['judul'] = 'Setting Data Sekolah';
    $this->load->view('admin/layout/header',$data);
    $this->load->view('admin/layout/navbar');
    $this->load->view('admin/seting',$data);
    $this->load->view('admin/layout/footer');
}

function edit(){
	$data['set'] = $this->Setingmodel->get_sekolah();
	$data['judul'] = 'Edit Data Sekolah';
	
	$this->form_validation->set_rules('nama','nama','required|trim');
	if($this->form_validation->run() == false ){
		$this->load->view('admin/layout/header',$data);
		$this->load->view('admin/layout/navbar');
		$this->load->view('admin/edit_seting',$data);
		$this->load->view('admin/layout/footer');
	}else{
		$id = 1;
		$nama = $this->input->post('nama');
		$moto = $this->input->post('moto');
		$alamat= $this->input->post('alamat');
		$kepsek = $this->input->post('kepsek');
		$sambutan = $this->input->post('sambutan');
		$deskripsi = $this->input->post('deskripsi');
		$email = $this->input->post('email');
		$fb = $this->input->post('fb');
		$telp = $this->input->post('telp');
		$ig = $this->input->post('ig');
		$twit = $this->input->post('twit');

		$kondisi = array('id' => $id );
		$path = './assets/';

		// jika ada gambar
		$upload_image= $_FILES['logo']['name'];

		if($upload_image){
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size'] = '2048';
			$config['upload_path'] = './assets/';

			$this->load->library('upload',$config);

			if($this->upload->do_upload('logo')){
				$new_image=$this->upload->data('file_name');
				$this->db->set('logo',$new_image);
				@unlink($path.$this->input->post('logolama'));
			}else{
				echo $this->upload->display_errors();
			}
		}

		$upload_header= $_FILES['header']['name'];
		if($upload_header){
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size'] = '2048';
			$config['upload_path'] = './assets/';

			$this->load->library('upload',$config);

			if($this->upload->do_upload('header')){
				$new_header=$this->upload->data('file_name');
				$this->db->set('header',$new_header);
				@unlink($path.$this->input->post('headerlama'));
			}else{
				echo $this->upload->display_errors();
			}
		}

		$upload_kepsek= $_FILES['foto']['name'];
		if($upload_kepsek){
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size'] = '2048';
			$config['upload_path'] = './assets/';

			$this->load->library('upload',$config);

			if($this->upload->do_upload('foto')){
				$new_kepsek=$this->upload->data('file_name');
				$this->db->set('foto',$new_kepsek);
				@unlink($path.$this->input->post('kepala'));
			}else{
				echo $this->upload->display_errors();
			}
		}


		// $this->set('nama',$nama);
		
		$data = array(
				'nama'       => $nama,
			  	'moto'       => $moto,
				'alamat'     => $alamat,
				'kepsek'     => $kepsek,
				'sambutan'   => $sambutan,
				'email'		 => $email,
				'fb'         => $fb,
				'telp'		 => $telp,
				'ig'	     => $ig,
				'twit'		 => $twit,
				'deskripsi'  => $deskripsi
		);

		$this->db->update('seting',$data,$kondisi);
		$this->session->set_flashdata('sukses','<div class="alert alert-success" role="alert">Data Berhasil di Update</div>');
		redirect('backend/setting/');
		
	}
    
}


}