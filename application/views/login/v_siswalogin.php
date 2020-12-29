<!-- breadcrumb -->
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				<a href="<?php echo base_url() ?>">Home</a>
			</li>
			<li class="breadcrumb-item active" aria-current="page">Login Siswa </li>
		</ol>
	</nav>
	<!-- breadcrumb -->
	<!-- //banner -->
	<!-- login -->
	<div class="login-w3ls py-5">
		<div class="container py-xl-5 py-lg-3">
			<h3 class="title text-capitalize font-weight-light text-dark text-center mb-5">Login
				<span class="font-weight-bold">Sekarang</span>
			</h3>
			<!-- content -->
			<div class="sub-main-w3 pt-md-4">
				<form action="<?php echo base_url('login_siswa/cek_login')?>" method="post">
				<div class="center ">
				   <?php 
				      if ($mod == 'siswa') { ?>
				        <a href="<?=site_url('backend/login/siswa'); ?>"><b><img style="border-radius: 50%" " src="<?=base_url(); ?>assets/logo.png" height="200" width="200"></a>
				      <?php } else { ?>
				        <a href="<?=site_url('backend/login'); ?>"><b><img src="<?=base_url(); ?>assets/auth/person.png" height="200" width="200"></a>
				      <?php }
				      
				     ?>
				  </div>
				<p style="color: white; text-align: center;">Silahkan Masukkan No Registrasi dan Password yang telah diberikan di tahap sebelumnya.</p>
					<div class="form-style-agile form-group">
						<label>
							Username
							<i class="fas fa-user"></i>
						</label>
						<input placeholder="No registrasi" class="form-control" name="noreg" type="text" required="">
					</div>
					<div class="form-style-agile form-group">
						<label>
							Password
							<i class="fas fa-unlock-alt"></i>
						</label>
						<input placeholder="Password" class="form-control" name="password" type="password" required="">
					</div>
					<input type="submit" value="Log In">
					<p class="text-center dont-do mt-4 text-white">Belum punya akun ?
						<a href="<?php echo base_url('pendaftaran')?>" class="text-white  font-weight-bold">
							Daftar Sekarang</a>
					</p>
				</form>
			</div>
			<!-- //content -->
		</div>
	</div>
	<!-- //login -->

</body>

</html>