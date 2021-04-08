<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

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
				<div class="card-body">
					<div class="container mb-3 pb-2" style="border-bottom: 1px solid #dfdfdf;">
						<div class="row">
							<div class="col-sm-6">
								<div class="d-flex flex-wrap">
									<button type="button" class="btn btn-primary p-2 m-2" data-toggle="modal" data-target="#Tambah_user"><i class="fas fa-plus fa-fw"></i> Tambah User</button>
									<a type="button" href="<?= base_url('admin/exceluser'); ?>" id="user_csv" class="btn btn-success p-2 m-2"><i class="fas fa-file-excel fa-fw"></i> Export Excel</a>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="d-flex justify-content-end">
									<button type="button" onclick="window.print()" id="user_pdf" class="ml-auto btn btn-info p-2 m-2"><i class="fas fa-file-pdf fa-fw"></i> Print Laporan</button>
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
											<td><?= $no ?></td>
											<td><img width="100" src="https://www.flaticon.com/svg/vstatic/svg/2922/2922506.svg?token=exp=1617452642~hmac=de629f88fa4948d6f0843084a7b561c0" alt=""></td>
											<td><?= $u['nama']; ?></td>
											<td><?= $u['email']; ?></td>
											<td><?= $u['role']; ?></td>
											<td>
												<div class="btn-group" role="group" aria-label="user_action">
													<button type="button" class="btn btn-warning btn-sm btn-edit-user px-2 rounded-left" data-uid="<?= $u['uid']; ?>" data-nama="<?= $u["nama"]; ?>" data-email="<?= $u['email']; ?>" data-password="<?= $u['password']; ?>" data-urole="<?= $u['role']; ?>" data-toggle="modal" data-target="#Edit_user"><i class="fas fa-edit fa-fw"></i></button>
													<button type="button" class="btn btn-danger btn-sm btn-delete-user px-2 rounded-right" data-uid="<?= $u['uid']; ?>" data-nama="<?= $u["nama"]; ?>" data-email="<?= $u['email']; ?>" data-password="<?= $u['password']; ?>" data-urole="<?= $u['role']; ?>" data-toggle="modal" data-target="#Delete_user"><i class="fas fa-trash fa-fw"></i></button>
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
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header bg-light">
				<h5 class="modal-title" id="Tambah_userLabel">Tambah User Baru </h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?= base_url('/Admin/Add_user'); ?>" method="POST" enctype="multipart/form-data">
				<div class="modal-body">
					<div class="form-group">
						<label for="tambah_nama_user">Nama User</label>
						<input type="text" class="form-control" id="tambah_nama_user" placeholder="Tuliskan Nama User..." name="user" required>
					</div>
					<div class="form-group">
						<label for="tambah_email_user">E-mail</label>
						<input type="email" class="form-control" id="tambah_email_user" placeholder="Tuliskan E-mail User..." name="email" required>
					</div>
					<div class="form-group">
						<label for="tambah_password">Password</label>
						<input type="new-password" class="form-control" id="tambah_password" placeholder="Tuliskan Password User..." name="password" required>
					</div>
					<div class="form-group">
						<label for="tambah_password2">Konfirmasi Password</label>
						<input type="new-password" class="form-control" id="tambah_password2" placeholder="konfirmasi Password User..." name="password2" required>
					</div>
					<div class="form-group">
						<label for="jenis_user">Role</label>
						<select class="form-control" id="tambah_jenis_user" name="role">
							<option value="1">User</option>
							<option value="0">Admin</option>
						</select>
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
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header bg-light">
				<h5 class="modal-title" id="Edit_userLabel">Edit Data User</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?= base_url('/Admin/Edit_user'); ?>" method="POST" enctype="multipart/form-data">
				<div class="modal-body">
					<div class="form-group">
						<label for="edit_nama_user">Nama User</label>
						<input type="text" class="form-control" id="edit_nama_user" name="user" required>
					</div>
					<div class="form-group">
						<label for="edit_email_user">E-mail</label>
						<input type="email" class="form-control" id="edit_email_user" name="email" required>
					</div>
					<div class="form-group">
						<label for="edit_password">Password</label>
						<input type="new-password" class="form-control" id="edit_password" name="password" required>
					</div>
					<div class="form-group">
						<label for="edit_password2">Konfirmasi Password</label>
						<input type="new-password" class="form-control" id="edit_password2" name="password2" required>
					</div>
					<div class="form-group">
						<label for="jenis_user">Role</label>
						<select class="form-control" id="edit_jenis_user" name="role">
							<option value="1">User</option>
							<option value="0">Admin</option>
						</select>
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
<?= $this->endSection() ?>