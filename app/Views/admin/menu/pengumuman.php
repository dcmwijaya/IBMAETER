<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<link rel="stylesheet" href="<?= base_url('../css/content.css') ?>" /> <!-- include cakra --->

<!-- style for td -->
<?php $tdStyle = "white-space: -moz-pre-wrap !important; white-space: -pre-wrap; white-space: -o-pre-wrap; white-space: pre-wrap; word-wrap: break-word; white-space: -webkit-pre-wrap; word-break: break-word; white-space: normal;" ?>


<!--Main layout-->
<main class="bg-dark">
	<div class="container pt-4">
		<section class="pb-4">
			<div class="card">
				<div class="card-header text-center py-3">
					<h5 class="mb-0 text-center">
						<strong><i class="fas fa-fw fa-pen-square mr-2"></i>Edit Pengumuman</strong>
					</h5>
				</div>
				<div class="card-body">
					<div class="container mb-3 pb-2" style="border-bottom: 1px solid #dfdfdf;">
						<div class="">
							<button type="button" class="btn btn-primary px-3 shadow-sm" onclick="showTambahmodal()"><i class="fas fa-plus-square fa-fw"></i> Tambah</button>
							<button type="button" class="btn btn-dark shadow-sm" onclick="listPengumuman()"><i class="fas fa-sync fa-fw"></i> Reload</button>
						</div>
						<div class="row my-3">
							<div class="flex-fill">
							</div>
						</div>
						<div class="row">
							<div class="col">
								<!-- Reload Table -->
								<div id="Reload_AJAX"></div>
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
				<button type="button" class="close modal-dismiss btn-modal-close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true" class="text-light">&times;</span>
				</button>
			</div>
			<form id="Pengumuman_Form" method="POST" enctype="multipart/form-data">

			</form>
		</div>
	</div>
</div>

<?= $this->endSection() ?>