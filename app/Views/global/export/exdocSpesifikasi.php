<?php

header('Content-Type: application/vnd.ms-word');
header('Content-Disposition: attachment; filename="Tabel-Spesifikasi-Barang-2021.doc"');

?>

<!doctype html>
<html lang="id">

<head></head>

<body>
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
							<center><strong>Tabel Spesifikasi Barang Gudang 2021</strong></center>
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
</body>

</html>