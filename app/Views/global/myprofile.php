<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

<!--Main layout-->
<main class="bg-dark">
	<div class="container py-4">
		<section class="mb-4">
			<div class="card">
				<div class="card-header text-center py-3">
					<h5 class="mb-0 text-center">
						<strong>MY PROFILE</strong>
					</h5>
					<?php if (session()->getFlashdata('pesan')) : ?>
						<div class="alert alert-success" role="alert">
							<?= session()->getFlashdata('pesan'); ?>
						</div>
					<?php endif ?>
				</div>

				<div class="card-body mx-auto">
					<div class="card mb-3" style="box-shadow: 0px 3px 5px 0px #a8a8a8;">
						<div class="row no-gutters" style="max-width:800px;">
							<div class="col-md-5 d-inline">
								<img src="<?= base_url("/img/user") . "/" . $user['picture']; ?>" class="img-thumbnail img-preview" style="max-width:100%;max-height:100%;width:1000px;height:300px;display:flex;">
							</div>
							<div class="col-md-6">
								<div class="card-body">
									<p class="card-text"><b>Nama : </b><?= $user['nama']; ?></p>
									<p class="card-text"><b>Email : </b><?= $user['email']; ?></p><br>
									<h4 class="card-text"><b><?= ($user['role'] == 0) ? "ADMIN" : "PEKERJA" ?></b></h4>
								</div>
							</div>
						</div>
					</div>
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
						<div class="row">
							<div class="col">
								<table id="table_aktivitas" class="display nowrap " style="font-size: 14px; width:100%; overflow-x:auto;">
									<thead>
										<tr>
											<th>Id User</th>
											<th>Aktivitas</th>
											<th>Waktu</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>USP-1</td>
											<td>http://localhost:8080/menu/login</td>
											<td>2021/4/26 11:31:10 AM</td>
										</tr>
										<tr>
											<td>USP-1</td>
											<td>http://localhost:8080/menu/LaporanBulanan</td>
											<td>2021/4/26 11:32:11 AM</td>
										</tr>
										<tr>
											<td>USP-1</td>
											<td>http://localhost:8080/menu/Pengaduan</td>
											<td>2021/4/26 11:33:12 AM</td>
										</tr>
										<tr>
											<td>USP-1</td>
											<td>http://localhost:8080/menu/pengumuman</td>
											<td>2021/4/26 11:34:13 AM</td>
										</tr>
										<tr>
											<td>USP-1</td>
											<td>http://localhost:8080/menu/Profedit</td>
											<td>2021/4/26 11:35:14 AM</td>
										</tr>
										<tr>
											<td>USP-1</td>
											<td>http://localhost:8080/menu/Profakun</td>
											<td>2021/4/26 11:36:15 AM</td>
										</tr>
										<tr>
											<td>USP-1</td>
											<td>http://localhost:8080/menu/Absensi</td>
											<td>2021/4/27 11:37:16 AM</td>
										</tr>
										<tr>
											<td>USP-1</td>
											<td>http://localhost:8080/menu/Dashboard</td>
											<td>2021/4/27 11:37:16 AM</td>
										</tr>
										<tr>
											<td>USP-1</td>
											<td>http://localhost:8080/menu/kelolaBarang</td>
											<td>2021/4/27 11:37:16 AM</td>
										</tr>
										<tr>
											<td>USP-1</td>
											<td>http://localhost:8080/menu/Logout</td>
											<td>2021/4/27 11:37:16 AM</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
		</section>

	</div>
</main>

<?= $this->endSection() ?>
