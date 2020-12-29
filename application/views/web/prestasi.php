
	<!-- breadcrumb -->
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				<a href="<?= base_url() ?>">Home</a>
			</li>
			<li class="breadcrumb-item active" aria-current="page">Prestasi</li>
		</ol>
	</nav>
	<!-- breadcrumb -->
	<!-- //banner -->

	<!-- course-->
	<div class="course-w3ls py-5">
		<div class="container py-xl-5 py-lg-3">
			<h3 class="title text-capitalize font-weight-light text-dark text-center mb-5">
			<span class="font-weight-bold">prestasi</span>
			</h3>
			<?php 
			$i = 1;
			foreach ($data->result() as $row){
			if ($i % 2 == 1 ) {
			?>
			<div class="row cource-list-agile pt-md-4">
				<div class="col-lg-7 agile-course-main">
					<div class="w3ls-cource-first">
						<img src="<?= base_url('assets/web/images/1.png') ?>" alt="" class="img-fluid img-poiscour mx-auto d-block mt-2"></img>
						<div class="px-md-5 px-4  pb-md-5 pb-4">
							<h3 class="text-dark"><?= $row->nm_prestasi ?></h3>
							<p class="mt-3 mb-4 pr-lg-5"><?= $row->deskripsi ?></p>
							<ul class="list-unstyled text-capitalize">
								<li>
									<i class="fas fa-calendar-alt mr-3"></i><?= $row->tgl_input ?>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-lg-5 agile-course-main-2 mt-4">
					<img src="<?= base_url('assets/upload/prestasi/').$row->gambar ?>" alt="" height="200" class="img-fluid">
				</div>
			</div>
			<?php
			 }else{
			?>
			<div class="row cource-list-agile cource-list-agile-2">
				<div class="col-lg-5 agile-course-main-3 mt-4">
					<img src="<?= base_url('assets/upload/prestasi/').$row->gambar ?>" height="200" alt="" class="img-fluid">
				</div>
				<div class="col-lg-7 agile-course-main text-right">
					<div class="w3ls-cource-first">
						<img src="<?= base_url() ?>assets/web/images/2.png" alt="" class="img-fluid img-poiscour mx-auto d-block mt-2"></img>
						<div class="px-md-5 px-4  pb-md-5 pb-4">
							<h3 class="text-dark"><?= $row->nm_prestasi ?></h3>
							<p class="mt-3 mb-4 pl-lg-4"><?= $row->deskripsi ?></p>
							<ul class="list-unstyled text-capitalize">
								<li>
									<i class="fas fa-calendar-alt mr-3"></i><?= $row->tgl_input ?>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<?php
			 }
			?>
			<?php 
			$i++;
			}
			?>
			<nav aria-label="Page navigation example">
						<ul class="pagination mt-5">
							<?php echo $pagination; ?>
					</ul>
			</nav>
		</div>
	</div>
	<!-- //course-->