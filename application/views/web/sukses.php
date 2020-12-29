
	<!-- breadcrumb -->
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				<a href="<?= base_url() ?>">Home</a>
			</li>
			<li class="breadcrumb-item active" aria-current="page">PSB Online <?php echo date('Y') ?></li>
		</ol>
	</nav>
	<!-- breadcrumb -->
	<!-- //banner -->

	<!-- course details -->
	<div class="details-w3l py-5">
		<div class="container py-xl-5 py-lg-3">
			<h3 class="title text-capitalize font-weight-light text-dark text-center mb-5">
				<span class="font-weight-bold">PSB Online <?php echo date('Y') ?></span>
			</h3>

			<div class="row inner_sec_info pt-md-4">
				<!-- left side -->
				<div class="col-lg-9 single-left">
					<div class="single-left1">
						<div class="w3ls-cource-first">
							<img src="<?= base_url('assets/web/images/1.png') ?>" alt="" class="img-fluid img-poiscour mx-auto d-block mt-2"></img>
							<div class="px-md-5 px-4  pb-md-5 pb-4">
								<h3 class="text-dark">Sukses</h3>
								<?php 
									if ($daftar) {
										foreach ($daftar as $key ) { ?>
											<p>Selamat anda Berhasil melakukan Pendaftaran Tahap Awal. <b>No Registrasi anda</b> adalah : <b><?php echo $key->no_reg ?></b> dan <b>Password anda</b> adalah : <b><?php echo $key->nisn ?></b>. Simpan baik- baik No Registrasi dan Password tersebut. Selanjutnya Login menggunakan No Registrasi dan Password yang sudah diberikan.</p>
											<p>Klik disini untuk <a href="<?php echo base_url('login_siswa') ?>" class="btn btn-primary">Login</a></p>
								<?php
										}
									}
								 ?>
								
							</div>
						</div>
					</div>
					
				</div>
				<!-- //left side -->
			</div>
		</div>
	</div>
	<!-- //course details -->