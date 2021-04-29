<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<link rel="stylesheet" href="<?= base_url('css/dashboard.css') ?>">
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>

<?php
// foreach ($category as $value) {
// 	$ctg[] = $value['jenis'];
// }

// foreach ($class as $value) {
// 	$inv[] = $value['penyimpanan'];
// }


// Stok Berdasarkan Jenis
foreach ($sj1 as $vj1) {
	if ($sj1 != null) {
		$sct[] = $vj1['stok'];
	} else {
		$sct[] = 0;
	}
}
foreach ($sj2 as $vj2) {
	if ($sj2 != null) {
		$sct[] = $vj2['stok'];
	} else {
		$sct[] = 0;
	}
}
foreach ($sj3 as $vj3) {
	if ($sj3 != null) {
		$sct[] = $vj3['stok'];
	} else {
		$sct[] = 0;
	}
}
foreach ($sj4 as $vj4) {
	if ($sj4 != null) {
		$sct[] = $vj4['stok'];
	} else {
		$sct[] = 0;
	}
}
foreach ($sj5 as $vj5) {
	if ($sj5 != null) {
		$sct[] = $vj5['stok'];
	} else {
		$sct[] = 0;
	}
}

// Stok Berdasarkan Penyimpanan
foreach ($sc1 as $vs1) {
	if ($sc1 != null) {
		$sin[] = $vs1['stok'];
	} else {
		$sin[] = 0;
	}
}
foreach ($sc2 as $vs2) {
	if ($sc2 != null) {
		$sin[] = $vs2['stok'];
	} else {
		$sin[] = 0;
	}
}
foreach ($sc3 as $vs3) {
	if ($sc3 != null) {
		$sin[] = $vs3['stok'];
	} else {
		$sin[] = 0;
	}
}
foreach ($sc4 as $vs4) {
	if ($sc4 != null) {
		$sin[] = $vs4['stok'];
	} else {
		$sin[] = 0;
	}
}
foreach ($sc5 as $vs5) {
	if ($sc5 != null) {
		$sin[] = $vs5['stok'];
	} else {
		$sin[] = 0;
	}
}
foreach ($sc6 as $vs6) {
	if ($sc6 != null) {
		$sin[] = $vs6['stok'];
	} else {
		$sin[] = 0;
	}
}
foreach ($sc7 as $vs7) {
	if ($sc7 != null) {
		$sin[] = $vs7['stok'];
	} else {
		$sin[] = 0;
	}
}
foreach ($us as $usc) {
	if ($us != null) {
		$usersCount = $usc['uid'];
	} else {
		$usersCount = 0;
	}
}

?>

<!--Main layout-->
<main class="bg-dark">
	<div class="container pt-4">
		<section class="mb-4">
			<div class="card">
				<div class="card-header text-center py-3">
					<h5 class="mb-0 text-center">
						<strong>DASHBOARD</strong>
					</h5>
				</div><br><br>
				<div class="card-body pt-1">
					<div class="card-deck">
						<div class="card views-wrap">
							<p class="text-center">Jumlah pengguna website : &nbsp;&nbsp;
								<i class="fas fa-user fa-fw"></i>
								<span><?= $usersCount; ?> Pengguna</span>
							</p>
						</div>
					</div><br>
					<div class="card-deck">
						<div class="card chart-wrap">
							<h2>
								<strong>
									GRAFIK BATANG<br>
									<span>Stok Barang Berdasarkan Penyimpanan</span>
								</strong>
							</h2>
							<div class="card-body chart-content">
								<canvas class="chartview" id="ChartBar" height="300" width="300"></canvas>
								<script>
									var ctx = document.getElementById('ChartBar');
									var ChartBar = new Chart(ctx, {
										type: 'bar',
										data: {
											labels: ["A", "B", "C", "D", "E", "F", "G"],
											datasets: [{
												label: 'R-Barang',
												data: <?= json_encode($sin); ?>,
												backgroundColor: [
													'rgba(255, 99, 132, 0.2)',
													'rgba(54, 162, 235, 0.2)',
													'rgba(255, 206, 86, 0.2)',
													'rgba(127, 253, 125, 0.2)',
													'rgba(153, 102, 255, 0.2)',
													'rgba(255, 159, 64, 0.2)',
													'rgba(175, 222, 225, 0.2)',
												],
												borderColor: [
													'rgba(255, 99, 132, 1)',
													'rgba(54, 162, 235, 1)',
													'rgba(255, 206, 86, 1)',
													'rgba(75, 192, 192, 1)',
													'rgba(153, 102, 255, 1)',
													'rgba(255, 159, 64, 1)',
													'rgba(153, 50, 155, 1)'
												],
												borderWidth: 1,
											}, ],
										},
										options: {
											scales: {
												y: {
													beginAtZero: true
												}
											},
										}
									});
								</script>
							</div>
						</div>
						<div class="card chart-wrap">
							<h2>
								<strong>
									GRAFIK GARIS<br>
									<span>Stok Barang Berdasarkan Jenis</span>
								</strong>
							</h2>
							<div class="card-body chart-content">
								<canvas class="chartview" id="ChartLine" height="300" width="300"></canvas>
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
													'rgba(255, 99, 132, 0.2)',
													'rgba(54, 162, 235, 0.2)',
													'rgba(255, 206, 86, 0.2)',
													'rgba(127, 253, 125, 0.2)',
													'rgba(153, 102, 255, 0.2)',
													'rgba(255, 159, 64, 0.2)',
													'rgba(175, 222, 225, 0.2)'
												],
												borderColor: [
													'rgba(255, 99, 132, 1)',
													'rgba(54, 162, 235, 1)',
													'rgba(255, 206, 86, 1)',
													'rgba(75, 192, 192, 1)',
													'rgba(153, 102, 255, 1)',
													'rgba(255, 159, 64, 1)',
													'rgba(153, 50, 155, 1)'
												],
												borderWidth: 1,
											}, ],
										},
										options: {
											scales: {
												y: {
													beginAtZero: true
												}
											}
										}
									});
								</script>
							</div>
						</div>
						<div class="card chart-wrap">
							<h2>
								<strong>
									GRAFIK PAI<br>
									<span>Stok Barang Berdasarkan Penyimpanan</span>
								</strong>
							</h2>
							<div class="card-body chart-content">
								<canvas class="chartview" id="ChartPie" height="300" width="300"></canvas>
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
													'rgba(255, 99, 132, 0.2)',
													'rgba(54, 162, 235, 0.2)',
													'rgba(255, 206, 86, 0.2)',
													'rgba(127, 253, 125, 0.2)',
													'rgba(153, 102, 255, 0.2)',
													'rgba(255, 159, 64, 0.2)',
													'rgba(175, 222, 225, 0.2)'
												],
												borderColor: [
													'rgba(255, 99, 132, 1)',
													'rgba(54, 162, 235, 1)',
													'rgba(255, 206, 86, 1)',
													'rgba(75, 192, 192, 1)',
													'rgba(153, 102, 255, 1)',
													'rgba(255, 159, 64, 1)',
													'rgba(153, 50, 155, 1)'
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
						<div class="card chart-wrap">
							<h2>
								<strong>
									GRAFIK DONAT<br>
									<span>Stok Barang Berdasarkan Jenis</span>
								</strong>
							</h2>
							<div class="card-body chart-content">
								<canvas class="chartview" id="ChartDonuts" height="300" width="300"></canvas>
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
													'rgba(255, 99, 132, 0.2)',
													'rgba(54, 162, 235, 0.2)',
													'rgba(255, 206, 86, 0.2)',
													'rgba(127, 253, 125, 0.2)',
													'rgba(153, 102, 255, 0.2)',
													'rgba(255, 159, 64, 0.2)',
													'rgba(175, 222, 225, 0.2)'
												],
												borderColor: [
													'rgba(255, 99, 132, 1)',
													'rgba(54, 162, 235, 1)',
													'rgba(255, 206, 86, 1)',
													'rgba(75, 192, 192, 1)',
													'rgba(153, 102, 255, 1)',
													'rgba(255, 159, 64, 1)',
													'rgba(153, 50, 155, 1)'
												],
												borderWidth: 1,
											}, ],
										},
										options: {
											scales: {
												y: {
													beginAtZero: true
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
					</div>
					<div class="card-deck">
						<div class="card mb-2 menu-wrap">
							<a href="<?= base_url('menu/kelolaBarang') ?>" type="button" class="btn btn-primary tombolmenu">
								<h2>
									<strong>
										KELOLA BARANG<br>
										<span>Menu kelola barang</span>
									</strong>
								</h2>
							</a>
						</div>
						<div class="card  mb-2 menu-wrap">
							<a href="<?= base_url('menu/absensiUser') ?>" type="button" class="btn btn-primary tombolmenu">
								<h2>
									<strong>
										ABSENSI PEKERJA<br>
										<span>Menu absensi pekerja</span>
									</strong>
								</h2>
							</a>
						</div>
						<div class="card mb-2 menu-wrap">
							<a href="<?= base_url('menu/LaporanBulanan') ?>" type="button" class="btn btn-primary tombolmenu">
								<h2>
									<strong>
										CETAK LAPORAN<br>
										<span>Menu cetak laporan</span>
									</strong>
								</h2>
							</a>
						</div>
						<div class="card mb-2 menu-wrap">
							<a href="<?= base_url('menu/Pengaduan') ?>" type="button" class="btn btn-primary tombolmenu">
								<h2>
									<strong>
										PENGADUAN<br>
										<span>Menu pengaduan</span>
									</strong>
								</h2>
							</a>
						</div>
					</div><br><br>
				</div>
			</div>
		</section>
	</div><br>
</main>

<?= $this->endSection() ?>
