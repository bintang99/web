<div class="content-wrapper">

   <section class="content-header">
      <h3>
        <?php echo $judul ?>
        <small></small>
      </h3>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('Admin') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">jurusan</li>
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
        <?php foreach ($jurusandata as $jrs): ?>
        <form action="<?php echo site_url('backend/jurusan/update_jurusan'); ?>" method="post" role="form" enctype="multipart/form-data">
          <input type="hidden" name="id_jurusan" value="<?= $jrs->id_jurusan ?>" required class="form-control">
          <input type="hidden" name="gambarlama" value="<?= $jrs->gambar ?>" required class="form-control">
          <div class="form-group row">
            <label class="col-md-2">Nama Jurusan</label>
            <div class="col-md-10"><input type="text" name="nm_jurusan" value="<?= $jrs->nm_jurusan ?>" required class="form-control"></div>
          </div>
          <div class="form-group row">
              <label class="col-md-2">Gambar</label>
              <div class="col-md-10"><input type="file" name="gambar" class="form-control"></div>
            </div>
          <div class="form-group row">
            <label class="col-md-2">Deskripsi</label>
            <div class="col-md-10"><textarea id="editor1" name="deskripsi" ><?= $jrs->deskripsi ?></textarea></div>
          </div>
          <button type="submit" class="btn btn-primary"> Simpan</button>
        </form>
        <?php endforeach ?>
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

    </div>
  </section>
</div>