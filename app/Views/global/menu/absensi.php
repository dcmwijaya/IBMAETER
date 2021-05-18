<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<link rel="stylesheet" href="<?= base_url('css/menukhusus.css') ?>">

<!--Main layout-->
<main class="bg-dark">
	<div class="container pt-4">
		<section class="mb-4">
			<div class="card">
				<div class="card-header text-center py-3">
					<h5 class="mb-0 text-center">
						<strong>ABSENSI PEKERJA</strong>
					</h5>
				</div>
				<div class="card-body pt-1">
					<div class="container mb-3 pb-2" style="border-bottom: 1px solid #dfdfdf;">
						<div class="row">
							<div class="info-card card mb-3 bg-light">
								<div class="row no-gutters">
									<div class="col-md-5" id="img-absensi">
										<img src="<?= base_url("img/ibpk.png"); ?>" class="card-img" alt="img-1">
									</div>
									<div class="col-md-6" id="absensi-user">
										<div class=" card-body event-description">
											<form action="<?= ($absensi == false) ? base_url('/menu/absen') : ""; ?>" method="POST" enctype="multipart/form-data">
												<?= csrf_field(); ?>
												<div class="form-group absensi-content">
													<label for="nama_user">
														<i class="fas fa-user-tie fa-fw me-1"></i>
														<b>Nama User :</b>
														<span><small><?= $user['nama']; ?></small></span>
													</label>
												</div>
												<div class="form-group absensi-content">
													<label for="email_user">
														<i class="fas fa-envelope-open-text fa-fw me-1"></i>
														<b>Email :</b>
														<span><small><?= $user['email']; ?></small></span>
													</label>
												</div>
												<div class="form-group absensi-content">
													<label for="status_absen">
														<i class="fas fa-file-signature fa-fw me-1"></i>
														<b>Status :</b>
														<?php if ($absensi == false) : ?>
															<span><small>Belum Absensi</small></span>
														<?php else : ?>
															<span><small>Sudah Absensi</small></span>
														<?php endif; ?>
													</label>
												</div>
												<div class="my-4">
													<input type="hidden" class="form-control" value="<?= ($absensi == false) ? $user['email'] : ""; ?>" name="email_absen">
													<button type="submit" class="btn btn-success btn-komplain col-sm-12 p-4" <?= ($absensi == false) ? "" : "disabled"; ?>>
														<p class="text-center nama_tombol"><i class="fas fa-briefcase fa-fw me-3"></i>Absensi Sekarang</p>
													</button>
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
		</section>
	</div><br>
</main>

<?= $this->endSection() ?>
