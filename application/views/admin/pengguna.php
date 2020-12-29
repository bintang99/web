<div class="content-wrapper">

   <section class="content-header">
      <h3>
        <?php echo $judul ?>
        <small></small>
      </h3>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('pengguna') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">User</li>
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
              <th style="text-align: center">Log</th>
              <th style="text-align: center">Username</th>
              <th style="text-align: center">Nama Lengkap</th>
              <th style="text-align: center">Level</th>
              <th style="text-align: center">Edit</th>
              <th style="text-align: center">Hapus</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th style="text-align: center">No</th>
              <th style="text-align: center">Log</th>
              <th style="text-align: center">Username</th>
              <th style="text-align: center">Nama Lengkap</th>
              <th style="text-align: center">Level</th>
              <th style="text-align: center">Edit</th>
              <th style="text-align: center">Hapus</th>
            </tr>
          </tfoot>
          <tbody>
            <?php
              if ($penggunadata) {
              $i = 1;
                foreach ($penggunadata as $key) {
                echo "<tr>";
                echo "<td style='text-align: center'>".$i."</td>";
                echo "<td style='text-align: center'>".date('d/m/y',strtotime($key->log))."</td>";
                echo "<td style='text-align: center'>".$key->u."</td>";
                echo "<td style='text-align: center'>".$key->namalengkap."</td>";
                echo "<td style='text-align: center'>".$key->level."</td>";
                echo "<td style='text-align: center'><div class='tooltip-demo'>
                      <a data-toggle='modal' data-target='#edit-pengguna".$key->iduser."' class='btn btn-warning btn-sm' data-popup='tooltip' data-placement='top' title='Edit Data'><i class='glyphicon glyphicon-edit'> Edit</i>
                      </a>
                    </div></td>";
                echo "<td style='text-align: center'>
                      <a href='".base_url('backend/pengguna/hapuspengguna/'.$key->iduser)."' class='btn btn-danger btn-sm'><i class='glyphicon glyphicon-trash'> Hapus</i>
                      </a>
                    </td>";
                echo "</tr>";
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

        <a href="#" data-toggle="modal" data-target="#tambah-pengguna" class="btn-info btn-sm"><i class="glyphicon glyphicon-plus"> Tambah</i></a>

      </div>
      <!-- /.box-body -->

      <!-- MODAL ADD -->
      <div id="tambah-pengguna" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <form action="<?php echo site_url('backend/pengguna/addpengguna'); ?>" method="post" role="form" enctype="multipart/form-data">
        <div class="modal-content">
          <div class="modal-header bg-primary">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="exampleModalLabel">Tambah Data</h4>
          </div>
          <div class="modal-body">
            <div class="form-group row">
              <label class="col-md-2">ID User</label>
              <div class="col-md-10"><input type="text" readonly name="iduser" class="form-control" value="<?=$kodepengguna?>"></div>
            </div>
            <div class="form-group row">
              <label class="col-md-2">Nama Lengkap</label>
              <div class="col-md-10"><input type="text" name="nama" required class="form-control"></div>
            </div>
            <div class="form-group row">
              <label class="col-md-2">Username</label>
              <div class="col-md-10"><input type="text" name="user" required class="form-control"></div>
            </div>
            <div class="form-group row">
              <label class="col-md-2">Password</label>
              <div class="col-md-10"><input type="password" name="pass" required class="form-control"></div>
            </div>
            <div class="form-group row">
              <label class="col-md-2">Level</label>
              <div class="col-md-10"><select name="level" class="form-control">
                <option value="Super Admin">Super Admin</option>
                <option value="Administrator">Administrator</option>
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

    <?php $no=0; foreach($penggunadata as $row): $no++; ?>
      <div id="edit-pengguna<?=$row->iduser;?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <form action="<?php echo site_url('backend/pengguna/editpengguna'); ?>" method="post" enctype="multipart/form-data">
          <div class="modal-content">
          <div class="modal-header bg-primary">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="exampleModalLabel">Edit Data</h4>
          </div>
          <div class="modal-body">
            <input type="hidden" value="<?=$row->iduser;?>" name="id_user" class="form-control" >
            <div class="form-group row">
              <label class='col-md-2'>Nama Lengkap</label>
              <div class='col-md-10'><input type="text" name="nama" value="<?=$row->namalengkap;?>" required class="form-control" ></div>
            </div>
            <div class="form-group row">
              <label class='col-md-2'>Username</label>
              <div class='col-md-10'><input type="text" name="user" class="form-control" value="<?=$row->u ?>" ></div>
            </div>
            <div class="form-group row">
              <label class='col-md-2'>Ubah Password</label>
              <div class='col-md-10'><input type="password" name="pass" value="<?=$row->p?>" required class="form-control" ></div>
            </div>
            <div class="form-group row">
              <label class='col-md-2'>Level</label>
              <div class='col-md-10'><select name="level" class="form-control">
                <option><?=$row->level?></option>
                <option value="Super Admin">Super Admin</option>
                <option value="Administrator">Administrator</option>
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