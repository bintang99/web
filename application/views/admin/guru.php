<div class="content-wrapper">

   <section class="content-header">
      <h3>
        <?php echo $judul ?>
        <small></small>
      </h3>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('index.php/guru') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Guru</li>
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
              <th style="text-align: center">ID Guru</th>
              <th style="text-align: center">Nama</th>
              <th style="text-align: center">Foto</th>
              <th style="text-align: center">Alamat</th>
              <th style="text-align: center">Mapel</th>
              <th style="text-align: center">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php
              if ($gurudata) {
              $i = 1;
                foreach ($gurudata as $key) {
            ?>
            <tr>
              <td style='text-align: center'><?=$i?></td>
              <td style='text-align: center'><?=$key->id_guru?></td>
              <td style='text-align: center'><?=$key->nm_guru?></td>
              <td style='text-align: center'><img width='50' height='50' src='<?=base_url('assets/upload/guru/'.$key->foto)?>'></td>
              <td style='text-align: center'><?=$key->alamat?></td>
              <td style='text-align: center'><?=$key->mapel?></td>
              <td>
                <center>
                  <div class='tooltip-demo'>
                    <a data-toggle='modal' data-target='#edit-guru<?=$key->id_guru?>' class='btn btn-warning btn-sm' data-popup='tooltip' data-placement='top' title='Edit Data'><i class='glyphicon glyphicon-edit'> Edit</i>
                    </a>
                    <a href='<?= base_url('backend/guru/hapus_guru/'.$key->id_guru) ?>' onclick='return confirm('Anda Yakin Ingin Menghapus Data ini ?')' class='btn btn-danger btn-sm'><i class='glyphicon glyphicon-trash'> Hapus</i>
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

        <a href="#" data-toggle="modal" data-target="#tambah-guru" class="btn-sm bg-navy"><i class="glyphicon glyphicon-plus"> Tambah</i></a>

      </div>
      <!-- /.box-body -->

      <!-- MODAL ADD -->
      <div id="tambah-guru" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <form action="<?php echo site_url('backend/guru/addguru'); ?>" method="post" role="form" enctype="multipart/form-data">
        <div class="modal-content">
          <div class="modal-header bg-primary">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="exampleModalLabel">Tambah Data</h4>
          </div>
          <div class="modal-body">
            <div class="form-group row">
              <label class="col-md-2">Kode guru</label>
              <div class="col-md-10"><input type="text" readonly name="id_guru" class="form-control" value="<?=$kodeguru?>"></div>
            </div>
            <div class="form-group row">
              <label class="col-md-2">Nama guru</label>
              <div class="col-md-10"><input type="text" name="namagr" required class="form-control"></div>
            </div>
            <div class="form-group row">
              <label class="col-md-2">Alamat</label>
              <div class="col-md-10"><textarea name="alamatgr" rows="4" required class="form-control"></textarea></div>
            </div>
            <div class="form-group row">
              <label class="col-md-2">Upload Gambar</label>
              <div class="col-md-10"><input type="file" name="foto" required class="form-control"></div>
            </div>
            <div class="form-group row">
              <label class="col-md-2">Mapel</label>
              <div class="col-md-10"><select name="mapel" required class="form-control">
                <option value="">---</option>
                <option value="Matematika">Matematika</option>
                <option value="Fisika">Fisika</option>
                <option value="Bahasa Indonesia">Bahasa Indonesia</option>
                <option value="Bahasa Inggris">Bahasa Inggris</option>
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

    <?php $no=0; foreach($gurudata as $row): $no++; ?>
      <div id="edit-guru<?=$row->id_guru;?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <form action="<?php echo site_url('backend/guru/update_guru'); ?>" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id_guru" value="<?= $row->id_guru ?>" class="form-control">
            <input type="hidden" name="fotolama" value="<?= $row->foto ?>" class="form-control">
          <div class="modal-content">
          <div class="modal-header bg-primary">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="exampleModalLabel">Edit Data</h4>
          </div>
          <div class="modal-body">
            <input type="hidden" name="fotolama" class="form-control" value="<?=$row->foto;?>">
            <input type="hidden" value="<?=$row->id_guru;?>" name="id_guru" class="form-control">
            <div class="form-group row">
              <label class='col-md-2'>Nama guru</label>
              <div class='col-md-10'><input type="text" name="namagr" value="<?=$row->nm_guru;?>" required class="form-control" ></div>
            </div>
            <div class="form-group row">
              <label class="col-md-2">Alamat</label>
              <div class="col-md-10"><textarea name="alamatgr" rows="4" required class="form-control"><?=$row->alamat;?></textarea></div>
            </div>
            <div class="form-group row">
              <label class='col-md-2'>Edit Gambar</label>
              <div class='col-md-10'><input type="file" name="foto" class="form-control" >
                <div id="image-holder">
                  <img src="<?=base_url('assets/upload/guru/'.$row->foto);?>" alt="">
                </div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-md-2">Mapel</label>
              <div class="col-md-10"><select name="mapel" required class="form-control">
                <option value="<?php echo $row->mapel ?>"><?php echo $row->mapel ?></option>
                <option value="Matematika">Matematika</option>
                <option value="Fisika">Fisika</option>
                <option value="Bahasa Indonesia">Bahasa Indonesia</option>
                <option value="Bahasa Inggris">Bahasa Inggris</option>
              </select></div>
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