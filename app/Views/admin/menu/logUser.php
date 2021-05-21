<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<link rel="stylesheet" href="<?= base_url('../css/content.css') ?>" /> <!-- include cakra --->

<?php

foreach ($countPresent as $wc) {
	if ($countPresent != null) {
		$presentCount = $wc['uid_absen'];
	} else {
		$presentCount = 0;
	}
}

foreach ($countLate as $nwc) {
	if ($countLate != null) {
		$lateCount = $nwc['uid_absen'];
	} else {
		$lateCount = 0;
	}
}

foreach ($countPermission as $cp) {
	if ($countPermission != null) {
		$permissionCount = $cp['uid_absen'];
	} else {
		$permissionCount = 0;
	}
}

?>

<!--Main layout-->
<main class="bg-dark">
	<div class="container pt-4">
		<section class="mb-4">
			<div class="card">
				<div class="card-header text-center py-3">
					<?php if (session()->getFlashdata('pesan')) : ?>
						<div class="alert alert-success" role="alert">
							<h4><?= session()->getFlashdata('pesan'); ?></h4>
						</div>
					<?php endif ?>
					<?php if (session()->getFlashdata('alert')) : ?>
						<div class="alert alert-danger" role="alert">
							<h4><?= session()->getFlashdata('alert'); ?></h4>
						</div>
					<?php endif ?>
					<h5 class="mb-0 text-center">
						<strong>ABSENSI USER</strong>
					</h5>
				</div>
				<div class="card-body pt-1">
					<div class="container mb-3 pb-2" style="border-bottom: 1px solid #dfdfdf;">
						<div class="row my-3">
							<div class="flex-fill">
								<div class="btn-group btn-wrap">
									<button type="button" class="btn active btn-dark dropdown-toggle btn-sm shadow-sm p-2" style="float:right;" onclick="return false;" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										<i class="fas fa-fw fa-file"></i> Export
									</button>
									<div class="dropdown-menu dm-export">
										<a class="dropdown-item dm-export-item" href="<?= base_url('exlapor/excelabsensi'); ?>" id="xls"><i class="fas fa-file-csv fa-fw me-2"></i>Excel</a>
										<a class="dropdown-item dm-export-item" href="<?= base_url('exlapor/docabsensi'); ?>" id="doc"><i class="fas fa-file-word fa-fw me-2"></i>Word</a>
										<a class="dropdown-item dm-export-item" href="<?= base_url('exlapor/pdfabsensi'); ?>" id="pdf"><i class="fas fa-file-pdf fa-fw me-2"></i>Pdf</a>
									</div>
									<a type="button" href="<?= base_url('exlapor/pdfprintAbsensi'); ?>" id="item_pdf" class="btn active btn-success btn-sm shadow-sm p-2"><i class="fas fa-print fa-fw"></i> Print Laporan</a>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col">
								<table id="table_absensi" class="display nowrap " style="font-size: 14px; width:100%; overflow-x:auto;">
									<thead>
										<tr>
											<th>Email</th>
											<th>Status Absensi</th>
											<th>Alasan Izin</th>
											<th>Bukti Izin</th>
											<th>Waktu</th>
											<th>Aksi</th>
										</tr>
									</thead>
									<tbody>
										<?php foreach ($absensi as $abs) : ?>
											<tr>
												<td><?= $abs['email_absen']; ?></td>
												<td><?= $abs['status_absen']; ?></td>
												<?php if ($abs['bukti_izin'] == "-") : ?>
													<td><b><?= $abs['alasan_izin']; ?></b></td>
													<td><b><?= $abs['bukti_izin']; ?></b></td>
												<?php else : ?>
													<td><?= $abs['alasan_izin']; ?></td>
													<td>
														<button type="button" class="btn btn-sm btn-img-item px-2 " data-img="<?= base_url('../img/bukti_absen/' . $abs['bukti_izin']); ?>" data-toggle="modal" data-target="#gambarBukti">
															<img src="<?= base_url('../img/bukti_absen/' . $abs['bukti_izin']); ?>" width="150" height="auto">
														</button>
													</td>
												<?php endif; ?>
												<td><?= $abs['tgl_absen'] . ", " . $abs['waktu_absen']; ?></td>
												<td>
													<?php if ($abs['respons'] == "Pending") : ?>
														<div class="btn-group" role="group" aria-label="inoutcom">
															<button type="button" class="btn btn-success btn-sm btn-acc-item px-2 rounded-left" data-idizin="<?= $abs['id_absen']; ?>" data-toggle="modal" data-target="#Terima"><i class="fas fa-check fa-fw"></i>Terima</button>
															<button type="button" class="btn btn-danger btn-sm btn-rjc-item px-2 rounded-right" data-idizin="<?= $abs['id_absen']; ?>" data-toggle="modal" data-target="#Tolak"><i class="fas fa-times fa-fw"></i>Tolak</button>
														</div>
													<?php elseif ($abs['respons'] == "Diterima") : ?>
														<button type="button" class="btn btn-success btn-sm px-2 rounded" disabled><i class="fas fa-check fa-fw"></i>Diterima</button>
													<?php elseif ($abs['respons'] == "Ditolak") : ?>
														<button type="button" class="btn btn-danger btn-sm px-2 rounded" disabled><i class="fas fa-times fa-fw"></i>Ditolak</button>
													<?php else : ?>
														<button type="button" class="btn btn-secondary btn-sm px-2 rounded" disabled></i>Hadir</button>
													<?php endif; ?>
												</td>
											</tr>
										<?php endforeach; ?>
									</tbody>
								</table>
							</div>
						</div>
						<p class="absensiCount">
							Jumlah pekerja hadir : <?= $presentCount; ?> <br>
							Jumlah pekerja terlambat : <?= $lateCount; ?> <br>
							Jumlah pekerja ijin : <?= $permissionCount; ?> <br>
							Jumlah pekerja tidak hadir : <?= $totalUser - $presentCount; ?>
						</p>
					</div>
				</div>
		</section>
		<section class="mb-4">
			<div class="card">
				<div class="card-header text-center py-3">
					<h5 class="mb-0 text-center">
						<strong>AKTIVITAS USER</strong>
					</h5>
				</div>
				<div class="card-body pt-1">
					<div class="container mb-3 pb-2" style="border-bottom: 1px solid #dfdfdf;">
						<div class="row my-3">
							<div class="flex-fill">
								<div class="btn-group btn-wrap">
									<button type="button" class="btn active btn-dark dropdown-toggle btn-sm shadow-sm p-2" style="float:right;" onclick="return false;" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										<i class="fas fa-fw fa-file"></i> Export
									</button>
									<div class="dropdown-menu dm-export">
										<a class="dropdown-item dm-export-item" href="<?= base_url('exlapor/excelaktivitas'); ?>" id="xls"><i class="fas fa-file-csv fa-fw me-2"></i>Excel</a>
										<a class="dropdown-item dm-export-item" href="<?= base_url('exlapor/docaktivitas'); ?>" id="doc"><i class="fas fa-file-word fa-fw me-2"></i>Word</a>
										<a class="dropdown-item dm-export-item" href="<?= base_url('exlapor/pdfaktivitas'); ?>" id="pdf"><i class="fas fa-file-pdf fa-fw me-2"></i>Pdf</a>
									</div>
									<a type="button" href="<?= base_url('exlapor/pdfprintAktivitas'); ?>" id="item_pdf" class="btn active btn-success btn-sm shadow-sm p-2"><i class="fas fa-print fa-fw"></i> Print Laporan</a>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col">
								<table id="table_aktivitas" class="display nowrap " style="font-size: 14px; width:100%; overflow-x:auto;">
									<thead>
										<tr>
											<th>Email</th>
											<th>Aktivitas</th>
											<th>Waktu</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>saber.datealive@gmail.com</td>
											<td>http://localhost:8080/admin/login</td>
											<td>2021/4/26 11:31:10 AM</td>
										</tr>
										<tr>
											<td>saber.datealive@gmail.com</td>
											<td>http://localhost:8080/admin/Logout</td>
											<td>2021/4/26 11:32:11 AM</td>
										</tr>
										<tr>
											<td>kuro911@gmail.com</td>
											<td>http://localhost:8080/admin/login</td>
											<td>2021/4/26 11:33:12 AM</td>
										</tr>

										<tr>
											<td>kuro911@gmail.com</td>
											<td>http://localhost:8080/menu/Absensi</td>
											<td>2021/4/26 11:36:15 AM</td>
										</tr>
										<tr>
											<td>kuro911@gmail.com</td>
											<td>http://localhost:8080/admin/Adminpengumuman</td>
											<td>2021/4/26 11:34:13 AM</td>
										</tr>
										<tr>
											<td>kuro911@gmail.com</td>
											<td>http://localhost:8080/admin/logUser</td>
											<td>2021/4/26 11:35:14 AM</td>
										</tr>
										<tr>
											<td>kuro911@gmail.com</td>
											<td>http://localhost:8080/admin/Datauser</td>
											<td>2021/4/27 11:37:16 AM</td>
										</tr>
										<tr>
											<td>kuro911@gmail.com</td>
											<td>http://localhost:8080/admin/Logout</td>
											<td>2021/4/27 11:37:16 AM</td>
										</tr>
										<tr>
											<td>genshin_keqing@gmail.com</td>
											<td>http://localhost:8080/admin/login</td>
											<td>2021/4/27 11:37:16 AM</td>
										</tr>
										<tr>
											<td>genshin_keqing@gmail.com</td>
											<td>http://localhost:8080/admin/Logout</td>
											<td>2021/4/27 11:37:16 AM</td>
										</tr>
										<tr>
											<td>kuro.sensei99@gmail.com</td>
											<td>http://localhost:8080/admin/login</td>
											<td>2021/4/28 07:37:16 AM</td>
										</tr>
										<tr>
											<td>kuro.sensei99@gmail.com</td>
											<td>http://localhost:8080/menu/Absensi</td>
											<td>2021/4/28 07:37:16 AM</td>
										</tr>
										<tr>
											<td>kuro.sensei99@gmail.com</td>
											<td>http://localhost:8080/admin/Logout</td>
											<td>2021/4/28 07:37:16 AM</td>
										</tr>
										<tr>
											<td>rungkutgakure@gmail.com</td>
											<td>http://localhost:8080/admin/login</td>
											<td>2021/4/28 09:37:16 AM</td>
										</tr>
										<tr>
											<td>rungkutgakure@gmail.com</td>
											<td>http://localhost:8080/menu/Absensi</td>
											<td>2021/4/28 09:37:16 AM</td>
										</tr>
										<tr>
											<td>rungkutgakure@gmail.com</td>
											<td>http://localhost:8080/admin/Logout</td>
											<td>2021/4/28 09:37:16 AM</td>
										</tr>
										<tr>
											<td>bagindahokage@gmail.com</td>
											<td>http://localhost:8080/admin/login</td>
											<td>2021/4/28 11:37:16 AM</td>
										</tr>
										<tr>
											<td>bagindahokage@gmail.com</td>
											<td>http://localhost:8080/menu/Absensi</td>
											<td>2021/4/28 11:37:16 AM</td>
										</tr>
										<tr>
											<td>bagindahokage@gmail.com</td>
											<td>http://localhost:8080/admin/Logout</td>
											<td>2021/4/28 11:37:16 AM</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
		</section>
	</div><br>
</main>

<!-- Gambar Modal -->
<div class="modal fade" id="gambarBukti" aria-hidden="true" aria-labelledby="gambarBuktiLabel" tabindex="-1">
	<div class="modal-dialog modal-lg modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="gambarBuktiLabel">Bukti Screenshot</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<img width="750px" height="auto">
			</div>
			<!-- <div class="modal-footer">
				<button class="btn btn-primary" data-bs-target="#exampleModalToggle" data-bs-toggle="modal" data-bs-dismiss="modal">Back to first</button>
			</div> -->
		</div>
	</div>
</div>

<!-- Accept Modal -->
<div class="modal fade" id="Terima" tabindex="-1" aria-labelledby="TerimaIzinLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header bg-light">
				<h5 class="modal-title" id="TerimaIzinLabel"><b>Izin Disetujui</b></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="<?= base_url('Admin/responIzin'); ?>" method="POST" enctype="multipart/form-data">
					<?= csrf_field(); ?>
					<div class="form-group">
						<label for="acc_komentar">Komentar</label>
						<textarea class="col-sm-12 p-2 <?= ($validation->hasError('komen')) ? 'is-invalid' : ''; ?>" id="acc_komentar" name="komen" placeholder="Tuliskan Komentar Anda" value="<?= (old('komen')) ? old('komen') : ""; ?>"></textarea>
						<div class="invalid-feedback">
							<?= $validation->getError('komen'); ?>
						</div>
					</div>
					<div class="modal-footer">
						<input type="hidden" id="acc-izin" name="id_absen" value="">
						<input type="hidden" id="status" name="status_absen" value="Diterima">
						<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-fw fa-window-close"></i> Batal</button>
						<button type="submit" class="btn btn-primary"><i class="fas fa-check-square fa-fw"></i> Selesai</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<!-- Reject Modal -->
<div class="modal fade" id="Tolak" tabindex="-1" aria-labelledby="TolakIzinLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header bg-light">
				<h5 class="modal-title" id="TolakIzinLabel"><b>Izin Ditolak</b></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="<?= base_url('Admin/responIzin'); ?>" method="POST" enctype="multipart/form-data">
					<?= csrf_field(); ?>
					<div class="form-group">
						<label for="acc_komentar">Komentar</label>
						<textarea class="col-sm-12 p-2 <?= ($validation->hasError('komen')) ? 'is-invalid' : ''; ?>" id="acc_komentar" name="komen" placeholder="Tuliskan Komentar Anda" value="<?= (old('komen')) ? old('komen') : ""; ?>"></textarea>
						<div class="invalid-feedback">
							<?= $validation->getError('komen'); ?>
						</div>
					</div>
					<div class="modal-footer">
						<input type="hidden" id="dec-izin" name="id_absen" value="">
						<input type="hidden" id="status" name="status_absen" value="Ditolak">
						<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-fw fa-window-close"></i> Batal</button>
						<button type="submit" class="btn btn-primary"><i class="fas fa-check-square fa-fw"></i> Selesai</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<?= $this->endSection() ?>