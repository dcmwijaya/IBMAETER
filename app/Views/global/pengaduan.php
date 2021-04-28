<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<link rel="stylesheet" href="<?= base_url('../css/content.css') ?>" /> <!-- include cakra --->
<!--Main layout-->
<main class="bg-dark">
	<div class="container pt-4">
		<section class="mb-4">
			<div class="card">
				<div class="card-header text-center py-3">
					<h5 class="mb-0 text-center">
						<strong>PENGADUAN</strong>
					</h5>
				</div>
				<div class="card-body pt-1">
					<div class="container mb-3 pb-2" style="border-bottom: 1px solid #dfdfdf;">
						<div class="row">
							<div class="col">
								<marquee>
									<img src="<?= base_url('img/development.gif') ?>">
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
				</div>
		</section>
	</div><br>
</main>

<?= $this->endSection() ?>
