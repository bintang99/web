	
	<!-- about -->
	
	<div class="about py-5">
		<div class="container py-xl-5 py-lg-3">
			<h3 class="title text-capitalize font-weight-light text-dark text-center mb-5">Welcome to
				<span class="font-weight-bold"><?= $set['nama'] ?></span>
			</h3>
			<div class="row pt-md-4">
				<div class="col-lg-6 about_right">
					<h3 class="text-capitalize text-right font-weight-light font-italic">Sambutan Kepala
						<span class="font-weight-bold"><?= $set['nama'] ?></span>
					</h3>
					<p class="text-right my-4 pr-4 border-right">
					<?= $set['sambutan'] ?>
					</p>
				</div>
				<div class="col-lg-6 left-img-agikes mt-lg-0 mt-sm-4 mt-3 text-right">
					<img src="<?= base_url('assets/') ?><?= $set['foto'] ?>" alt="" class="img-fluid" />
					<h2 style="text-align:center; border-bottom:2px solid red;border-left:2px solid red;border-right:2px solid red;">
						<?= $set['kepsek'] ?>
					</h2>
				</div>
			</div>
		</div>
	</div>
	<!-- //about -->

	<!-- Stats-->
	<div class="stats-w3layouts py-5">
		<div class="container py-xl-5 py-lg-3">
			<div class="stats-info">
				<div class="row">
					<div class="col-md-3 col-6 stats-grid-w3-agile text-center px-xl-5 px-3">
						<div class='numscroller font-weight-bold my-2' data-slno='1' data-min='0' data-max='<?= $jmljurusan ?>' data-delay='.5' data-increment="1"><?= $jmljurusan ?></div>
						<p class="text-uppercase text-white border-top pt-4 mt-3">Program Keahlian</p>
					</div>
					<div class="col-md-3 col-6 stats-grid-w3-agile text-center  px-xl-5 px-3">
						<div class='numscroller font-weight-bold my-2' data-slno='1' data-min='0' data-max='<?= $jmlguru ?>' data-delay='.5' data-increment="1"><?= $jmlguru ?></div>
						<p class="text-uppercase text-white border-top pt-4 mt-3">Tenaga Pengajar</p>
					</div>
					<div class="col-md-3 col-6 stats-grid-w3-agile text-center mt-md-0 mt-5  px-xl-5 px-3">
						<div class='numscroller font-weight-bold my-2' data-slno='1' data-min='0' data-max='<?= $jmlprestasi ?>' data-delay='.5' data-increment="1"><?= $jmlprestasi ?></div>
						<p class="text-uppercase text-white border-top pt-4 mt-3">Prestasi</p>
					</div>
					<div class="col-md-3 col-6 stats-grid-w3-agile text-center mt-md-0 mt-5  px-xl-5 px-3">
						<div class='numscroller font-weight-bold my-2' data-slno='1' data-min='0' data-max='<?= $jmlgaleri ?>' data-delay='.5' data-increment="1"><?= $jmlgaleri ?></div>
						<p class="text-uppercase text-white border-top pt-4 mt-3">Galeri</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- //Stats -->

	<!-- video and events -->
	<div class="video-choose-agile py-5">
		<div class="container py-xl-5 py-lg-3">
			<div class="row">
				<div class="col-lg-7 video">
					<h3 class="title text-capitalize font-weight-light text-dark text-center mb-5">
						<span class="font-weight-bold">School TV</span>
					</h3>
					<iframe width="560" height="315" src="<?php echo $streaming->link; ?>" frameborder="0" allowfullscreen></iframe>
				</div>
				<div class="col-lg-5 events">
					<h3 class="title text-capitalize font-weight-light text-dark text-center mb-5">
						Video Lainya
					</h3>
					<?php foreach ($video as $vd): ?>
					<div class="events-w3ls">
						<div class="d-flex">
							<div class="col-sm-2 col-3 events-up p-3 text-center">
								<h5 class="text-white font-weight-bold">
									<span class="border-top font-weight-light pt-2 mt-2"><?= (int) substr($vd->tgl, 8) ?></span>
								</h5>
							</div>
							<div class="col-sm-10 col-9 events-right">
								<h4 class="text-dark"><?= $vd->title ?> </h4>
								<ul class="list-unstyled">
									<li class="my-2">
										<a href="https://www.youtube.com/channel/UCD-l2DV1h2J_WNr3makYOuw">Pasim Chanel</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<?php endforeach ?>
				</div>
			</div>
		</div>
	</div>
	<!-- //video and events -->

	<!-- what we do -->
	<div class="why-choose-agile py-5">
		<div class="container py-xl-5 py-lg-3">
			<h3 class="title text-capitalize font-weight-light text-white text-center mb-5">
				<span class="font-weight-bold">Program Keahlian</span>
			</h3>
			<div class="row agileits-w3layouts-grid pt-md-4">
				<?php foreach ($jurusan as $jrs): ?>
				<div class="col-lg-4 services-agile-1">
					<div class="row wthree_agile_us">
						<div class="col-lg-3 col-md-2 col-3  agile-why-text">
							<div class="wthree_features_grid text-center p-3 border rounded">
								<i><img height="30" width="30" src="<?= base_url('assets/upload/jurusan/').$jrs->gambar ?>"></i>
							</div>
						</div>
						<div class="col-9 agile-why-text-2">
							<h4 class="text-capitalize text-white font-weight-bold mb-3"><?= $jrs->nm_jurusan ?></h4>
							<p><?= substr($jrs->deskripsi, 0,50) ?>...</p>
							<a class="btn mt-3 service-button p-0" href="<?= base_url('Jurusan/detail/').$jrs->slug ?>" role="button">Read More
								<i class="fas fa-long-arrow-alt-right ml-1"></i>
							</a>
						</div>
					</div>
				</div>
				<?php endforeach ?>
			</div>
		</div>
	</div>
	<!-- //what we do -->

		<!-- news -->
	<div class="news-section py-5">
		<div class="container py-xl-5 py-lg-3">
			<h3 class="title text-capitalize font-weight-light text-dark text-center mb-5">
				<span class="font-weight-bold">Berita</span> Terbaru
			</h3>
			<div class="row news-grids-w3l pt-md-4">
				<?php foreach ($berita as $brt): ?>
				<div class="col-md-4 news-grid">
					<a href="<?php echo base_url()?>detail/baca/<?php echo $brt->slug?>">
						<img width="100%" height='250' src="<?= base_url('assets/upload/berita/').$brt->gambar ?>" class="img-fluid" alt=""  />
					</a>
					<div class="news-text">
						<div class="news-events-agile event-colo3 py-2 px-3">
							<h5 class="float-left">
								<a href="<?php echo base_url()?>detail/baca/<?php echo $brt->slug?>" class="text-white"><?= $brt->tgl_input ?></a>
							</h5>
							<div class="post-img float-right">
								<ul>
									<li>
										<a href="<?php echo base_url()?>detail/baca/<?php echo $brt->slug?>">
											<i class=" text-white"><?= $brt->kategori ?></i>
										</a>
									</li>
								</ul>
							</div>
							<div class="clearfix"></div>
						</div>
						<div class="detail-bottom">
							<h6 class="my-3">
								<a href="<?php echo base_url()?>detail/baca/<?php echo $brt->slug?>" class="text-dark">
									<?= $brt->judul ?>
								</a>
							</h6>
							<?=  substr($brt->konten, 0,100)."...." ?>
						</div>
					</div>
				</div>
				<?php endforeach ?>
			</div>
		</div>
	</div>
	<!-- //news -->

	<!-- testimonials -->
	<div class="testimonials py-5">
		<div class="container py-xl-5 py-lg-3">
			<h3 class="title text-capitalize font-weight-light text-white text-center mb-5">
				<span class="font-weight-bold">Tenaga Pengajar</span>
			</h3>
			<div class="mis-stage">
				<!-- The element to select and apply miSlider to - the class is optional -->
				<ol class="mis-slider">
					<!-- The slider element - the class is optional -->
					<?php foreach ($guru as $gr): ?>
					<li class="mis-slide">
						<!-- A slide element - the class is optional -->
						<a href="#" class="mis-container">
							<!-- A slide container - this element is optional, if absent the plugin adds it automatically -->
							<figure>
								<!-- Slide content - whatever you want -->
								<img src="<?= base_url('assets/upload/guru/').$gr->foto ?>" alt=" " class="img-fluid rounded-circle" />
								<figcaption><?= $gr->nm_guru ?>
									<span><?= $gr->mapel ?></span>
								</figcaption>
							</figure>
						</a>
					</li>
					<?php endforeach ?>
				</ol>
			</div>
		</div>
	</div>
	<!-- //testimonials -->