<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>

<?php

// ====================================== Gender Employees ====================================== //
if (!empty($cf)) {	foreach ($cf as $cfv) {	$cfm[] = $cfv['gender']; $cfm1 = json_encode(json_decode($cfv['gender'])); }}
if (!empty($cm)) {	foreach ($cm as $cmv) {	$cfm[] = $cmv['gender']; $cfm2 = json_encode(json_decode($cmv['gender'])); }}

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
						<h5><i class="fas fa-laptop-house fa-fw me-1"></i>Gender Employees</h5>
					</div>
					<div class="card-body">
						<canvas class="chartDonuts" id="ChartDonuts" style="margin:0 auto;place-items:center;margin-left:-8%;margin-right:-20%;"></canvas>
					</div>
					<script>
						var ctx = document.getElementById('ChartDonuts');
						var ChartDonuts = new Chart(ctx, {
							type: 'doughnut',
							data: {
								labels: ["Female = <?= $cfm1; ?>","Male = <?= $cfm2; ?>"],
								datasets: [{
									data: <?= json_encode($cfm); ?>,
									backgroundColor: [
										'rgba(255, 99, 132, 0.2)', 'rgba(54, 162, 235, 0.2)'
									],
									borderColor: [
										'rgba(255, 0, 0, 1)', 'rgba(25, 0, 255, 1)'
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
									display: true,
									position: "bottom",
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