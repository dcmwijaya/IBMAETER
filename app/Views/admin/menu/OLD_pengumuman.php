<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<link rel="stylesheet" href="<?= base_url('../css/content.css') ?>" /> <!-- include cakra --->

<!-- style for td -->
<?php $tdStyle = "white-space: -moz-pre-wrap !important; white-space: -pre-wrap; white-space: -o-pre-wrap; white-space: pre-wrap; word-wrap: break-word; white-space: -webkit-pre-wrap; word-break: break-word; white-space: normal;" ?>


<!--Main layout-->
<main class="bg-dark">
	<div class="container pt-4">
		<?php if (session()->getFlashdata('komenPerz')) : ?>
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
						<?= session()->getFlashdata('komenPerz'); ?>
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
						<div class="row">
							<div class="col-sm-8" id="info-maker">
								<?php foreach ($info as $i) : ?>
									<form action="<?= base_url('/Admin/editpengumuman'); ?>" method="POST" enctype="multipart/form-data">
										<div class="form-group">
											<label for="edit_judul_info"><b>Judul Pengumuman</b></label>
											<input type="text" class="form-control" id="edit_judul_info" name="judul" placeholder="Tuliskan judul pengumuman..." value="<?= $i['judul']; ?>">
										</div>
										<div class="form-group">
											<label for="edit_isi_info"><b>Isi Pengumuman</b></label>
											<textarea class="col-sm-12 p-2" id="edit_isi_info" rows="6" name="isi" placeholder="Sampaikan isi pengumuman..."><?= $i['isi']; ?></textarea>
											<small class="text-muted"><span style="color: red;">*</span> Maksimal 256 huruf</small>
										</div>
										<div class="my-4">
											<input type="hidden" class="form-control" value="<?= $i['id']; ?>" name="id_info">
											<button type="submit" class="btn btn-success btn-block"><i class="fas fa-fw fa-check"></i> Terapkan</button>
										</div>
									</form>
								<?php endforeach; ?>
							</div>
							<div class="col-sm-1"></div>
							<div class="col-sm-3">
								<hr>
								<div class="mt-3">
									<button type="button" class="btn btn-danger btn-block info-clear p-2"><i class="fas fa-fw fa-trash"></i> Kosongkan</button>
									<!-- <button type="button" class="btn btn-warning btn-block p-2 mt-3"><i class="fas fa-fw fa-print"></i> Cetak Pengumuman</button> -->
								</div>
							</div>
						</div>
					</div>
					<div class="container mb-3 pb-2" style="border-bottom: 1px solid #dfdfdf;">
						<div class="row my-3">
							<div class="flex-fill">
								<div class="btn-group btn-wrap">
									<button type="button" class="btn active btn-dark dropdown-toggle btn-sm shadow-sm p-2" style="float:right;" onclick="return false;" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										<i class="fas fa-fw fa-file"></i> Export
									</button>
									<div class="dropdown-menu dm-export">
										<a class="dropdown-item dm-export-item" href="<?= base_url('exlapor/#'); ?>" id="xls" onclick="return false;"><i class="fas fa-file-csv fa-fw me-2"></i>Excel</a>
										<a class="dropdown-item dm-export-item" href="<?= base_url('exlapor/#'); ?>" id="doc" onclick="return false;"><i class="fas fa-file-word fa-fw me-2"></i>Word</a>
									</div>
									<a href="<?= base_url('exlapor/#'); ?>" id="item_pdf" onclick="return false;" class="btn active btn-success btn-sm shadow-sm p-2"><i class="fas fa-print fa-fw"></i> Print Laporan</a>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col">
								<table id="table_perizinan" class="display nowrap " style="font-size: 14px; width:100%; overflow-x:auto;">
									<thead>
										<tr>
											<th><i class="fas fa-fw fa-calendar-alt"></i> Waktu</th>
											<th><i class="fas fa-fw fa-users"></i> Pekerja</th>
											<th><i class="fas fa-fw fa-box"></i> Barang</th>
											<th>Request</th>
											<th>Stok</th>
											<th>Status</th>
											<th>Keterangan</th>
											<th>Aksi</th>
										</tr>
									</thead>
									<tbody>
										<?php foreach ($log_item as $log) : ?>
											<tr>
												<td style="<?= $tdStyle; ?>"><?= $log['tgl']; ?></td>
												<td><?= $log['nama_pekerja']; ?></td>
												<td style="<?= $tdStyle; ?>"><?= $log['nama_barang']; ?></td>
												<td>
													<?php if ($log['request'] == "Masuk") : ?>
														<?= $log['request'] . '<i class="fas fa-fw fa-long-arrow-alt-up " style="color: #06a647 !important; font-size: 18px;"></i>'; ?>
													<?php else : ?>
														<?= $log['request'] . '<i class="fas fa-fw fa-long-arrow-alt-down" style="color: #d53651 !important; font-size: 18px;"></i>'; ?>
													<?php endif; ?>
												</td>
												<td style="width: 75px;">
													<div class="stok text-center bg-dark text-light py-1 rounded">
														<?= $log['ubah_stok']; ?>
													</div>
													<div class="progress mt-2">
														<div class="progress-bar bg-info" role="progressbar" style="width: <?= $log['ubah_stok']; ?>%" aria-valuenow="<?= $log['ubah_stok']; ?>" aria-valuemin="0" aria-valuemax="100"></div>
													</div>
												</td>
												<td>
													<?php if ($log['status'] == 'Diterima') : ?>
														<span class=" py-2 badge badge-success" style="font-weight: 500;font-size: 11px;"><i class="fas fa-check fa-fw mr-1"></i>DITERIMA</span>
													<?php elseif ($log['status'] == 'Ditolak') : ?>
														<span class="py-2 badge badge-danger" style="font-weight: 500;font-size: 11px;"><i class="fas fa-times fa-fw mr-1"></i>DITOLAK </span>
													<?php else : ?>
														<span class="py-2 badge badge-warning" style="font-weight: 500;font-size: 11px;background-color: orange;"><i class="fas fa-spinner fa-fw mr-1"></i>PENDING</span>
													<?php endif; ?>
												</td>
												<td style="<?= $tdStyle; ?>"><?= $log['ket']; ?></td>
												<td>
													<?php if ($log['status'] == 'Pending') : ?>
														<div class="btn-group" role="group" aria-label="inoutcom">
															<button type="button" class="btn btn-success btn-sm btn-acc-item px-2 rounded-left" data-no="<?= $log['no_log']; ?>" data-nama="<?= $log['nama_barang']; ?>" data-stok="<?= $log['ubah_stok']; ?>" data-reqs="<?= $log['request']; ?>" data-pekerja="<?= $log['nama_pekerja']; ?>" data-tgl="<?= $log['tgl']; ?>" data-ket="<?= $log['ket']; ?>" data-toggle="modal" data-target="#Accept"><i class="fas fa-check fa-fw"></i>Accept</button>
															<button type="button" class="btn btn-danger btn-sm btn-rjc-item px-2 rounded-right" data-no="<?= $log['no_log']; ?>" data-nama="<?= $log['nama_barang']; ?>" data-stok="<?= $log['ubah_stok']; ?>" data-reqs="<?= $log['request']; ?>" data-pekerja="<?= $log['nama_pekerja']; ?>" data-tgl="<?= $log['tgl']; ?>" data-ket="<?= $log['ket']; ?>" data-toggle="modal" data-target="#Rejected"><i class="fas fa-times fa-fw"></i>Decline</button>
														</div>
													<?php else : ?>
														<div class="info-progress">
															<span class=" py-2 badge badge-info" style="font-weight: 500;font-size: 11px;"><i class="fas fa-thumbs-up fa-fw mr-1"></i>Telah Diproses</span>
														</div>
													<?php endif; ?>
												</td>
											</tr>
										<?php endforeach; ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
					<div class="container">
						<small><b>*NB :</b> jika terdapat <b style="color: red;">kesalahan</b> dalam melakukan perizinan, mohon untuk melakukan <b style="color: sandybrown;">permintaan</b> perizinan ulang dari menu kelola barang.</small>
					</div>
				</div>
			</div><br>
		</section>
	</div>
</main>

<?= $this->endSection() ?>