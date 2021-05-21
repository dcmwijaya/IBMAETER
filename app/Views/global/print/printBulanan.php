<?php

// ====================================== Total Stok Berdasarkan Penyimpanan ====================================== //
if (!empty($sst)) {
	foreach ($sst as $vs) {
		$svt = intval($vs['stok']);
	}
}

// ====================================== Total Stok Berdasarkan Jenis ====================================== //
if (!empty($sj1)) {
	foreach ($sj1 as $vj1) {
		$sct1 = intval($vj1['stok']);
	}
}
if (!empty($sj2)) {
	foreach ($sj2 as $vj2) {
		$sct2 = intval($vj2['stok']);
	}
}
if (!empty($sj3)) {
	foreach ($sj3 as $vj3) {
		$sct3 = intval($vj3['stok']);
	}
}
if (!empty($sj4)) {
	foreach ($sj4 as $vj4) {
		$sct4 = intval($vj4['stok']);
	}
}
if (!empty($sj5)) {
	foreach ($sj5 as $vj5) {
		$sct5 = intval($vj5['stok']);
	}
}

// ====================================== Total Cost Barang ====================================== //
if (!empty($sco)) {
	foreach ($sco as $vc) {
		$svc = intval($vc['harga']);
	}
}

// ====================================== Total Weight Barang ====================================== //
if (!empty($swh)) {
	foreach ($swh as $vw) {
		$svw = intval($vw['berat']);
	}
}

// ====================================== Total Gender Employees ====================================== //
if (!empty($cf)) {
	foreach ($cf as $cfv) {
		$cfm1 = intval($cfv['gender']);
	}
}
if (!empty($cm)) {
	foreach ($cm as $cmv) {
		$cfm2 = intval($cmv['gender']);
	}
}

// ====================================== Total Income-Outcome Item ====================================== //
if (!empty($scin)) {
	foreach ($scin as $cn) {
		$tcin = intval($cn['ubah_stok']);
	}
}
if (!empty($scout)) {
	foreach ($scout as $ct) {
		$tcout = intval($ct['ubah_stok']);
	}
}

?>

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
</head>

<body>
	<main>
		<div class="container pt-4">
			<section class="mb-4">
				<table width="100%" style="vertical-align: middle; font-size: 12pt; color: #000000;page-break-inside:avoid">
					<tr>
						<td width="15%" style="text-align: right;"><img src="<?= base_url('../img/icon/favicon-32x32.png') ?>" style="width:4em;height:4em;" alt="Logo-Invenbar"></td>
						<td width="100%" colspan="6" style="text-align: center;">
							<div style="font-size: 13pt; font-weight: bold;">
								<h3 class="mb-0 text-center">
									<center><strong>Detail Laporan Bulanan Invenbar</strong></center>
								</h3><br>INVENBAR INDONESIA
							</div>
							<div style="font-weight: 200;">Website Inventaris Barang Gudang Toko Toserba</div>
							<div style="font-weight: 200;">Telp. 031-4614099 Fax. 5619082 / Email : invenbar@invweb.ac.id</div>
						</td>
					</tr>
				</table>


				<div class="card" style="margin-top: 58px">
					<div class="card-header text-center py-3">
						<h3 class="mb-0 text-center">
							<center><strong>Brief Information Invenbar</strong></center>
						</h3>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col">
								<table class="display nowrap " style="font-size: 14px; width:100% !important; overflow-x:auto;" border="1">
									<thead>
										<tr style="text-align: center;">
											<!-- kolom kiri -->
											<th colspan="5">Total Category Item</th>
											<!-- kolom kanan -->
											<th colspan="3">Total Inventory Room</th>
										</tr>
										<tr>
											<!-- kolom kiri -->
											<th>Cair</th>
											<th>Minyak</th>
											<th>Mudah Terbakar</th>
											<th>Padat</th>
											<th>Daging</th>
											<!-- kolom kanan -->
											<th>Stock Item</th>
											<th>Weight Item</th>
											<th>Cost Item</th>
										</tr>
									</thead>
									<tbody>
										<tr colspan="2" style="text-align: left;">
											<!-- kolom kiri -->
											<td><?= json_encode($sct1); ?></td>
											<td><?= json_encode($sct2); ?></td>
											<td><?= json_encode($sct3); ?></td>
											<td><?= json_encode($sct4); ?></td>
											<td><?= json_encode($sct5); ?></td>
											<!-- kolom kanan -->
											<td><?= json_encode($svt); ?></td>
											<td><?= json_encode($svw); ?></td>
											<td><?= json_encode($svc); ?></td>
										</tr>
									</tbody>
								</table>
								<table class="display nowrap " style="font-size: 14px; width:100% !important; overflow-x:auto;" border="1">
									<thead>
										<tr>
											<th colspan="8" style="height: 20px;"></th>
										</tr>
										<tr style="text-align: center;">
											<!-- kolom kiri -->
											<th colspan="2">Total Inventory Stock In-Out</th>
											<!-- kolom kanan -->
											<th colspan="2">Total Gender Employees</th>
										</tr>
										<tr>
											<!-- kolom kiri -->
											<th>Approve Income Item</th>
											<th>Approve Outcome Item</th>
											<!-- kolom kanan -->
											<th>Female</th>
											<th>Male</th>
										</tr>
									</thead>
									<tbody>
										<tr colspan="2" style="text-align: left;">
											<!-- kolom kiri -->
											<td><?= json_encode($tcin); ?></td>
											<td><?= json_encode($tcout); ?></td>
											<!-- kolom kanan -->
											<td><?= json_encode($cfm1); ?></td>
											<td><?= json_encode($cfm2); ?></td>
										</tr>
									</tbody>
								</table>
								<table class="display nowrap " style="font-size: 14px; width:100% !important; overflow-x:auto;" border="1">
									<thead>
										<tr>
											<th colspan="8" style="height: 20px;"></th>
										</tr>
										<tr style="text-align: center;">
											<th colspan="4">Absensi Pekerja</th>
										</tr>
										<tr>
											<th>Hadir</th>
											<th>Terlambat</th>
											<th>Ijin</th>
											<th>Tidak Hadir</th>
										</tr>
									</thead>
									<tbody>
										<tr colspan="2" style="text-align: left;">
											<!-- kolom kiri -->
											<td>Dummy</td>
											<td>Dummy</td>
											<!-- kolom kanan -->
											<td>Dummy</td>
											<td>Dummy</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div><br>


				<div class="card" style="margin-top: 10px">
					<div class="card-header text-center py-3">
						<h3 class="mb-0 text-center">
							<center><strong>Barang Gudang Invenbar</strong></center>
						</h3>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col">
								<table class="display nowrap" style="font-size: 14px; width:100% !important; overflow-x:auto;" border="1">
									<thead>
										<tr>
											<th>No</th>
											<th>Nama Barang</th>
											<th>Stok</th>
											<th>Jenis</th>
											<th>Room</th>
										</tr>
									</thead>
									<tbody>
										<?php $no = 1; ?>
										<?php foreach ($item as $b) : ?>
											<tr style="text-align: left;">
												<td><?= $no ?></td>
												<td><?= $b['nama_item'] ?></td>
												<td><?= $b['stok']; ?></td>
												<td><?= $b['jenis']; ?></td>
												<td><?= $b['penyimpanan']; ?></td>
											</tr>
											<?php $no++; ?>
										<?php endforeach; ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div><br>


				<div class="card" style="margin-top: 10px">
					<div class="card-header text-center py-3">
						<h3 class="mb-0 text-center">
							<center><strong>Spesifikasi Barang Gudang Invenbar</strong></center>
						</h3>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col">
								<table class="display nowrap " style="font-size: 14px; width:100% !important; overflow-x:auto;" border="1">
									<thead>
										<tr>
											<th>No</th>
											<th>Nama Barang</th>
											<th>Kode Barang</th>
											<th>Harga/Item (Rp)</th>
											<th>Berat/Item (gr)</th>
											<th>Nama Supplier</th>
										</tr>
									</thead>
									<tbody>
										<?php $no = 1; ?>
										<?php foreach ($spec as $b) : ?>
											<tr>
												<td><?= $no ?></td>
												<td><?= $b['nama_item'] ?></td>
												<td>
													<?php
													if ($b['kode_barang'] != null) {
														echo "" . $b['kode_barang'];
													} else {
														echo "Kosong";
													}
													?>
												</td>
												<td>
													<?php
													if ($b['harga'] != 0) {
														echo "" . $b['harga'];
													} else {
														echo "Kosong";
													}
													?>
												</td>
												<td>
													<?php
													if ($b['berat'] != 0) {
														echo "" . $b['berat'];
													} else {
														echo "Kosong";
													}
													?>
												</td>
												<td>
													<?php
													if ($b['nama_supplier'] != null) {
														echo "" . $b['nama_supplier'];
													} else {
														echo "Kosong";
													}
													?>
												</td>
											</tr>
											<?php $no++; ?>
										<?php endforeach; ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div><br>


				<div class="card" style="margin-top: 10px">
					<div class="card-header text-center py-3">
						<h3 class="mb-0 text-center">
							<center><strong>Perizinan Income-Outcome Barang Invenbar</strong></center>
						</h3>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col">
								<?php if (session('role') == 0) : ?>
									<table class="display nowrap " style="font-size: 14px; width:100% !important; overflow-x:auto;" border="1">
										<thead>
											<tr>
												<th>Waktu</th>
												<th>Pekerja</th>
												<th>Barang</th>
												<th>Request</th>
												<th>Stok</th>
												<th>Status</th>
												<th>Keterangan</th>
											</tr>
										</thead>
										<tbody>
											<?php foreach ($log_item as $log) : ?>
												<tr>
													<td><?= $log['tgl']; ?></td>
													<td><?= $log['nama']; ?></td>
													<td><?= $log['nama_barang']; ?></td>
													<td>
														<?php if ($log['request'] == "Masuk") : ?>
															<?= $log['request']; ?>
														<?php else : ?>
															<?= $log['request']; ?>
														<?php endif; ?>
													</td>
													<td style="width: 75px;">
														<?= $log['ubah_stok']; ?>
													</td>
													<td>
														<?php
														if ($log['status'] == 'Diterima') {
															echo "DITERIMA";
														} elseif ($log['status'] == 'Ditolak') {
															echo "DITOLAK";
														} else {
															echo "PENDING";
														}
														?>
													</td>
													<td><?= $log['ket']; ?></td>
												</tr>
											<?php endforeach; ?>
										</tbody>
									</table>
									<!-- for pekerja -->
								<?php else : ?>
									<table class="display nowrap " style="font-size: 14px; width:100% !important; overflow-x:auto;" border="1">
										<thead>
											<tr>
												<th>Waktu</th>
												<th>Pekerja</th>
												<th>Barang</th>
												<th>Request</th>
												<th>Stok</th>
												<th>Status</th>
											</tr>
										</thead>
										<tbody>
											<?php foreach ($log_item as $log) : ?>
												<tr>
													<td><?= $log['tgl']; ?></td>
													<td><?= $log['nama']; ?></td>
													<td><?= $log['nama_barang']; ?></td>
													<td>
														<?php if ($log['request'] == "Masuk") : ?>
															<?= $log['request']; ?>
														<?php else : ?>
															<?= $log['request']; ?>
														<?php endif; ?>
													</td>
													<td style="width: 75px;">
														<?= $log['ubah_stok']; ?>
													</td>
													<td>
														<?php
														if ($log['status'] == 'Diterima') {
															echo "DITERIMA";
														} elseif ($log['status'] == 'Ditolak') {
															echo "DITOLAK";
														} else {
															echo "PROSES";
														}
														?>
													</td>
													<td><?= $log['ket']; ?></td>
												</tr>
											<?php endforeach; ?>
										</tbody>
									</table>
								<?php endif; ?>
							</div>
						</div>
					</div>
				</div><br>


				<table width="100%" style="vertical-align: middle; font-size: 12pt; color: #000000;page-break-inside:avoid">
					<tr>
						<td width="70%" colspan="6" style="text-align: center;"></td>
						<td width="30%" style="text-align: right;">
							<h4 style="margin-bottom: 30px;">
								Founder Invenbar,
							</h4>
						</td>
					</tr>
					<tr>
						<td width="70%" colspan="6" style="text-align: center;"></td>
						<td width="30%" style="text-align: right;" height="30">
							<img src="<?= base_url('../img/TTD_FOUNDER.png') ?>" style="float:right;margin-bottom:10px;width:10em;height:6em;" alt="TTD-Founder">
						</td>
					</tr>
					<tr>
						<td width="70%" colspan="6" style="text-align: center;"></td>
						<td width="30%" style="text-align: right;">
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
			window.location.href = "<?= base_url('menu/laporanBulanan') ?>";
		}
	</script>
</body>

</html>