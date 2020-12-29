  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Peserta Ujian
        <?php foreach ($siswa as $row):?>
        <small><?=$row->no_reg?></small>
        <a target="_blank" class=" btn btn-primary" href="<?=base_url('siswa/CetakData')?>"><span class="fa fa-print"></span> Print</a>
        <a class=" btn btn-warning" href="<?=base_url('siswa/')?>"><span class="fa fa-edit"></span> Edit Data</a>
      </h1>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="callout callout-danger">
            <h4>Perhatian</h4>
            Silahkan Print Formilir Pendaftaran Dan Surat Pernyataan Dengan Klik <a target="_blank" href="<?=base_url('siswa/CetakData')?>"><span class="fa fa-print"></span> Print</a><br>
            Lalu Verifikasi Ke Sekolah Dengan Membawa:
            <br>
            <ul>
              <li>Formulir Pendaftaran</li>
              <li>Surat Peryataan Siswa</li>
              <li>Surat Pernyataan Orangtua</li>
              <li>Foto Copy Ijazah</li>
              <li>Foto Copy SKHUN</li>
              <li>Pas Foto 2 x 3</li>
              <li>Pas Foto 3 x 4</li>
            </ul>
          </div>
        </div>
        <div class="col-xs-12">
            <!-- /.box-header -->
          <div class="box box-primary">
            <div class="col-md-12">
              <h3 class="box-title text-primary">Data Pribadi</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <table width="100%">
            <tr>
              <td>No Reg</td>
              <td>:</td>
              <td><?=$row->no_reg?></td>
            </tr>
            <tr>
              <td>NISN</td>
              <td>:</td>
              <td><?=$row->nisn?></td>
            </tr>
            <tr>
              <td>Nama</td>
              <td>:</td>
              <td><?=$row->nm_siswa?></td>
            </tr>
            <tr>
              <td>Tempat Lahir</td>
              <td>:</td>
              <td><?=$row->tempat_lahir?></td>
            </tr>
            <tr>
              <td>Tanggal Lahir</td>
              <td>:</td>
              <td><?=$row->tgl_lahir?></td>
            </tr>
            <tr>
              <td>Jenis Kelamin</td>
              <td>:</td>
              <td><?=$row->jenkel?></td>
            </tr>
            <tr>
              <td>Agama</td>
              <td>:</td>
              <td><?=$row->agama?></td>
            </tr>
            <tr>
              <td>Alamat Siswa</td>
              <td>:</td>
              <td><?=$row->alamat_siswa?></td>
            </tr>
             <tr>
              <td>Kode Pos</td>
              <td>:</td>
              <td><?=$row->kode_pos_siswa?></td>
            </tr>
             <tr>
              <td>No HP</td>
              <td>:</td>
              <td><?=$row->hp_siswa?></td>
            </tr>
            <tr>
              <td>Email</td>
              <td>:</td>
              <td><?=$row->email_siswa?></td>
            </tr>
            </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->

        <div class="col-xs-12">
            <!-- /.box-header -->
          <div class="box box-primary">
            <div class="col-md-12">
              <h3 class="box-title text-primary">Data Orang Tua Suami / Istri</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <table width="100%">
            <tr>
              <td>Nama Ayah</td>
              <td>:</td>
              <td><?=$row->nm_ayah?></td>
            </tr>
            <tr>
              <td>Pekerjaan</td>
              <td>:</td>
              <td><?=$row->pekerjaan_ayah?></td>
            </tr>
            <tr>
              <td>Pendidikan Terakhir</td>
              <td>:</td>
              <td><?=$row->pendidikan_ayah?></td>
            </tr>
            <tr>
              <td>Nama Ibu</td>
              <td>:</td>
              <td><?=$row->nm_ibu?></td>
            </tr>
            <tr>
              <td>Pekerjaan</td>
              <td>:</td>
              <td><?=$row->pekerjaan_ibu?></td>
            </tr>
            <tr>
              <td>Pendidikan Terakhir</td>
              <td>:</td>
              <td><?=$row->pendidikan_ibu?></td>
            </tr>
            <tr>
              <td>Alamat Orang Tua</td>
              <td>:</td>
              <td><?=$row->alamat_ortu?></td>
            </tr>
             <tr>
              <td>Kode Pos</td>
              <td>:</td>
              <td><?=$row->kode_pos_siswa?></td>
            </tr>
             <tr>
              <td>No HP</td>
              <td>:</td>
              <td><?=$row->hp_ortu?></td>
            </tr>
            </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-xs-12">
            <!-- /.box-header -->
          <div class="box box-primary">
            <div class="col-md-12">
              <h3 class="box-title text-primary">Data Potensi Akademik</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <table width="100%">
            <tr>
              <td>Rata-rata Rangking Kelas</td>
              <td>:</td>
              <td><?=$row->rat_rangking?></td>
            </tr>
            <tr>
              <td>Rata-rata Nilai Ijazah</td>
              <td>:</td>
              <td><?=$row->rat_nilai_ijazah?></td>
            </tr>
            <tr>
              <td>Pernah Mendapat Beasiswa Dari</td>
              <td>:</td>
              <td><?=$row->beasiswa?></td>
              <td>Tahun : <?=$row->beasiswa_thn?></td>
            </tr>
            <tr>
              <td>Bidang Yang Diminati</td>
              <td>:</td>
              <td><?=$row->minat?></td>
            </tr>
            </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-xs-12">
            <!-- /.box-header -->
          <div class="box box-primary">
            <div class="col-md-12">
              <h3 class="box-title text-primary">Data Asal Sekolah</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <table width="100%">
            <tr>
              <td>Nama Sekolah Asal</td>
              <td>:</td>
              <td><?=$row->sekolah_asal?></td>
            </tr>
            <tr>
              <td>Tahun Masuk SMP</td>
              <td>:</td>
              <td><?=$row->thn_msk_sekolah_asal?></td>
            </tr>
            <tr>
              <td>Tahun Lulus SMP</td>
              <td>:</td>
              <td><?=$row->thn_lulus_sekolah_asal?></td>
            </tr>
            <tr>
              <td>Nomor Ijazah</td>
              <td>:</td>
              <td><?=$row->no_ijazah?></td>
            </tr>
            <tr>
              <td>Nomor SKHUN</td>
              <td>:</td>
              <td><?=$row->no_skhun?></td>
            </tr>
            <tr>
              <td>Alamat Sekolah</td>
              <td>:</td>
              <td><?=$row->alamat_sekolah_asal?></td>
            </tr>
             <tr>
              <td>Informasi Didapat Dari</td>
              <td>:</td>
              <td><?=$row->dapat_informasi?></td>
            </tr>
            </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-xs-12">
            <!-- /.box-header -->
          <div class="box box-primary">
            <div class="col-md-12">
              <h3 class="box-title text-primary">Dokumen</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <table width="100%" >
              <tr>
                <th>Foto Siswa</th>
                <th>Kartu Keluarga</th>
                <th>Ijazah</th>
              </tr>
              <tr>
                <td align="center">
                <img width="130px" height="140px" alt="Foto Siswa" src="<?=base_url()?>assets/upload/siswa/foto-siswa/<?=$row->foto_siswa?>">
                </td>
                <td align="center">
                  <img width="130px" height="140px" alt="Foto Siswa" src="<?=base_url()?>assets/upload/siswa/kk/<?=$row->kk?>">
                </td>
                <td align="center">
                <img width="130px" height="140px" alt="Foto Siswa" src="<?=base_url()?>assets/upload/siswa/ijazah/<?=$row->ijazah?>">
                </td>
              </tr>
            </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
      <!-- /.row -->
    </section>
<?php
endforeach;
?>
  </div>
  <!-- /.content-wrapper -->