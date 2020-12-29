<?php if($jrs){?>
	<!-- course details -->
	<div class="details-w3l py-5">
		<div class="container py-xl-5 py-lg-3">
			<h3 class="title text-capitalize font-weight-light text-dark text-center mb-5">
				<span class="font-weight-bold"><?php echo $jrs->nm_jurusan?></span>
			</h3>

			<div class="row inner_sec_info pt-md-4">
				<!-- left side -->
				<div class="col-lg-12 single-left">
					<div class="single-left1">
						<h5 class="card-title">
							<center><img width="500" height="500" src="<?= base_url('assets/upload/jurusan/').$jrs->gambar ?>"></center>
						</h5>
						<p><?php echo $jrs->deskripsi?></p>
					</div>	
				</div>
				<!-- //left side -->
			</div>
		</div>
	</div>
	<!-- //course details -->
<?php }else{ show_404(); }?>