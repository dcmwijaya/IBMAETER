<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<link rel="stylesheet" href="<?= base_url('css/chart.css') ?>">
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>

<?php
foreach ($category as $value) {
	$ctg[] = $value['jenis'];
}

foreach ($class as $value) {
	$inv[] = $value['penyimpanan'];
}

foreach ($sc1 as $vs1) {
	$sin[] = $vs1['stok'];
}

foreach ($sc2 as $vs2) {
	$sin[] = $vs2['stok'];
}

foreach ($sc3 as $vs3) {
	$sin[] = $vs3['stok'];
}

foreach ($sc4 as $vs4) {
	$sin[] = $vs4['stok'];
}

foreach ($sc5 as $vs5) {
	$sin[] = $vs5['stok'];
}

foreach ($sc6 as $vs6) {
	$sin[] = $vs6['stok'];
}

foreach ($sc7 as $vs7) {
	$sin[] = $vs7['stok'];
}

foreach ($sj1 as $vj1) {
	$sct[] = $vj1['stok'];
}

foreach ($sj2 as $vj2) {
	$sct[] = $vj2['stok'];
}

foreach ($sj3 as $vj3) {
	$sct[] = $vj3['stok'];
}

foreach ($sj4 as $vj4) {
	$sct[] = $vj4['stok'];
}

foreach ($sj5 as $vj5) {
	$sct[] = $vj5['stok'];
}

?>



<!--Main layout-->
<main class="bg-dark">
	<div class="container py-4">
		<section class="mb-4">
			<div class="card">
				<div class="card-header text-center py-3" style="width: 100%;">
					<h5 class="mb-0 text-center">
						<strong>VIEW CHART</strong>
					</h5>
				</div>
				<!-- card body -->
				<div class="card-body">
					<div class="diagram-wrap">
						<div class="title">
							<center><i class="fas fa-chart-bar fa-fw me-3"></i>Diagram Batang</center>
						</div>
						<canvas class="chartview" id="ChartBar"></canvas>
						<script>
							var ctx = document.getElementById('ChartBar');
							var ChartBar = new Chart(ctx, {
								type: 'bar',
								data: {
									labels: <?= json_encode($inv); ?>,
									datasets: [{
										label: 'R-Barang',
										data: <?= json_encode($sin); ?>,
										backgroundColor: [
											'rgba(255, 99, 132, 0.2)',
											'rgba(54, 162, 235, 0.2)',
											'rgba(255, 206, 86, 0.2)',
											'rgba(75, 192, 192, 0.2)',
											'rgba(153, 102, 255, 0.2)',
											'rgba(255, 159, 64, 0.2)'
										],
										borderColor: [
											'rgba(255, 99, 132, 1)',
											'rgba(54, 162, 235, 1)',
											'rgba(255, 206, 86, 1)',
											'rgba(75, 192, 192, 1)',
											'rgba(153, 102, 255, 1)',
											'rgba(255, 159, 64, 1)'
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
					<hr>

					<div class="diagram-wrap">
						<div class="title">
							<center><i class="fas fa-chart-line fa-fw me-3"></i>Diagram Garis</center>
						</div>
						<canvas class="chartview" id="ChartLine"></canvas>
						<script>
							var ctx = document.getElementById('ChartLine');
							var ChartLine = new Chart(ctx, {
								type: 'line',
								data: {
									labels: <?= json_encode($ctg); ?>,
									datasets: [{
										label: 'J-Barang',
										data: <?= json_encode($sct); ?>,
										backgroundColor: [
											'rgba(255, 99, 132, 0.2)',
											'rgba(54, 162, 235, 0.2)',
											'rgba(255, 206, 86, 0.2)',
											'rgba(75, 192, 192, 0.2)',
											'rgba(153, 102, 255, 0.2)',
											'rgba(255, 159, 64, 0.2)'
										],
										borderColor: [
											'rgba(255, 99, 132, 1)',
											'rgba(54, 162, 235, 1)',
											'rgba(255, 206, 86, 1)',
											'rgba(75, 192, 192, 1)',
											'rgba(153, 102, 255, 1)',
											'rgba(255, 159, 64, 1)'
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
					<hr>

					<div class="diagram-wrap">
						<div class="title">
							<center><i class="fas fa-chart-pie fa-fw me-3"></i>Diagram Pai</center>
						</div>
						<canvas class="chartview" id="ChartPie"></canvas>
						<script>
							var ctx = document.getElementById('ChartPie');
							var ChartPie = new Chart(ctx, {
								type: 'pie',
								data: {
									labels: <?= json_encode($inv); ?>,
									datasets: [{
										label: 'R-Barang',
										data: <?= json_encode($sin); ?>,
										backgroundColor: [
											'rgba(255, 99, 132, 0.2)',
											'rgba(54, 162, 235, 0.2)',
											'rgba(255, 206, 86, 0.2)',
											'rgba(75, 192, 192, 0.2)',
											'rgba(153, 102, 255, 0.2)',
											'rgba(255, 159, 64, 0.2)'
										],
										borderColor: [
											'rgba(255, 99, 132, 1)',
											'rgba(54, 162, 235, 1)',
											'rgba(255, 206, 86, 1)',
											'rgba(75, 192, 192, 1)',
											'rgba(153, 102, 255, 1)',
											'rgba(255, 159, 64, 1)'
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
					<hr>

					<div class="diagram-wrap">
						<div class="title">
							<center><i class="fas fa-dot-circle fa-fw me-3"></i>Diagram Donat</center>
						</div>
						<canvas class="chartview" id="ChartDonuts"></canvas>
						<script>
							var ctx = document.getElementById('ChartDonuts');
							var ChartDonuts = new Chart(ctx, {
								type: 'doughnut',
								data: {
									labels: <?= json_encode($ctg); ?>,
									datasets: [{
										label: 'J-Barang',
										data: <?= json_encode($sct); ?>,
										backgroundColor: [
											'rgba(255, 99, 132, 0.2)',
											'rgba(54, 162, 235, 0.2)',
											'rgba(255, 206, 86, 0.2)',
											'rgba(75, 192, 192, 0.2)',
											'rgba(153, 102, 255, 0.2)',
											'rgba(255, 159, 64, 0.2)'
										],
										borderColor: [
											'rgba(255, 99, 132, 1)',
											'rgba(54, 162, 235, 1)',
											'rgba(255, 206, 86, 1)',
											'rgba(75, 192, 192, 1)',
											'rgba(153, 102, 255, 1)',
											'rgba(255, 159, 64, 1)'
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
					<hr>
				</div>
			</div>
			<!-- end card body -->
		</section>
	</div>
</main>

<?= $this->endSection() ?>
