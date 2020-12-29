<div class="content-wrapper">

   <section class="content-header">
      <h3>
        <?php echo $judul ?>
        <small></small>
      </h3>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('dashboard') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Setup Slide</li>
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
              <th style="text-align: center">Judul</th>
              <th style="text-align: center">Gambar</th>
              <th style="text-align: center">Deskripsi</th>
              <th style="text-align: center">Aksi</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th style="text-align: center">No</th>
              <th style="text-align: center">Judul</th>
              <th style="text-align: center">Gambar</th>
              <th style="text-align: center">Deskripsi</th>
              <th style="text-align: center">Aksi</th>
            </tr>
          </tfoot>
          <tbody>
            <?php
              if ($slidedata) {
              $i = 1;
                foreach ($slidedata as $key) {
            ?>
            <tr>
              <td style='text-align: center'><?=$i?></td>
              <td style='text-align: center'><?=$key->judul?></td>
              <td style='text-align: center'><img width='50' height='50' src='<?=base_url('assets/upload/slide/'.$key->gambar)?>'></td>
              <td style='text-align: center'><?=$key->deskripsi?></td>
              <td>
                <center>
                  <div class='tooltip-demo'>
                    <a data-toggle='modal' data-target='#edit-guru<?=$key->id_slide?>' class='btn btn-warning btn-sm' data-popup='tooltip' data-placement='top' title='Edit Data'><i class='glyphicon glyphicon-edit'> Edit</i>
                    </a>
                    <a href='<?= base_url('/backend/slide/hapusslide/'.$key->id_slide) ?>' onclick='return confirm('Anda Yakin Ingin Menghapus Data ini ?')' class='btn btn-danger btn-sm'><i class='glyphicon glyphicon-trash'> Hapus</i>
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
                  <td style='text-align: center' colspan='5'>-- Tidak Ada Data --</td>
                  </tr>";
              }
            ?>
          </tbody>
        </table>

        <a href="#" data-toggle="modal" data-target="#tambah-guru" class="btn-sm bg-navy"><i class="glyphicon glyphicon-plus"> Tambah</i></a>

      </div>
      <!-- /.box-body -->

      <!-- MODAL ADD -->
      <div id="tambah-guru" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <form action="<?php echo site_url('backend/slide/addslide'); ?>" method="post" role="form" enctype="multipart/form-data">
        <div class="modal-content">
          <div class="modal-header bg-primary">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="exampleModalLabel">Tambah Data</h4>
          </div>
          <div class="modal-body">
            <div class="form-group row">
              <label class="col-md-2">Judul</label>
              <div class="col-md-10"><input type="text" name="judul" required class="form-control"></div>
            </div>
            <div class="form-group row">
              <label class="col-md-2">Gambar</label>
              <div class="col-md-10"><input type="file" name="gambar" required class="form-control"></div>
            </div>
            <div class="form-group row">
              <label class="col-md-2">Deskripsi</label>
              <div class="col-md-10"><textarea name="deskripsi" rows="4" required class="form-control"></textarea></div>
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

    <?php $no=0; foreach($slidedata as $row): $no++; ?>
      <div id="edit-guru<?=$row->id_slide;?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <form action="<?php echo site_url('backend/slide/updateslide'); ?>" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id_slide" value="<?= $row->id_slide ?>" class="form-control">
            <input type="hidden" name="gambarlama" value="<?= $row->gambar ?>" class="form-control">
          <div class="modal-content">
          <div class="modal-header bg-primary">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="exampleModalLabel">Edit Data</h4>
          </div>
          <div class="modal-body">
            <input type="hidden" name="gambarlama" class="form-control" value="<?=$row->gambar;?>">
            <input type="hidden" value="<?=$row->id_slide;?>" name="id_slide" class="form-control" >
            <div class="form-group row">
              <label class='col-md-2'>Judul</label>
              <div class='col-md-10'><input type="text" name="judul" value="<?=$row->judul;?>" required class="form-control" ></div>
            </div>
            <div class="form-group row">
              <label class='col-md-2'>Gambar</label>
              <div class='col-md-10'><input type="file" name="gambar" class="form-control" >
                <div id="image-holder">
                  <img src="<?=base_url('assets/upload/slide/'.$row->gambar);?>" alt="">
                </div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-md-2">Deskripsi</label>
              <div class="col-md-10"><textarea name="deskripsi" rows="4" required class="form-control"><?=$row->deskripsi;?></textarea></div>
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