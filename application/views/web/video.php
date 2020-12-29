
	<!-- breadcrumb -->
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				<a href="<?= base_url() ?>">Home</a>
			</li>
			<li class="breadcrumb-item active" aria-current="page">Video</li>
		</ol>
	</nav>
	<!-- breadcrumb -->
	<!-- //banner -->

	<!-- gallery -->
	<section class="gallery py-5">
		<div class="container py-xl-5 py-lg-3">
			<h3 class="title text-capitalize font-weight-light text-dark text-center mb-5">
				<span class="font-weight-bold">Video</span>
			</h3>
			<div class="inner-sec pt-md-4">
				<div class="row proj_gallery_grid">
					<?php foreach ($video as $vd): ?>
					<div class="col-sm-6 section_1_gallery_grid">
							<div class="section_1_gallery_grid1">
								<?= $vd->link_video ?>
								<div class="proj_gallery_grid1_pos">
									<h3><?= $vd->title ?></h3>
								</div>
							</div>
						</a>
					</div>
					<?php endforeach ?>
				</div>
			</div>
		</div>
	</section>
	<!--//gallery-->
