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
              <th style="text-align: center">no</th>
              <th style="text-align: center">judul</th>
              <th style="text-align: center">link</th>
              <th style="text-align: center">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php
              if ($streaming) {
              $i = 1;
                foreach ($streaming as $key) {
            ?>
            <tr>
              <td style='text-align: center'><?=$i?></td>
              <td style='text-align: center'><?=$key->judul?></td>
              <td style='text-align: center'><?=$key->link?></td>
              <td>
                <center>
                  <div class='tooltip-demo'>
                    <a data-toggle='modal' data-target='#edit-galeri<?=$key->id?>' class='btn btn-warning btn-sm' data-popup='tooltip' data-placement='top' title='Edit Data'><i class='glyphicon glyphicon-edit'> Edit</i>
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
      </div>
      <!-- /.box-body -->

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

    <?php $no=0; foreach($streaming as $row): $no++; ?>
      <div id="edit-galeri<?=$row->id;?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <form action="<?php echo site_url('backend/stream/updatestream'); ?>" method="post" enctype="multipart/form-data">
          <div class="modal-content">
          <div class="modal-header bg-primary">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="exampleModalLabel">Edit Data</h4>
          </div>
          <div class="modal-body">
            <input type="hidden" value="<?=$row->id?>" name="id" class="form-control" >
            <div class="form-group row">
              <label class="col-md-2">Judul</label>
              <div class="col-md-10"><input type="text" name="judul" value="<?= $row->judul; ?>" required class="form-control"></div>
            </div>
            <div class="form-group row">
              <label class="col-md-2">Link</label>
              <div class="col-md-10"><textarea name="link" rows="4" required class="form-control"><?=$row->link;?></textarea></div>
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