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
						<td width="15%" style="text-align: right;"><img src="<?= base_url('../img/icon/favicon-32x32.png') ?>" style="width:4em;height:4em;" alt="Logo-Invenbar"></td>
						<td width="100%" colspan="6" style="text-align: center;">
							<div style="font-size: 13pt; font-weight: bold;">INVENBAR INDONESIA</div>
							<div style="font-weight: 200;">Website Inventaris Barang Gudang Toko Toserba</div>
							<div style="font-weight: 200;">Telp. 031-4614099 Fax. 5619082 / Email : invenbar@invweb.ac.id</div>
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
								<?php foreach ($spec as $b) : ?>
									<div class="modal-body">
										<div class="row">
											<div class="col-6">
												<div class="form-group">
													<label for="notaspesifikasi_nama" class="font-weight-bold"><i class="fas fa-fw fa-box"></i> Nama Barang</label>
													<div class="alert alert-secondary" role="alert">
														<?php if ($b['nama_item'] != null) : ?>
															<?= $b['nama_item']; ?>
														<?php else : ?>
															<span class="font-weight-bold text-danger">(Kosong)</span>
														<?php endif; ?>
													</div>
												</div>
												<div class="form-group">
													<label for="notaspesifikasi_stok" class="font-weight-bold"><i class="fas fa-fw fa-cubes"></i> Stok Barang Saat Ini</label>
													<div class="alert alert-secondary" role="alert">
														<?php if ($b['stok'] != null) : ?>
															<?= $b['stok']; ?>
														<?php else : ?>
															<span class="font-weight-bold text-danger">(Kosong)</span>
														<?php endif; ?>
													</div>
												</div>
												<div class="form-group">
													<label for="notaspesifikasi_jenis" class="font-weight-bold"><i class="fas fa-fw fa-th-list"></i> Jenis Barang</label>
													<div class="alert alert-secondary" role="alert">
														<?php if ($b['jenis'] != null) : ?>
															<?= $b['jenis']; ?>
														<?php else : ?>
															<span class="font-weight-bold text-danger">(Kosong)</span>
														<?php endif; ?>
													</div>
												</div>
												<div class="form-group">
													<label for="notaspesifikasi_penyimpanan" class="font-weight-bold"><i class="fas fa-fw fa-thumbtack"></i> Tempat Gudang</label>
													<div class="alert alert-secondary" role="alert">
														<?php if ($b['penyimpanan'] != null) : ?>
															<?= $b['penyimpanan']; ?>
														<?php else : ?>
															<span class="font-weight-bold text-danger">(Kosong)</span>
														<?php endif; ?>
													</div>
												</div>
											</div>
											<div class="col-6">
												<div class="form-group">
													<label for="notaspesifikasi_kode" class="font-weight-bold"><i class="fas fa-fw fa-tag"></i> Kode Barang</label>
													<div class="alert alert-secondary" role="alert">
														<?php if ($b['kode_barang'] != null) : ?>
															<?= $b['kode_barang']; ?>
														<?php else : ?>
															<span class="font-weight-bold text-danger">(Kosong)</span>
														<?php endif; ?>
													</div>
												</div>
												<div class="form-group">
													<label for="notaspesifikasi_harga" class="font-weight-bold"><i class="fas fa-fw fa-money-bill-wave-alt"></i> Harga/item Saat Ini (IDR)</label>
													<div class="alert alert-secondary" role="alert">
														<?php if ($b['harga'] != 0) : ?>
															<?= $b['harga']; ?>
														<?php else : ?>
															<span class="font-weight-bold text-danger">(Kosong)</span>
														<?php endif; ?>
													</div>
												</div>
												<div class="form-group">
													<label for="notaspesifikasi_berat" class="font-weight-bold"><i class="fas fa-fw fa-dolly-flatbed"></i> Berat/item (gram)</label>
													<div class="alert alert-secondary" role="alert">
														<?php if ($b['berat'] != 0) : ?>
															<?= $b['berat']; ?>
														<?php else : ?>
															<span class="font-weight-bold text-danger">(Kosong)</span>
														<?php endif; ?>
													</div>
												</div>
												<div class="form-group">
													<label for="notaspesifikasi_supplier" class="font-weight-bold"><i class="fas fa-fw fa-id-card-alt"></i> Pensuplai Barang</label>
													<div class="alert alert-secondary" role="alert">
														<?php if ($b['nama_supplier'] != null) : ?>
															<?= $b['nama_supplier']; ?>
														<?php else : ?>
															<span class="font-weight-bold text-danger">(Kosong)</span>
														<?php endif; ?>
													</div>
												</div>
											</div>
										</div>
									</div>
								<?php endforeach; ?>
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
								Founder Invenbar,
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