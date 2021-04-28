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
						<h3>INVENBAR INFO</h3>
					</div>
					<hr class="solid"><br>
				</div>
			</div>
			<div class="info-card card mb-3 bg-light">
				<div class="row no-gutters">
					<div class="col-md-5">
						<img src="<?= base_url("img/home/dashboard.jpg"); ?>" class="card-img" alt="img-1">
					</div>
					<div class="col-md-7">
						<div class="card-body event-description">
							<h5 class="card-title"><i class="fas fa-business-time fa-fw me-2"></i>Kinerja Pada Tahun 2021</h5>
							<p class="card-text"><small class="text-muted"><i class="fas fa-calendar fa-fw me-2"></i>02-04-2021 | 10:15 AM</small></p>
							<p class="card-text col-md-12">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
							<button class="btn btn-primary" type="button">
								<span>Read More</span>
							</button>
						</div>
					</div>
				</div>
			</div><br><br>
			<div class="info-card card mb-3 bg-light">
				<div class="row no-gutters">
					<div class="col-md-5">
						<img src="<?= base_url("img/home/dashboard.jpg"); ?>" class="card-img" alt="img-1">
					</div>
					<div class="col-md-7">
						<div class="card-body event-description">
							<h5 class="card-title"><i class="fas fa-business-time fa-fw me-2"></i>Partnership Startup Jawa Timur 2021</h5>
							<p class="card-text"><small class="text-muted"><i class="fas fa-calendar fa-fw me-2"></i>20-02-2021 | 08:15 AM</small></p>
							<p class="card-text col-md-12">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
							<button class="btn btn-primary" type="button">
								<span>Read More</span>
							</button>
						</div>
					</div>
				</div>
			</div><br><br>
			<div class="info-card card mb-3 bg-light">
				<div class="row no-gutters">
					<div class="col-md-5">
						<img src="<?= base_url("img/home/dashboard.jpg"); ?>" class="card-img" alt="img-1">
					</div>
					<div class="col-md-7">
						<div class="card-body event-description">
							<h5 class="card-title"><i class="fas fa-business-time fa-fw me-2"></i>Agenda Kegiatan Tahun 2021</h5>
							<p class="card-text"><small class="text-muted"><i class="fas fa-calendar fa-fw me-2"></i>01-01-2021 | 10:15 PM</small></p>
							<p class="card-text col-md-12">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
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
