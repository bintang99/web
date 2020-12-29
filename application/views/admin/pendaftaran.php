<div class="content-wrapper">

   <section class="content-header">
      <h3>
        <?php echo $judul ?>
        <small></small>
      </h3>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('index.php/pendaftaran') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">pendaftaran</li>
      </ol>
    </section>

  <section class="content container-fluid">
    <div class="box">
      <!-- /.box-header -->

        <?php 
          $data=$this->session->flashdata('sukses');
          if($data!=""){ ?>
            <div id="notifikasi" class="alert alert-success"><strong>Sukses! </strong> <?=$data;?></div>
        <?php } ?>

        <?php 
          $data2=$this->session->flashdata('error');
          if($data2!=""){ ?>
            <div id="notifikasi" class="alert alert-danger"><strong> Error! </strong> <?=$data2;?></div>
        <?php } ?>

      <div class="box-body">
        
        <form action="<?= site_url('backend/pendaftaran/verifikasi/') ?>" method="post" style="margin-bottom: 80px;" >
          <div class="col-md-12">
            <label>Verifikasi Peserta Didik:</label>
          </div>
          <div class="col-md-10">
              <input class="form-control" type="text" required="" name="no_reg" id="no_reg">
          </div>
          <div class="col-md-2">
              <input class="form-control btn btn-primary" type="submit" name="verifikasi" value="Verifikasi">
          </div>
        </form>
        <table id="example1" class="table table-bordered table-striped" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th style="text-align: center">No</th>
              <th style="text-align: center">ID pendaftaran</th>
              <th style="text-align: center">Nama</th>
              <th style="text-align: center">Foto</th>
              <th style="text-align: center">Asal Sekolah</th>
              <th style="text-align: center">Jurusan</th>
              <th style="text-align: center">Verifikasi</th>
              <th style="text-align: center">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php
              if ($pendaftarandata) {
              $i = 1;
                foreach ($pendaftarandata as $key) {
            ?>
            <tr>
              <td style='text-align: center'><?=$i?></td>
              <td style='text-align: center'><?=$key->no_reg?></td>
              <td style='text-align: center'><?=$key->nm_siswa?></td>
              <td style='text-align: center'><img width='50' height='50' src='<?=base_url('assets/upload/siswa/foto-siswa/'.$key->foto_siswa)?>'></td>
              <td style='text-align: center'><?=$key->sekolah_asal?></td>
              <td style='text-align: center'><?=$key->nm_jurusan?></td>
              <td style='text-align: center'><?=$key->verifikasi?></td>
              <td>
                <center>
                  <div class='tooltip-demo'>
                    <a data-toggle='modal' data-target='#edit-pendaftaran<?=$key->no_reg?>' class='btn btn-warning btn-sm' data-popup='tooltip' data-placement='top' title='Edit Data'><i class='glyphicon glyphicon-edit'> Edit</i>
                    </a>
                    <a href='<?= base_url('backend/pendaftaran/hapus_pendaftaran/'.$key->no_reg) ?>' onclick='return confirm('Anda Yakin Ingin Menghapus Data ini ?')' class='btn btn-danger btn-sm'><i class='glyphicon glyphicon-trash'> Hapus</i>
                    </a>
                    <a data-toggle='modal' data-target='#edit-pendaftaran<?=$key->no_reg?>' class='btn btn-default btn-sm' data-popup='tooltip' data-placement='top' title='Detail'><i class='glyphicon glyphicon-file'> Detail</i>
                    </a>
                    <a href='<?= base_url('backend/pendaftaran/verifikasi/'.$key->no_reg) ?>' onclick='return confirm('Anda Yakin Ingin Menghapus Data ini ?')' class='btn btn-primary btn-sm'data-popup='tooltip' data-placement='top' title='Tetapkan Sebagai Yang Telah Verifikasi'><i class='glyphicon glyphicon-edit'> Verifikasi</i>
                    </a>
                  </div>
                </center>
              </td>
            </tr>
            <?php
                $i++;
              }
                }else{
                echo "<tr>
                  <td style='text-align: center' colspan='8'>-- Tidak Ada Data --</td>
                  </tr>";
              }
            ?>
          </tbody>
        </table>

        <a href="#" data-toggle="modal" data-target="#tambah-pendaftaran" class="btn-sm bg-navy"><i class="glyphicon glyphicon-plus"> Tambah</i></a>

      </div>
      <!-- /.box-body -->

      <!-- MODAL ADD -->
      <div id="tambah-pendaftaran" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <form action="<?php echo site_url('backend/pendaftaran/addpendaftaran'); ?>" method="post" role="form" enctype="multipart/form-data">
        <div class="modal-content">
          <div class="modal-header bg-primary">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="exampleModalLabel">Tambah Data</h4>
          </div>
          <div class="modal-body">
            <div class="form-group row">
              <label class="col-md-2">Kode pendaftaran</label>
              <div class="col-md-10"><input type="text" readonly name="no_reg" class="form-control" value="<?=$kodependaftaran?>"></div>
            </div>
            <div class="form-group row">
              <label class="col-md-2">Nama pendaftaran</label>
              <div class="col-md-10"><input type="text" name="namagr" required class="form-control"></div>
            </div>
            <div class="form-group row">
              <label class="col-md-2">Alamat</label>
              <div class="col-md-10"><textarea name="alamatgr" rows="4" required class="form-control"></textarea></div>
            </div>
            <div class="form-group row">
              <label class="col-md-2">Upload Gambar</label>
              <div class="col-md-10"><input type="file" name="foto" required class="form-control"></div>
            </div>
            <div class="form-group row">
              <label class="col-md-2">Mapel</label>
              <div class="col-md-10"><select name="mapel" required class="form-control">
                <option value="">---</option>
                <option value="Matematika">Matematika</option>
                <option value="Fisika">Fisika</option>
                <option value="Bahasa Indonesia">Bahasa Indonesia</option>
                <option value="Bahasa Inggris">Bahasa Inggris</option>
              </select></div>
            </div>
          </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary"> Simpan</button>
            </div>
          </div>
          </form>
      </div>
    </div>
    <!-- END MODAL ADD -->

    <!-- MODAL EDIT -->
    <style>
        #image-holder {
            margin-top: 8px;
        }
        
        #image-holder img {
            border: 8px solid #DDD;
            max-width:100%;
        }
    </style>

    <?php $no=0; foreach($pendaftarandata as $row): $no++; ?>
      <div id="edit-pendaftaran<?=$row->no_reg;?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <form action="<?php echo site_url('backend/pendaftaran/update_pendaftaran'); ?>" method="post" enctype="multipart/form-data">
            <input type="hidden" name="no_reg" value="<?= $row->no_reg ?>" class="form-control">
            <input type="hidden" name="fotolama" value="<?= $row->foto_siswa ?>" class="form-control">
          <div class="modal-content">
          <div class="modal-header bg-primary">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="exampleModalLabel">Edit Data</h4>
          </div>
          <div class="modal-body">
            <input type="hidden" name="fotolama" class="form-control" value="<?=$row->foto_siswa;?>">
            <input type="hidden" value="<?=$row->no_reg;?>" name="no_reg" class="form-control">
            <div class="form-group row">
              <label class='col-md-2'>Nama pendaftaran</label>
              <div class='col-md-10'><input type="text" name="namagr" value="<?=$row->nm_siswa;?>" required class="form-control" ></div>
            </div>
            <div class="form-group row">
              <label class="col-md-2">Alamat</label>
              <div class="col-md-10"><textarea name="alamatgr" rows="4" required class="form-control"><?=$row->alamat_siswa;?></textarea></div>
            </div>
            <div class="form-group row">
              <label class='col-md-2'>Edit Gambar</label>
              <div class='col-md-10'><input type="file" name="foto" class="form-control" >
                <div id="image-holder">
                  <img src="<?=base_url('assets/upload/pendaftaran/'.$row->foto_siswa);?>" alt="">
                </div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-md-2">Mapel</label>
              <div class="col-md-10"><select name="mapel" required class="form-control">
                <option value="<?php echo $row->jurusan ?>"><?php echo $row->jurusan ?></option>
                <option value="Matematika">Matematika</option>
                <option value="Fisika">Fisika</option>
                <option value="Bahasa Indonesia">Bahasa Indonesia</option>
                <option value="Bahasa Inggris">Bahasa Inggris</option>
              </select></div>
            </div>
            <br>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-warning"> Update</button>
          </div>
        </div>
        </form>
      </div>
    </div>
  <?php endforeach; ?>
  <!-- END MODAL EDIT -->

    </div>
  </section>
</div>