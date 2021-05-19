<?php

header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment; filename="Data-Absensi.xls"');

foreach ($countWorked as $wc) {
	if ($countWorked != null) {
		$workedCount = $wc['uid_absen'];
	} else {
		$workedCount = 0;
	}
}

foreach ($countNotWorked as $nwc) {
	if ($countNotWorked != null) {
		$notworkedCount = $nwc['uid_absen'];
	} else {
		$notworkedCount = 0;
	}
}

?>

<!--Main layout-->
<main>
	<div class="container pt-4">
		<section class="mb-4">
			<table width="100%" style="vertical-align: middle; font-size: 12pt; color: #000000;page-break-inside:avoid">
				<tr>
					<td width="15%" style="text-align: right;"><img src="<?= base_url('../img/icon/favicon-32x32.png') ?>" style="width:4em;height:4em;" alt="Logo-Invenbar"></td>
					<td width="100%" colspan="2" style="text-align: center;">
						<div style="font-size: 13pt; font-weight: bold;">INVENBAR INDONESIA</div>
						<div style="font-weight: 200;">Website Inventaris Barang Gudang Toko Toserba</div>
						<div style="font-weight: 200;">Telp. 031-4614099 Fax. 5619082 / Email : invenbar@invweb.ac.id</div>
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
										<th>Waktu</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($absensi as $abs) : ?>
										<tr>
											<td><?= $abs['email_absen']; ?></td>
											<td><?= $abs['status_absen']; ?></td>
											<td><?= $abs['tgl_absen'] . ", " . $abs['waktu_absen']; ?></td>
										</tr>
									<?php endforeach; ?>
								</tbody>
							</table>
						</div>
					</div>
					<p class="absensiCount" style="margin-top:20px;">
						Jumlah pekerja hadir saat ini : <?= $workedCount; ?> <br>
						Jumlah pekerja bolos saat ini : <?= $notworkedCount; ?>
					</p>
				</div>
			</div><br>

			<table width="100%" style="vertical-align: middle; font-size: 12pt; color: #000000;page-break-inside:avoid">
				<tr>
					<td width="70%" colspan="2" style="text-align: center;"></td>
					<td width="30%" style="text-align: right;">
						<h4 style="margin-bottom: 30px;">
							Founder Invenbar,
						</h4>
					</td>
				</tr>
				<tr>
					<td width="70%" colspan="2" style="text-align: center;"></td>
					<td width="30%" style="text-align: right;" height="30">
						<img src="<?= base_url('../img/TTD_FOUNDER.png') ?>" style="float:right;margin-bottom:10px;width:10em;height:6em;" alt="TTD-Founder">
					</td>
				</tr>
				<tr>
					<td width="70%" colspan="2" style="text-align: center;"></td>
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