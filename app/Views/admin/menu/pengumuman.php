<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<link rel="stylesheet" href="<?= base_url('../css/content.css') ?>" /> <!-- include cakra --->

<!-- style for td -->
<?php $tdStyle = "white-space: -moz-pre-wrap !important; white-space: -pre-wrap; white-space: -o-pre-wrap; white-space: pre-wrap; word-wrap: break-word; white-space: -webkit-pre-wrap; word-break: break-word; white-space: normal;" ?>


<!--Main layout-->
<main class="bg-dark">
	<div class="container pt-4">
		<?php if (session()->getFlashdata('Pengumuman')) : ?>
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
						<?= session()->getFlashdata('Pengumuman'); ?>
					</div>
				</div>
			</div>
		<?php endif ?>
		<section class="pb-4">
			<div class="card">
				<div class="card-header text-center py-3">
					<h5 class="mb-0 text-center">
						<strong>EDIT PENGUMUMAN</strong>
					</h5>
				</div>
				<div class="card-body">
					<div class="container mb-3 pb-2" style="border-bottom: 1px solid #dfdfdf;">
						<div class="row my-3">
							<div class="flex-fill">
								<div class="btn-group btn-wrap">
									<button type="button" class="btn btn-primary btn-sm px-3 shadow-sm" data-toggle="modal" data-target="#Tambah_Pengumuman"><i class="fas fa-plus-square fa-fw"></i> Tambah</button>
									<button type="button" class="btn active btn-dark dropdown-toggle btn-sm shadow-sm p-2" style="float:right;" onclick="return false;" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										<i class="fas fa-fw fa-file"></i> Export
									</button>
									<div class="dropdown-menu dm-export">
										<a class="dropdown-item dm-export-item" href="<?= base_url('exlapor/#'); ?>" id="xls" onclick="return false;"><i class="fas fa-file-csv fa-fw me-2"></i>Excel</a>
										<a class="dropdown-item dm-export-item" href="<?= base_url('exlapor/#'); ?>" id="doc" onclick="return false;"><i class="fas fa-file-word fa-fw me-2"></i>Word</a>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col">
								<table id="table_perizinan" class="display nowrap " style="font-size: 14px; width:100%; overflow-x:auto;">
									<thead>
										<tr>
											<th><i class="fas fa-fw fa-calendar-alt"></i> Waktu</th>
											<th><i class="fas fa-fw fa-info"></i> Status</th>
											<th><i class="fas fa-fw fa-info"></i> Admin</th>
											<th><i class="fas fa-fw fa-users"></i> Judul</th>
											<th><i class="fas fa-fw fa-box"></i> Isi Pengumuman</th>
											<th><i class="fas fa-fw fa-time"></i> Aksi</th>
										</tr>
									</thead>
									<tbody>
										<?php foreach ($info as $p) : ?>
											<tr>
												<td style="<?= $tdStyle; ?>">
													<?php if ($p['waktu'] == !null) : ?>
														<?= $p['waktu']; ?>
													<?php else : ?>
														(Kosong)
													<?php endif; ?>
												</td>
												<td style="<?= $tdStyle; ?>">
													<?php $awal  = date_create($p['waktu']);
													$akhir = date_create(); // waktu sekarang
													$diff  = date_diff($awal, $akhir);
													$year =  $diff->y . ' tahun, ';
													$month =  $diff->m . ' bulan, ';
													$day =  $diff->d . ' hari, ';
													$hour = $diff->h . ' jam, ';
													$minute = $diff->i . ' menit, ';
													$second =  $diff->s . ' detik, ';
													?>
													<?php if ($diff->y >= 1) : ?>
														<span class=" py-2 badge badge-dark" style="font-weight: 500;font-size: 11px;"><i class="fas fa-check fa-fw mr-1"></i><?= $year; ?> yang lalu</span>
													<?php endif; ?>
													<?php if ($diff->m <= 12 && $diff->m !== 0) : ?>
														<span class="py-2 badge badge-danger" style="font-weight: 500;font-size: 11px;"><i class="fas fa-times fa-fw mr-1"></i><?= $month; ?> yang lalu </span>
													<?php endif; ?>
													<?php if ($diff->d <= 7 && $diff->d !== 0) : ?>
														<span class="py-2 badge badge-warning" style="font-weight: 500;font-size: 11px;"><i class="fas fa-spinner fa-fw mr-1"></i><?= $day; ?> yang lalu</span>
													<?php endif; ?>
													<?php if ($diff->h <= 24 && $diff->h !== 0) : ?>
														<span class="py-2 badge badge-primary" style="font-weight: 500;font-size: 11px;"><i class="fas fa-spinner fa-fw mr-1"></i><?= $hour; ?> yang lalu</span>
													<?php endif; ?>
													<?php if ($diff->i <= 60 && $diff->i !== 0) : ?>
														<span class="py-2 badge badge-info" style="font-weight: 500;font-size: 11px;"><i class="fas fa-spinner fa-fw mr-1"></i><?= $minute; ?> yang lalu</span>
													<?php endif; ?>
													<?php if ($diff->s <= 60 && $diff->i !== 0) : ?>
														<span class="py-2 badge badge-success" style="font-weight: 500;font-size: 11px;"><i class="fas fa-spinner fa-fw mr-1"></i><?= $second; ?> yang lalu</span>
													<?php endif; ?>
												</td>
												<td style="<?= $tdStyle; ?>">
													<?php if ($p['nama'] == !null) : ?>
														<?= $p['nama']; ?>
													<?php else : ?>
														(Kosong)
													<?php endif; ?>
												</td>
												<td style="<?= $tdStyle; ?>">
													<?php if ($p['judul'] == !null) : ?>
														<?= $p['judul']; ?>
													<?php else : ?>
														(Kosong)
													<?php endif; ?>
												</td>
												<td style="<?= $tdStyle; ?>">
													<?php if ($p['isi'] == !null) : ?>
														<?= $p['isi']; ?>
													<?php else : ?>
														(Kosong)
													<?php endif; ?>
												</td>
												<?php if (session('role') == 0) : ?>
													<td>
														<div class="btn-group" role="group" aria-label="inoutcom">
															<button type="button" class="btn btn-dark btn-sm edit-pengumuman px-2 rounded-left" data-id="<?= $p['id_pengumuman']; ?>" data-judul="<?= $p["judul"]; ?>" data-isi="<?= $p['isi']; ?>" data-uid="<?= $p['uid']; ?>" data-waktu="<?= $p['waktu']; ?>" data-toggle="modal" data-target="#Edit_Pengumuman"><i class="fas fa-edit fa-fw"></i></button>
															<button type="button" class="btn btn-success text-light btn-sm detl-pengumuman px-2 rounded-right" data-id="<?= $p['id_pengumuman']; ?>" data-judul="<?= $p["judul"]; ?>" data-isi="<?= $p['isi']; ?>" data-uid="<?= $p['uid']; ?>" data-waktu="<?= $p['waktu']; ?>" data-toggle="modal" data-target="#Delete_Pengumuman"><i class="fas fa-print fa-fw"></i></button>
														</div>
													</td>
												<?php endif; ?>
											</tr>
										<?php endforeach; ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
					<div class="container">
						<small><b>*NB :</b></small>
					</div>
				</div>
			</div><br>
		</section>
	</div>
</main>

<!-- Tambah Pengumuman Modal -->
<div class="modal fade" id="Tambah_Pengumuman" tabindex="-1" aria-labelledby="Tambah_PengumumanLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header text-light" style="background-color: #199ac5 !important;">
				<h5 class="modal-title" id="Tambah_PengumumanLabel"><i class="fas fa-fw fa-folder-plus text-light"></i> Tambah Pengumuman</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true" class="text-light">&times;</span>
				</button>
			</div>
			<form action="<?= base_url('Admin/TambahPengumuman'); ?>" method="POST" enctype="multipart/form-data">
				<?= csrf_field(); ?>
				<div class="modal-body">
					<div class="row">
						<div class="col-sm-8">
							<div class="form-group">
								<label for="tambah_judul"><i class="fas fa-fw fa-info"></i><b> Judul Pengumuman</b></label>
								<input type="text" class="form-control" id="tambah_judul" placeholder="Tambah Judul..." name="judul" required>
								<small><b>*</b> Harus sesuai judul Barang !</small>
							</div>
							<div class="form-group">
								<label for="tambah_isi"><i class="fas fa-fw fa-comment-dots"></i><b> Isi Pengumuman</b></label>
								<textarea class="form-control" id="tambah_isi" rows="6" name="isi" placeholder="Sampaikan isi pengumuman...&#10;" required></textarea>
								<small class="text-muted"><span style="color: red;">*</span> Maksimal 254 huruf</small>
							</div>
						</div>
						<div class="col-sm-4 border-left p-4">
							<div class="form-group">
								<button type="button" class="btn btn-danger btn-block info-clear p-2"><i class="fas fa-fw fa-trash"></i> Kosongkan</button>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-fw fa-window-close"></i> Batal</button>
						<button type="submit" class="btn btn-primary"><i class="fas fa-fw fa-check"></i> Simpan</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- Edit Pengumuman Modal -->
<div class="modal fade" id="Edit_Pengumuman" tabindex="-1" aria-labelledby="Edit_PengumumanLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header bg-dark text-light">
				<h5 class="modal-title" id="Edit_PengumumanLabel"><i class="fas fa-fw fa-folder-open text-light"></i> Edit Pengumuman</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true" class="text-light">&times;</span>
				</button>
			</div>
			<form action="<?= base_url('Admin/EditPengumuman'); ?>" method="POST" enctype="multipart/form-data">
				<?= csrf_field(); ?>
				<div class="modal-body">
					<div class="row">
						<div class="col-sm-8">
							<div class="form-group">
								<label for="edit_judul"><i class="fas fa-fw fa-info"></i><b> Judul Pengumuman</b></label>
								<input type="text" class="form-control" id="edit_judul" placeholder="Edit Judul..." name="judul" required>
								<small><b>*</b> Harus sesuai judul Barang !</small>
							</div>
							<div class="form-group">
								<label for="edit_isi"><i class="fas fa-fw fa-comment-dots"></i><b> Isi Pengumuman</b></label>
								<textarea class="form-control" id="edit_isi" rows="6" name="isi" placeholder="Sampaikan isi pengumuman...&#10;" required></textarea>
								<small class="text-muted"><span style="color: red;">*</span> Maksimal 254 huruf</small>
							</div>
						</div>
						<div class="col-sm-4 border-left p-4">
							<div class="form-group">
								<button type="button" class="btn btn-danger btn-block info-clear p-2"><i class="fas fa-fw fa-trash"></i> Kosongkan</button>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<input type="hidden" name="id_pengumuman" id="edit_id">
						<input type="hidden" name="uid" id="edit_uid">
						<input type="hidden" name="waktu" id="edit_waktu">
						<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-fw fa-window-close"></i> Batal</button>
						<button type="submit" class="btn btn-primary"><i class="fas fa-fw fa-check"></i> Simpan</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>

<?= $this->endSection() ?>