<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class Guru extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		if( $this->session->userdata('status')!='login'){
			echo "<script>alert('Anda Belum Login !!');window.location='".base_url('')."backend/Login';</script>";
		}

		$this->load->model('Gurumodel');
		$this->load->library(array('FPDF','upload'));
		define('FPDF_FONTPATH', $this->config->item('fonts_path'));
		
	}

		function index(){

		$data['judul'] = 'Data Guru';
		$data['gurudata'] = $this->Gurumodel->get_guru();
		$data['kodeguru'] = $this->Gurumodel->kd_guru();
		$this->load->view('admin/layout/header');
        $this->load->view('admin/layout/navbar');
		$this->load->view('admin/guru',$data);
		$this->load->view('admin/layout/footer');
	}

	function addguru(){

		$config['upload_path'] 		= 'assets/upload/guru/';
		$config['allowed_types'] 	= 'gif|jpg|png|jpeg|bmp';
		$config['max_size'] 		= '2048';
		$config['max_width'] 		= '1288';
		$config['max_height'] 		= '768';
		$config['file_name'] 		= $this->input->post('kodegr');

			$this->upload->initialize($config);
				if ( ! $this->upload->do_upload('foto')) {
					$this->session->set_flashdata('error',$this->upload->display_errors());
					redirect(base_url('backend/guru'));
				}else{
					$gbr = $this->upload->data();
					$foto = $gbr['file_name'];
					$data = $this->Gurumodel->fill_data_guru($foto);
					if ($this->Gurumodel->insert_guru($data)) {
						$this->session->set_flashdata('sukses',"Data Berhasil Disimpan");
						redirect(base_url('backend/guru'));
					}
				}
	}
		function update_guru(){

		$id = $this->input->post('id_guru');
		$foto_lama = $this->input->post('fotolama');

		if ($_FILES AND $_FILES['foto']['name']) {
			$config['upload_path'] 		= 'assets/upload/guru/';
			$config['allowed_types'] 	= 'gif|jpg|png|jpeg|bmp';
			$config['max_size'] 		= '2048';
			$config['max_width'] 		= '1288';
			$config['max_height'] 		= '768';
			$config['file_name'] 		= $this->input->post('id_guru');

				$this->upload->initialize($config);
					if ( ! $this->upload->do_upload('foto')) {
						$this->session->set_flashdata('error',$this->upload->display_errors());
						redirect(base_url('backend/guru'));
					}else{
						unlink('assets/upload/guru/'.$foto_lama);
						$gbr = $this->upload->data();
						$foto = $gbr['file_name'];
						$data = $this->Gurumodel->fill_data_guru($foto);
						if ($this->Gurumodel->update_guru($id, $data)) {
							$this->session->set_flashdata('sukses',"Data Berhasil Diedit");
							redirect(base_url('backend/guru'));
						}
					}
		}else{
			$id = $this->input->post('id_guru');
			$data = $this->Gurumodel->fill_data_guru1();
			if ($this->Gurumodel->update_guru($id, $data)) {
				$this->session->set_flashdata('sukses', "Data Berhasil Diedit");
				redirect(base_url('backend/guru'));
			}
		}
	}
		function hapus_guru($id){
		$row = $this->Gurumodel->get_by_id_guru($id);
		if ($row) {
			unlink('assets/upload/guru/'.$row->foto);
			$this->Gurumodel->delete_guru($id);
			$this->session->set_flashdata('sukses', "Data Berhasil Dihapus");
			redirect(base_url('backend/guru'));
		}else{
			$this->session->set_flashdata('error', "Data Tidak Ditemukan");
			redirect(base_url('backend/guru'));
		}
	}
	public function lap_guru()
	{
		$data['data_guru']=$this->Gurumodel->get_guru();
		$this->load->view('laporan/lap_guru', $data);
	}

}

?>