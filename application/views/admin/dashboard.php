<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content-header">
      <h1>
        Dashboard
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('dashboard') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <section class="content">
      <div class="callout callout-info">
        <h5>Hai <?=$this->session->userdata('nama')?>!</h5>
        <p>Selamat datang kembali di halaman admin</p>
      </div>
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?= $siswa ?></h3>

              <p>Siswa</p>
            </div>
            <div class="icon">
              <i class="glyphicon glyphicon-user"></i>
            </div>
            <a href="<?=site_url('backend/siswa');?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?= $guru ?></h3>

              <p>Guru</p>
            </div>
            <div class="icon">
              <i class="glyphicon glyphicon-user"></i>
            </div>
            <a href="<?=site_url('backend/guru'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?= $berita ?></h3>

              <p>Berita</p>
            </div>
            <div class="icon">
              <i class="glyphicon glyphicon-globe"></i>
            </div>
            <a href="<?=site_url('backend/guru'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?= $pendaftaran ?></h3>

              <p>Pendaftaran</p>
            </div>
            <div class="icon">
              <i class="glyphicon glyphicon-user"></i>
            </div>
            <a href="<?=site_url('backend/pendaftaran'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

      </div>
      <!-- /.row -->

      <div class="box-body">

        <table id="example1" class="table table-bordered table-striped" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th style="text-align: center">No</th>
              <th style="text-align: center">Nama Hacker</th>
              <th style="text-align: center">Port</th>
              <th style="text-align: center">ip</th>
              <th style="text-align: center">Url Refensi</th>
              <th style="text-align: center">Cookie</th>
              <th style="text-align: center">User agent</th>
              <th style="text-align: center">Aksi</th>

            </tr>
          </thead>
          <tbody>
            <?php
              if ($hackel) {
              $i = 1;
                foreach ($hackel as $key) {
            ?>
            <tr>
              <td style='text-align: center'><?= $i ?></td>
              <td style='text-align: center'><?= $key->hostname ?></td>
              <td style='text-align: center'><?= $key->port ?></td>
              <td style='text-align: center'><?= $key->ip ?></td>
              <td style='text-align: center'><?= $key->ref ?></td>
              <td style='text-align: center'><?= $key->cookie ?></td>
              <td style='text-align: center'><?= $key->agent ?></td>
              <td>
                <center>
                  <div class='tooltip-demo'>
                    <a href='<?= base_url()?>backend/dashboard/hapus/<?= $key->id ?>' onclick='return confirm('Anda Yakin Ingin Menghapus Data ini ?')' class='btn btn-danger btn-sm' ><i class='glyphicon glyphicon-trash'> Hapus</i>
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
                  <td style='text-align: center' colspan='8'>-- Tidak Ada Serangan Hacker --</td>
                  </tr>";
              }
            ?>
          </tbody>
        </table>
      </div>
      <!-- /.box-body -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
