<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<link rel="stylesheet" href="<?= base_url('../css/content.css') ?>" /> <!-- include cakra --->

<!-- style for td -->
<?php $tdStyle = "white-space: -moz-pre-wrap !important; white-space: -pre-wrap; white-space: -o-pre-wrap; white-space: pre-wrap; word-wrap: break-word; white-space: -webkit-pre-wrap; word-break: break-word; white-space: normal;" ?>


<!--Main layout-->
<main class="bg-dark">
	<div class="container pt-4">
		<?php if (session()->getFlashdata('Pengumuman')) : ?>
			<div class="position-fixed bottom-0 right-0 p-3" style="z-index: 5; right: 0; bottom: 0;">
				<div class="toast shadow" role="alert" aria-live="assertive" aria-atomic="true" autohide: false>
					<div class="toast-header bg-dark text-light">
						<img src="<?= base_url('img/icon/favicon-16x16.png') ?>" class="rounded mr-2" alt="Pesan">
						<strong class="mr-auto">INVENBAR CI-4</strong>
						<small>Baru Saja</small>
						<button type="button" class="ml-2 mb-1 close text-light" data-dismiss="toast" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="toast-body">
						<?= session()->getFlashdata('Pengumuman'); ?>
					</div>
				</div>
			</div>
		<?php endif ?>
		<section class="pb-4">
			<div class="card">
				<div class="card-header text-center py-3">
					<h5 class="mb-0 text-center">
						<strong>EDIT PENGUMUMAN</strong>
					</h5>
				</div>
				<div class="card-body">
					<div class="container mb-3 pb-2" style="border-bottom: 1px solid #dfdfdf;">
						<div class="row my-3">
							<div class="flex-fill">
								<div class="btn-group btn-wrap">
									<button type="button" class="btn btn-primary btn-sm px-3 shadow-sm" onclick="showTambahmodal()"><i class="fas fa-plus-square fa-fw"></i> Tambah</button>
									<button type="button" class="btn btn-dark" onclick="listPengumuman()"><i class="fas fa-sync fa-fw"></i> Reload</button>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col">
								<table id="table_pengumuman" class="display nowrap " style="font-size: 14px; width:100%; overflow-x:auto;">
									<thead>
										<tr>
											<!-- ######################### DATATABLES GAGAL SORTING -->
											<th><i class="fas fa-fw fa-calendar-alt"></i> Waktu</th>
											<th class="bg-danger text-light"><i class="fas fa-fw fa-info"></i> Status</th>
											<th><i class="fas fa-fw fa-info"></i> Admin</th>
											<th><i class="fas fa-fw fa-users"></i> Judul</th>
											<th><i class="fas fa-fw fa-box"></i> Isi Pengumuman</th>
											<th><i class="fas fa-fw fa-time"></i> Aksi</th>
										</tr>
									</thead>
									<tbody id="listPengumuman"></tbody>
								</table>
							</div>
						</div>
					</div>
					<div class="container">
						<small><b>*NB :</b></small>
					</div>
				</div>
			</div><br>
		</section>
	</div>
</main>

<!-- Main Pengumuman Modal -->
<div class="modal fade" id="Pengumuman_Modal" tabindex="-1" aria-labelledby="Pengumuman_ModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div id="Pengumuman_Header" class="modal-header bg-dark text-light">
				<h5 class="modal-title" id="Pengumuman_ModalLabel"><i id="Pengumuman_Icon" class="fas fa-fw fa-folder-open text-light"></i><span id="Modal_Title"> Edit Pengumuman</span></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true" class="text-light">&times;</span>
				</button>
			</div>
			<form id="Pengumuman_Form" method="POST" enctype="multipart/form-data">

			</form>
		</div>
	</div>
</div>

<?= $this->endSection() ?>