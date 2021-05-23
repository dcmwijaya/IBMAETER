<?= $this->extend('layout/logintemplate') ?>

<?= $this->section('logincontent') ?>

<div class="container py-3">
	<!-- Outer Row -->
	<div class="row justify-content-center py-5">
		<div class="col-xl-10 col-lg-12 col-md-9" id="alert-login">
			<?php if (session()->getFlashdata('locked')) : ?>
				<div class="alert alert-danger py-1 m-0" role="alert">
					<?= session()->getFlashdata('locked'); ?>
				</div>
			<?php endif ?>
			<div class="card o-hidden border-0 shadow-lg ">
				<form class="user" method="POST" action="<?= base_url('auth/validasi') ?>">
					<div class="card-body" style="padding: 0 12px; overflow: hidden;">
						<!-- Nested Row within Card Body -->
						<div class="row">
							<div class="col-lg-6 d-none d-lg-block bg-login-image text-center"></div>
							<div class="col-lg-6">
								<div class="p-5">
									<div class="text-center">
										<h1 class="h4 text-gray-900 mb-4">Halaman Login</h1>
									</div>
									<div class="py-1">
										<label for="ib-email"><i class="icolog fas fa-envelope fa-fw"></i><b>&nbsp; E-Mail</b></label>
										<input type="email" class="form-control <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?>" id="ib-email" name="email" placeholder="Masukkan Email" autocomplete="off" value="<?= old('email'); ?>">
										<div class="invalid-feedback">
											<?= $validation->getError('email'); ?>
										</div>
									</div>
									<div class="py-1">
										<label for="ib-password"><i class="icolog fas fa-key fa-fw"></i><b>&nbsp; Password</b></label>
										<input type="password" class="form-control  <?= ($validation->hasError('password')) ? 'is-invalid' : ''; ?>" id="ib-password" name="password" placeholder="Masukkan Password" autocomplete="off">
										<div class="invalid-feedback">
											<?= $validation->getError('password'); ?>
										</div>
									</div>
									<div class="mt-4">
										<?php
										if (isset($_SESSION["login_attemp"])) {
											if ($_SESSION['login_attemp'] > 2) {
												if (isset($_SESSION['time_locked'])) {
													# agar session 'time_locked' tidak diperbarui
												} else {
													# jika session 'time_locked' belum pernah dibuat
													$_SESSION['time_locked'] = time();	// tandai waktu terblokir
												}
												$state = "disabled";
											} else {
												$state = "";
											}
										} else {
											$state = "";
										} ?>
										<button type="submit" class="btn btn-primary btn-user btn-block" <?= $state; ?>>
											Login
										</button>
									</div>
									<hr>
									<div class="text-center">
										<a tabindex="0" class="small" role="button" data-toggle="popover" data-trigger="focus" title="Lupa Password ?" data-content="Silahkan Menghubungi Admin Via WhatsApp : 0821-****-****">Lupa Password?</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="card-footer">
						<div class="link-text text-center">
							<p class="small">Framework C Kelompok 5 - Created at 2021</p>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<?= $this->endSection() ?>