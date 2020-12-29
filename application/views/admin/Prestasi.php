<div class="content-wrapper">

   <section class="content-header">
      <h3>
        <?php echo $judul ?>
        <small></small>
      </h3>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('Admin') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">prestasi</li>
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
              <th style="text-align: center">Prestasi</th>
              <th style="text-align: center">Ke</th>
              <th style="text-align: center">Deskripsi</th>
              <th style="text-align: center">Gambar</th>
              <th style="text-align: center">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php
              if ($prestasidata) {
              $i = 1;
                foreach ($prestasidata as $key) {
            ?>
            <tr>
              <td style='text-align: center'><?=$i?></td>
              <td style='text-align: center'><?=substr($key->nm_prestasi, 0,10)?></td>
              <td style='text-align: center'><?=$key->ke?></td>
              <td style='text-align: center'><?=substr($key->deskripsi, 0,50)?></td>
              <td style='text-align: center'><img width='50' height='50' src='<?=base_url('assets/upload/prestasi/'.$key->gambar)?>'></td>
              <td>
                <center>
                  <div class='tooltip-demo'>
                    <a data-toggle='modal' data-target='#edit<?=$key->id_prestasi?>' class='btn btn-warning btn-sm' data-popup='tooltip' data-placement='top' title='Edit Data'><i class='glyphicon glyphicon-edit'> Edit</i>
                    </a>
                    <a href='<?= base_url('backend/prestasi/hapusprestasi/'.$key->id_prestasi) ?>' onclick='return confirm('Anda Yakin Ingin Menghapus Data ini ?')' class='btn btn-danger btn-sm'><i class='glyphicon glyphicon-trash'> Hapus</i>
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
                  <td style='text-align: center' colspan='7'>-- Tidak Ada Data --</td>
                  </tr>";
              }
            ?>
          </tbody>
        </table>

        <a href="#" data-toggle="modal" data-target="#tambah" class="btn-sm bg-navy"><i class="glyphicon glyphicon-plus"> Tambah</i></a>

      </div>
      <!-- /.box-body -->

      <!-- MODAL ADD -->
      <div id="tambah" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <form action="<?php echo site_url('backend/prestasi/addprestasi'); ?>" method="post" role="form" enctype="multipart/form-data">
        <div class="modal-content">
          <div class="modal-header bg-primary">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="exampleModalLabel">Tambah Data</h4>
          </div>
          <div class="modal-body">
          <div class="form-group row">
            <label class="col-md-2">Prestasi</label>
            <div class="col-md-10"><input type="text" name="nm_prestasi" required class="form-control"></div>
          </div>
            <div class="form-group row">
              <label class="col-md-2">Ke</label>
              <div class="col-md-10"><input type="number" name="ke" required class="form-control"></div>
            </div>
            <div class="form-group row">
              <label class="col-md-2">Deskripsi</label>
              <div class="col-md-10"><textarea name="deskripsi" rows="4" required class="form-control"></textarea></div>
            </div>
            <div class="form-group row">
              <label class="col-md-2">Gambar</label>
              <div class="col-md-10"><input type="file" name="gambar" required class="form-control"></div>
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

    <?php $no=0; foreach($prestasidata as $row): $no++; ?>
      <div id="edit<?=$row->id_prestasi;?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <form action="<?php echo site_url('backend/prestasi/updateprestasi'); ?>" method="post" enctype="multipart/form-data">
          <div class="modal-content">
          <div class="modal-header bg-primary">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="exampleModalLabel">Edit Data</h4>
          </div>
          <div class="modal-body">
            <input type="hidden" name="gambarlama" class="form-control" value="<?=$row->gambar;?>">
            <input type="hidden" value="<?=$row->id_prestasi;?>" name="id_prestasi" class="form-control" >
             <div class="form-group row">
            <label class="col-md-2">Prestasi</label>
            <div class="col-md-10"><input type="text" name="nm_prestasi" required value="<?= $row->nm_prestasi ?>" class="form-control"></div>
          </div>
            <div class="form-group row">
              <label class="col-md-2">Ke</label>
              <div class="col-md-10"><input type="number" name="ke" value="<?= $row->ke ?>" required class="form-control"></div>
            </div>
            <div class="form-group row">
              <label class="col-md-2">Deskripsi</label>
              <div class="col-md-10"><textarea name="deskripsi" rows="4" required class="form-control"><?= $row->deskripsi ?></textarea></div>
            </div>
            <div class="form-group row">
              <label class="col-md-2">Gambar</label>
              <div class="col-md-10"><input type="file" name="gambar" class="form-control"></div>
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