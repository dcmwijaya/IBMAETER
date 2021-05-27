<?php

// ====================================== Total Stok Berdasarkan Penyimpanan ====================================== //
if (!empty($sst)) {
	foreach ($sst as $vs) {
		$svt = intval($vs['stok']);
	}
} else {
	$svt = 0;
}

// ====================================== Total Stok Berdasarkan Jenis ====================================== //
if (!empty($sj1)) {
	foreach ($sj1 as $vj1) {
		$sct1 = intval($vj1['stok']);
	}
} else {
	$sct1 = 0;
}
if (!empty($sj2)) {
	foreach ($sj2 as $vj2) {
		$sct2 = intval($vj2['stok']);
	}
} else {
	$sct2 = 0;
}
if (!empty($sj3)) {
	foreach ($sj3 as $vj3) {
		$sct3 = intval($vj3['stok']);
	}
} else {
	$sct3 = 0;
}
if (!empty($sj4)) {
	foreach ($sj4 as $vj4) {
		$sct4 = intval($vj4['stok']);
	}
} else {
	$sct4 = 0;
}
if (!empty($sj5)) {
	foreach ($sj5 as $vj5) {
		$sct5 = intval($vj5['stok']);
	}
} else {
	$sct5 = 0;
}

// ====================================== Total Cost Barang ====================================== //
if (!empty($sco)) {
	foreach ($sco as $vc) {
		$svc = intval($vc['harga']);
	}
} else {
	$svc = 0;
}

// ====================================== Total Weight Barang ====================================== //
if (!empty($swh)) {
	foreach ($swh as $vw) {
		$svw = intval($vw['berat']);
	}
} else {
	$svw = 0;
}

// ====================================== Total Gender Employees ====================================== //
if (!empty($cf)) {
	foreach ($cf as $cfv) {
		$cfm1 = intval($cfv['gender']);
	}
} else {
	$cfm1 = 0;
}
if (!empty($cm)) {
	foreach ($cm as $cmv) {
		$cfm2 = intval($cmv['gender']);
	}
} else {
	$cfm2 = 0;
}

// ====================================== Total Income-Outcome Item ====================================== //
if (!empty($scin)) {
	foreach ($scin as $cn) {
		$tcin = intval($cn['ubah_stok']);
	}
} else {
	$tcin = 0;
}
if (!empty($scout)) {
	foreach ($scout as $ct) {
		$tcout = intval($ct['ubah_stok']);
	}
} else {
	$tcout = 0;
}

// ====================================== Total Absensi ====================================== //
foreach ($countPresent as $wc) {
	if ($countPresent != null) {
		$presentCount = intval($wc['uid_absen']);
	} else {
		$presentCount = 0;
	}
}

foreach ($countLate as $nwc) {
	if ($countLate != null) {
		$lateCount = intval($nwc['uid_absen']);
	} else {
		$lateCount = 0;
	}
}

foreach ($countPermission as $cp) {
	if ($countPermission != null) {
		$permissionCount = intval($cp['uid_absen']);
	} else {
		$permissionCount = 0;
	}
}

$truantedCount = $totalAbsensi - $presentCount - $lateCount - $permissionCount;

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
	<link rel="stylesheet" href="<?= base_url('css/menukhusus.css') ?>">
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


				<div class="card" style="margin-top: 58px;">
					<div class="card-header text-center py-3">
						<h3 class="mb-0 text-center">
							<center><strong>Brief Information Invenbar</strong></center>
						</h3>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col">
								<table style="font-size: 14px; width:100%;" border="1">
									<thead style="text-align: center;">
										<tr>
											<th colspan="5">Total Category Item</th>
										</tr>
										<tr>
											<th colspan="1">Cair</th>
											<th colspan="1">Minyak</th>
											<th colspan="1">Mudah Terbakar</th>
											<th colspan="1">Padat</th>
											<th colspan="1">Daging</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td colspan="1"><?= json_encode($sct1); ?></td>
											<td colspan="1"><?= json_encode($sct2); ?></td>
											<td colspan="1"><?= json_encode($sct3); ?></td>
											<td colspan="1"><?= json_encode($sct4); ?></td>
											<td colspan="1"><?= json_encode($sct5); ?></td>
										</tr>
									</tbody>
									<thead style="text-align: center;">
										<tr>
											<th colspan="5" style="height: 20px;"></th>
										</tr>
										<tr>
											<th colspan="5">Total Inventory Room</th>
										</tr>
										<tr>
											<th colspan="2">Stock Item</th>
											<th colspan="1">Weight Item</th>
											<th colspan="2">Cost Item</th>
										</tr>
									</thead>
									<tbody style="text-align: center;">
										<tr>
											<td colspan="2"><?= json_encode($svt); ?></td>
											<td colspan="1"><?= json_encode($svw); ?></td>
											<td colspan="2"><?= json_encode($svc); ?></td>
										</tr>
									</tbody>
									<thead style="text-align: center;">
										<tr>
											<th colspan="5" style="height: 20px;"></th>
										</tr>
										<tr>
											<th colspan="5">Total Inventory Stock In-Out</th>
										</tr>
										<tr>
											<th colspan="3">Approve Income Item</th>
											<th colspan="2">Approve Outcome Item</th>
										</tr>
									</thead>
									<tbody style="text-align: center;">
										<tr>
											<td colspan="3"><?= json_encode($tcin); ?></td>
											<td colspan="2"><?= json_encode($tcout); ?></td>
										</tr>
									</tbody>
									<thead style="text-align: center;">
										<tr>
											<th colspan="5" style="height: 20px;"></th>
										</tr>
										<tr>
											<th colspan="5">Total Gender Employees</th>
										</tr>
										<tr>
											<th colspan="3">Female</th>
											<th colspan="2">Male</th>
										</tr>
									</thead>
									<tbody style="text-align: center;">
										<tr>
											<td colspan="3"><?= json_encode($cfm1); ?></td>
											<td colspan="2"><?= json_encode($cfm2); ?></td>
										</tr>
									</tbody>
									<thead style="text-align: center;">
										<tr>
											<th colspan="5" style="height: 20px;"></th>
										</tr>
										<tr>
											<th colspan="5">Absensi Pekerja</th>
										</tr>
										<tr>
											<th colspan="2">Hadir</th>
											<th colspan="1">Terlambat</th>
											<th colspan="1">Ijin</th>
											<th colspan="2">Tidak Ada Keterangan</th>
										</tr>
									</thead>
									<tbody style="text-align: center;">
										<tr>
											<td colspan="2"><?= json_encode($presentCount); ?></td>
											<td colspan="1"><?= json_encode($lateCount); ?></td>
											<td colspan="1"><?= json_encode($permissionCount); ?></td>
											<td colspan="2"><?= json_encode($truantedCount); ?></td>
										</tr>
									</tbody>
								</table>
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

				<table width="100%" style="vertical-align: middle; font-size: 12pt; color: #000000;page-break-before:always;">
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

				<div class="card" style="margin-top: 58px;">
					<div class="card-header text-center py-3">
						<h3 class="mb-0 text-center">
							<center><strong>Barang Gudang Invenbar</strong></center>
						</h3>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col">
								<table style="font-size: 14px; width:100%;" border="1">
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

				<table width="100%" style="vertical-align: middle; font-size: 12pt; color: #000000;page-break-before:always;">
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

				<div class="card" style="margin-top: 58px;">
					<div class="card-header text-center py-3">
						<h3 class="mb-0 text-center">
							<center><strong>Spesifikasi Barang Gudang Invenbar</strong></center>
						</h3>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col">
								<table style="font-size: 14px; width:100%;" border="1">
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

				<table width="100%" style="vertical-align: middle; font-size: 12pt; color: #000000;page-break-before:always;">
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

				<div class="card" style="margin-top: 58px;">
					<div class="card-header text-center py-3">
						<h3 class="mb-0 text-center">
							<center><strong>Perizinan Income-Outcome Barang Invenbar</strong></center>
						</h3>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col">
								<?php if (session('role') == 0) : ?>
									<table style="font-size: 14px; width:100%;" border="1">
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
													<td><?= $log['nama_item']; ?></td>
													<td>
														<?= $log['request']; ?>
													</td>
													<td style="width: 75px;">
														<?= $log['ubah_stok']; ?>
													</td>
													<td>
														<?= strtoupper($log['status']); ?>
													</td>
													<td><?= $log['ket']; ?></td>
												</tr>
											<?php endforeach; ?>
										</tbody>
									</table>
									<!-- for pekerja -->
								<?php else : ?>
									<table style="font-size: 14px; width:100%;" border="1">
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
													<td><?= $log['nama_item']; ?></td>
													<td>
														<?= $log['request']; ?>
													</td>
													<td style="width: 75px;">
														<?= $log['ubah_stok']; ?>
													</td>
													<td>
														<?= strtoupper($log['status']); ?>
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