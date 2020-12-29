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
    <p>Silahkan Masukkan No Registrasi dan Password yang telah diberikan di tahap sebelumnya.</p>
    <?php echo form_open(base_url().'login_siswa/cek_login'); ?>
		<div class="form-group has-feedback">
      <input type="text" name="noreg" class="form-control" placeholder="No Registrasi" autofocus tabindex="1">
      <span class="glyphicon glyphicon-user form-control-feedback"></span>
    </div>
    <div class="form-group has-feedback">
      <input type="password" name="password" class="form-control" placeholder="Password">
      <span class="glyphicon glyphicon-lock form-control-feedback"></span>
    </div>
		<div class="row">
      <!-- /.col -->
      <div class="col-xs-12">
        <button type="submit" class="btn btn-primary btn-block btn-flat">Log In</button>
        <div style="text-align: center; margin-top: 5px"><a href="<?php echo base_url()?>">Kembali</a></div>
      </div>
      <!-- /.col -->
    </div>
    <?php echo form_close(); ?>
  </div>
</div>