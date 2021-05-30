<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<link rel="stylesheet" href="<?= base_url('css/menukhusus.css') ?>">
<link rel="stylesheet" href="<?= base_url('css/dragdrop.css') ?>" />

<!--Main layout-->
<main class="bg-dark">
	<div class="container pt-4">
		<?php if (session()->getFlashdata('pengaduanSukses')) : ?>
			<div class="alert alert-success" role="alert">
				<?= session()->getFlashdata('pengaduanSukses'); ?>
			</div>
		<?php endif ?>
		<section class="mb-4">
			<div class="card">
				<div class="card-header text-center py-3">
					<h5 class="mb-0 text-center">
						<strong><i class="fas fa-fw fa-balance-scale"></i> PENGADUAN</strong>
					</h5>
				</div>
				<div class="card-body pt-1 bg-light">
					<div class="container mb-3 pb-2" style="border-bottom: 1px solid #dfdfdf;">
						<div class="row">
							<div class="col-sm-11 mx-auto" id="pengaduan-user">
								<form id="Pengaduan_Form" method="POST" enctype="multipart/form-data">

								</form>
							</div>
							<!-- <img src="<?= base_url("img/ibpk.png"); ?>" class="card-img" alt="img-1"> -->
						</div>
					</div>
				</div>
				<div class="card-body pt-1">
					<div class="container mb-3 pb-2" style="border-bottom: 1px solid #dfdfdf;">
						<div class="row">
							<div class="col">
								<!-- load tabel -->
								<div id="Pengaduan_AJAX"></div>
							</div>
						</div>
					</div>
					<button type="button" class="btn bg-softblue shadow-sm btn-sm p-2" onclick="listPengaduan()"><i class="fas fa-redo-alt fa-fw"></i></button>
				</div>
			</div>
		</section>
	</div><br>
</main>

<!-- Pengaduan Modal -->
<div class="modal fade" id="Pengaduan_Modal" tabindex="-1" aria-labelledby="Pengaduan_Label" aria-hidden="true">
	<div class="modal-dialog modal-xl">
		<div class="modal-content">
			<div class="modal-header text-light" id="Pengaduan_Header">
				<h5 class="modal-title" id="Pengaduan_Label">Pengaduan Modal</h5>
				<button type="button" class="close modal-dismiss btn-modal-close" data-dismiss="modal" aria-label="Close">
					<span class="text-light" aria-hidden="true">&times;</span>
				</button>
			</div>
			<form id="Pengaduan_Form" method="POST" enctype="multipart/form-data">

			</form>
		</div>
	</div>
</div>
<?= $this->endSection() ?>