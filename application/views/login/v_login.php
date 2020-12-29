<div class="login-box">
  <div class="login-logo">
    <?php 
      if ($mod == 'siswa') { ?>
        <a href="<?=site_url('backend/login/siswa'); ?>"><b><img src="<?=base_url(); ?>assets/logo.png" height="200" width="200"></a>
      <?php } else { ?>
        <a href="<?=site_url('backend/login'); ?>"><b><img src="<?=base_url(); ?>assets/auth/person.png" height="200" width="200"></a>
      <?php }
      
     ?>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <?php echo form_open(base_url().'backend/login/aksi_login'); ?>
    <?php if(validation_errors()){?>
      <b><?php echo validation_errors()?></b>
    <?php }?>
     <?php 
          $data=$this->session->flashdata('salah');
          $data1 = $this->session->flashdata('sukses');
          if($data!=""){ ?>
            <div id="notifikasi" class="alert alert-danger"><strong> Salah ! </strong> <?=$data;?></div>
     <?php } ?>
		<div class="form-group has-feedback">
      <input type="text" name="username" class="form-control" placeholder="username" autofocus tabindex="1">
      <span class="glyphicon glyphicon-user form-control-feedback"></span>
    </div>
    <div class="form-group has-feedback">
      <input type="password" name="password" class="form-control" placeholder="password">
      <span class="glyphicon glyphicon-lock form-control-feedback"></span>
    </div>
		<div class="row">
      <!-- /.col -->
      <div class="col-xs-12">
        <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        <div style="text-align: center; margin-top: 5px"><a href="<?php echo base_url()?>">Kembali</a></div>
      </div>
      <!-- /.col -->
    </div>
    <?php echo form_close(); ?>
  </div>
</div>