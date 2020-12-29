
	<!-- breadcrumb -->
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				<a href="<?php echo base_url() ?>">Home</a>
			</li>
			<li class="breadcrumb-item active" aria-current="page">Galeri Tefa</li>
		</ol>
	</nav>
	<!-- breadcrumb -->
	<!-- //banner -->

	<!-- gallery -->
	<section class="gallery py-5">
		<div class="container py-xl-5 py-lg-3">
			<h3 class="title text-capitalize font-weight-light text-dark text-center mb-5">
				<span class="font-weight-bold"><?php echo $judul ?></span>
			</h3>
			<div class="inner-sec pt-md-4">
				<div class="row proj_gallery_grid">
					<?php foreach ($lihat as $glr): ?>
					<div class="col-sm-4 section_1_gallery_grid">
						<a href="<?= base_url('assets/upload/tefa_galeri/').$glr->foto ?>">
							<div class="section_1_gallery_grid1">
								<img src="<?= base_url('assets/upload/tefa_galeri/').$glr->foto ?>" alt="" class="img-fluid" />
								<div class="proj_gallery_grid1_pos">
									<h3><?= $glr->des ?></h3>
								</div>
							</div>
						</a>
					</div>
					<?php endforeach ?>
					<div class="clearfix"> </div>
				</div>
			</div>
		</div>
	</section>
	<!--//gallery-->
