<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class Pendaftaran extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		if( $this->session->userdata('status')!='login'){
			echo "<script>alert('Anda Belum Login !!');window.location='".base_url('')."backend/Login';</script>";
		}

		$this->load->model('pendaftaranmodel');
		$this->load->library(array('FPDF','upload'));
		define('FPDF_FONTPATH', $this->config->item('fonts_path'));
		
	}

	function index(){

		$data['judul'] = 'Pendaftaran';
		$data['pendaftarandata'] = $this->pendaftaranmodel->tampil_pendaftar();
		$data['kodependaftaran'] = $this->pendaftaranmodel->auto_inc();
		$this->load->view('admin/layout/header');
        $this->load->view('admin/layout/navbar');
		$this->load->view('admin/pendaftaran',$data);
		$this->load->view('admin/layout/footer');
	}

	function addpendaftaran(){

		$config['upload_path'] 		= 'assets/upload/pendaftaran/';
		$config['allowed_types'] 	= 'gif|jpg|png|jpeg|bmp';
		$config['max_size'] 		= '2048';
		$config['max_width'] 		= '1288';
		$config['max_height'] 		= '768';
		$config['file_name'] 		= $this->input->post('kodegr');

			$this->upload->initialize($config);
				if ( ! $this->upload->do_upload('foto')) {
					$this->session->set_flashdata('error',$this->upload->display_errors());
					redirect(base_url('backend/pendaftaran'));
				}else{
					$gbr = $this->upload->data();
					$foto = $gbr['file_name'];
					$data = $this->pendaftaranmodel->fill_data_pendaftaran($foto);
					if ($this->pendaftaranmodel->insert_pendaftaran($data)) {
						$this->session->set_flashdata('sukses',"Data Berhasil Disimpan");
						redirect(base_url('backend/pendaftaran'));
					}
				}
	}
	function update_pendaftaran(){

		$id = $this->input->post('id_pendaftaran');
		$foto_lama = $this->input->post('fotolama');

		if ($_FILES AND $_FILES['foto']['name']) {
			$config['upload_path'] 		= 'assets/upload/pendaftaran/';
			$config['allowed_types'] 	= 'gif|jpg|png|jpeg|bmp';
			$config['max_size'] 		= '2048';
			$config['max_width'] 		= '1288';
			$config['max_height'] 		= '768';
			$config['file_name'] 		= $this->input->post('id_pendaftaran');

				$this->upload->initialize($config);
					if ( ! $this->upload->do_upload('foto')) {
						$this->session->set_flashdata('error',$this->upload->display_errors());
						redirect(base_url('backend/pendaftaran'));
					}else{
						unlink('assets/upload/pendaftaran/'.$foto_lama);
						$gbr = $this->upload->data();
						$foto = $gbr['file_name'];
						$data = $this->pendaftaranmodel->fill_data_pendaftaran($foto);
						if ($this->pendaftaranmodel->update_pendaftaran($id, $data)) {
							$this->session->set_flashdata('sukses',"Data Berhasil Diedit");
							redirect(base_url('backend/pendaftaran'));
						}
					}
		}else{
			$id = $this->input->post('id_pendaftaran');
			$data = $this->pendaftaranmodel->fill_data_pendaftaran1();
			if ($this->pendaftaranmodel->update_pendaftaran($id, $data)) {
				$this->session->set_flashdata('sukses', "Data Berhasil Diedit");
				redirect(base_url('backend/pendaftaran'));
			}
		}
	}
		function hapus_pendaftaran($id){
		$row = array('no_reg', $id);
		if ($row) {
			unlink('assets/upload/pendaftaran/'.$row->foto);
			$this->pendaftaranmodel->delete_pendaftaran($id);
			$this->session->set_flashdata('sukses', "Data Berhasil Dihapus");
			redirect(base_url('backend/pendaftaran'));
		}else{
			$this->session->set_flashdata('error', "Data Tidak Ditemukan");
			redirect(base_url('backend/pendaftaran'));
		}
	}
	public function lap_pendaftaran()
	{
		$data['data_pendaftaran']=$this->pendaftaranmodel->get_pendaftaran();
		$this->load->view('laporan/lap_pendaftaran', $data);
	}
	public function verifikasi($id="")
	{
		if ($id=="") {
			$id = $this->input->post('no_reg');
		}
		$data = array(
			'verifikasi' => 'Y',
		);
		if ($this->pendaftaranmodel->update_pendaftaran($id, $data)) {
			$this->session->set_flashdata('sukses',"Verifikkasi Berhasil");
			redirect(base_url('backend/pendaftaran'));
		}
	}

}

?>