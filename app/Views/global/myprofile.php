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

				<div class="card-body mx-auto">
					<div class="card mb-3" style="box-shadow: 0px 3px 5px 0px #a8a8a8;">
						<div class="row no-gutters" style="max-width:800px;">
							<div class="col-md-5 d-inline">
								<img src="<?= base_url("/img/user") . "/" . $user['picture']; ?>" class="img-thumbnail img-preview" style="max-width:100%;max-height:100%;width:1000px;height:300px;display:flex;">
							</div>
							<div class="col-md-6">
								<div class="card-body">
									<p class="card-text"><b>Nama : </b><?= $user['nama']; ?></p>
									<p class="card-text"><b>Email : </b><?= $user['email']; ?></p><br>
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