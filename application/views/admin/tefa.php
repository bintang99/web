<div class="content-wrapper">

   <section class="content-header">
      <h3>
        <?php echo $judul ?>
        <small></small>
      </h3>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('dashboard') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
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

        <table id="example1" class="table table-bordered table-striped" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th style="text-align: center">No</th>
              <th style="text-align: center">ID</th>
              <th style="text-align: center">Foto</th>
              <th style="text-align: center">Judul</th>
              <th style="text-align: center">Tanggal</th>
              <th style="text-align: center">Deskripsi</th>
              <th style="text-align: center">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php
              if ($tefadata) {
              $i = 1;
                foreach ($tefadata as $key) {
            ?>
            <tr>
              <td style='text-align: center'><?= $i ?></td>
              <td style='text-align: center'><?= $key->id_tefa ?></td>
              <td style='text-align: center'><img width='50' height='50' src='<?=base_url('assets/upload/tefa/'.$key->foto)?>'></td>
              <td style='text-align: center'><?= $key->judul ?></td>
              <td style='text-align: center'><?= $key->tgl ?></td>
              <td style='text-align: center'><?= substr($key->des,0, 50) ?></td>
              <td>
                <center>
                  <div class='tooltip-demo'>
                    <a href="<?= base_url('backend/tefa/edit_tefa/'.$key->id_tefa) ?>" class='btn btn-warning btn-sm' data-popup='tooltip' data-placement='top' title='Edit Data'><i class='glyphicon glyphicon-edit'> Edit</i>
                    </a>
                    <a href='<?= base_url('backend/tefa/hapus_tefa/'.$key->id_tefa) ?>' onclick='return confirm('Anda Yakin Ingin Menghapus Data ini ?')' class='btn btn-danger btn-sm' ><i class='glyphicon glyphicon-trash'> Hapus</i>
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
                  <td style='text-align: center' colspan='9'>-- Tidak Ada Data --</td>
                  </tr>";
              }
            ?>
          </tbody>
        </table>

        <a href="<?php echo base_url('backend/tefa/tambah_tefa') ?>" class="btn-sm bg-navy"><i class="glyphicon glyphicon-plus"> Tambah</i></a>

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