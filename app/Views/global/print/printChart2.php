<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>

<?php

// ====================================== Stok Berdasarkan Penyimpanan ====================================== //
if (!empty($sc1)) {	foreach ($sc1 as $vs1) { $sin[] = $vs1['stok'];	$sin1 = json_encode(json_decode($vs1['stok']));	}}
if (!empty($sc2)) {	foreach ($sc2 as $vs2) { $sin[] = $vs2['stok'];	$sin2 = json_encode(json_decode($vs2['stok']));	}}
if (!empty($sc3)) {	foreach ($sc3 as $vs3) { $sin[] = $vs3['stok'];	$sin3 = json_encode(json_decode($vs3['stok']));	}}
if (!empty($sc4)) {	foreach ($sc4 as $vs4) { $sin[] = $vs4['stok'];	$sin4 = json_encode(json_decode($vs4['stok']));	}}
if (!empty($sc5)) {	foreach ($sc5 as $vs5) { $sin[] = $vs5['stok'];	$sin5 = json_encode(json_decode($vs5['stok']));	}}
if (!empty($sc6)) {	foreach ($sc6 as $vs6) { $sin[] = $vs6['stok'];	$sin6 = json_encode(json_decode($vs6['stok']));	}}
if (!empty($sc7)) {	foreach ($sc7 as $vs7) { $sin[] = $vs7['stok'];	$sin7 = json_encode(json_decode($vs7['stok']));	}}

// ====================================== Cost Barang ====================================== //
if (!empty($cc1)) {	foreach ($cc1 as $vc1) { $scs[] = $vc1['harga']; $scs1 = json_encode(json_decode($vc1['harga'])); }}
if (!empty($cc2)) {	foreach ($cc2 as $vc2) { $scs[] = $vc2['harga']; $scs2 = json_encode(json_decode($vc2['harga'])); }}
if (!empty($cc3)) {	foreach ($cc3 as $vc3) { $scs[] = $vc3['harga']; $scs3 = json_encode(json_decode($vc3['harga'])); }}
if (!empty($cc4)) {	foreach ($cc4 as $vc4) { $scs[] = $vc4['harga']; $scs4 = json_encode(json_decode($vc4['harga'])); }}
if (!empty($cc5)) {	foreach ($cc5 as $vc5) { $scs[] = $vc5['harga']; $scs5 = json_encode(json_decode($vc5['harga'])); }}
if (!empty($cc6)) {	foreach ($cc6 as $vc6) { $scs[] = $vc6['harga']; $scs6 = json_encode(json_decode($vc6['harga'])); }}
if (!empty($cc7)) {	foreach ($cc7 as $vc7) { $scs[] = $vc7['harga']; $scs7 = json_encode(json_decode($vc7['harga'])); }}

// ====================================== Weight Barang ====================================== //
if (!empty($cw1)) {	foreach ($cw1 as $vw1) { $swg[] = $vw1['berat']; $swg1 = json_encode(json_decode($vw1['berat'])); }}
if (!empty($cw2)) {	foreach ($cw2 as $vw2) { $swg[] = $vw2['berat']; $swg2 = json_encode(json_decode($vw2['berat'])); }}
if (!empty($cw3)) {	foreach ($cw3 as $vw3) { $swg[] = $vw3['berat']; $swg3 = json_encode(json_decode($vw3['berat'])); }}
if (!empty($cw4)) {	foreach ($cw4 as $vw4) { $swg[] = $vw4['berat']; $swg4 = json_encode(json_decode($vw4['berat'])); }}
if (!empty($cw5)) {	foreach ($cw5 as $vw5) { $swg[] = $vw5['berat']; $swg5 = json_encode(json_decode($vw5['berat'])); }}
if (!empty($cw6)) {	foreach ($cw6 as $vw6) { $swg[] = $vw6['berat']; $swg6 = json_encode(json_decode($vw6['berat'])); }}
if (!empty($cw7)) {	foreach ($cw7 as $vw7) { $swg[] = $vw7['berat']; $swg7 = json_encode(json_decode($vw7['berat'])); }}

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
						<h5><i class="fas fa-cubes fa-fw me-1"></i>Inventory Room</h5>
					</div>
					<div class="card-body">
						<canvas class="chartBar" id="ChartBar" style="margin:0 auto;place-items:center;padding-left:-10%;padding-right:16%;"></canvas>
					</div>
					<script>
						var ctx = document.getElementById('ChartBar');
						var ChartDonuts = new Chart(ctx, {
							type: 'bar',
							data: {
								labels: [
									"A = Stock(<?= $sin1; ?>), Cost(<?= $scs1; ?>), Weight(<?= $swg1; ?>)", 
									"B = Stock(<?= $sin2; ?>), Cost(<?= $scs2; ?>), Weight(<?= $swg2; ?>)",
									"C = Stock(<?= $sin3; ?>), Cost(<?= $scs3; ?>), Weight(<?= $swg3; ?>)",
									"D = Stock(<?= $sin4; ?>), Cost(<?= $scs4; ?>), Weight(<?= $swg4; ?>)",
									"E = Stock(<?= $sin5; ?>), Cost(<?= $scs5; ?>), Weight(<?= $swg5; ?>)",
									"F = Stock(<?= $sin6; ?>), Cost(<?= $scs6; ?>), Weight(<?= $swg6; ?>)",
									"G = Stock(<?= $sin7; ?>), Cost(<?= $scs7; ?>), Weight(<?= $swg7; ?>)",
								],
								datasets: [{
									label: 'Total Cost Item',
									data: <?= json_encode($scs); ?>,
									backgroundColor: [
										'rgba(255, 99, 132, 0.2)', 'rgba(255, 99, 132, 0.2)',
										'rgba(255, 99, 132, 0.2)', 'rgba(255, 99, 132, 0.2)',
										'rgba(255, 99, 132, 0.2)', 'rgba(255, 99, 132, 0.2)', 'rgba(255, 99, 132, 0.2)'
									],
									borderColor: [
										'rgba(255, 0, 0, 1)', 'rgba(255, 0, 0, 1)',
										'rgba(255, 0, 0, 1)', 'rgba(255, 0, 0, 1)',
										'rgba(255, 0, 0, 1)', 'rgba(255, 0, 0, 1)', 'rgba(255, 0, 0, 1)'
									],
									borderWidth: 1,
								}, {
									label: 'Total Weight Item',
									data: <?= json_encode($swg); ?>,
									backgroundColor: [
										'rgba(54, 162, 235, 0.2)', 'rgba(54, 162, 235, 0.2)',
										'rgba(54, 162, 235, 0.2)', 'rgba(54, 162, 235, 0.2)',
										'rgba(54, 162, 235, 0.2)', 'rgba(54, 162, 235, 0.2)', 'rgba(54, 162, 235, 0.2)'
									],
									borderColor: [
										'rgba(25, 0, 255, 1)', 'rgba(25, 0, 255, 1)',
										'rgba(25, 0, 255, 1)', 'rgba(25, 0, 255, 1)',
										'rgba(25, 0, 255, 1)', 'rgba(25, 0, 255, 1)', 'rgba(25, 0, 255, 1)'
									],
									borderWidth: 1,
								}, {
									label: 'Total Stock Item',
									data: <?= json_encode($sin); ?>,
									backgroundColor: [
										'rgba(127, 253, 125, 0.2)', 'rgba(127, 253, 125, 0.2)',
										'rgba(127, 253, 125, 0.2)', 'rgba(127, 253, 125, 0.2)',
										'rgba(127, 253, 125, 0.2)', 'rgba(127, 253, 125, 0.2)', 'rgba(127, 253, 125, 0.2)'
									],
									borderColor: [
										'rgba(0, 90, 163, 1)', 'rgba(0, 90, 163, 1)',
										'rgba(0, 90, 163, 1)', 'rgba(0, 90, 163, 1)',
										'rgba(0, 90, 163, 1)', 'rgba(0, 90, 163, 1)', 'rgba(0, 90, 163, 1)'
									],
									borderWidth: 1,
								}],
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