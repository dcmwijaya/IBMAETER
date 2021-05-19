<?php

header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment; filename="Data-User.xls"');

foreach ($us as $usc) {
	if ($us != null) {
		$usersCount = $usc['uid'];
	} else {
		$usersCount = 0;
	}
}

?>

<link rel="stylesheet" href="<?= base_url('../css/content.css') ?>" /> <!-- include cakra --->

<!--Main layout-->
<main>
	<div class="container pt-4">
		<section class="mb-4">
			<table width="100%" style="vertical-align: middle; font-size: 12pt; color: #000000;page-break-inside:avoid">
				<tr>
					<td width="15%" style="text-align: right;"><img src="<?= base_url('../img/icon/favicon-32x32.png') ?>" style="width:4em;height:4em;" alt="Logo-Invenbar"></td>
					<td width="100%" colspan="5" style="text-align: center;">
						<div style="font-size: 13pt; font-weight: bold;">INVENBAR INDONESIA</div>
						<div style="font-weight: 200;">Website Inventaris Barang Gudang Toko Toserba</div>
						<div style="font-weight: 200;">Telp. 031-4614099 Fax. 5619082 / Email : invenbar@invweb.ac.id</div>
					</td>
				</tr>
			</table>

			<div class="card" style="margin-top: 58px">
				<div class="card-header text-center py-3">
					<h3 class="mb-0 text-center">
						<center><strong>Tabel Data User</strong></center>
					</h3>
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col">
							<table style="font-size: 14px; width:100%;" border="1">
								<thead>
									<tr>
										<th>No</th>
										<th>Nama User</th>
										<th>E-mail</th>
										<th>Department</th>
										<th>Gender</th>
										<th>Role</th>
									</tr>
								</thead>
								<tbody>
									<?php $no = 1; ?>
									<?php foreach ($user as $u) : ?>
										<tr>
											<td><?= $no ?></td>
											<td><?= $u['nama']; ?></td>
											<td><?= $u['email']; ?></td>
											<td><?= $u['department']; ?></td>
											<td><?= $u['gender']; ?></td>
											<td>
												<?php
												if ($u['role'] == '0') {
													echo "Admin";
												} else {
													echo "Pekerja";
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
					<p class="userVCount">Jumlah pengguna saat ini : <?= $usersCount; ?></p>
				</div>
			</div><br>

			<table width="100%" style="vertical-align: middle; font-size: 12pt; color: #000000;page-break-inside:avoid">
				<tr>
					<td width="70%" colspan="5" style="text-align: center;"></td>
					<td width="30%" style="text-align: right;">
						<h4 style="margin-bottom: 30px;">
							Founder Invenbar,
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