<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

<!--Main layout-->
<main class="bg-dark">
	<div class="container py-4">
		<section class="mb-4">
			<div class="card">
				<div class="card-header text-center py-3">
					<h5 class="mb-0 text-center">
						<strong>MY PROFILE</strong>
					</h5>
					<?php if (session()->getFlashdata('pesan')) : ?>
						<div class="alert alert-success" role="alert">
							<?= session()->getFlashdata('pesan'); ?>
						</div>
					<?php endif ?>
				</div>

				<div class="card-body mx-auto" style="height:450px;">
					<div class="card mb-3" style="max-width: 400px;">
						<div class="row no-gutters">
							<div class="col-md-4 d-inline">
								<img src="<?= base_url("/img/user") . "/" . $user['picture']; ?>" width="100%" height="100%">
							</div>
							<div class="col-md-8">
								<div class="card-body">
									<p class="card-text"><b>Nama : </b><?= $user['nama']; ?></p>
									<p class="card-text"><b>Email : </b><?= $user['email']; ?></p>
									<h4 class="card-text"><b><?= ($user['role'] == 0) ? "ADMIN" : "PEKERJA" ?></b></h4>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!--Section: Sales Performance KPIs-->
	</div>
</main>

<?= $this->endSection() ?>