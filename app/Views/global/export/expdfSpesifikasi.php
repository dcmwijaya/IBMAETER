<!doctype html>
<html lang="id">

<head></head>

<body>
	<main>
		<div class="container pt-4">
			<section class="mb-4">
				<table width="100%" style="vertical-align: middle; font-size: 12pt; color: #000000;page-break-inside:avoid">
					<tr>
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
								Founder Ibmaeter,
							</h4>
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