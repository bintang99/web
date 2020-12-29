
	<!-- banner -->
	<div class="banner-agile">
		<ul class="slider">
			<?php $i=0; foreach ($slide as $key){
				if ($i == 0) {
					$aktif= "class='active'";
				}else{
					$aktif= "";
				}
			?>

			<li <?= $aktif ?>>
				<div class="banner-w3ls-1" style="background: url(<?= base_url('assets/upload/slide/').$key->gambar ?>) no-repeat center; background-size: cover;background-attachment: fixed;">
				</div>
			</li>

			<?php 
				$i++; 
				}
			?>
		</ul>
		<ul class="pager">
			<?php 
				$i=0; 
				foreach ($slide as $key){
					if ($i == 0) {
						$aktif= "class='active'";
					}else{
						$aktif= "";
					}
			?>
			<li data-index="<?= $i ?>" <?= $aktif ?>></li>
			<?php 
				$i++; 
				}
			?>
		</ul>
		<div class="banner-text-posi-w3ls">
			<div class="banner-text-whtree">
				<h3 class="text-capitalize text-white p-4">selamat datang di
					<b><?= $set['nama'] ?></b>
				</h3>
				<p class="px-4 py-3 text-dark">
						<?= $set['moto'] ?>
				</p>
				
			</div>
		</div>