<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<link rel="stylesheet" href="<?= base_url('../css/content.css') ?>" /> <!-- include cakra --->
<!--Main layout-->
<main class="bg-dark">
	<div class="container py-4">
		<section class="mb-4">
			<div class="card">
				<div class="card-header text-center py-3">
					<h5 class="mb-0 text-center">
						<strong>DATA USER</strong>
					</h5>
				</div>
				<?php if (session()->getFlashdata('pesan')) : ?>
					<div class="position-fixed bottom-0 right-0 p-3" style="z-index: 5; right: 0; bottom: 0;">
						<div class="toast shadow" role="alert" aria-live="assertive" aria-atomic="true" autohide: false>
							<div class="toast-header bg-dark text-light">
								<img src="<?= base_url('img/icon/favicon-16x16.png') ?>" class="rounded mr-2" alt="Pesan">
								<strong class="mr-auto">INVENBAR CI-4</strong>
								<small>Baru Saja</small>
								<button type="button" class="ml-2 mb-1 close text-light" data-dismiss="toast" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="toast-body">
								<?= session()->getFlashdata('pesan'); ?>
							</div>
						</div>
					</div>
				<?php endif; ?>
				<div class="card-body pt-1">
					<div class="container mb-3 pb-2" style="border-bottom: 1px solid #dfdfdf;">
						<div class="row my-3">
							<div class="d-flex">
								<div class="flex-fill mr-auto">
									<button type="button" class="btn btn-primary btn-sm p-2 shadow-sm" data-toggle="modal" data-target="#Tambah_user"><i class="fas fa-plus fa-fw"></i> Tambah User</button>
									<button type="button" onclick="window.print()" id="item_pdf" class="r-btn btn btn-success btn-sm p-2 shadow-sm"><i class="fas fa-print fa-fw"></i> Print Laporan</button>
								</div>
								<div class="flex-fill">
									<button type="button" class="btn btn-dark dropdown-toggle shadow-sm p-2" style="float:right;" onclick="return false;" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										<i class="fas fa-fw fa-file"></i> Export
									</button>
									<div class="dropdown-menu dm-export">
										<a class="dropdown-item dm-export-item" href="<?= base_url('Admin/exceluser'); ?>" id="xls"><i class="fas fa-file-csv fa-fw me-2"></i> Excel</a>
										<a class="dropdown-item dm-export-item" href="<?= base_url('Admin/docuser'); ?>" id="doc"><i class="fas fa-file-word fa-fw me-2"></i> Word</a>
										<a class="dropdown-item dm-export-item" href="<?= base_url('Admin/pdfuser'); ?>" id="pdf"><i class="fas fa-file-pdf fa-fw me-2"></i> Pdf</a>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col table-responsive">
								<table id="table_user" class="display nowrap" style="font-size: 14px; width:100%;">
									<thead>
										<tr>
											<th>No</th>
											<th>Foto</th>
											<th>Nama User</th>
											<th>E-mail</th>
											<th>Role</th>
											<th>Aksi</th>
										</tr>
									</thead>
									<tbody>
										<?php $no = 1; ?>
										<?php foreach ($user as $u) : ?>
											<tr>
												<td class="text-center font-weight-bold" style="width: 35px;"><?= $no ?></td>
												<td><img width="100" src="<?= base_url('../img/user') . "/" .  $u['picture']; ?> " alt=""></td>
												<td><?= $u['nama']; ?></td>
												<td><?= $u['email']; ?></td>
												<td><?= ($u['role'] == 0) ? 'Admin' : 'Pekerja' ?></td>
												<td>
													<div class="btn-group" role="group" aria-label="user_action">
														<button type="button" class="btn btn-warning btn-sm btn-edit-user px-2 rounded-left" data-uid="<?= $u['uid']; ?>" data-nama="<?= $u["nama"]; ?>" data-email="<?= $u['email']; ?>" data-password="<?= $u['password']; ?>" data-urole="<?= $u['role']; ?>" data-picture="<?= $u['picture']; ?>" data-toggle="modal" data-target="#Edit_user"><i class="fas fa-edit fa-fw"></i></button>
														<button type="button" class="btn btn-danger btn-sm btn-delete-user px-2 rounded-right" data-uid="<?= $u['uid']; ?>" data-nama="<?= $u["nama"]; ?>" data-email="<?= $u['email']; ?>" data-urole="<?= $u['role']; ?>" data-toggle="modal" data-target="#Delete_user"><i class="fas fa-trash fa-fw"></i></button>
													</div>
												</td>
											</tr>
											<?php $no++; ?>
										<?php endforeach; ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
		</section>
	</div>
</main class="mb-3">

<!-- Tambah Modal -->
<div class="modal fade" id="Tambah_user" tabindex="-1" aria-labelledby="Tambah_userLabel" aria-hidden="true">
	<div class="modal-dialog modal-xl">
		<div class="modal-content">
			<div class="modal-header bg-light">
				<h5 class="modal-title" id="Tambah_userLabel">Tambah User Baru </h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?= base_url('/Admin/Add_user'); ?>" method="POST" enctype="multipart/form-data">
				<?= csrf_field(); ?>
				<div class="modal-body row">
					<div class="col-sm-6">
						<div class="show-img text-center mb-2" id="show-add-img" style="height: 370px;">
							<img class="img-thumbnail img-preview" src="<?= base_url('../img/user/default.jpg'); ?>" alt="image preview" style="max-height: 370px; ">
						</div>
						<div class="custom-file" style="padding-bottom: 22px; margin-bottom: 20px;">
							<div class="invalid-feedback m-2">
								<?= $validation->getError('add_img'); ?>
							</div>
							<input type="file" class="custom-file-input <?= ($validation->hasError('add_img')) ? 'is-invalid' : ''; ?>" id="add_img" name="add_img" onchange="previewAddImg()">
							<label class="custom-file-label label-img-input" for="add_img">Pilih Gambar</label>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label for="tambah_nama_user">Nama User</label>
							<input type="text" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" id="tambah_nama_user" placeholder="Tuliskan Nama User..." name="user" autofocus required value="<?= (old('user')); ?>">
							<div class=" invalid-feedback">
								<?= $validation->getError('nama'); ?>
							</div>
						</div>
						<div class="form-group">
							<label for="tambah_email_user">E-mail</label>
							<input type="email" class="form-control <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?>" id="tambah_email_user" placeholder="Tuliskan E-mail User..." name="email" required value="<?= (old('email')); ?>">
							<div class="invalid-feedback">
								<?= $validation->getError('email'); ?>
							</div>
						</div>
						<div class="form-group">
							<label for="tambah_password">Password</label>
							<input type="password" class="form-control <?= ($validation->hasError('password')) ? 'is-invalid' : ''; ?>" id="tambah_password" placeholder="Tuliskan Password User..." name="password" required autocomplete="off">
							<div class="invalid-feedback">
								<?= $validation->getError('password'); ?>
							</div>
						</div>
						<div class="form-group">
							<label for="tambah_password2">Konfirmasi Password</label>
							<input type="password" class="form-control <?= ($validation->hasError('confirm_password')) ? 'is-invalid' : ''; ?>" id="tambah_password2" placeholder="konfirmasi Password User..." name="confirm_password" required autocomplete="off">
							<div class="invalid-feedback">
								<?= $validation->getError('confirm_password'); ?>
							</div>
						</div>
						<div class="form-group">
							<label for="jenis_user">Role</label>
							<select class="form-control <?= ($validation->hasError('role')) ? 'is-invalid' : ''; ?>" id="tambah_jenis_user" name="role">
								<option value="1">User</option>
								<option value="0">Admin</option>
							</select>
							<div class="invalid-feedback">
								<?= $validation->getError('role'); ?>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-fw fa-window-close"></i> Batal</button>
					<button type="submit" class="btn btn-primary"><i class="fas fa-fw fa-user-plus"></i> Tambah User</button>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- Edit Modal -->
<div class="modal fade" id="Edit_user" tabindex="-1" aria-labelledby="Edit_userLabel" aria-hidden="true">
	<div class="modal-dialog modal-xl">
		<div class="modal-content">
			<div class="modal-header bg-light">
				<h5 class="modal-title" id="Edit_userLabel">Edit Data User</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?= base_url('/Admin/Edit_user'); ?>" method="POST" enctype="multipart/form-data">
				<?= csrf_field(); ?>
				<div class="modal-body row">
					<input type="hidden" name="old_image" id="old_image">
					<div class="col-sm-6">
						<div class="show-img text-center mb-2" style="height: 370px;">
							<img class="img-thumbnail edit-img-preview" src="" alt="image preview" style="max-height: 370px; ">
						</div>
						<div class="custom-file" style="padding-bottom: 22px; margin-bottom: 20px;">
							<input type="file" class="custom-file-input <?= ($validation->hasError('edit_img')) ? 'is-invalid' : ''; ?>" id="edit_img" name="edit_img" onchange="previewEditImg()">
							<label class="custom-file-label label-img-edit" for="edit_img">Pilih Gambar</label>
							<div class="invalid-feedback m-2">
								<?= $validation->getError('edit_img'); ?>
							</div>
						</div>

					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label for="edit_nama_user">Nama User</label>
							<input type="text" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" id="edit_nama_user" name="user" required autofocus value="<?= (old('nama')); ?>">
							<div class=" invalid-feedback">
								<?= $validation->getError('nama'); ?>
							</div>
						</div>
						<div class="form-group">
							<label for="edit_email_user">E-mail</label>
							<input type="email" class="form-control <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?>" id="edit_email_user" name="email" required value="<?= (old('email')); ?>">
							<div class=" invalid-feedback">
								<?= $validation->getError('email'); ?>
							</div>
						</div>
						<div class="form-group">
							<label for="jenis_user">Role</label>
							<select class="form-control <?= ($validation->hasError('role')) ? 'is-invalid' : ''; ?>" id="edit_jenis_user" name="role">
								<option value="1">User</option>
								<option value="0">Admin</option>
							</select>
							<div class=" invalid-feedback">
								<?= $validation->getError('role'); ?>
							</div>
						</div>
						<div class="form-group">
							<label for="edit_password2">Password Baru</label>
							<input type="hidden" class="form-control" id="old_password" name="old_password">
							<input type="password" class="form-control <?= ($validation->hasError('new_password')) ? 'is-invalid' : ''; ?>" id="edit_password2" name="new_password" autocomplete="off">
							<div class=" invalid-feedback">
								<?= $validation->getError('new_password'); ?>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<input type="hidden" name="user_id" id="edit_user_id">
					<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-fw fa-window-close"></i> Batal</button>
					<button type="submit" class="btn btn-warning"><i class="fas fa-fw fa-check"></i> Simpan</button>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- Delete Modal -->
<div class="modal fade" id="Delete_user" tabindex="-1" aria-labelledby="Delete_userLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header bg-light">
				<h5 class="modal-title" id="Delete_userLabel">Hapus Data User</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				Apakah Anda Yakin anda ingin menghapus "<strong><span id="delete_nama_user"></span></strong>" ?
			</div>
			<div class="modal-footer">
				<form action="<?= base_url('/Admin/Delete_user'); ?>" method="POST" enctype="multipart/form-data">
					<input type="hidden" name="user_id" id="delete_user_id">
					<button type="button" class="btn btn-info" data-dismiss="modal"><i class="fas fa-fw fa-window-close"></i> Batal</button>
					<button type="submit" class="btn btn-danger"><i class="fas fa-fw fa-check"></i> Hapus</button>
				</form>
			</div>
		</div>
	</div>
</div>

<!-- Crop Image Before Upload -->
<div class="modal fade" id="uploadimageModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="crop_userLabel" aria-hidden="true">
	<div class="modal-dialog modal-xl">
		<div id="cfading" class=""></div>
		<div class="modal-content" style="z-index: 33;">
			<div class="modal-header bg-light py-2">
				<h5 class="modal-title" id="crop_userLabel">Potong Gambar</h5>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-sm-8 text-center">
						<div id="image_demo" class="p-1" style="overflow-x:scroll"></div>
					</div>
					<div class="col-sm-4 p-3">
						<button class="btn btn-success btn-block crop_image shadow-sm">Potong Gambar</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?= $this->endSection() ?>