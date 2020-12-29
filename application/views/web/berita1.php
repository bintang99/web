
	<!-- blog -->
	<div class="blog-w3l py-5">
		<div class="container py-xl-5 py-lg-3">
			<h3 class="title text-capitalize font-weight-light text-dark text-center mb-5">Berita
				<span class="font-weight-bold">Terbaru</span>
			</h3>
			<div class="row blog-content pt-md-4">
				<!-- left side -->
				<div class="col-lg-8 blog_section">
					<?php foreach($data->result() as $row){?>
					<div class="card my-4">
						<img class="card-img-top" src="<?php echo base_url()?>/assets/upload/berita/<?php echo $row->gambar?>" alt="">
						<div class="card-body text-center">
							<h6 class="blog-first text-dark">
								<i class="far fa-user mr-2"></i><?php echo $row->iduser?>
							</h6>
							<ul class="blog_list my-3">
								<li><?php echo $row->tgl_input?></li>
							</ul>
							<h5 class="card-title">
								<a href="<?php echo base_url()?>detail/baca/<?php echo $row->slug?>" class="text-dark"><?php echo $row->judul?></a>
							</h5>
							<p class="card-text"><?php echo substr($row->konten, 0, 50)?></p>
							<a href="<?php echo base_url()?>detail/baca/<?php echo $row->slug?>" class="btn btn-primary blog-button mt-3">Read More</a>
						</div>
					</div>
					<?php }?>
					<nav aria-label="Page navigation example">
						<ul class="pagination mt-5">
							<?php echo $pagination; ?>
						</ul>
					</nav>
					<!-- //left side -->
				</div>
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
							<h3 class="blog-title text-dark">Berita Lainya</h3>
							<div class="posts-grids">
								<?php foreach($random as $row){?>
								<div class="row posts-grid mt-4">
									<div class="col-lg-4 col-md-3 col-4 posts-grid-left pr-0">
										
											<img src="<?php echo base_url()?>/assets/upload/berita/<?php echo $row->gambar?>" alt=" " class="img-fluid" />
									
									</div>
									<div class="col-lg-8 col-md-7 col-8 posts-grid-right mt-lg-0 mt-md-5 mt-sm-4">
										<h4>
											<a href="<?php echo base_url()?>detail/baca/<?php echo $row->slug?>" class="text-dark"><?php echo $row->judul?></a>
										</h4>
										<ul class="wthree_blog_events_list mt-2">
											<li class="mr-2 text-dark">
												<i class="fa fa-calendar mr-2" aria-hidden="true"></i><?php echo $row->tgl_input?></li>
											<li>
												<i class="fa fa-user" aria-hidden="true"></i>
												<a  class="text-dark ml-2"><?php echo $row->iduser?></a>
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
	<!-- //blog -->