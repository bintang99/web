
	<!-- breadcrumb -->
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				<a href="<?= base_url() ?>">Home</a>
			</li>
			<li class="breadcrumb-item active" aria-current="page">Galeri</li>
		</ol>
	</nav>
	<!-- breadcrumb -->
	<!-- //banner -->

	<!-- gallery -->
	<div class="team py-5">
		<div class="container py-xl-5 py-lg-3">
			<h3 class="title text-capitalize font-weight-light text-dark text-center mb-5">Galeri
				<span class="font-weight-bold">Foto</span>
			</h3>
			<div class="row inst-grids pt-md-4">
				<?php foreach ($galeri as $glr): ?>
				<div class="col-md-3 col-6 blog-gd-w3ls">
					<img width="100%" height="250" src="<?= base_url('assets/upload/galeri/').$glr->gambar ?>" alt=" " class="img-fluid">
					<div class="date-w3">
						<h4><?= $glr->kategori ?></h4>
						<p class="para-w3-agile"></p>
						<div class="agileinfo-social-grids">
							<ul>
								<li>
									<a href="<?= base_url('Gallery/lihatgaleri/'.$glr->kategori)?>">
										<i class="fa fa-archive"></i> Lihat Galeri
									</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<?php endforeach ?>
			</div>
		</div>
	</div>
	<!--//gallery-->
