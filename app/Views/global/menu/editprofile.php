<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

<!-- Main layout  -->
<main class="bg-dark">
	<div class="container py-4">
		<section class="mb-4">
			<div class="card">
				<div class="card-header text-center py-3">
					<h5 class="mb-0 text-center">
						<strong><i class="fas fa-fw fa-id-card"></i> Edit Profile</strong>
					</h5>
					<?php if (session()->getFlashdata('pesanPassword')) : ?>
						<div class="alert alert-danger" role="alert">
							<?= session()->getFlashdata('pesanPassword'); ?>
						</div>
					<?php endif ?>
				</div>
				<div class="card-body">
					<div class="container">
						<form action="<?= base_url('/menu/profUpdate') . "/" . $user['uid']; ?>" class="p-3" method="post" enctype="multipart/form-data">
							<?= csrf_field(); ?>
							<div class="row">
								<div class="col-sm-5 px-4 py-2 border-left">
									<label for="foto" class="font-weight-bold"><i class="text-chocholate fas fa-fw fa-image mr-1"></i> Foto Profil</label>
									<div class="form-group text-center">
										<img src="<?= base_url("/img/user") . "/" . $user['picture']; ?>" class="img-thumbnail img-preview" style="max-width: 90%; height: auto;">
									</div>
									<div class="form-group">
										<div class="mb-3 ">
											<input class="form-control <?= ($validation->hasError('foto')) ? 'is-invalid' : ''; ?>" type="file" id="foto" name="foto" onchange='imgPreview()'>
											<div class="invalid-feedback">
												<?= $validation->getError('foto'); ?>
											</div>
										</div>
									</div>
									<input type="hidden" name="fotoLama" value="<?= $user['picture']; ?>">
								</div>
								<div class="col-sm-7 px-4 py-2 border-left border-right">
									<div class="form-group">
										<label for="nama" class="font-weight-bold"><i class="text-chocholate fas fa-fw fa-user mr-1"></i> Nama</label>
										<input type="text" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" id="nama" name="nama" autofocus value="<?= (old('nama')) ? old('nama') : $user['nama']; ?>">
										<div class="invalid-feedback">
											<?= $validation->getError('nama'); ?>
										</div>
									</div>
									<div class="form-group">
										<label for="email" class="font-weight-bold"><i class="text-chocholate fas fa-fw fa-envelope mr-1"></i> Email</label>
										<input type="text" class="form-control <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?>" id="email" name="email" value="<?= (old('email')) ? old('email') : $user['email']; ?>">
										<div class="invalid-feedback">
											<?= $validation->getError('email'); ?>
										</div>
									</div>
									<div class="form-group">
										<label for="password" class="font-weight-bold"><i class="text-chocholate fas fa-fw fa-unlock-alt mr-1"></i> Password Lama<small class="ml-2 font-weight-bold text-danger">*&nbsp;Wajib Diisi</small></label>
										<input type="password" class="form-control <?= ($validation->hasError('password')) ? 'is-invalid' : ''; ?>" id="password" name="password">

										<div class="invalid-feedback">
											<?= $validation->getError('password'); ?>
										</div>
									</div>
									<div class="form-group">
										<label for="password1" class="font-weight-bold"><i class="text-chocholate fas fa-fw fa-key mr-1"></i> Password Baru</label>
										<input type="password" class="form-control <?= ($validation->hasError('password1')) ? 'is-invalid' : ''; ?>" id="password1" name="password1" value="<?= (old('password1')); ?>">
										<div class="invalid-feedback">
											<?= $validation->getError('password1'); ?>
										</div>
									</div>
									<div class="form-group">
										<label for="password2" class="font-weight-bold"><i class="text-green fas fa-fw fa-key mr-1"></i> Ulangi Password Baru</label>
										<input type="password" class="form-control mt-3 <?= ($validation->hasError('password2')) ? 'is-invalid' : ''; ?>" id="password2" name="password2">
										<div class="invalid-feedback">
											<?= $validation->getError('password2'); ?>
										</div>
									</div>
								</div>
								<div class="col-sm-12">
									<hr class="my-2">
									<div class="clearfix mt-3">
										<button type="submit" class="btn-block btn btn-primary shadow-sm font-weight-bold"><i class="fas fa-fw fa-check"></i> Ubah Data</button>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</section>
	</div>
</main>

<?= $this->endSection() ?>