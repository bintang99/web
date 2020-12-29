<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends CI_Controller {

  function __construct(){
    parent::__construct();
    $this->load->model(array('pendaftaranmodel','jurusanmodel','Setingmodel'));
    if($this->session->userdata('status') != 'Online'){
      redirect('login_siswa');
    }
    $this->load->library(array('FPDF','upload'));
    define('FPDF_FONTPATH', $this->config->item('fonts_path'));
  }
  public function index()
  {
    $id=$this->session->userdata('no_reg');
    $data['siswa']=$this->pendaftaranmodel->get_pendaftaran_by_id($id);
    $data['jurusan']=$this->jurusanmodel->get_jurusan($id);
    $home['tefa'] = $this->Tefamodel->get_tefa();
    $data['title'] = "FORM REGISTRASI PESERTA DIDIK BARU";
    $data['header']=$this->uri->segment('2');
    $data['seting']=$this->Setingmodel->get_sekolah();
    $this->load->view('siswa/header.php', $data);
    $this->load->view('siswa/v_formprofil.php',$data);
    $this->load->view('siswa/footer.php',$data);
  }

  public function simpan_psb(){
    if ($_FILES && $_FILES['foto_siswa']['name']) {
      $config1['upload_path']    = 'assets/upload/siswa/foto-siswa/';
      $config1['allowed_types']  = 'gif|jpg|png|jpeg|bmp';
      $config1['max_size']       = '2048';
      $config1['max_width']      = '1288';
      $config1['max_height']     = '768';
      $config1['file_name']      = "foto_siswa-".$this->input->post('no_reg');
      $this->upload->initialize($config1);

      if(!$this->upload->do_upload('foto_siswa')){
        $error = $this->upload->display_errors();
        echo "<script>alert('$error');history.go(-1);</script>";
      }else{
        if (file_exists('assets/upload/siswa/foto-siswa/'.$this->input->post('foto_siswa_lama'))) {
          unlink('assets/upload/siswa/foto-siswa/'.$this->input->post('foto_siswa_lama'));
        }   
        $foto_siswa = $this->upload->data();
      }
    }else{
      if (!$this->upload->do_upload('foto_siswa') && !$this->input->post('foto_siswa_lama')) {
        $error = $this->upload->display_errors();
        $foto_siswa['file_name'] = ""; 
        echo "<script>alert('Foto Siswa $error');history.go(-1);</script>";
      }else{
        $foto_siswa['file_name']=$this->input->post('foto_siswa_lama'); 
      }
    }


    if ($_FILES['kk']['name']) {
      $config2['upload_path']    = 'assets/upload/siswa/kk/';
      $config2['allowed_types']  = 'gif|jpg|png|jpeg|bmp';
      $config2['max_size']       = '2048';
      $config2['max_width']      = '1288';
      $config2['max_height']     = '768';
      $config2['file_name']      = "kk-".$this->input->post('no_reg');
      $this->upload->initialize($config2);

      if(!$this->upload->do_upload('kk')){
        $error = $this->upload->display_errors();
        echo "<script>alert('$error');history.go(-1);</script>";
      }else{
        if (file_exists('assets/upload/siswa/kk/'.$this->input->post('kk_lama'))) {
          unlink('assets/upload/siswa/kk/'.$this->input->post('kk_lama'));
        } 
        $kk = $this->upload->data();
      }
    }else{
      if (!$this->upload->do_upload('kk') && !$this->input->post('kk_lama')) {
        $error = $this->upload->display_errors();
        $kk['file_name']= ""; 
        echo "<script>alert('KK $error');history.go(-1);</script>";
      }else{
        $kk['file_name']=$this->input->post('kk_lama'); 
      }
    }
    if ($_FILES['ijazah']['name']) {
      $config3['upload_path']    = 'assets/upload/siswa/ijazah/';
      $config3['allowed_types']  = 'gif|jpg|png|jpeg|bmp';
      $config3['max_size']       = '2048';
      $config3['max_width']      = '1288';
      $config3['max_height']     = '768';
      $config3['file_name']      = "ijazah-".$this->input->post('no_reg');
      $this->upload->initialize($config3);

      if(!$this->upload->do_upload('ijazah')){
        $error = $this->upload->display_errors();
        echo "<script>alert('$error');history.go(-1);</script>";
      }else{
        if (file_exists('assets/upload/siswa/ijazah/'.$this->input->post('ijazah_lama'))) {
          unlink('assets/upload/siswa/ijazah/'.$this->input->post('ijazah_lama'));
        } 
        $ijazah = $this->upload->data();
      }
    }else{
      if (!$this->upload->do_upload('ijazah') && !$this->input->post('ijazah_lama')) {
        $error = $this->upload->display_errors();
        $ijazah['file_name'] = ""; 
        echo "<script>alert('Ijazah $error');history.go(-1);</script>";
      }else{
        $ijazah['file_name'] = $this->input->post('ijazah_lama'); 
      }
    }

    $data = array(
    'nm_siswa' => htmlspecialchars($this->input->post('nm_siswa')),
    'id_jurusan' => htmlspecialchars($this->input->post('jurusan')),
    'jenkel' => htmlspecialchars($this->input->post('jenkel')),
    'tempat_lahir' => htmlspecialchars($this->input->post('tempat_lahir')),
    'tgl_lahir' => htmlspecialchars($this->input->post('tgl_lahir')),
    'agama' => htmlspecialchars($this->input->post('agama')),
    'alamat_siswa' => htmlspecialchars($this->input->post('alamat_siswa')),
    'kode_pos_siswa' => htmlspecialchars($this->input->post('kode_pos_siswa')),
    'email_siswa' => htmlspecialchars($this->input->post('email_siswa')),
    'hp_siswa' => htmlspecialchars($this->input->post('hp_siswa')),
    'foto_siswa' => $foto_siswa['file_name'],
    'no_ijazah' => htmlspecialchars($this->input->post('no_ijazah')),
    'no_skhun' => htmlspecialchars($this->input->post('no_skhun')),
    'nm_ayah' => htmlspecialchars($this->input->post('nm_ayah')),
    'pekerjaan_ayah' => htmlspecialchars($this->input->post('pekerjaan_ayah')),
    'pendidikan_ayah' => htmlspecialchars($this->input->post('pendidikan_ayah')),
    'nm_ibu' => htmlspecialchars($this->input->post('nm_ibu')),
    'pekerjaan_ibu' => htmlspecialchars($this->input->post('pekerjaan_ibu')),
    'pendidikan_ibu' => htmlspecialchars($this->input->post('pendidikan_ibu')),
    'alamat_ortu' => htmlspecialchars($this->input->post('alamat_ortu')),
    'kode_pos_ortu' => htmlspecialchars($this->input->post('kode_pos_ortu')),
    'hp_ortu' => htmlspecialchars($this->input->post('hp_ortu')),
    'rat_rangking' => htmlspecialchars($this->input->post('rat_rangking')),
    'rat_nilai_ijazah' => htmlspecialchars($this->input->post('rat_nilai_ijazah')),
    'beasiswa' => htmlspecialchars($this->input->post('beasiswa')),
    'beasiswa_thn' => htmlspecialchars($this->input->post('beasiswa_thn')),
    'minat' => htmlspecialchars($this->input->post('minat')),
    'sekolah_asal' => htmlspecialchars($this->input->post('sekolah_asal')),
    'thn_msk_sekolah_asal' => htmlspecialchars($this->input->post('thn_msk_sekolah_asal')),
    'thn_lulus_sekolah_asal' => htmlspecialchars($this->input->post('thn_lulus_sekolah_asal')),
    'alamat_sekolah_asal' => htmlspecialchars($this->input->post('alamat_sekolah_asal')),
    'dapat_informasi' => htmlspecialchars($this->input->post('dapat_informasi')),
    'ijazah' => $ijazah['file_name'],
    'kk' => $kk['file_name'],
    );
    $id = $this->input->post('no_reg');
    if(!$this->pendaftaranmodel->update_pendaftaran($id, $data)){
      echo "<script>alert('Gagal melakukan input data !');history.go(-1);</script>";
     }else{
      redirect(base_url('siswa/profile'));
     }
  }
  function profile()
  {
    $id=$this->session->userdata('no_reg');
    $data['siswa']=$this->pendaftaranmodel->get_pendaftaran_by_id($id);
    $data['title'] = "DATA PESERTA UJIAN/TESTING";
    $data['header']=$this->uri->segment('2');
    $data['seting']=$this->Setingmodel->get_sekolah();
    $this->load->view('siswa/header',$data);
    $this->load->view('siswa/v_datasiswa');
    $this->load->view('siswa/footer',$data);
   }

  public function CetakData()
  { 
    $id = $this->session->userdata('no_reg');
    $siswa = $this->pendaftaranmodel->get_pendaftaran_by_id($id);
    foreach ($siswa as $row) {
  
      $pdf = new FPDF('p','mm','legal');
      $pdf->AddPage();
      $pdf->Image('./assets/logo.png',10,10,30,40);
      $pdf->SetFont('Arial','B',15);
      $pdf->Cell(190,10,'SEKOLAH MENENGAH KEJURAUAN (SMK)',0,1,'C');
      $pdf->SetFont('Arial','B',20);
      $pdf->Cell(190,10,'PASIM PLUS SUKABUMI',0,1,'C');
      $pdf->SetFont('Arial','',10);
      $pdf->Cell(87,6,'Bidang Studi Keahlian:',0,0,'R');
      $pdf->Cell(95,6,'- Teknologi Informasi dan Komunikasi',0,1,'L');
      $pdf->Cell(87,6,'',0,0,'R');
      $pdf->Cell(95,6,'- Bisnis dan Manajemen',0,1,'L');
      $pdf->ln(1);
      $pdf->SetFont('Arial','',6);
      $pdf->Cell(190,7,'Alamat: Komlek Pendidikan PASIM Jalan Perana No. 8A Kec. Cikole Kota Sukabumi Telp (0266)241000 E-mail: smkpasimplus@gmail.com',0,1,'C');
      $pdf->Cell(0,1,'','B',1);
      $pdf->Cell(0,1,'','B',0);
      $pdf->Image('./assets/upload/siswa/foto-siswa/foto.jpg',175,10,30,40);
      //$pdf->Image('./assets/upload/siswa/foto-siswa/'.$row->foto_siswa,175,10,30,40); 
      $pdf->ln(1);
      $pdf->SetFont('Arial','B',15);
      $pdf->Cell(190,15,'BIODATA SISWA',0,1,'C');

      $pdf->SetTextColor(255,255,255);
      $pdf->SetFillColor(234,64,75,1);
      $pdf->SetFont('Arial','B',12);
      $pdf->Cell(190,7,'DATA PRIBADI',0,1,'C',true);
      $pdf->ln(2);
      $pdf->SetFont('Arial','',10);
      $pdf->SetTextColor(0,0,0);
      $pdf->Cell(75,5,'Nama Lengkap',0,0);
      $pdf->Cell(10,5,':',0,0);
      $pdf->Cell(105,5,$row->nm_siswa,0,1);
      $pdf->Cell(75,5,'Tempat, Tanggal Lahir',0,0);
      $pdf->Cell(10,5,':',0,0);
      $pdf->Cell(105,5,$row->tempat_lahir.", ".$row->tgl_lahir,0,1);
      $pdf->Cell(75,5,'Agama',0,0);
      $pdf->Cell(10,5,':',0,0);
      $pdf->Cell(105,5,$row->agama,0,1);
      $pdf->Cell(75,5,'Alamat',0,0);
      $pdf->Cell(10,5,':',0,0);
      $pdf->MultiCell(0,5,$row->alamat_siswa.', Kode Pos '.$row->kode_pos_siswa);
      $pdf->Cell(75,5,'Email',0,0);
      $pdf->Cell(10,5,':',0,0);
      $pdf->Cell(105,5,$row->email_siswa,0,1);
      $pdf->Cell(75,5,'Telepon / HP',0,0);
      $pdf->Cell(10,5,':',0,0);
      $pdf->Cell(105,5,$row->hp_siswa,0,1);
      $pdf->ln(3);

      $pdf->SetTextColor(255,255,255);
      $pdf->SetFillColor(234,64,75,1);
      $pdf->SetFont('Arial','B',12);
      $pdf->Cell(190,7,'DATA ORANG TUA / SUAMI / ISTRI',0,1,'C',true);
      $pdf->ln(2);
      $pdf->SetFont('Arial','',10);
      $pdf->SetTextColor(0,0,0);
      $pdf->Cell(75,5,'Nama Ayah',0,0);
      $pdf->Cell(10,5,':',0,0);
      $pdf->Cell(105,5,$row->nm_ayah,0,1);
      $pdf->Cell(75,5,'     Pekerjaan',0,0);
      $pdf->Cell(10,5,':',0,0);
      $pdf->Cell(105,5,$row->pekerjaan_ayah,0,1);
      $pdf->Cell(75,5,'     pendidikan',0,0);
      $pdf->Cell(10,5,':',0,0);
      $pdf->Cell(105,5,$row->pendidikan_ayah,0,1);
      $pdf->Cell(75,5,'Nama Ibu',0,0);
      $pdf->Cell(10,5,':',0,0);
      $pdf->Cell(105,5,$row->nm_ibu,0,1);
      $pdf->Cell(75,5,'     Pekerjaan',0,0);
      $pdf->Cell(10,5,':',0,0);
      $pdf->Cell(105,5,$row->pekerjaan_ibu,0,1);
      $pdf->Cell(75,5,'     pendidikan',0,0);
      $pdf->Cell(10,5,':',0,0);
      $pdf->Cell(105,5,$row->pendidikan_ibu,0,1);
      $pdf->Cell(75,5,'Alamat',0,0);
      $pdf->Cell(10,5,':',0,0);
      $pdf->MultiCell(0,5,$row->alamat_ortu.', Kode Pos '.$row->kode_pos_ortu);
      $pdf->Cell(75,5,'Telepon / HP',0,0);
      $pdf->Cell(10,5,':',0,0);
      $pdf->Cell(105,5,$row->hp_ortu,0,1);
      $pdf->ln(3);

      $pdf->SetTextColor(255,255,255);
      $pdf->SetFillColor(234,64,75,1);
      $pdf->SetFont('Arial','B',12);
      $pdf->Cell(190,7,'DATA POTENSI AKADEMIK',0,1,'C',true);
      $pdf->ln(2);
      $pdf->SetFont('Arial','',10);
      $pdf->SetTextColor(0,0,0);
      $pdf->Cell(75,5,'Rata - Rata Rangking Kelas',0,0);
      $pdf->Cell(10,5,':',0,0);
      $pdf->Cell(105,5,$row->rat_rangking,0,1);
      $pdf->Cell(75,5,'Rata - Rata Nilai Ijazah / STTB',0,0);
      $pdf->Cell(10,5,':',0,0);
      $pdf->Cell(105,5,$row->rat_nilai_ijazah,0,1);
      $pdf->Cell(75,5,'Pernah Mendapat Beasiswa Dari',0,0);
      $pdf->Cell(10,5,':',0,0);
      $pdf->Cell(80,5,$row->beasiswa,0,0);
      $pdf->Cell(15,5,' Tahun '.$row->beasiswa_thn,0,1);
      $pdf->Cell(75,5,'Bidang yang diminati',0,0);
      $pdf->Cell(10,5,':',0,0);
      $pdf->Cell(105,5,$row->minat,0,1);
      $pdf->ln(3);

      $pdf->SetTextColor(255,255,255);
      $pdf->SetFillColor(234,64,75,1);
      $pdf->SetFont('Arial','B',12);
      $pdf->Cell(190,7,'DATA ASAL SEKOLAH',0,1,'C',true);
      $pdf->ln(2);
      $pdf->SetFont('Arial','',10);
      $pdf->SetTextColor(0,0,0);
      $pdf->Cell(75,5,'Nama Sekolah Asal',0,0);
      $pdf->Cell(10,5,':',0,0);
      $pdf->Cell(105,5,$row->sekolah_asal,0,1);
      $pdf->Cell(75,5,'Tahun Masuk SMP',0,0);
      $pdf->Cell(10,5,':',0,0);
      $pdf->Cell(105,5,$row->thn_msk_sekolah_asal.", Tahun Lulus ".$row->thn_lulus_sekolah_asal.", No Ijazah ".$row->no_ijazah,0,1);
      $pdf->Cell(75,5,'Alamat Sekolah / SMP',0,0);
      $pdf->Cell(10,5,':',0,0);
      $pdf->MultiCell(0,5,$row->alamat_sekolah_asal);
      $pdf->Cell(75,5,'Inforamasi didapat dari',0,0);
      $pdf->Cell(10,5,':',0,0);
      $pdf->Cell(105,5,$row->dapat_informasi,0,1);
      $pdf->ln(5);  

      $pdf->SetTextColor(255,255,255);
      $pdf->SetFillColor(234,64,75,1);
      $pdf->SetFont('Arial','B',10); 
      $pdf->Cell(95,5,'Program Keahlian',0,1,'C',true);
      $pdf->Cell(95,5,'SMK Pasim Plus Koat Sukabumi',0,0,'C',true);
      $pdf->SetFont('Arial','',10);
      $pdf->SetTextColor(0,0,0);
      $pdf->Cell(95,2.5,'Sukabumi,                                  ',0,1,'C');
      $pdf->Cell(95,0,'',0,0,'C');
      $pdf->Cell(95,2.5,'Pendaftar',0,1,'C');
      $jurusan = $this->jurusanmodel->get_jurusan($id);
      $jml_jurusan = $this->jurusanmodel->get_jml_jurusan();
      $pdf->Cell(95,5*$jml_jurusan,'',1,0,'C');
      $pdf->Cell(95,0,'',0,1,'C');
      foreach ($jurusan as $jrs) {
        if ($jrs->id_jurusan == $row->id_jurusan) {
          $pdf->SetFillColor(234,64,75,1);
          $pdf->Cell(5,5,'',1,0,'',true);
          $pdf->Cell(10,5,$jrs->nm_jurusan,0,1);
        }else{
          $pdf->SetFillColor(255,255,255);
          $pdf->Cell(5,5,'',1,0);
          $pdf->Cell(10,5,$jrs->nm_jurusan,0,1);
        }
      }
      $pdf->Cell(65,15,'',1,0,'C');
      $pdf->Cell(30,15,'',1,0,'C');
      $pdf->Cell(95,0,'',0,1,'C');

      $pdf->cell(65,5,'Catatan:',0);
      $pdf->cell(30,5,'Paraf Petugas',0,0,'C');
      $pdf->Cell(95,0,'(.......................................)',0,1,'C');

      $pdf->AddPage();
      $pdf->Image('./assets/logo.png',10,10,30,30);
      $pdf->SetFont('Arial','B',15);
      $pdf->Cell(190,8,'SEKOLAH MENENGAH KEJURAUAN (SMK)',0,1,'C');
      $pdf->SetFont('Arial','B',20);
      $pdf->Cell(190,8,'PASIM PLUS SUKABUMI',0,1,'C');
      $pdf->SetFont('Arial','',10);
      $pdf->Cell(87,5,'Bidang Studi Keahlian:',0,0,'R');
      $pdf->Cell(95,5,'- Teknologi Informasi dan Komunikasi',0,1,'L');
      $pdf->Cell(87,5,'',0,0,'R');
      $pdf->Cell(95,5,'- Bisnis dan Manajemen',0,1,'L');
      $pdf->ln(1);
      $pdf->SetFont('Arial','',6);
      $pdf->Cell(190,5,'Alamat: Komlek Pendidikan PASIM Jalan Perana No. 8A Kec. Cikole Kota Sukabumi Telp (0266)241000 E-mail: smkpasimplus@gmail.com',0,1,'C');
      $pdf->Cell(0,1,'','B',1);
      $pdf->Cell(0,1,'','B',0);
      $pdf->ln(1);
      $pdf->SetFont('Arial','B',15);
      $pdf->Cell(190,15,'SURAT PERNYATAAN SISWA',0,1,'C');

      $pdf->SetFont('Arial','',11);
      $pdf->SetTextColor(0,0,0);
      $pdf->Cell(190,10,'Saya yang bertanda tangan dibawah ini:',0,1);
      $pdf->Cell(75,9,'Nama Lengkap',0,0);
      $pdf->Cell(10,9,':',0,0);
      $pdf->Cell(105,9,'............................................................',0,1);
      $pdf->Cell(75,9,'Jenis Kelamin',0,0);
      $pdf->Cell(10,9,':',0,0);
      $pdf->Cell(105,9,'............................................................',0,1);
      $pdf->Cell(75,9,'Tempat, Tanggal Lahir',0,0);
      $pdf->Cell(10,9,':',0,0);
      $pdf->Cell(105,9,'............................................................',0,1);
      $pdf->Cell(75,9,'Alamat',0,0);
      $pdf->Cell(10,9,':',0,0);
      $pdf->Cell(105,9,'............................................................',0,1);
      $pdf->Cell(75,9,'',0,0);
      $pdf->Cell(10,9,'',0,0);
      $pdf->Cell(105,9,'............................................................',0,1);
      $pdf->Cell(75,9,'Nama Orang Tua',0,0);
      $pdf->Cell(10,9,':',0,0);
      $pdf->Cell(105,9,'............................................................',0,1);
      $pdf->Cell(75,9,'Pekerjaan',0,0);
      $pdf->Cell(10,9,':',0,0);
      $pdf->Cell(105,9,'............................................................',0,1);
      $pdf->Cell(75,9,'Alamat',0,0);
      $pdf->Cell(10,9,':',0,0);
      $pdf->Cell(105,9,'............................................................',0,1);
      $pdf->Cell(75,9,'',0,0);
      $pdf->Cell(10,9,'',0,0);
      $pdf->Cell(105,9,'............................................................',0,1);
      $pdf->Cell(75,9,'Asal Sekolah',0,0);
      $pdf->Cell(10,9,':',0,0);
      $pdf->Cell(105,9,'............................................................',0,1);
      $pdf->Cell(75,9,'No. HP',0,0);
      $pdf->Cell(10,9,':',0,0);
      $pdf->Cell(105,9,'............................................................',0,1);
      $pdf->ln(3);

      $pdf->SetFont('Arial','B',15);
      $pdf->Cell(190,15,'Menyatakan',0,1,'C');
      $pdf->SetFont('Arial','',11);
      $pdf->Cell(190,10,'Bahwa selama menjadi peserta didik di SMK PASIM Plus Kota Sukabumi, Saya akan:',0,1);
      $pdf->Cell(190,6,'1. Belajar dengan tekun dan penuh semangat,',0,1);
      $pdf->Cell(190,6,'2. Menjaga nama baik saya, keluarga dan sekolah,',0,1);
      $pdf->Cell(190,6,'3. Bersedia mengikuti pendidikan agama,',0,1);
      $pdf->Cell(190,6,'4. Mengikuti kegiatan ekstra kurikuler yang ada di sekolah,',0,1);
      $pdf->Cell(190,6,'5. Sanggup menaatai dan memenuhi  semua peratuan yang di terepkan di sekolah, dan',0,1);
      $pdf->Cell(190,6,'6. Apabila saya tidak mengikuti peraturan atau melanggar salah satu peraturan di sekoalh maka;',0,1);
      $pdf->Cell(190,6,'      a. Menerima sanksi yang telah ditetapkan,',0,1);
      $pdf->Cell(190,6,'      b. Dipanggi Orang tua saya,',0,1);
      $pdf->Cell(190,6,'      c. Dikembalikan kepada orang tua saya,',0,1);
      $pdf->Cell(190,10,'Demikian pernyataan ini saya buat dengan sesungguhnya dan penuh taggung jawab',0,1);
      $pdf->ln(8);
      $pdf->Cell(120,6,'',0,0);
      $pdf->Cell(75,6,'Sukabumi,..................................',0,1);
      $pdf->Cell(120,6,'',0,0);
      $pdf->Cell(180,6,'Yang Membuat,',0,1);
      $pdf->ln(30);
      $pdf->Cell(120,6,'',0,0);
      $pdf->Cell(75,6,'(....................................................)',0,1);

      $pdf->AddPage();
      $pdf->Image('./assets/logo.png',10,10,30,30);
      $pdf->SetFont('Arial','B',15);
      $pdf->Cell(190,8,'SEKOLAH MENENGAH KEJURAUAN (SMK)',0,1,'C');
      $pdf->SetFont('Arial','B',20);
      $pdf->Cell(190,8,'PASIM PLUS SUKABUMI',0,1,'C');
      $pdf->SetFont('Arial','',10);
      $pdf->Cell(87,5,'Bidang Studi Keahlian:',0,0,'R');
      $pdf->Cell(95,5,'- Teknologi Informasi dan Komunikasi',0,1,'L');
      $pdf->Cell(87,5,'',0,0,'R');
      $pdf->Cell(95,5,'- Bisnis dan Manajemen',0,1,'L');
      $pdf->ln(1);
      $pdf->SetFont('Arial','',6);
      $pdf->Cell(190,5,'Alamat: Komlek Pendidikan PASIM Jalan Perana No. 8A Kec. Cikole Kota Sukabumi Telp (0266)241000 E-mail: smkpasimplus@gmail.com',0,1,'C');
      $pdf->Cell(0,1,'','B',1);
      $pdf->Cell(0,1,'','B',0);
      $pdf->ln(1);
      $pdf->SetFont('Arial','B',15);
      $pdf->Cell(190,15,'SURAT PERNYATAAN ORANG TUA SISWA',0,1,'C');

      $pdf->SetFont('Arial','',11);
      $pdf->SetTextColor(0,0,0);
      $pdf->Cell(190,10,'Yang bertanda tangan dibawah ini:',0,1);
      $pdf->Cell(75,9,'Nama',0,0);
      $pdf->Cell(10,9,':',0,0);
      $pdf->Cell(105,9,'............................................................',0,1);
      $pdf->Cell(75,9,'Alamat',0,0);
      $pdf->Cell(10,9,':',0,0);
      $pdf->Cell(105,9,'............................................................',0,1);
      $pdf->Cell(75,9,'',0,0);
      $pdf->Cell(10,9,'',0,0);
      $pdf->Cell(105,9,'............................................................',0,1);
      $pdf->Cell(75,9,'Pekerjaan',0,0);
      $pdf->Cell(10,9,':',0,0);
      $pdf->Cell(105,9,'............................................................',0,1);
      $pdf->Cell(75,9,'Orang Tua Dari',0,0);
      $pdf->Cell(10,9,':',0,0);
      $pdf->Cell(105,9,'............................................................',0,1);
      $pdf->Cell(75,9,'Hubungan Dengan Perserta Didik',0,0);
      $pdf->Cell(10,9,':',0,0);
      $pdf->Cell(105,9,'............................................................',0,1);
      $pdf->Cell(75,9,'Jenis Kelamin',0,0);
      $pdf->Cell(10,9,':',0,0);
      $pdf->Cell(105,9,'............................................................',0,1);
      $pdf->Cell(75,9,'No. HP',0,0);
      $pdf->Cell(10,9,':',0,0);
      $pdf->Cell(105,9,'............................................................',0,1);
      $pdf->ln(3);

      $pdf->SetFont('Arial','B',15);
      $pdf->Cell(190,15,'Menyatakan',0,1,'C');
      $pdf->SetFont('Arial','',10);
      $pdf->Cell(190,6,'1. Akan membibing dan mengawasi  anak kami yang telah resmi menjadi peserta didik SMK PASIM Kota Sukabumi,',0,1);
      $pdf->Cell(190,6,'2. Menjaga nama baik saya, keluarga dan sekolah,',0,1);
      $pdf->Cell(190,6,'3. Bersedia mengikuti pendidikan agama dan ekstrakurikuler yang berlaku,',0,1);
      $pdf->Cell(190,6,'4. Berusaha memenuhi kewajiban adminidtrasi yang telah ditetapkan oleh sekolah mengenai jumlah dan tenggang waktunya,',0,1);
      $pdf->Cell(190,6,'5. Menerima akibat dampak timbul kemudian hari apabila kami tidak dapat memnihi administrai yang berlaku',0,1);
      $pdf->Cell(190,6,'6. Apabila putra/i melanggar peraturan maka;',0,1);
      $pdf->Cell(190,6,'      a. Kami menyerahkan kepada guru/ wali kelas/ kesiswaan untuk membibimbing dan meluruskannya,',0,1);
      $pdf->Cell(190,6,'      b. Bersedaia dipangggil bila diperlukan,',0,1);
      $pdf->Cell(190,6,'      c. Menerima kembali putra/i kami bila ank sudah tidak bisa dipertahankan di SMK Pasim Plus Kota Sukabumi,',0,1);
      $pdf->Cell(190,10,'Demikian pernyataan ini saya buat dengan sesungguhnya dan penuh taggung jawab',0,1);
      $pdf->ln(20);
      $pdf->Cell(120,5,'',0,0);
      $pdf->Cell(75,5,'Sukabumi,..................................',0,1);
      $pdf->Cell(120,5,'',0,0);
      $pdf->Cell(180,5,'Yang Membuat,',0,1);
      $pdf->ln(30);
      $pdf->Cell(120,5,'',0,0);
      $pdf->Cell(75,5,'(....................................................)',0,1);

      $pdf->output();
    }
  }
}
?>