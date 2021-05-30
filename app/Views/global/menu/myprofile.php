<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

<!--Main layout-->
<main class="bg-dark">
	<div class="container py-4">
		<section class="mb-4">
			<div class="card">
				<div class="card-header text-center py-3 bg-softblue text-light">
					<h5 class="mb-0 text-center">
						<strong><i class="fas fa-fw fa-id-card-alt mr-2"></i> My Profile</strong>
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
							<div class="col-md-5 d-inline" style="padding:20px 30px 20px 30px;">
								<!-- style="max-width:100%;max-height:100%;width:1000px;height:300px;display:flex;"	 -->
								<img src="<?= base_url("/img/user") . "/" . $user['picture']; ?>" class="img-thumbnail img-preview">
							</div>
							<div class="col-md-6" style="padding:20px 30px 20px 30px;">
								<div class="card-body">
									<p class="card-text"><b class="col-4 p-0">Nama <span class="col-2 p-1"> : </span></b><?= $user['nama']; ?></p>
									<p class="card-text"><b class="col-4 p-0">Email <span class="col-2 p-1"> : </span></b><?= $user['email']; ?></p>
									<p class="card-text"><b class="col-4 p-0">Divisi<span class="col-2 p-1"> : </span></b><?= $divisi['nama_divisi']; ?></p>
									<p class="card-text"><b class="col-4 p-0">Gender<span class="col-2 p-1"> : </span></b><?= $user['gender']; ?></p><br>
									<hr>
									<h4 class="card-text"><b><i class="text-chocholate fas fa-fw fa-user-tag mr-2"></i><?= ($user['role'] == 0) ? "ADMIN" : "KARYAWAN" ?></b></h4>
									<hr>
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
											<th>Aktivitas</th>
											<th>Waktu</th>
										</tr>
									</thead>
									<tbody>
										<?php foreach ($aktivitas as $akt) : ?>
											<tr>
												<td><?= $akt['aktivitas']; ?></td>
												<td><?= $akt['waktu_aktivitas']; ?></td>
											</tr>
										<?php endforeach; ?>
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