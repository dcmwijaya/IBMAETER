<?= $this->extend('home/landingTemplate') ?>

<?= $this->section('homecontent') ?>
<!--Main layout-->
<main class="pt-5">
	<!--Main container-->
	<div class="container">

		<!-- Atrikel -->
		<section class="article">
			<div class="row">
				<div class="col-12">
					<div class="custom-header header-wrapper text-center">
						<h3>IBMAETER INFO</h3>
					</div>
					<hr class="solid"><br>
				</div>
			</div>
			<div class="info-card card mb-3 bg-light">
				<div class="row no-gutters info-wrap">
					<div class="col-md-5">
						<img src="<?= base_url("img/home/info.jpg"); ?>" class="card-img img-info" alt="img-1">
					</div>
					<div class="col-md-7">
						<div class="card-body event-description">
							<h5 class="card-title"><i class="fas fa-business-time fa-fw me-2"></i>Kinerja Pada Tahun 2021</h5>
							<p class="card-text"><small class="text-muted"><i class="fas fa-calendar fa-fw me-2"></i>02-04-2021 | 10:15 AM</small></p>
							<p class="card-text col-md-12">Berdasarkan laporan bulanan dapat disimpulkan hingga tahun 2021 ini, Invenbar sudah sangat membantu beberapa bisnis dengan skala kecil.</p>
							<button class="btn btn-primary" type="button">
								<span>Read More</span>
							</button>
						</div>
					</div>
				</div>
			</div><br><br>
			<div class="info-card card mb-3 bg-light">
				<div class="row no-gutters info-wrap">
					<div class="col-md-5">
						<img src="<?= base_url("img/home/info.jpg"); ?>" class="card-img img-info" alt="img-1">
					</div>
					<div class="col-md-7">
						<div class="card-body event-description">
							<h5 class="card-title"><i class="fas fa-business-time fa-fw me-2"></i>Partnership Startup Jawa Timur 2021</h5>
							<p class="card-text"><small class="text-muted"><i class="fas fa-calendar fa-fw me-2"></i>20-02-2021 | 08:15 AM</small></p>
							<p class="card-text col-md-12">Partnership kami dengan Startup yang ada di Jawa Timur meliputi Startup-1, Startup-2, Startup-3, dan Startup-4.</p>
							<button class="btn btn-primary" type="button">
								<span>Read More</span>
							</button>
						</div>
					</div>
				</div>
			</div><br><br>
			<div class="info-card card mb-3 bg-light">
				<div class="row no-gutters info-wrap">
					<div class="col-md-5">
						<img src="<?= base_url("img/home/info.jpg"); ?>" class="card-img img-info" alt="img-1">
					</div>
					<div class="col-md-7">
						<div class="card-body event-description">
							<h5 class="card-title"><i class="fas fa-business-time fa-fw me-2"></i>Agenda Kegiatan Tahun 2021</h5>
							<p class="card-text"><small class="text-muted"><i class="fas fa-calendar fa-fw me-2"></i>01-01-2021 | 10:15 PM</small></p>
							<p class="card-text col-md-12">Agenda tahunan kami di tahun 2021 ini berupa perencanaan kerjasama dengan beberapa Startup yang ada di Jawa Timur.</p>
							<button class="btn btn-primary" type="button">
								<span>Read More</span>
							</button>
						</div>
					</div>
				</div>
			</div><br><br>
		</section>
		<!-- END of Artikel -->

	</div>
	<!--Main container-->

</main>
<!--Main layout-->
<?= $this->endSection() ?>