<!doctype html>
<html lang="id">

<head></head>

<body>
	<main style="margin-top: 58px">
		<div class="container pt-4">
			<section class="mb-4">
				<div class="card">
					<div class="card-header text-center py-3">
						<h5 class="mb-0 text-center">
							<center><strong>DASHBOARD - Tabel Barang Gudang 2021</strong></center>
						</h5>
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
				</div>
			</section>
		</div><br>
	</main>
</body>

</html>
