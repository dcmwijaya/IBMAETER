<?= $this->extend('home/landingTemplate') ?>

<?= $this->section('homecontent') ?>
<!--Main layout-->
<main class="pt-5">
	<!--Main container-->
	<div class="container">

		<!-- Atrikel -->
		<section class="article">
			<div class="artikel-slider-wrapper">
				<div class="row">
					<div class="col-12">
						<div class="custom-header header-wrapper text-center">
							<h3>PARTNERSHIP</h3>
						</div>
						<hr class="solid"><br>
						<marquee>
							<img src="<?= base_url('img/development.gif') ?>" style="margin-top:20%;">
							<h1 class="blink">Dalam proses pengembangan...</h1>
							</img>
						</marquee>
						<style>
							.blink {
								animation: blink-animation 1s steps(5, start) infinite;
								-webkit-animation: blink-animation 1s steps(5, start) infinite;
								color: yellow;
							}

							@keyframes blink-animation {
								to {
									visibility: hidden;
									color: blue;
								}
							}

							@-webkit-keyframes blink-animation {
								to {
									visibility: hidden;
									color: yellow;
								}
							}
						</style>
					</div>
				</div>
			</div>
		</section>
		<!-- END of Artikel -->

	</div>
	<!--Main container-->
</main>
<!--Main layout-->
<?= $this->endSection() ?>
