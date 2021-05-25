<!doctype html>
<html lang="id">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Website Item Warehouse Management Framework C">
	<meta name="author" content="Dev Cakra, Merdin Risal, RifkyA911">
	<title><?= $title; ?></title>
	<link rel="icon" href="<?= base_url('img/icon/favicon.ico') ?>">
	<!-- Google Fonts Roboto -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" />
	<link rel="stylesheet" href="<?= base_url('../vendor/bootstrap-4.0.0/dist/css/bootstrap.min.css') ?>">
	<link rel="stylesheet" href="<?= base_url('fontawesome/css/all.css') ?>">
	<link rel="stylesheet" href="<?= base_url('../css/content.css') ?>" /> <!-- include cakra --->
</head>

<body>
	<!--Main layout-->
	<main>
		<div class="container pt-4">
			<section class="mb-4">
				<table width="100%" style="vertical-align: middle; font-size: 12pt; color: #000000;page-break-inside:avoid">
					<tr>
						<td width="15%" style="text-align: right;"><img src="<?= base_url('../img/icon/favicon-32x32.png') ?>" style="width:4em;height:4em;" alt="Logo-IB"></td>
						<td width="100%" colspan="6" style="text-align: center;">
							<div style="font-size: 13pt; font-weight: bold;">IBMAETER INDONESIA</div>
							<div style="font-weight: 200;">Website Inventaris Barang Gudang dan Manajemen Pekerja Terpadu</div>
							<div style="font-weight: 200;">Telp. 031-4614099 Fax. 5619082 / Email : ibmaeter@ibweb.ac.id</div>
						</td>
					</tr>
				</table>

				<div class="card" style="margin-top: 58px">
					<div class="card-header text-center py-3">
						<h3 class="mb-0 text-center">
							<center><strong>Nota Perizinan Barang</strong></center>
						</h3>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col">
								<?php if (session('role') == 0) : ?>
									<?php foreach ($log_item as $log) : ?>
										<div class="modal-body">
											<div class="row">
												<div class="col-6">
													<div class="form-group">
														<label for="notaizin_waktu" class="font-weight-bold"><i class="fas fa-fw fa-calendar-alt"></i> Waktu</label>
														<div class="alert alert-secondary" role="alert"><?= $log['tgl']; ?></div>
													</div>
													<div class="form-group">
														<label for="notaizin_pekerja" class="font-weight-bold"><i class="fas fa-fw fa-users"></i> Pekerja</label>
														<div class="alert alert-secondary" role="alert"><?= $log['nama']; ?></div>
													</div>
													<div class="form-group">
														<label for="notaizin_barang" class="font-weight-bold"><i class="fas fa-fw fa-box"></i> Barang</label>
														<div class="alert alert-secondary" role="alert"><?= $log['nama_item']; ?></div>
													</div>
													<div class="form-group">
														<label for="notaizin_request" class="font-weight-bold"><i class="fas fa-fw fa-exchange-alt"></i> Request</label>
														<div class="alert alert-secondary" role="alert">
															<?php if ($log['request'] == "Masuk") : ?>
																<?= $log['request']; ?>
															<?php else : ?>
																<?= $log['request']; ?>
															<?php endif; ?>
														</div>
													</div>
												</div>
												<div class="col-6">
													<div class="form-group">
														<label for="notaizin_stok" class="font-weight-bold"><i class="fas fa-fw fa-dolly-flatbed"></i> Stok</label>
														<div class="alert alert-secondary" role="alert"><?= $log['ubah_stok']; ?></div>
													</div>
													<div class="form-group">
														<label for="notaizin_status" class="font-weight-bold"><i class="fas fa-fw fa-tags"></i> Status</label>
														<div class="alert alert-secondary" role="alert">
															<?php
															if ($log['status'] == 'Diterima') {
																echo "DITERIMA";
															} elseif ($log['status'] == 'Ditolak') {
																echo "DITOLAK";
															} else {
																echo "PROSES";
															}
															?>
														</div>
													</div>
													<div class="form-group">
														<label for="notaizin_keterangan" class="font-weight-bold"><i class="fas fa-fw fa-file-signature"></i> Keterangan</label>
														<div class="alert alert-secondary" role="alert" style="height: 150px;"><?= $log['ket']; ?></div>
													</div>
												</div>
											</div>
										</div>
									<?php endforeach; ?>
								<?php else : ?>
									<?php foreach ($log_item as $log) : ?>
										<div class="modal-body">
											<div class="row">
												<div class="col-6">
													<div class="form-group">
														<label for="notaizin_waktu" class="font-weight-bold"><i class="fas fa-fw fa-calendar-alt"></i> Waktu</label>
														<div class="alert alert-secondary" role="alert"><?= $log['tgl']; ?></div>
													</div>
													<div class="form-group">
														<label for="notaizin_pekerja" class="font-weight-bold"><i class="fas fa-fw fa-users"></i> Pekerja</label>
														<div class="alert alert-secondary" role="alert"><?= $log['nama']; ?></div>
													</div>
													<div class="form-group">
														<label for="notaizin_barang" class="font-weight-bold"><i class="fas fa-fw fa-box"></i> Barang</label>
														<div class="alert alert-secondary" role="alert"><?= $log['nama_item']; ?></div>
													</div>
													<div class="form-group">
														<label for="notaizin_request" class="font-weight-bold"><i class="fas fa-fw fa-exchange-alt"></i> Request</label>
														<div class="alert alert-secondary" role="alert">
															<?php if ($log['request'] == "Masuk") : ?>
																<?= $log['request']; ?>
															<?php else : ?>
																<?= $log['request']; ?>
															<?php endif; ?>
														</div>
													</div>
												</div>
												<div class="col-6">
													<div class="form-group">
														<label for="notaizin_stok" class="font-weight-bold"><i class="fas fa-fw fa-dolly-flatbed"></i> Stok</label>
														<div class="alert alert-secondary" role="alert"><?= $log['ubah_stok']; ?></div>
													</div>
													<div class="form-group">
														<label for="notaizin_status" class="font-weight-bold"><i class="fas fa-fw fa-tags"></i> Status</label>
														<div class="alert alert-secondary" role="alert">
															<?php
															if ($log['status'] == 'Diterima') {
																echo "DITERIMA";
															} elseif ($log['status'] == 'Ditolak') {
																echo "DITOLAK";
															} else {
																echo "PROSES";
															}
															?>
														</div>
													</div>
													<div class="form-group">
														<label for="notaizin_keterangan" class="font-weight-bold"><i class="fas fa-fw fa-file-signature"></i> Keterangan</label>
														<div class="alert alert-secondary" role="alert" style="height: 150px;"><?= $log['ket']; ?></div>
													</div>
												</div>
											</div>
										</div>
									<?php endforeach; ?>
								<?php endif; ?>
							</div>
						</div>
					</div>
				</div><br>

				<table width="100%" style="vertical-align: middle; font-size: 12pt; color: #000000;page-break-inside:avoid">
					<tr>
						<td colspan="4" style="text-align: center;">
							<p style="text-align: left;">*Bukti Tanda Terima Income-Outcome Stock Barang, <br>Harap disimpan baik-baik</p>
						</td>
						<td colspan="2" style="text-align: right;">
							<h4 style="margin-bottom: 30px;">
								Founder Ibmaeter,
							</h4>
						</td>
					</tr>
					<tr>
						<td colspan="4" style="text-align: center;"></td>
						<td colspan="2" width="30%" style="text-align: right;" height="30">
							<img src="<?= base_url('../img/TTD_FOUNDER.png') ?>" style="float:right;margin-bottom:10px;width:10em;height:6em;" alt="TTD-Founder">
						</td>
					</tr>
					<tr>
						<td colspan="4" style="text-align: center;"></td>
						<td colspan="2" width="30%" style="text-align: right;">
							<u>
								<h5>Alfha Fierly Firdaus</h5>
							</u>
						</td>
					</tr>
				</table>
			</section>
		</div><br>
	</main>

	<script>
		window.print();
		window.onafterprint = function() {
			window.location.href = history.go(-1);
		}
	</script>
</body>

</html>