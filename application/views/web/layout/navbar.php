<!-- navigation -->
		<div class="navigation-w3ls">
			<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-nav">
				<button class="navbar-toggler mx-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
				 aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse text-center" id="navbarSupportedContent">
					<ul class="navbar-nav justify-content-center">
						<li class="nav-item active">
							<a class="nav-link text-white" href="<?= base_url() ?>">Home
								<span class="sr-only">(current)</span>
							</a>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle text-white" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Profile
							</a>
							<div class="dropdown-menu">
							    <?php foreach($profil as $row){?>
								<a class="dropdown-item" href="<?php echo base_url()?>profile/detail/<?php echo $row->slug?>"><?php echo $row->judul?></a>
								<?php }?>
								<a class="dropdown-item" href="<?= base_url('prestasi') ?>">Prestasi</a>
							</div>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle text-white" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Program Keahlian
							</a>
							<div class="dropdown-menu">
								<?php foreach ($jurusan as $jrs): ?>
								<a class="dropdown-item" href="<?= base_url('Jurusan/detail/').$jrs->slug ?>"><?= $jrs->nm_jurusan ?></a>				
								<?php endforeach ?>
							</div>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle text-white" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Teaching Factory
							</a>
							<div class="dropdown-menu">
								<?php foreach ($tefa as $tf): ?>
									<a class="dropdown-item" href="<?= base_url('tefa/detail/').$tf->slug ?>"><?= $tf->judul ?></a>	
								<?php endforeach ?>
								<a class="dropdown-item" href="<?= base_url('tefa/kegiatan/') ?>">Kegiatan</a>
								<a class="dropdown-item" href="<?= base_url('tefa/gallery/') ?>">Gallery</a>
							</div>
						</li>
						<li class="nav-item">
							<a class="nav-link text-white" href="<?php echo base_url()?>video/streaming">PASIM TV</a>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle text-white" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Gallery
							</a>
							<div class="dropdown-menu">
								<a class="dropdown-item" href="<?php echo base_url('gallery')?>">Gallery</a>
								<a class="dropdown-item" href="<?php echo base_url('video')?>">Video</a>
							</div>
						</li>
						<li class="nav-item">
							<a class="nav-link text-white" href="<?php echo base_url()?>pendaftaran">PPDB</a>
						</li>
						<li class="nav-item">
							<a class="nav-link text-white" href="<?php echo base_url()?>kontak">Kontak</a>
						</li>
					</ul>
				</div>
			</nav>
		</div>
		<!-- //navigation -->
	</div>
	<!-- //banner --