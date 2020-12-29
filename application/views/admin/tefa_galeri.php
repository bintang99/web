<div class="content-wrapper">

   <section class="content-header">
      <h3>
        <?php echo $judul ?>
        <small></small>
      </h3>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('Admin') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Galeri</li>
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

        <table id="example1" class="table table-bordered table-striped" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th style="text-align: center">No</th>
              <th style="text-align: center">ID</th>
              <th style="text-align: center">TGL</th>
              <th style="text-align: center">Deskripsi</th>
              <th style="text-align: center">Foto</th>
              <th style="text-align: center">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php
              if ($galeridata) {
              $i = 1;
                foreach ($galeridata as $key) {
            ?>
            <tr>
              <td style='text-align: center'><?=$i?></td>
              <td style='text-align: center'><?=$key->id?></td>
              <td style='text-align: center'><?=$key->tgl?></td>
              <td style='text-align: center'><?=$key->des?></td>
              <td style='text-align: center'><img width='50' height='50' src='<?=base_url('assets/upload/tefa_galeri/'.$key->foto)?>'></td>
              <td>
                <center>
                  <div class='tooltip-demo'>
                    <a data-toggle='modal' data-target='#edit-galeri<?=$key->id?>' class='btn btn-warning btn-sm' data-popup='tooltip' data-placement='top' title='Edit Data'><i class='glyphicon glyphicon-edit'> Edit</i>
                    </a>
                    <a href='<?= base_url('backend/tefa_galeri/hapusgaleri/'.$key->id) ?>' onclick='return confirm('Anda Yakin Ingin Menghapus Data ini ?')' class='btn btn-danger btn-sm'><i class='glyphicon glyphicon-trash'> Hapus</i>
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

        <a href="#" data-toggle="modal" data-target="#tambah-galeri" class="btn-sm bg-navy"><i class="glyphicon glyphicon-plus"> Tambah</i></a>

      </div>
      <!-- /.box-body -->

      <!-- MODAL ADD -->
      <div id="tambah-galeri" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <form action="<?php echo site_url('backend/tefa_galeri/addgaleri'); ?>" method="post" role="form" enctype="multipart/form-data">
        <div class="modal-content">
          <div class="modal-header bg-primary">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="exampleModalLabel">Tambah Data</h4>
          </div>
          <div class="modal-body">
            <div class="form-group row">
              <label class="col-md-2">Gambar</label>
              <div class="col-md-10"><input type="file" name="gambar" required class="form-control"></div>
            </div>
            <div class="form-group row">
              <label class="col-md-2">TGL</label>
              <div class="col-md-10"><input type="date" name="tgl" value="<?= date('Y-m-d') ?>" required class="form-control"></div>
            </div>
            <div class="form-group row">
              <label class="col-md-2">Keterangan</label>
              <div class="col-md-10"><textarea name="des" rows="4" required class="form-control"></textarea></div>
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

    <?php $no=0; foreach($galeridata as $row): $no++; ?>
      <div id="edit-galeri<?=$row->id;?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <form action="<?php echo site_url('backend/tefa_galeri/updategaleri'); ?>" method="post" enctype="multipart/form-data">
          <div class="modal-content">
          <div class="modal-header bg-primary">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="exampleModalLabel">Edit Data</h4>
          </div>
          <div class="modal-body">
            <input type="hidden" name="gambarlama" class="form-control" value="<?=$row->foto;?>">
            <input type="hidden" value="<?=$row->id?>" name="id" class="form-control" >
            <div class="form-group row">
              <label class='col-md-2'>Gambar</label>
              <div class='col-md-10'><input type="file" name="gambar" class="form-control" >
                <div id="image-holder">
                  <img src="<?=base_url('assets/upload/tefa_galeri/'.$row->foto);?>" alt="">
                </div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-md-2">TGL</label>
              <div class="col-md-10"><input type="date" name="tgl" value="<?= $row->tgl; ?>" required class="form-control"></div>
            </div>
            <div class="form-group row">
              <label class="col-md-2">Keterangan</label>
              <div class="col-md-10"><textarea name="des" rows="4" required class="form-control"><?=$row->des;?></textarea></div>
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