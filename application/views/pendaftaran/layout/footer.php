	<!-- brands -->
	<div class="brands-w3ls py-md-5 py-4">
		<div class="container py-xl-3">
			<ul class="list-unstyled">
				<li>
					<i class="fab"><img width="50" height="50" src="<?= base_url('assets/logo.png') ?>" alt=""></i>
				</li>
				<li>
					<i class="fab fa-angrycreative"></i>
				</li>
				<li>
					<i class="fab fa-aviato"></i>
				</li>
				<li>
					<i class="fab fa-aws"></i>
				</li>
				<li>
					<i class="fab fa-cpanel"></i>
				</li>
				<li>
					<i class="fab fa-hooli"></i>
				</li>
				<li>
					<i class="fab fa-node"></i>
				</li>
			</ul>
		</div>
	</div>
	<!-- //brands -->
	
	<!-- footer -->
	<footer>
		<div class="container py-4">
			<div class="row py-xl-5 py-sm-3">
				<div class="col-lg-6 map">
					<h2 class="contact-title text-capitalize text-white font-weight-light mb-sm-4 mb-3">our
						<span class="font-weight-bold">directions</span>
					</h2>
					<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15843.170216401726!2d106.9372497!3d-6.9153881!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x4d72d756efe7c219!2sSMK+Pasim+Plus+Kota+Sukabumi!5e0!3m2!1sid!2sid!4v1538888793314" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
					<div class="conta-posi-w3ls p-4 rounded">
						<h5 class="text-white font-weight-bold mb-3">Address</h5>
						<p>Jalan Prana No.8A,  
							<span>Cikole, </span>Kota Sukabumi, Jawa Barat</p>
					</div>
				</div>
				<div class="col-lg-6 contact-agileits-w3layouts mt-lg-0 mt-4">
					<h4 class="contact-title text-capitalize text-white font-weight-light mb-sm-4 mb-3">SMK
						<span class="font-weight-bold">Pasim</span>
					</h4>
					<p class="conta-para-style border-left pl-4">
                         <!-- Histats.com  (div with counter) --><div id="histats_counter"></div>
<!-- Histats.com  START  (aync)-->
<script type="text/javascript">var _Hasync= _Hasync|| [];
_Hasync.push(['Histats.start', '1,4157606,4,10,200,40,00010000']);
_Hasync.push(['Histats.fasi', '1']);
_Hasync.push(['Histats.track_hits', '']);
(function() {
var hs = document.createElement('script'); hs.type = 'text/javascript'; hs.async = true;
hs.src = ('//s10.histats.com/js15_as.js');
(document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(hs);
})();</script>
<noscript><a href="/" target="_blank"><img  src="//sstatic1.histats.com/0.gif?4157606&101" alt="free stats" border="0"></a></noscript>
<!-- Histats.com  END  -->
					</p>
					<div class="subscribe-w3ls my-xl-5 my-4">
						<h6 class="text-white text-capitalize mb-4">subscribe our newsletter</h6>
						<form action="#" method="post" class="subscribe_form">
							<input class="form-control" type="email" name="email" placeholder="Enter your email..." required="">
							<button type="submit" class="btn btn-primary submit">Submit</button>
						</form>
					</div>
					<p class="para-agileits-w3layouts text-white">
						<i class="fas fa-map-marker pr-3"></i>Jalan Prana No.8A, Cikole, Kota Sukabumi, Jawa Barat</p>
					<p class="para-agileits-w3layouts text-white my-sm-3 my-2">
						<i class="fas fa-phone pr-3"></i>(0266) 241000</p>
					<p class="para-agileits-w3layouts">
						<i class="far fa-envelope-open pr-2"></i>
						<a href="mailto:mail@example.com" class=" text-white">smkpasimplus@gmail.com</a>
					</p>
				</div>
			</div>
		</div>
		<div class="copyright-agiles py-3">
			<div class="container">
				<div class="row">
					<p class="col-lg-8 copy-right-grids text-white text-lg-left text-center mt-lg-1">© 2018 <a href="<?php echo base_url()?>" target="_blank">SMK Pasim Plus Kota Sukabumi</a>
					</p>
					<!-- social icons -->
					<div class="social-icons text-lg-right text-center col-lg-4 mt-lg-0 mt-3">
						<ul class="list-unstyled">
							<li>
								<a href="https://www.facebook.com/PasimCreativeSchool/" target="_blank" class="fab fa-facebook-f icon-border facebook rounded-circle"> </a>
							</li>
							<li class="mx-2">
								<a href="https://twitter.com/hashtag/smkpasim" target="_blank" class="fab fa-twitter icon-border twitter rounded-circle"> </a>
							</li>
							<li>
								<a href="https://www.instagram.com/explore/tags/smkpasim/" class="fab fa-instagram icon-border googleplus rounded-circle"> </a>
							</li>
						</ul>
						</div>
					<!-- //social icons -->
				</div>
			</div>
		</div>
	</footer>
	<!-- //footer -->


	<!-- Js files -->
	<!-- JavaScript -->
	<script src="<?= base_url() ?>assets/web/js/jquery-2.2.3.min.js"></script>
	<!-- Default-JavaScript-File -->
	<script src="<?= base_url() ?>assets/web/js/bootstrap.js"></script>
	<!-- Necessary-JavaScript-File-For-Bootstrap -->

	<!-- banner slider -->
	<script src="<?= base_url() ?>assets/web/js/slider.js"></script>
	<!-- //banner slider -->

	<!-- testimonial-plugin -->
	<script src="<?= base_url() ?>assets/web/js/mislider.js"></script>
	<script>
		jQuery(function ($) {
			var slider = $('.mis-stage').miSlider({
				//  The height of the stage in px. Options: false or positive integer. false = height is calculated using maximum slide heights. Default: false
				stageHeight: 320,
				//  Number of slides visible at one time. Options: false or positive integer. false = Fit as many as possible.  Default: 1
				slidesOnStage: false,
				//  The location of the current slide on the stage. Options: 'left', 'right', 'center'. Defualt: 'left'
				slidePosition: 'center',
				//  The slide to start on. Options: 'beg', 'mid', 'end' or slide number starting at 1 - '1','2','3', etc. Defualt: 'beg'
				slideStart: 'mid',
				//  The relative percentage scaling factor of the current slide - other slides are scaled down. Options: positive number 100 or higher. 100 = No scaling. Defualt: 100
				slideScaling: 150,
				//  The vertical offset of the slide center as a percentage of slide height. Options:  positive or negative number. Neg value = up. Pos value = down. 0 = No offset. Default: 0
				offsetV: -5,
				//  Center slide contents vertically - Boolean. Default: false
				centerV: true,
				//  Opacity of the prev and next button navigation when not transitioning. Options: Number between 0 and 1. 0 (transparent) - 1 (opaque). Default: .5
				navButtonsOpacity: 1,
			});
		});
	</script>
	<!-- //testimonial-plugin -->

	<!-- simpleLightbox -->
	<link href="<?= base_url() ?>assets/web/css/simpleLightbox.css" rel='stylesheet' type='text/css' />
	<script src="<?= base_url() ?>assets/web/js/simpleLightbox.js"></script>
	<script>
		$('.proj_gallery_grid a').simpleLightbox();
	</script>
	<!-- //simpleLightbox -->

	<!-- numscroller-js-file -->
	<script src="<?= base_url() ?>assets/web/js/numscroller-1.0.js"></script>
	<!-- //numscroller-js-file -->

	<!-- smooth scrolling -->
	<script src="<?= base_url() ?>assets/web/js/SmoothScroll.min.js"></script>
	<!-- //smooth scrolling -->

	<!-- move-top -->
	<script src="<?= base_url() ?>assets/web/js/move-top.js"></script>
	<!-- easing -->
	<script src="<?= base_url() ?>assets/web/js/easing.js"></script>
	<!--  necessary snippets for few javascript files -->
	<script src="<?= base_url() ?>assets/web/js/edulearn.js"></script>

	<!-- //Js files -->

</body>

</html>