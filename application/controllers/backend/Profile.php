<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class Profile extends CI_Controller

{
 function __construct(){
 	parent::__construct();
 	if( $this->session->userdata('status')!='login'){
			echo "<script>alert('Anda Belum Login !!');window.location='".base_url('')."backend/Login';</script>";
		}
 }
	function index(){
		$data['profile'] = $this->db->get('tbprofil')->result();
		$data['judul'] = 'Data Profile';
	    $this->load->view('admin/layout/header');
        $this->load->view('admin/layout/navbar');
		$this->load->view('admin/profile', $data);
		$this->load->view('admin/layout/footer');
	}
 function tambah_profile(){
 	    $data['judul'] = 'Data Profile';
	    $this->load->view('admin/layout/header');
        $this->load->view('admin/layout/navbar');
		$this->load->view('admin/tambah_profile', $data);
		$this->load->view('admin/layout/footer');
 }

function add_profile(){
	 $this->load->helper('slug');
      $this->load->model('Profilmodel');
      $seo = rand(0,9999)."-".$this->input->post('judul');
      $slug = slug($seo);
      $data = $this->Profilmodel->fill_data_profile($slug);
       $simpan = $this->Profilmodel->simpan_profile($data);
        if($simpan){
        	$this->session->set_flashdata('sukses',"Data Berhasil Disimpan");
			redirect(base_url('backend/profile'));
        }else{
        	$this->session->set_flashdata('error', "Data Tidak Ditemukan");
			redirect(base_url('backend/profile'));
        }
	}

	function delete($id){
		$where = array('id' => $id);
		$hapus = $this->db->delete('tbprofil', $where);
		 if($hapus){
		 	$this->session->set_flashdata('sukses',"Data Berhasil Dihapus");
			redirect(base_url('backend/profile'));
		}else{
			$this->session->set_flashdata('error', "Data Tidak Ditemukan");
			redirect(base_url('backend/profile'));
		}
	}
  function edit_profile($id =""){
		if($id == ""){
			redirect(base_url('backend/profile'));
		}else{
        $this->load->model('Profilmodel');
		$data['judul'] = 'Edit Profile';
		$data['profile'] = $this->Profilmodel->get_by_id_profile($id);
		$this->load->view('admin/layout/header');
        $this->load->view('admin/layout/navbar');
		$this->load->view('admin/edit_profile',$data);
		$this->load->view('admin/layout/footer');
	 }
	}
function updateprofile(){
	$this->load->model('Profilmodel');
	$this->load->helper('slug');
	$id = $this->input->post('id');
	$seo = rand(0,9999)."-".$this->input->post('judul');
    $slug = slug($seo);
	$data = $this->Profilmodel->fill_data_profile($slug);
	$update =  $this->Profilmodel->update_profile($id, $data);
	if($update){
		$this->session->set_flashdata('sukses',"Data Berhasil Diupdate");
			redirect(base_url('backend/profile'));
	}else{
		$this->session->set_flashdata('error',"Data gagal Diupdate");
			redirect(base_url('backend/profile'));
	}
}
}

?>