<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<link rel="stylesheet" href="<?= base_url('css/dashboard.css') ?>">
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>

<?php
// Stok Berdasarkan Penyimpanan
if (!empty($sc1)) {
	foreach ($sc1 as $vs1) {
		$sin[] = $vs1['stok'];
		$sin1 = json_encode(json_decode($vs1['stok']));
	}
}
if (!empty($sc2)) {
	foreach ($sc2 as $vs2) {
		$sin[] = $vs2['stok'];
		$sin2 = json_encode(json_decode($vs2['stok']));
	}
}
if (!empty($sc3)) {
	foreach ($sc3 as $vs3) {
		$sin[] = $vs3['stok'];
		$sin3 = json_encode(json_decode($vs3['stok']));
	}
}
if (!empty($sc4)) {
	foreach ($sc4 as $vs4) {
		$sin[] = $vs4['stok'];
		$sin4 = json_encode(json_decode($vs4['stok']));
	}
}
if (!empty($sc5)) {
	foreach ($sc5 as $vs5) {
		$sin[] = $vs5['stok'];
		$sin5 = json_encode(json_decode($vs5['stok']));
	}
}
if (!empty($sc6)) {
	foreach ($sc6 as $vs6) {
		$sin[] = $vs6['stok'];
		$sin6 = json_encode(json_decode($vs6['stok']));
	}
}
if (!empty($sc7)) {
	foreach ($sc7 as $vs7) {
		$sin[] = $vs7['stok'];
		$sin7 = json_encode(json_decode($vs7['stok']));
	}
}

// Stok Berdasarkan Jenis
if (!empty($sj1)) {
	foreach ($sj1 as $vj1) {
		$sct[] = $vj1['stok'];
		$sct1 = json_encode(json_decode($vj1['stok']));
	}
}
if (!empty($sj2)) {
	foreach ($sj2 as $vj2) {
		$sct[] = $vj2['stok'];
		$sct2 = json_encode(json_decode($vj2['stok']));
	}
}
if (!empty($sj3)) {
	foreach ($sj3 as $vj3) {
		$sct[] = $vj3['stok'];
		$sct3 = json_encode(json_decode($vj3['stok']));
	}
}
if (!empty($sj4)) {
	foreach ($sj4 as $vj4) {
		$sct[] = $vj4['stok'];
		$sct4 = json_encode(json_decode($vj4['stok']));
	}
}
if (!empty($sj5)) {
	foreach ($sj5 as $vj5) {
		$sct[] = $vj5['stok'];
		$sct5 = json_encode(json_decode($vj5['stok']));
	}
}

?>

<!--Main layout-->
<main class="bg-dark">
	<div class="container pt-4">
		<section class="mb-4">
			<div class="card card-wrap-dashboard">
				<div class="card-header text-center py-3">
					<h5 class="mb-0 text-center">
						<strong>DASHBOARD</strong>
					</h5>

					<?php if (session()->getFlashdata('msg')) : ?>
						<?= session()->getFlashdata('msg'); ?>
					<?php
					endif; ?>
				</div><br><br>

				<div class="card-body pt-1">
					<div class="row row-dashboard">
						<a href="<?= base_url('menu/kelolaBarang') ?>" type="button" class="btn btn-primary card content1-header mb-3 col-md-2 sm-shadow">
							<div class="row no-gutters menu-wrap-content">
								<div class="col-md-4 content-icon">
									<i class="fas fa-box fa-fw me-3"></i>
								</div>
								<div class="col-md-6 content-click">
									<strong>
										<u>
											<p class="title-menu">MENU</p>
										</u><br>
										<p class="sub-menu">kelola barang</p>
									</strong>
								</div>
							</div>
						</a>
						<a href="<?= base_url('menu/LaporanBulanan') ?>" type="button" class="btn btn-primary card content2-header mb-3 col-md-2 sm-shadow">
							<div class="row no-gutters menu-wrap-content">
								<div class="col-md-4 content-icon">
									<i class="fas fa-print fa-fw me-3"></i>
								</div>
								<div class="col-md-6 content-click">
									<strong>
										<u>
											<p class="title-menu">MENU</p>
										</u><br>
										<p class="sub-menu">laporan bulanan</p>
									</strong>
								</div>
							</div>
						</a>
						<a href="<?= base_url('menu/absensiUser') ?>" type="button" class="btn btn-primary card content3-header mb-3 col-md-2 sm-shadow">
							<div class="row no-gutters menu-wrap-content">
								<div class="col-md-4 content-icon">
									<i class="fas fa-clipboard fa-fw me-3"></i>
								</div>
								<div class="col-md-6 content-click">
									<strong>
										<u>
											<p class="title-menu">MENU</p>
										</u><br>
										<p class="sub-menu">absensi pekerja</p>
									</strong>
								</div>
							</div>
						</a>
						<a href="<?= base_url('menu/Pengaduan') ?>" type="button" class="btn btn-primary card content4-header mb-3 col-md-2 sm-shadow">
							<div class="row no-gutters menu-wrap-content">
								<div class="col-md-4 content-icon">
									<i class="fas fa-comment-dots fa-fw me-3"></i>
								</div>
								<div class="col-md-6 content-click">
									<strong>
										<u>
											<p class="title-menu">MENU</p>
										</u><br>
										<p class="sub-menu">pengaduan</p>
									</strong>
								</div>
							</div>
						</a>
					</div>
					<div class="row row-dashboard">
						<div class="card chart1-dashboard mb-3 col-md-4 sm-shadow">
							<div class="card-header title-card-1">
								<i class="fas fa-cubes fa-fw me-1"></i>Chart Stok Berdasarkan Room
								<a class="menu" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-ellipsis-h list"></i></a>
								<div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
									<a class="dropdown-item" href="<?= base_url('menu/pdfchart1') ?>">Print Chart-1</a>
								</div>
							</div>
							<div class="card-body content-dashboard">
								<canvas class="chartPie" id="ChartPie" height="300" width="300"></canvas>
							</div>
							<script>
								var ctx = document.getElementById('ChartPie');
								var ChartDonuts = new Chart(ctx, {
									type: 'pie',
									data: {
										labels: ["A", "B", "C", "D", "E", "F", "G"],
										datasets: [{
											label: 'R-Barang',
											data: <?= json_encode($sin); ?>,
											backgroundColor: [
												'rgba(255, 99, 132, 0.2)', 'rgba(54, 162, 235, 0.2)',
												'rgba(255, 94, 0, 0.2)', 'rgba(127, 253, 125, 0.2)',
												'rgba(153, 102, 255, 0.2)', 'rgba(255, 159, 64, 0.2)', 'rgba(175, 222, 225, 0.2)'
											],
											borderColor: [
												'rgba(255, 0, 0, 1)', 'rgba(25, 0, 255, 1)',
												'rgba(170, 25, 150, 1)', 'rgba(0, 90, 163, 1)',
												'rgba(153, 102, 255, 1)', 'rgba(255, 159, 64, 1)', 'rgba(153, 50, 155, 1)'
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
											position: "right",
										}
									}
								});
							</script>
						</div>
						<div class="card chart2-dashboard mb-3 col-md-7 sm-shadow">
							<div class="card-header title-card-1">
								<i class="fas fa-cubes fa-fw me-1"></i>Chart Stok Berdasarkan Room
								<a class="menu" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-ellipsis-h list"></i></a>
								<div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
									<a class="dropdown-item" href="<?= base_url('menu/pdfchart2') ?>">Print Chart-2</a>
								</div>
							</div>
							<div class="card-body content-dashboard">
								<canvas class="chartBar" id="ChartBar" height="157" width="300"></canvas>
							</div>
							<script>
								var ctx = document.getElementById('ChartBar');
								var ChartDonuts = new Chart(ctx, {
									type: 'bar',
									data: {
										labels: ["A", "B", "C", "D", "E", "F", "G"],
										datasets: [{
											label: 'R-Barang',
											data: <?= json_encode($sin); ?>,
											backgroundColor: [
												'rgba(255, 99, 132, 0.2)', 'rgba(54, 162, 235, 0.2)',
												'rgba(255, 94, 0, 0.2)', 'rgba(127, 253, 125, 0.2)',
												'rgba(153, 102, 255, 0.2)', 'rgba(255, 159, 64, 0.2)', 'rgba(175, 222, 225, 0.2)'
											],
											borderColor: [
												'rgba(255, 0, 0, 1)', 'rgba(25, 0, 255, 1)',
												'rgba(170, 25, 150, 1)', 'rgba(0, 90, 163, 1)',
												'rgba(153, 102, 255, 1)', 'rgba(255, 159, 64, 1)', 'rgba(153, 50, 155, 1)'
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
						</div>
					</div>

					<div class="row row-dashboard">
						<div class="card chart3-dashboard mb-3 col-md-7 sm-shadow">
							<div class="card-header title-card-2">
								<i class="fas fa-cubes fa-fw me-1"></i>Chart Stok Berdasarkan Jenis
								<a class="menu" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-ellipsis-h list"></i></a>
								<div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
									<a class="dropdown-item" href="<?= base_url('menu/pdfchart3') ?>">Print Chart-3</a>
								</div>
							</div>
							<div class="card-body content-dashboard">
								<canvas class="chartLine" id="ChartLine" height="160" width="300"></canvas>
							</div>
							<script>
								var ctx = document.getElementById('ChartLine');
								var ChartLine = new Chart(ctx, {
									type: 'line',
									data: {
										labels: ["Cair", "Minyak", "Mudah Terbakar", "Padat", "Daging"],
										datasets: [{
											label: 'J-Barang',
											data: <?= json_encode($sct); ?>,
											backgroundColor: [
												'rgba(255, 99, 132, 0.2)', 'rgba(54, 162, 235, 0.2)',
												'rgba(255, 94, 0, 0.2)', 'rgba(127, 253, 125, 0.2)',
												'rgba(153, 102, 255, 0.2)', 'rgba(255, 159, 64, 0.2)', 'rgba(175, 222, 225, 0.2)'
											],
											borderColor: [
												'rgba(255, 0, 0, 1)', 'rgba(25, 0, 255, 1)',
												'rgba(170, 25, 150, 1)', 'rgba(0, 90, 163, 1)',
												'rgba(153, 102, 255, 1)', 'rgba(255, 159, 64, 1)', 'rgba(153, 50, 155, 1)'
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
						</div>

						<div class="card chart4-dashboard mb-3 col-md-4 sm-shadow">
							<div class="card-header title-card-2">
								<i class="fas fa-cubes fa-fw me-1"></i>Chart Stok Berdasarkan Jenis
								<a class="menu" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-ellipsis-h list"></i></a>
								<div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
									<a class="dropdown-item" href="<?= base_url('menu/pdfchart4') ?>">Print Chart-4</a>
								</div>
							</div>
							<div class="card-body content-dashboard">
								<canvas class="chartDonuts" id="ChartDonuts" height="300" width="300"></canvas>
							</div>
							<script>
								var ctx = document.getElementById('ChartDonuts');
								var ChartDonuts = new Chart(ctx, {
									type: 'doughnut',
									data: {
										labels: ["Cair", "Minyak", "Mudah Terbakar", "Padat", "Daging"],
										datasets: [{
											label: 'J-Barang',
											data: <?= json_encode($sct); ?>,
											backgroundColor: [
												'rgba(255, 99, 132, 0.2)', 'rgba(54, 162, 235, 0.2)',
												'rgba(255, 94, 0, 0.2)', 'rgba(127, 253, 125, 0.2)',
												'rgba(153, 102, 255, 0.2)', 'rgba(255, 159, 64, 0.2)', 'rgba(175, 222, 225, 0.2)'
											],
											borderColor: [
												'rgba(255, 0, 0, 1)', 'rgba(25, 0, 255, 1)',
												'rgba(170, 25, 150, 1)', 'rgba(0, 90, 163, 1)',
												'rgba(153, 102, 255, 1)', 'rgba(255, 159, 64, 1)', 'rgba(153, 50, 155, 1)'
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
						</div>
					</div>
				</div><br><br>
			</div>
		</section>
	</div><br>
</main>

<?= $this->endSection() ?>