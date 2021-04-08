<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

<!--Main layout-->
<main class="bg-dark">
	<div class="container py-4">
		<section class="mb-4">
			<div class="card">
				<div class="card-header text-center py-3">
					<h5 class="mb-0 text-center">
						<strong>EDIT PROFILE</strong>
					</h5>
					<?php if (session()->getFlashdata('pesanPassword')) : ?>
						<div class="alert alert-danger" role="alert">
							<?= session()->getFlashdata('pesanPassword'); ?>
						</div>
					<?php endif ?>
				</div>
				<div class="card-body">
					<form action="<?= base_url('/menu/profUpdate') . "/" . $user['uid']; ?>" method="post" enctype="multipart/form-data">
						<!-- Fungsi pengaman agar hanya bisa diisi melalui halaman ini -->
						<?= csrf_field(); ?>
						<input type="hidden" name="fotoLama" value="<?= $user['picture']; ?>">
						<div class="row mb-3 ms-4">
							<label for="nama" class="col-sm-2 col-form-label">Nama</label>
							<div class="col-sm-7">
								<input type="text" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" id="nama" name="nama" autofocus value="<?= (old('nama')) ? old('nama') : $user['nama']; ?>">
								<div class="invalid-feedback">
									<?= $validation->getError('nama'); ?>
								</div>
							</div>
						</div>
						<div class="row mb-3 ms-4">
							<label for="email" class="col-sm-2 col-form-label">Email</label>
							<div class="col-sm-7">
								<input type="text" class="form-control <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?>" id="email" name="email" value="<?= (old('email')) ? old('email') : $user['email']; ?>">
								<div class="invalid-feedback">
									<?= $validation->getError('email'); ?>
								</div>
							</div>
						</div>
						<div class="row mb-3 ms-4">
							<label for="password1" class="col-sm-2 col-form-label">Password Baru</label>
							<div class="col-sm-7">
								<input type="password" class="form-control <?= ($validation->hasError('password1')) ? 'is-invalid' : ''; ?>" id="password1" name="password1" value="<?= (old('password1')); ?>">
								<div class="invalid-feedback">
									<?= $validation->getError('password1'); ?>
								</div>
							</div>
						</div>
						<div class="row mb-3 ms-4">
							<label for="password2" class="col-sm-2 col-form-label">Ulangi Password Baru</label>
							<div class="col-sm-7">
								<input type="password" class="form-control mt-3 <?= ($validation->hasError('password2')) ? 'is-invalid' : ''; ?>" id="password2" name="password2">
								<div class="invalid-feedback">
									<?= $validation->getError('password2'); ?>
								</div>
							</div>
						</div>
						<div class="row mb-3 ms-4">
							<label for="password" class="col-sm-2 col-form-label">Password</label>
							<div class="col-sm-7">
								<input type="password" class="form-control <?= ($validation->hasError('password')) ? 'is-invalid' : ''; ?>" id="password" name="password">
								<div class="invalid-feedback">
									<?= $validation->getError('password'); ?>
								</div>
							</div>
						</div>
						<div class="row mb-3 ms-4">
							<label for="foto" class="col-sm-2 col-form-label">Foto Profil</label>
							<div class="col-sm-2">
								<img src="<?= base_url("/img/user") . "/" . $user['picture']; ?>" class="img-thumbnail img-preview">
							</div>
							<div class="col-sm-5">
								<div class="mb-3">
									<input class="form-control <?= ($validation->hasError('foto')) ? 'is-invalid' : ''; ?>" type="file" id="foto" name="foto" onchange='imgPreview()'>
									<div class="invalid-feedback">
										<?= $validation->getError('foto'); ?>
										<!-- pesan eror -->
									</div>
								</div>
							</div>
						</div>
						<button type="submit" class="btn btn-primary ms-4">Ubah Data</button>
					</form>
				</div>
			</div>
		</section>
	</div>
</main>

<?= $this->endSection() ?>