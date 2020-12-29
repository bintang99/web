<div class="content-wrapper">

   <section class="content-header">
      <h3>
        <?php echo $judul ?>
        <small></small>
      </h3>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('dashboard') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">siswa</li>
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
              <th style="text-align: center">nis</th>
              <th style="text-align: center">NISN</th>
              <th style="text-align: center">Nama siswa</th>
              <th style="text-align: center">Kelas</th>
              <th style="text-align: center">Jurusan</th>
              <th style="text-align: center">Jenis kelamin</th>
              <th style="text-align: center">foto</th>
              <th style="text-align: center">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php
              if ($siswadata) {
              $i = 1;
                foreach ($siswadata as $key) {
            ?>
            <tr>
              <td style='text-align: center'><?=$i?></td>
              <td style='text-align: center'><?=$key->nis?></td>
              <td style='text-align: center'><?=$key->nisn?></td>
              <td style='text-align: center'><?=$key->nm_siswa?></td>
              <td style='text-align: center'><?=$key->kelas?></td>
              <td style='text-align: center'><?=$key->jurusan?></td>
              <td style='text-align: center'><?=$key->jenkel?></td> 
              <td style='text-align: center'><img width='50' height='50' src='<?=base_url('assets/upload/siswa/'.$key->foto)?>'></td>
              <td>
                <center>
                  <div class='tooltip-demo'>
                    <a data-toggle='modal' data-target='#edit-guru<?=$key->nis?>' class='btn btn-warning btn-sm' data-popup='tooltip' data-placement='top' title='Edit Data'><i class='glyphicon glyphicon-edit'> Edit</i>
                    </a>
                    <a href='<?= base_url('backend/siswa/hapus_siswa/'.$key->nis) ?>' onclick='return confirm('Anda Yakin Ingin Menghapus Data ini ?')' class='btn btn-danger btn-sm'><i class='glyphicon glyphicon-trash'> Hapus</i>
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
                  <td style='text-align: center' colspan='10'>-- Tidak Ada Data --</td>
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
        <form action="<?php echo site_url('backend/siswa/addsiswa'); ?>" method="post" role="form" enctype="multipart/form-data">
        <div class="modal-content">
          <div class="modal-header bg-primary">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="exampleModalLabel">Tambah Data</h4>
          </div>
          <div class="modal-body">
            <div class="form-group row">
              <label class="col-md-2">NIS</label>
              <div class="col-md-10"><input type="text" name="nis" class="form-control"></div>
            </div>
            <div class="form-group row">
              <label class="col-md-2">NISN</label>
              <div class="col-md-10"><input type="text" name="nisn" required class="form-control"></div>
            </div>
            <div class="form-group row">
              <label class="col-md-2">Nama siswa</label>
            <div class="col-md-10"><input type="text" name="nama" required class="form-control"></div>
            </div>
            <div class="form-group row">
              <label class="col-md-2">Kelas</label>
              <div class="col-md-10"><select name="kelas" required class="form-control">
                <option value="">---</option>
                <option value="1">X</option>
                <option value="2">XI</option>
                <option value="3">XII</option>
              </select></div>
            </div>
            <div class="form-group row">
              <label class="col-md-2">Jurusan</label>
              <div class="col-md-10"><select name="jurusan" required class="form-control">
                <option value="">---</option>
                <option value="1">Rekayasa Perangkat Lunak</option>
                <option value="2">Administrasi Perkantoran</option>
                <option value="3">Teknik Komputer dan Jaringan</option>
                <option value="4">Broadcasting</option>
                <option value="5">Akuntansi</option>
                <option value="6">Animasi</option>
              </select></div>
            </div>
              <div class="form-group row">
              <label class="col-md-2">Jenis Kelamin</label>
              <div class="col-md-10"><select name="jenkel" required class="form-control">
                <option value="">---</option>
                <option value="Laki-Laki">Laki - Laki</option>
                <option value="perempuan">Perempuan</option>
              </select></div>
            </div>
            <div class="form-group row">
               <div class="col-md-2">Tanggal Lahir</div>
               <div class="col-md-10"><input type="date" class="form-control" name="tgllahir"></input></div>
            </div>
            <div class="form-group row">
              <label class="col-md-2">Tempat Lahir</label>
              <div class="col-md-10"><textarea name="tmplahir" rows="4" required class="form-control"></textarea></div>
            </div>
            <div class="form-group row">
              <label class="col-md-2">Upload Gambar</label>
              <div class="col-md-10"><input type="file" name="foto" required class="form-control"></div>
            </div>
            <div class="form-group row">
              <label class="col-md-2">Agama</label>
              <div class="col-md-10"><select name="agama" required class="form-control">
                <option value="">---</option>
                <option value="Islam">Islam</option>
                <option value="Kristen">Kristen</option>
                <option value="Katolik">Katolik</option>
                <option value="Hindu">Hindu</option>
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

    <?php $no=0; foreach($siswadata as $row): $no++; ?>
      <div id="edit-guru<?=$row->nis;?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
         <form action="<?php echo site_url('backend/siswa/updatesiswa'); ?>" method="post" role="form" enctype="multipart/form-data">
        <div class="modal-content">
          <div class="modal-header bg-primary">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="exampleModalLabel">Tambah Data</h4>
          </div>
          <div class="modal-body">
          <input type="hidden" name="fotolama" class="form-control" value="<?=$row->foto;?>">
            <div class="form-group row">
              <label class="col-md-2">NIS</label>
              <div class="col-md-10"><input type="text" name="nis" class="form-control" value="<?=$row->nis;?>"></div>
            </div>
            <div class="form-group row">
              <label class="col-md-2">NISN</label>
              <div class="col-md-10"><input type="text" name="nisn" required class="form-control" value="<?=$row->nis;?>"></div>
            </div>
            <div class="form-group row">
              <label class="col-md-2">Nama siswa</label>
            <div class="col-md-10"><input type="text" name="nama" required class="form-control" value="<?=$row->nm_siswa;?>"></div>
            </div>
            <div class="form-group row">
              <label class="col-md-2">Kelas</label>
              <div class="col-md-10"><select name="kelas" required class="form-control">
                <option value="<?php echo $row->kelas ?>"><?php echo $row->kelas ?></option>
                <option value="1">X</option>
                <option value="2">XI</option>
                <option value="3">XII</option>
              </select></div>
            </div>
            <div class="form-group row">
              <label class="col-md-2">Jurusan</label>
              <div class="col-md-10"><select name="jurusan" required class="form-control">
                <option value="<?php echo $row->jurusan ?>"><?php echo $row->jurusan ?></option>
                <option value="1">Rekayasa Perangkat Lunak</option>
                <option value="2">Administrasi Perkantoran</option>
                <option value="3">Teknik Komputer dan Jaringan</option>
                <option value="4">Broadcasting</option>
                <option value="5">Akuntansi</option>
                <option value="6">Animasi</option>
              </select></div>
            </div>
              <div class="form-group row">
              <label class="col-md-2">Jenis Kelamin</label>
              <div class="col-md-10"><select name="jenkel" required class="form-control" >
                <option <?php if($row->jurusan == 'L'){echo 'selected';}?> value="Laki-Laki">Laki - Laki</option>
                <option <?php if($row->jurusan == 'P'){echo 'selected';}?>value="Perempuan">Perempuan</option>
              </select></div>
            </div>
            <div class="form-group row">
               <div class="col-md-2">Tanggal Lahir</div>
               <div class="col-md-10"><input type="date" class="form-control" name="tgllahir" value="<?php echo $row->tgl_lahir ?>"></input></div>
            </div>
            <div class="form-group row">
              <label class="col-md-2">Tempat Lahir</label>
              <div class="col-md-10"><textarea name="tmplahir" rows="4" name="tmplahir" required class="form-control"><?php echo $row->tempat_lahir ?></textarea></div>
            </div>
            <div class="form-group row">
              <label class='col-md-2'>Edit Gambar</label>
              <div class='col-md-10'><input type="file" name="foto" class="form-control" >
                <div id="image-holder">
                  <img src="<?=base_url('assets/upload/siswa/'.$row->foto);?>" alt="">
                </div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-md-2">Agama</label>
              <div class="col-md-10"><select name="agama" required class="form-control">
                <option value="<?php echo $row->agama ?>"><?php echo $row->agama ?></option>
                <option value="Islam">Islam</option>
                <option value="Kristen">Kristen</option>
                <option value="Katolik">Katolik</option>
                <option value="Hindu">Hindu</option>
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
  <?php endforeach; ?>
  <!-- END MODAL EDIT -->

    </div>
  </section>
</div>