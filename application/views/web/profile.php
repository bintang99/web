<?php if($baca){?>
	<!-- course details -->
	<div class="details-w3l py-5">
		<div class="container py-xl-5 py-lg-3">
			<h3 class="title text-capitalize font-weight-light text-dark text-center mb-5">
				<span class="font-weight-bold"><?php echo $baca->judul?></span>
			</h3>

			<div class="row inner_sec_info pt-md-4">
				<!-- left side -->
				<div class="col-lg-8 single-left">
					<div class="single-left1">
						<h5 class="card-title">
							<a href="" class="text-dark"><?php echo $baca->judul?></a>
						</h5>
						<p><?php echo $baca->deskripsi?></p>
					</div>
					<div class="social-details p-4 my-5 border">
						<h5>You Can Share it:</h5>
						<ul class="list-unstyled social-details-icons my-3">
							<li>
								<a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo base_url()?>profile/detail/<?php echo $baca->slug?>" target="_blank" class="fab fa-facebook-f bg-dark text-white text-center rounded-circle"> </a>
							</li>
							<li class="mx-2">
								<a href="https://twitter.com/home?status=<?php echo base_url()?>profile/detail/<?php echo $baca->slug?>" target="_blank" class="fab fa-twitter bg-dark text-white text-center rounded-circle"> </a>
							</li>
							<li>
								<a href="https://plus.google.com/share?url=<?php echo base_url()?>profile/detail/<?php echo $baca->slug?>" class="fab fa-google-plus-g bg-dark text-white text-center rounded-circle"> </a>
							</li>
							</li>
						</ul>
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
								<?php foreach($berita as $row){?>
								<div class="row posts-grid mt-4">
									<div class="col-lg-4 col-md-3 col-4 posts-grid-left pr-0">
										<a href="">
											<img src="<?php echo base_url()?>/assets/upload/berita/<?php echo $row->gambar?>" alt=" " class="img-fluid" />
										</a>
									</div>
									<div class="col-lg-8 col-md-7 col-8 posts-grid-right mt-lg-0 mt-md-5 mt-sm-4">
										<h4>
											<a href="<?php echo base_url()?>detail/baca/<?php echo $row->slug;?>" class="text-dark"><?php echo $row->judul;?></a>
										</h4>
										<ul class="wthree_blog_events_list mt-2">
											<li class="mr-2 text-dark">
												<i class="far fa-calendar-alt  mr-2"></i><?php echo $row->tgl_input;?>
											</li>
										</ul>
									</div>
								</div>
							<?php }?>
							</div>
						</div>
					</div>
				</div>
				<!-- //right side -->
			</div>
		</div>
	</div>
	<!-- //course details -->
<?php }else{ show_404(); }?>