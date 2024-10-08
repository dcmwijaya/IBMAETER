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
	<!--Main layout-->
	<main>
		<div class="container pt-4">
			<section class="mb-4">
				<table width="100%" style="vertical-align: middle; font-size: 12pt; color: #000000;page-break-inside:avoid">
					<tr>
						<td width="15%" style="text-align: right;"><img src="<?= base_url('../img/icon/favicon-32x32.png') ?>" style="width:4em;height:4em;" alt="Logo-IB"></td>
						<td width="100%" colspan="5" style="text-align: center;">
							<div style="font-size: 13pt; font-weight: bold;">IBMAETER INDONESIA</div>
							<div style="font-weight: 200;">Website Inventaris Barang Gudang dan Manajemen Pekerja Terpadu</div>
							<div style="font-weight: 200;">Telp. 031-4614099 Fax. 5619082 / Email : ibmaeter@ibweb.ac.id</div>
						</td>
					</tr>
				</table>

				<div class="card" style="margin-top: 58px">
					<div class="card-header text-center py-3">
						<h3 class="mb-0 text-center">
							<center><strong>Tabel Data Absensi User</strong></center>
						</h3>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col">
								<table style="font-size: 14px; width:100%;" border="1">
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
													<?php if ($abs['respons'] == "Pending") : 
														echo "Pending";
													elseif ($abs['respons'] == "Diterima") :
														echo "Diterima";
													elseif ($abs['respons'] == "Ditolak") :
														echo "Ditolak";
													else :
														echo "Hadir";
													endif; ?>
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
				</div><br>

				<table width="100%" style="vertical-align: middle; font-size: 12pt; color: #000000;page-break-inside:avoid">
					<tr>
						<td width="70%" colspan="5" style="text-align: center;"></td>
						<td width="30%" style="text-align: right;">
							<h4 style="margin-bottom: 30px;">
								Founder Ibmaeter,
							</h4>
						</td>
					</tr>
					<tr>
						<td width="70%" colspan="5" style="text-align: center;"></td>
						<td width="30%" style="text-align: right;" height="30">
							<img src="<?= base_url('../img/TTD_FOUNDER.png') ?>" style="float:right;margin-bottom:10px;width:10em;height:6em;" alt="TTD-Founder">
						</td>
					</tr>
					<tr>
						<td width="70%" colspan="5" style="text-align: center;"></td>
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
			window.location.href = "<?= base_url('admin/LogUser') ?>";
		}
	</script>
</body>

</html>