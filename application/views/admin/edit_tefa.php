<div class="content-wrapper">

   <section class="content-header">
      <h3>
        <?php echo $judul ?>
        <small></small>
      </h3>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('Admin') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Tefa</li>
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
      <?php foreach ($tefadata as $row): ?>
        <form action="<?php echo site_url('backend/tefa//update_tefa'); ?>" method="post" enctype="multipart/form-data">
            <input type="hidden" value="<?= $row->id_tefa ?>" name="id_tefa" class="form-control" >
            <input type="hidden" name="fotolama" value="<?=$row->foto;?>" required class="form-control">
            <div class="form-group row">
              <label class='col-md-2'>Judul</label>
              <div class='col-md-10'><input type="text" name="judul" value="<?=$row->judul?>" required class="form-control" ></div>
            </div>
            <div class="form-group row">
              <label class="col-md-2">Tanggal</label>
               <div class="col-md-10"><input type="date" name="tgl" required class="form-control" value="<?=$row->tgl?>"></div>
            </div>
            <div class="form-group row">
              <label class="col-md-2">Foto</label>
              <div class="col-md-10"><input type="file" name="foto" class="form-control"></div>
            </div>
            <div class="form-group row">
              <label class="col-md-2">Deskripsi</label>
              <div class="col-md-10"><textarea id="editor1" name="des"><?=$row->des?></textarea></div>
            </div>
            <br>
            <button type="submit" class="btn btn-warning"> Update</button>
        </form>
      <?php endforeach ?>
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

    </div>
  </section>
</div>