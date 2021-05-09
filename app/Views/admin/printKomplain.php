<!-- style for td -->
<?php $tdStyle = "white-space: -moz-pre-wrap !important; white-space: -pre-wrap; white-space: -o-pre-wrap; white-space: pre-wrap; word-wrap: break-word; white-space: -webkit-pre-wrap; word-break: break-word; white-space: normal;" ?>

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
						<td width="15%" style="text-align: right;"><img src="<?= base_url('../img/icon/favicon-32x32.png') ?>" style="width:4em;height:4em;" alt="Logo-Invenbar"></td>
						<td width="100%" colspan="3" style="text-align: center;">
							<div style="font-size: 13pt; font-weight: bold;">INVENBAR INDONESIA</div>
							<div style="font-weight: 200;">Website Inventaris Barang Gudang Toko Toserba</div>
							<div style="font-weight: 200;">Telp. 031-4614099 Fax. 5619082 / Email : invenbar@invweb.ac.id</div>
						</td>
					</tr>
				</table>

				<div class="card" style="margin-top: 58px">
					<div class="card-header text-center py-3">
						<h3 class="mb-0 text-center">
							<center><strong>Tabel Data Komplain</strong></center>
						</h3>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col">
								<table style="font-size: 14px; width:100%;" border="1">
									<thead>
										<tr>
											<th>Email</th>
											<th>Perihal Komplain</th>
											<th>Kendala</th>
											<th>Bukti</th>
											<th>Waktu Komplain</th>
										</tr>
									</thead>
									<tbody>
										<?php foreach ($komplain as $k) : ?>
											<tr>
												<td><?= $k['email_komplain']; ?></td>
												<td><?= $k['judul_komplain']; ?></td>
												<td style="<?= $tdStyle; ?>"><?= $k['isi_komplain']; ?></td>
												<td>
													<?php if ($k['foto_komplain'] == "-") : ?>
														<b class="center">-</b>
													<?php else : ?>
														<a href="<?= base_url('../img/komplain/' . $k['foto_komplain']); ?>" target="_blank">
															<img src="<?= base_url('../img/komplain/' . $k['foto_komplain']); ?>" width="150" height="auto">
														</a>
													<?php endif; ?>
												</td>
												<td><?= $k['waktu_komplain']; ?></td>
											</tr>
										<?php endforeach; ?>
										<!-- data arsip komplain -->
										<?php foreach ($arsipKomp as $arc) : ?>
											<tr>
												<td><?= $arc['email_arsipKomp']; ?></td>
												<td><?= $arc['judul_arsipKomp']; ?></td>
												<td style="<?= $tdStyle; ?>"><?= $arc['isi_arsipKomp']; ?></td>
												<td>
													<?php if ($arc['foto_arsipKomp'] == "-") : ?>
														<b class="center">-</b>
													<?php else : ?>
														<a href="<?= base_url('../img/komplain/' . $arc['foto_arsipKomp']); ?>" target="_blank">
															<img src="<?= base_url('../img/komplain/' . $arc['foto_arsipKomp']); ?>" width="150" height="auto">
														</a>
													<?php endif; ?>
												</td>
												<td><?= $arc['waktu_arsipKomp']; ?></td>
											</tr>
										<?php endforeach; ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div><br>

				<table width="100%" style="vertical-align: middle; font-size: 12pt; color: #000000;page-break-inside:avoid">
					<tr>
						<td width="70%" colspan="3" style="text-align: center;"></td>
						<td width="30%" style="text-align: right;">
							<h4 style="margin-bottom: 30px;">
								Founder Invenbar,
							</h4>
						</td>
					</tr>
					<tr>
						<td width="70%" colspan="3" style="text-align: center;"></td>
						<td width="30%" style="text-align: right;" height="30">
							<img src="<?= base_url('../img/TTD_FOUNDER.png') ?>" style="float:right;margin-bottom:10px;width:10em;height:6em;" alt="TTD-Founder">
						</td>
					</tr>
					<tr>
						<td width="70%" colspan="3" style="text-align: center;"></td>
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
			window.location.href = "<?= base_url('admin/complain') ?>";
		}
	</script>
</body>

</html>
