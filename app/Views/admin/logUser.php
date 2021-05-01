<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<link rel="stylesheet" href="<?= base_url('../css/content.css') ?>" /> <!-- include cakra --->
<!--Main layout-->
<main class="bg-dark">
	<div class="container pt-4">
		<section class="mb-4">
			<div class="card">
				<div class="card-header text-center py-3">
					<h5 class="mb-0 text-center">
						<strong>ABSENSI USER</strong>
					</h5>
				</div>
				<div class="card-body pt-1">
					<div class="container mb-3 pb-2" style="border-bottom: 1px solid #dfdfdf;">
						<div class="row my-3">
							<div class="btn-wrap d-flex">
								<div class="flex-fill">
									<div class="btn-group btn-group-toggle" data-toggle="buttons">
										<button type="button" class="btn active btn-dark dropdown-toggle btn-sm shadow-sm p-2" style="float:right;" onclick="return false;" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											<i class="fas fa-fw fa-file"></i> Export
										</button>
										<div class="dropdown-menu dm-export">
											<a class="dropdown-item dm-export-item" href="<?= base_url('Admin/LogUser'); ?>" id="xls"><i class="fas fa-file-csv fa-fw me-2"></i>Export Excel</a>
											<a class="dropdown-item dm-export-item" href="<?= base_url('Admin/LogUser'); ?>" id="doc"><i class="fas fa-file-word fa-fw me-2"></i>Export Word</a>
											<a class="dropdown-item dm-export-item" href="<?= base_url('Admin/LogUser'); ?>" id="pdf"><i class="fas fa-file-pdf fa-fw me-2"></i>Export Pdf</a>
										</div>
										<button type="button" onclick="window.print()" id="item_pdf" class="btn active btn-success btn-sm shadow-sm p-2"><i class="fas fa-print fa-fw"></i> Print Laporan</button>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col">
								<table id="table_absensi" class="display nowrap " style="font-size: 14px; width:100%; overflow-x:auto;">
									<thead>
										<tr>
											<th>Email</th>
											<th>Status Absensi</th>
											<th>Waktu</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>saber.datealive@gmail.com</td>
											<td>Truancy</td>
											<td>2021/4/26 11:32:11 AM</td>
										</tr>
										<tr>
											<td>kuro911@gmail.com</td>
											<td>Attendance</td>
											<td>2021/4/26 11:36:15 AM</td>
										</tr>
										<tr>
											<td>genshin_keqing@gmail.com</td>
											<td>Truancy</td>
											<td>2021/4/27 11:37:16 AM</td>
										</tr>
										<tr>
											<td>kuro.sensei99@gmail.com</td>
											<td>Attendance</td>
											<td>2021/4/28 07:37:16 AM</td>
										</tr>
										<tr>
											<td>rungkutgakure@gmail.com</td>
											<td>Attendance</td>
											<td>2021/4/28 09:37:16 AM</td>
										</tr>
										<tr>
											<td>bagindahokage@gmail.com</td>
											<td>Attendance</td>
											<td>2021/4/28 11:37:16 AM</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
						<p class="absensiCount">
							Jumlah pekerja hadir saat ini : 4<br>
							Jumlah pekerja bolos saat ini : 2
						</p>
					</div>
				</div>
		</section>
		<section class="mb-4">
			<div class="card">
				<div class="card-header text-center py-3">
					<h5 class="mb-0 text-center">
						<strong>AKTIVITAS USER</strong>
					</h5>
				</div>
				<div class="card-body pt-1">
					<div class="container mb-3 pb-2" style="border-bottom: 1px solid #dfdfdf;">
						<div class="row my-3">
							<div class="btn-wrap d-flex">
								<div class="flex-fill">
									<div class="btn-group btn-group-toggle" data-toggle="buttons">
										<button type="button" class="btn active btn-dark dropdown-toggle btn-sm shadow-sm p-2" style="float:right;" onclick="return false;" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											<i class="fas fa-fw fa-file"></i> Export
										</button>
										<div class="dropdown-menu dm-export">
											<a class="dropdown-item dm-export-item" href="<?= base_url('Admin/LogUser'); ?>" id="xls"><i class="fas fa-file-csv fa-fw me-2"></i>Export Excel</a>
											<a class="dropdown-item dm-export-item" href="<?= base_url('Admin/LogUser'); ?>" id="doc"><i class="fas fa-file-word fa-fw me-2"></i>Export Word</a>
											<a class="dropdown-item dm-export-item" href="<?= base_url('Admin/LogUser'); ?>" id="pdf"><i class="fas fa-file-pdf fa-fw me-2"></i>Export Pdf</a>
										</div>
										<button type="button" onclick="window.print()" id="item_pdf" class="btn active btn-success btn-sm shadow-sm p-2"><i class="fas fa-print fa-fw"></i> Print Laporan</button>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col">
								<table id="table_aktivitas" class="display nowrap " style="font-size: 14px; width:100%; overflow-x:auto;">
									<thead>
										<tr>
											<th>Email</th>
											<th>Aktivitas</th>
											<th>Waktu</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>saber.datealive@gmail.com</td>
											<td>http://localhost:8080/admin/login</td>
											<td>2021/4/26 11:31:10 AM</td>
										</tr>
										<tr>
											<td>saber.datealive@gmail.com</td>
											<td>http://localhost:8080/admin/Logout</td>
											<td>2021/4/26 11:32:11 AM</td>
										</tr>
										<tr>
											<td>kuro911@gmail.com</td>
											<td>http://localhost:8080/admin/login</td>
											<td>2021/4/26 11:33:12 AM</td>
										</tr>

										<tr>
											<td>kuro911@gmail.com</td>
											<td>http://localhost:8080/menu/Absensi</td>
											<td>2021/4/26 11:36:15 AM</td>
										</tr>
										<tr>
											<td>kuro911@gmail.com</td>
											<td>http://localhost:8080/admin/Adminpengumuman</td>
											<td>2021/4/26 11:34:13 AM</td>
										</tr>
										<tr>
											<td>kuro911@gmail.com</td>
											<td>http://localhost:8080/admin/logUser</td>
											<td>2021/4/26 11:35:14 AM</td>
										</tr>
										<tr>
											<td>kuro911@gmail.com</td>
											<td>http://localhost:8080/admin/Datauser</td>
											<td>2021/4/27 11:37:16 AM</td>
										</tr>
										<tr>
											<td>kuro911@gmail.com</td>
											<td>http://localhost:8080/admin/Logout</td>
											<td>2021/4/27 11:37:16 AM</td>
										</tr>
										<tr>
											<td>genshin_keqing@gmail.com</td>
											<td>http://localhost:8080/admin/login</td>
											<td>2021/4/27 11:37:16 AM</td>
										</tr>
										<tr>
											<td>genshin_keqing@gmail.com</td>
											<td>http://localhost:8080/admin/Logout</td>
											<td>2021/4/27 11:37:16 AM</td>
										</tr>
										<tr>
											<td>kuro.sensei99@gmail.com</td>
											<td>http://localhost:8080/admin/login</td>
											<td>2021/4/28 07:37:16 AM</td>
										</tr>
										<tr>
											<td>kuro.sensei99@gmail.com</td>
											<td>http://localhost:8080/menu/Absensi</td>
											<td>2021/4/28 07:37:16 AM</td>
										</tr>
										<tr>
											<td>kuro.sensei99@gmail.com</td>
											<td>http://localhost:8080/admin/Logout</td>
											<td>2021/4/28 07:37:16 AM</td>
										</tr>
										<tr>
											<td>rungkutgakure@gmail.com</td>
											<td>http://localhost:8080/admin/login</td>
											<td>2021/4/28 09:37:16 AM</td>
										</tr>
										<tr>
											<td>rungkutgakure@gmail.com</td>
											<td>http://localhost:8080/menu/Absensi</td>
											<td>2021/4/28 09:37:16 AM</td>
										</tr>
										<tr>
											<td>rungkutgakure@gmail.com</td>
											<td>http://localhost:8080/admin/Logout</td>
											<td>2021/4/28 09:37:16 AM</td>
										</tr>
										<tr>
											<td>bagindahokage@gmail.com</td>
											<td>http://localhost:8080/admin/login</td>
											<td>2021/4/28 11:37:16 AM</td>
										</tr>
										<tr>
											<td>bagindahokage@gmail.com</td>
											<td>http://localhost:8080/menu/Absensi</td>
											<td>2021/4/28 11:37:16 AM</td>
										</tr>
										<tr>
											<td>bagindahokage@gmail.com</td>
											<td>http://localhost:8080/admin/Logout</td>
											<td>2021/4/28 11:37:16 AM</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
		</section>
	</div><br>
</main>

<?= $this->endSection() ?>
