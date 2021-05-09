<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>

<?php

// Stok Berdasarkan Jenis
if (!empty($sj1)) {	foreach ($sj1 as $vj1) { $sct[] = $vj1['stok'];	$sct1 = json_encode(json_decode($vj1['stok']));	} }
if (!empty($sj2)) {	foreach ($sj2 as $vj2) { $sct[] = $vj2['stok'];	$sct2 = json_encode(json_decode($vj2['stok']));	} }
if (!empty($sj3)) {	foreach ($sj3 as $vj3) { $sct[] = $vj3['stok'];	$sct3 = json_encode(json_decode($vj3['stok']));	} }
if (!empty($sj4)) {	foreach ($sj4 as $vj4) { $sct[] = $vj4['stok'];	$sct4 = json_encode(json_decode($vj4['stok'])); } }
if (!empty($sj5)) {	foreach ($sj5 as $vj5) { $sct[] = $vj5['stok'];	$sct5 = json_encode(json_decode($vj5['stok']));	} }

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
	<main style="margin-top: 58px">
		<div class="container pt-4">
			<section class="mb-4">
				<table width="100%" style="vertical-align: middle; font-size: 12pt; color: #000000;page-break-inside:avoid">
					<tr>
						<td width="15%" style="text-align: right;"><img src="<?= base_url('../img/icon/favicon-32x32.png') ?>" style="width:4em;height:4em;" alt="Logo-Invenbar"></td>
						<td width="100%" colspan="4" style="text-align: center;">
							<div style="font-size: 13pt; font-weight: bold;">INVENBAR INDONESIA</div>
							<div style="font-weight: 200;">Website Inventaris Barang Gudang Toko Toserba</div>
							<div style="font-weight: 200;">Telp. 031-4614099 Fax. 5619082 / Email : invenbar@invweb.ac.id</div>
						</td>
					</tr>
				</table>

				<hr style="color:black; height: 2px;">

				<div class="card" style="margin-top:50px;">
					<div class="card-header text-center">
						<h5><i class="fas fa-cubes fa-fw me-1"></i>Chart Stok Berdasarkan Jenis</h5>
					</div>
					<div class="card-body">
						<canvas class="chartLine" id="ChartLine" style="margin:0 auto;place-items:center;padding-left:-8%;padding-right:16%;"></canvas>
					</div>
					<script>
						var ctx = document.getElementById('ChartLine');
						var ChartLine = new Chart(ctx, {
							type: 'line',
							data: {
								labels: ["Cair = <?= $sct1; ?>", "Minyak = <?= $sct2; ?>", "Mudah Terbakar = <?= $sct3; ?>", "Padat = <?= $sct4; ?>", "Daging = <?= $sct5; ?>"],
								datasets: [{
									label: 'J-Barang',
									data: <?= json_encode($sct); ?>,
									backgroundColor: [
										'rgba(255, 99, 132, 0.2)','rgba(54, 162, 235, 0.2)',
										'rgba(255, 94, 0, 0.2)','rgba(127, 253, 125, 0.2)',
										'rgba(153, 102, 255, 0.2)','rgba(255, 159, 64, 0.2)','rgba(175, 222, 225, 0.2)'
									],
									borderColor: [
										'rgba(255, 0, 0, 1)','rgba(25, 0, 255, 1)',
										'rgba(170, 25, 150, 1)','rgba(0, 90, 163, 1)',
										'rgba(153, 102, 255, 1)','rgba(255, 159, 64, 1)','rgba(153, 50, 155, 1)'
									],
									borderWidth: 1,
								}, ],
							},
							options: {
								scales: {
									y: {
										beginAtZero: true,
									}
								},
								legend: {
									display: true
								}
							}
						});
					</script>
				</div><br>

				<table width="100%" style="vertical-align: middle; font-size: 12pt; color: #000000;page-break-inside:avoid">
					<tr>
						<td width="70%" colspan="4" style="text-align: center;"></td>
						<td width="30%" style="text-align: right;">
							<h4 style="margin-bottom: 30px;">
								Founder Invenbar,
							</h4>
						</td>
					</tr>
					<tr>
						<td width="70%" colspan="4" style="text-align: center;"></td>
						<td width="30%" style="text-align: right;" height="30">
							<img src="<?= base_url('../img/TTD_FOUNDER.png') ?>" style="float:right;margin-bottom:10px;width:10em;height:6em;" alt="TTD-Founder">
						</td>
					</tr>
					<tr>
						<td width="70%" colspan="4" style="text-align: center;"></td>
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
		setTimeout(function() {	window.print();	}, 1000);
		window.onafterprint = function() { window.location.href = "<?= base_url('menu/dashboard') ?>"; }
	</script>
</body>

</html>
