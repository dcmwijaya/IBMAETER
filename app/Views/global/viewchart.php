<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>

<?php
foreach ($category as $val) {
	$ctg[] = $val['jenis'];
}

foreach ($class as $value) {
	$inv[] = $value['penyimpanan'];
}

foreach ($stok as $value) {
	$stk[] = $value['stok'];
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
					<div class="title">
						<center><i class="fas fa-chart-bar fa-fw me-3"></i>Diagram Batang</center>
					</div>
					<canvas id="ChartBar" width="400" height="400"></canvas>
					<script>
						var ctx = document.getElementById('ChartBar');
						var ChartBar = new Chart(ctx, {
							type: 'bar',
							data: {
								labels: <?= json_encode($inv); ?>,
								datasets: [{
									label: 'R-Barang',
									data: <?= json_encode($stk); ?>,
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
					<hr>

					<div class="title">
						<center><i class="fas fa-chart-line fa-fw me-3"></i>Diagram Garis</center>
					</div>
					<canvas id="ChartLine" width="400" height="400"></canvas>
					<script>
						var ctx = document.getElementById('ChartLine');
						var ChartLine = new Chart(ctx, {
							type: 'line',
							data: {
								labels: <?= json_encode($ctg); ?>,
								datasets: [{
									label: 'J-Barang',
									data: <?= json_encode($stk); ?>,
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
					<hr>

					<div class="title">
						<center><i class="fas fa-chart-pie fa-fw me-3"></i>Diagram Pai</center>
					</div>
					<canvas id="ChartPie" width="400" height="400"></canvas>
					<script>
						var ctx = document.getElementById('ChartPie');
						var ChartPie = new Chart(ctx, {
							type: 'pie',
							data: {
								labels: <?= json_encode($inv); ?>,
								datasets: [{
									label: 'R-Barang',
									data: <?= json_encode($stk); ?>,
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
					<hr>

					<div class="title">
						<center><i class="fas fa-dot-circle fa-fw me-3"></i>Diagram Donat</center>
					</div>
					<canvas id="ChartDonuts" width="400" height="400"></canvas>
					<script>
						var ctx = document.getElementById('ChartDonuts');
						var ChartDonuts = new Chart(ctx, {
							type: 'doughnut',
							data: {
								labels: <?= json_encode($ctg); ?>,
								datasets: [{
									label: 'J-Barang',
									data: <?= json_encode($stk); ?>,
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
				<!-- end card body -->
		</section>
	</div>
</main>

<?= $this->endSection() ?>