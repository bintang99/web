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
        <table width="50%">
          <?php foreach ($akun as $akn): ?>
          <tr>
            <td>ID</td>
            <td>:</td>
            <td><?= $akn->iduser ?></td>
          </tr>
          <tr>
            <td>Username</td>
            <td>:</td>
            <td><?= $akn->u ?></td>
          </tr>
          <tr>
            <td>Nama</td>
            <td>:</td>
            <td><?= $akn->namalengkap ?></td>
          </tr>
          <tr>
            <td>Level</td>
            <td>:</td>
            <td><?= $akn->level ?></td>
          </tr>
          <tr>
            <td>Log</td>
            <td>:</td>
            <td><?= $akn->log ?></td>
          </tr>
          <?php endforeach ?>
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

    </div>
  </section>
</div>