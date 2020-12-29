	<!-- single -->
	<?php if($baca){?>
	<div class="single-w3l py-5">
		<div class="container py-xl-5 py-lg-3">
			<h3 class="title text-capitalize font-weight-light text-dark text-center mb-5">berita
			</h3>
			<div class="row inner_sec_info pt-md-4">
				<!-- left side -->
				<div class="col-lg-8 single-left">
					
					<div class="single-left1">
						<img src="<?php echo base_url()?>/assets/upload/berita/<?php echo $baca->gambar ?>" alt=" " class="img-fluid" />
						<h6 class="blog-first text-dark text-center my-4">
							<i class="fas fa-calendar-alt mr-2"><?php echo $baca->tgl_input ?></i>
						</h6>
						<h5 class="card-title">
							<a href="" class="text-dark"><?php echo $baca->judul ?></a>
						</h5>
						<p><?php echo $baca->konten ?></p>
						<div>
						<p><b>Tinggalkan Komentar :</b></p>
						<div class="fb-comments" data-href="https://developers.facebook.com/docs/plugins/comments#configurator" data-numposts="5"></div>
					   </div>
					</div>
				</div>
				<!-- //left side -->
				<!-- right side -->
				<div class="col-lg-4 event-right mt-lg-0 mt-sm-5 mt-4">
					<div class="event-right1">
						<div class="search1">
							<form class="form-inline" action="https://www.google.com/cse" method="get" target="_blank">
								<input class="form-control rounded-0 mr-sm-2" type="search" placeholder="Search Here" aria-label="Search" id="cari" name="q" required>
								<input name='cx' type='hidden' value='005234309849548494208:xdysvmez_wk'/>
								<button class="btn bg-dark text-white rounded-0 mt-3" type="submit" target="_blank">Search</button>
							</form>
						</div>
						<div class="posts p-4 border">
							<h3 class="blog-title text-dark">Berita Terbaru</h3>
							<div class="posts-grids">
								<?php foreach($bterbaru as $row){?>
								<div class="row posts-grid mt-4">
									<div class="col-lg-4 col-md-3 col-4 posts-grid-left pr-0">
										<a href="<?php echo base_url()?>detail/baca/<?php echo $row->slug?>">
											<img src="<?php echo base_url()?>/assets/upload/berita/<?php echo $row->gambar ?>" alt=" " class="img-fluid" />
										</a>
									</div>
									<div class="col-lg-8 col-md-7 col-8 posts-grid-right mt-lg-0 mt-md-5 mt-sm-4">
										<h4>
											<a href="<?php echo base_url()?>detail/baca/<?php echo $row->slug?>" class="text-dark"><?php echo $row->judul?></a>
										</h4>
										<ul class="wthree_blog_events_list mt-2">
											<li class="mr-2 text-dark">
												<i class="fa fa-calendar mr-2" aria-hidden="true"></i><?php echo $row->tgl_input ?></li>
										</ul>
									</div>
								</div>
							<?php }?>
							</div>
						</div>
						<div class="tags mt-4 p-4 border">
							<h3 class="blog-title text-dark">kategori</h3>
							<ul class="mt-4">
								<?php foreach($kategori as $row){?>
								<li>
									<a href="<?php echo base_url()?>detail/kategori/<?php echo $row->slug_kat?>" class="text-dark border"><?php echo $row->kategori?></a>
								</li>
							<?php }?>
							</ul>
						</div>
					</div>
				</div>
				<!-- //right side -->
			</div>
		</div>
	</div>
	<!-- //blog -->
	 <?php }else{ show_404();}?>