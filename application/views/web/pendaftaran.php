
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
				<div class="col-lg-7 single-left">
					<div class="single-left1">
						<div class="w3ls-cource-first">
							<img src="<?= base_url('assets/web/images/1.png') ?>" alt="" class="img-fluid img-poiscour mx-auto d-block mt-2"></img>
							<div class="px-md-5 px-4  pb-md-5 pb-4">
								<div class="row">
									<div class="col-lg-6">
										<img src="<?= base_url('assets/psb.jpg') ?>" alt="" height="200" class="img-fluid">
									</div>
									<div class="col-lg-6">
										<h5 class="text-dark">PENERIMAAN SISWA BARU</h5>
										<p>Penerimaan siswa baru <b>SMK PASIM PLUS Sukabumi</b> dilakukan secara online di halaman website ini.</p>
									</div>
								</div><br>
								<p>Untuk calon siswa baru silahkan masukkan data yang tertera di samping untuk melakukan tahapan pendaftaran. Masukkan data calon siswa pada Form tersebut, kemudian klik Daftar. Setelah tombol Daftar di klik maka calon siswa akan mendapatkan No Pendaftaran dan Password. Simpan baik-baik No Pendaftaran dan Password tersebut, lalu klik tombol login untuk masuk ke halaman berikutnya. Lengkapi data-data yang di perlukan serta ikuti langkah-langkah selanjutnya. </p>
								<br>
								<p>Jika ada Pertanyaan mengenai <b>PSB Online SMK PASIM PLUS Sukabumi</b> Silahkan hubungi nomor berikut saat <b>jam kerja</b> : </p>
								<ul class="list-unstyled text-capitalize">
									<li>
										<i class="fas fa-phone mr-3">  (0266) 241000</i>
									</li>
								</ul>
								<br>
								<p>Atau Email kami di</p> 
								<ul class="list-unstyled text-capitalize">
									<li>
										<i class="fas fa-envelope-open mr-3"> smkpasimplus@gmail.com</i>
									</li>
								</ul>
							</div>
						</div>
					</div>
					
				</div>
				<!-- //left side -->
				<!-- right side -->
				<div class="col-lg-5 event-right mt-lg-0 mt-sm-5 mt-4">
					<div class="event-right1">
						<div class="post p-4 border">
							<h3 class="blog-title text-dark">Form Pendaftaran Siswa Baru</h3>
							<p>Lengkapi data berikut dengan benar. Data ini merupakan tahapan awal Pendaftaran Siswa Baru.</p>
							<?php if(validation_errors()){?>
								<b><?php echo validation_errors();?></b>
							<?php }?>
                           <?php echo $script_captcha; ?>
							<div class="posts-grids">
								<div class="contact-grids1 w3agile-6">
									<form action="<?php echo base_url().'pendaftaran/registrasi'; ?>" method="POST" >
										<input type="hidden" class="form-control" name="noreg" value="<?php echo $data; ?>">
										<div class="contact-form1 form-group">
											<label class="col-form-label">Nama Lengkap</label>
											<input type="text" class="form-control" name="nama" placeholder="Sesuai Ijazah Terakhir" required="">
										</div>
										<div class="contact-form1 form-group">
											<label class="col-form-label">NISN</label>
											<input type="number" class="form-control" name="nisn" placeholder="Isi NISN yang valid" required="">
										</div>
										<div class="contact-form1 form-group">
											<label class="col-form-label">Jenis Kelamin </label>
											<select name="jk" class="form-control" required="">
											<option value="">--Pilih Jenis Kelamin--</option>
											<option value="L">Laki-laki</option>
											<option value="P">Perempuan</option>
											</select>
										</div>
										<div class="contact-form1 form-group">
											<label class="col-form-label">Jurusan </label>
											<select name="jurusan" class="form-control" required="">
											<option value="">--Pilih Jurusan--</option>
											<?php foreach ($jurusan as $jrs): ?>
												<option value="<?= $jrs->id_jurusan ?>"><?= $jrs->nm_jurusan ?></option>
											<?php endforeach ?>
											</select>
										</div>
										<div class="form-group">
											<?php echo $captcha;?>
										</div>
										<div class="contact-form">
											<input type="submit" value="DAFTAR">
										</div>
									</form>
								</div>
							</div>
						</div>	
					</div>
				</div>
				<!-- //right side -->
			</div>
		</div>
	</div>
	<!-- //course details -->