<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class Pengguna extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		if( $this->session->userdata('status')!='login'){
			echo "<script>alert('Anda Belum Login !!');window.location='".base_url('')."backend/Login';</script>";
		}

		$this->load->model('Penggunamodel');
		$this->load->library(array('FPDF','upload'));
		define('FPDF_FONTPATH', $this->config->item('fonts_path'));
		
	}

		function index(){

		$data['judul'] = 'Data pengguna';
		$data['penggunadata'] = $this->Penggunamodel->get_pengguna();
		$data['kodepengguna'] = $this->Penggunamodel->kd_pengguna();
		$this->load->view('admin/layout/header');
        $this->load->view('admin/layout/navbar');
		$this->load->view('admin/pengguna',$data);
		$this->load->view('admin/layout/footer');
	}

	function addpengguna(){
		$data = $this->Penggunamodel->fill_data_pengguna();
		if ($this->Penggunamodel->insert_pengguna($data)) {
			$this->session->set_flashdata('sukses',"Data Berhasil Disimpan");
			redirect(base_url('backend/pengguna'));
		}
	}
		function update_pengguna(){

		$id = $this->input->post('id_pengguna');
		$foto_lama = $this->input->post('fotolama');

		if ($_FILES AND $_FILES['foto']['name']) {
			$config['upload_path'] 		= 'assets/upload/pengguna/';
			$config['allowed_types'] 	= 'gif|jpg|png|jpeg|bmp';
			$config['max_size'] 		= '2048';
			$config['max_width'] 		= '1288';
			$config['max_height'] 		= '768';
			$config['file_name'] 		= $this->input->post('id_pengguna');

				$this->upload->initialize($config);
					if ( ! $this->upload->do_upload('foto')) {
						$this->session->set_flashdata('error',$this->upload->display_errors());
						redirect(base_url('backend/pengguna'));
					}else{
						unlink('assets/upload/pengguna/'.$foto_lama);
						$gbr = $this->upload->data();
						$foto = $gbr['file_name'];
						$data = $this->Penggunamodel->fill_data_pengguna($foto);
						if ($this->Penggunamodel->update_pengguna($id, $data)) {
							$this->session->set_flashdata('sukses',"Data Berhasil Diedit");
							redirect(base_url('backend/pengguna'));
						}
					}
		}else{
			$id = $this->input->post('id_pengguna');
			$data = $this->Penggunamodel->fill_data_pengguna1();
			if ($this->Penggunamodel->update_pengguna($id, $data)) {
				$this->session->set_flashdata('sukses', "Data Berhasil Diedit");
				redirect(base_url('backend/pengguna'));
			}
		}
	}
		function hapuspengguna($id){
		$row = $this->Penggunamodel->get_by_id_pengguna($id);
		if ($row) {
			unlink('assets/upload/pengguna/'.$row->foto);
			$this->Penggunamodel->delete_pengguna($id);
			$this->session->set_flashdata('sukses', "Data Berhasil Dihapus");
			redirect(base_url('backend/pengguna'));
		}else{
			$this->session->set_flashdata('error', "Data Tidak Ditemukan");
			redirect(base_url('backend/pengguna'));
		}
	}
	public function lap_pengguna()
	{
		$data['data_pengguna']=$this->Penggunamodel->get_pengguna();
		$this->load->view('laporan/lap_pengguna', $data);
	}


	function Myakun(){
		$id = $this->session->userdata('iduser');
		$data['judul'] = 'Akun Saya';
		$data['akun'] = $this->Penggunamodel->get_by_id_pengguna($id);
		$this->load->view('admin/layout/header');
        $this->load->view('admin/layout/navbar');
		$this->load->view('admin/myakun',$data);
		$this->load->view('admin/layout/footer');
	}

}

?>