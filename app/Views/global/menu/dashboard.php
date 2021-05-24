<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<link rel="stylesheet" href="<?= base_url('css/dashboard.css') ?>">

<?php

// ====================================== Stok Berdasarkan Penyimpanan ====================================== //
if (!empty($sc1)) {
	foreach ($sc1 as $vs1) {
		$sin[] = intval($vs1['stok']);
	}
} else {
	$sin[] = null;
}
if (!empty($sc2)) {
	foreach ($sc2 as $vs2) {
		$sin[] = intval($vs2['stok']);
	}
} else {
	$sin[] = null;
}
if (!empty($sc3)) {
	foreach ($sc3 as $vs3) {
		$sin[] = intval($vs3['stok']);
	}
} else {
	$sin[] = null;
}
if (!empty($sc4)) {
	foreach ($sc4 as $vs4) {
		$sin[] = intval($vs4['stok']);
	}
} else {
	$sin[] = null;
}
if (!empty($sc5)) {
	foreach ($sc5 as $vs5) {
		$sin[] = intval($vs5['stok']);
	}
} else {
	$sin[] = null;
}
if (!empty($sc6)) {
	foreach ($sc6 as $vs6) {
		$sin[] = intval($vs6['stok']);
	}
} else {
	$sin[] = null;
}
if (!empty($sc7)) {
	foreach ($sc7 as $vs7) {
		$sin[] = intval($vs7['stok']);
	}
} else {
	$sin[] = null;
}

// ====================================== Stok Berdasarkan Jenis ====================================== //
if (!empty($sj1)) {
	foreach ($sj1 as $vj1) {
		$sct1 = intval($vj1['stok']);
	}
} else {
	$sct1 = 0;
}
if (!empty($sj2)) {
	foreach ($sj2 as $vj2) {
		$sct2 = intval($vj2['stok']);
	}
} else {
	$sct2 = 0;
}
if (!empty($sj3)) {
	foreach ($sj3 as $vj3) {
		$sct3 = intval($vj3['stok']);
	}
} else {
	$sct3 = 0;
}
if (!empty($sj4)) {
	foreach ($sj4 as $vj4) {
		$sct4 = intval($vj4['stok']);
	}
} else {
	$sct4 = 0;
}
if (!empty($sj5)) {
	foreach ($sj5 as $vj5) {
		$sct5 = intval($vj5['stok']);
	}
} else {
	$sct5 = 0;
}

// ====================================== Cost Barang ====================================== //
if (!empty($cc1)) {
	foreach ($cc1 as $vc1) {
		$scs[] = intval($vc1['harga']);
	}
} else {
	$scs[] = null;
}
if (!empty($cc2)) {
	foreach ($cc2 as $vc2) {
		$scs[] = intval($vc2['harga']);
	}
} else {
	$scs[] = null;
}
if (!empty($cc3)) {
	foreach ($cc3 as $vc3) {
		$scs[] = intval($vc3['harga']);
	}
} else {
	$scs[] = null;
}
if (!empty($cc4)) {
	foreach ($cc4 as $vc4) {
		$scs[] = intval($vc4['harga']);
	}
} else {
	$scs[] = null;
}
if (!empty($cc5)) {
	foreach ($cc5 as $vc5) {
		$scs[] = intval($vc5['harga']);
	}
} else {
	$scs[] = null;
}
if (!empty($cc6)) {
	foreach ($cc6 as $vc6) {
		$scs[] = intval($vc6['harga']);
	}
} else {
	$scs[] = null;
}
if (!empty($cc7)) {
	foreach ($cc7 as $vc7) {
		$scs[] = intval($vc7['harga']);
	}
} else {
	$scs[] = null;
}

// ====================================== Weight Barang ====================================== //
if (!empty($cw1)) {
	foreach ($cw1 as $vw1) {
		$swg[] = intval($vw1['berat']);
	}
} else {
	$swg[] = null;
}
if (!empty($cw2)) {
	foreach ($cw2 as $vw2) {
		$swg[] = intval($vw2['berat']);
	}
} else {
	$swg[] = null;
}
if (!empty($cw3)) {
	foreach ($cw3 as $vw3) {
		$swg[] = intval($vw3['berat']);
	}
} else {
	$swg[] = null;
}
if (!empty($cw4)) {
	foreach ($cw4 as $vw4) {
		$swg[] = intval($vw4['berat']);
	}
} else {
	$swg[] = null;
}
if (!empty($cw5)) {
	foreach ($cw5 as $vw5) {
		$swg[] = intval($vw5['berat']);
	}
} else {
	$swg[] = null;
}
if (!empty($cw6)) {
	foreach ($cw6 as $vw6) {
		$swg[] = intval($vw6['berat']);
	}
} else {
	$swg[] = null;
}
if (!empty($cw7)) {
	foreach ($cw7 as $vw7) {
		$swg[] = intval($vw7['berat']);
	}
} else {
	$swg[] = null;
}

// ====================================== Gender Employees ====================================== //
if (!empty($cf)) {
	foreach ($cf as $cfv) {
		$cfm1 = intval($cfv['gender']);
	}
} else {
	$cfm1 = 0;
}
if (!empty($cm)) {
	foreach ($cm as $cmv) {
		$cfm2 = intval($cmv['gender']);
	}
} else {
	$cfm2 = 0;
}

// ====================================== In/Out Stock ====================================== //
if (!empty($inc)) {
	foreach ($inc as $vic) {
		$icot1[] = intval($vic['ubah_stok']);
	}
} else {
	$icot1[] = null;
}
if (!empty($otc)) {
	foreach ($otc as $vot) {
		$icot2[] = intval($vot['ubah_stok']);
	}
} else {
	$icot2[] = null;
}

?>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/variable-pie.js"></script>
<script src="https://code.highcharts.com/modules/series-label.js"></script>

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
								<i class="fas fa-dolly-flatbed fa-fw me-1"></i>Category Item
							</div>
							<div class="card-body content-dashboard">
								<div id="SCircle" class="container-chart1"></div>
							</div>
							<script>
								Highcharts.chart('SCircle', {
									chart: {
										plotBackgroundColor: null,
										plotBorderWidth: 0,
										plotShadow: false
									},
									title: {
										text: '',
									},
									tooltip: {
										headerFormat: '',
										pointFormat: '<span style="color:{point.color}">\u25CF</span> <b> {point.name}</b><br/>' +
											'Total: <b>{point.y}</b><br/>'
									},
									accessibility: {
										point: {
											valueSuffix: ''
										}
									},
									plotOptions: {
										pie: {
											allowPointSelect: true,
											cursor: 'pointer',
											dataLabels: {
												enabled: false
											},
											showInLegend: true,
											size: '118%'
										}
									},
									series: [{
										type: 'pie',
										innerSize: '50%',
										data: [
											['Cair', <?= json_encode($sct1); ?>],
											['Minyak', <?= json_encode($sct2); ?>],
											['Mudah Terbakar', <?= json_encode($sct3); ?>],
											['Padat', <?= json_encode($sct4); ?>],
											['Daging', <?= json_encode($sct5); ?>]
										]
									}]
								});
							</script>
						</div>
						<div class="card chart2-dashboard mb-3 col-md-7 sm-shadow">
							<div class="card-header title-card-1">
								<i class="fas fa-cubes fa-fw me-1"></i>Inventory Room
							</div>
							<div class="card-body content-dashboard">
								<div id="ChartBar" class="container-chart2"></div>
							</div>
							<script>
								Highcharts.chart('ChartBar', {
									chart: {
										type: 'column'
									},
									title: {
										text: ''
									},
									subtitle: {
										text: ''
									},
									xAxis: {
										categories: [
											'A',
											'B',
											'C',
											'D',
											'E',
											'F',
											'G'
										],
										crosshair: true
									},
									yAxis: {
										min: 0,
										title: {
											text: 'Akumulasi'
										}
									},
									tooltip: {
										headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
										pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
											'<td style="padding:0"><b>{point.y}</b></td></tr>',
										footerFormat: '</table>',
										shared: true,
										useHTML: true
									},
									plotOptions: {
										column: {
											pointPadding: 0.2,
											borderWidth: 0
										}
									},
									series: [{
										name: 'Stock Item',
										data: <?= json_encode($sin); ?>

									}, {
										name: 'Weight Item',
										data: <?= json_encode($swg); ?>

									}, {
										name: 'Cost Item',
										data: <?= json_encode($scs); ?>

									}]
								});
							</script>
						</div>
					</div>

					<div class="row row-dashboard">
						<div class="card chart3-dashboard mb-3 col-md-7 sm-shadow">
							<div class="card-header title-card-2">
								<i class="fas fa-exchange-alt fa-fw me-1"></i>Inventory Stock In-Out
							</div>

							<div class="card-body content-dashboard">
								<div id="ChartLine" class="container-chart3"></div>
							</div>
							<script>
								Highcharts.chart('ChartLine', {
									chart: {
										type: 'line',
									},
									title: {
										text: '',
										align: 'left'
									},
									subtitle: {
										text: '',
										align: 'left'
									},
									yAxis: {
										title: {
											text: 'Stock'
										},
									},
									series: [{
										name: 'Approve Income Item',
										data: <?= json_encode($icot1); ?>

									}, {
										name: 'Approve Outcome Item',
										data: <?= json_encode($icot2); ?>
									}],
									navigation: {
										menuItemStyle: {
											fontSize: '10px'
										}
									}
								});
							</script>
						</div>

						<div class="card chart4-dashboard mb-3 col-md-4 sm-shadow">
							<div class="card-header title-card-2">
								<i class="fas fa-laptop-house fa-fw me-1"></i>Gender Employees
							</div>
							<div class="card-body content-dashboard">
								<div id="ChartPie" class="container-chart4"></div>
							</div>
							<script>
								Highcharts.chart('ChartPie', {
									chart: {
										plotBackgroundColor: null,
										plotBorderWidth: null,
										plotShadow: false,
										type: 'pie'
									},
									plotOptions: {
										pie: {
											allowPointSelect: true,
											cursor: 'pointer',
											dataLabels: {
												enabled: false
											},
											showInLegend: true
										}
									},
									title: {
										text: ''
									},
									tooltip: {
										headerFormat: '',
										pointFormat: '<span style="color:{point.color}">\u25CF</span> <b> {point.name}</b><br/>' +
											'Total: <b>{point.y}</b><br/>'
									},
									series: [{
										name: 'Total Gender',
										data: [{
											name: 'Female',
											y: <?= json_encode($cfm1); ?>
										}, {
											name: 'Male',
											y: <?= json_encode($cfm2); ?>
										}]
									}]
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