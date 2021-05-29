<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<link rel="stylesheet" href="<?= base_url('../css/content.css') ?>" /> <!-- include cakra --->

<?php

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
	<div class="container py-4">
		<section class="mb-4">
			<div class="card">
				<div class="card-header text-center py-3">
					<h5 class="mb-0 text-center">
						<strong>DATA USER</strong>
					</h5>
				</div>
				<div id="toast_alert"></div>
				<div class="card-body pt-1">
					<div class="container mb-3 pb-2" style="border-bottom: 1px solid #dfdfdf;">
						<div class="row my-3">
							<div class="d-flex">
								<div class="flex-fill mr-auto">
									<?php if (intval(session('role')) == 0 && intval(session('divisi_user') <= 2) || intval(session('divisi_user')) == 10) : ?>
										<button type="button" class="btn btn-primary btn-sm p-2 shadow-sm" onclick="TambahUserModal()"><i class="fas fa-plus fa-fw"></i> Tambah User</button>
									<?php endif; ?>
									<a type="button" href="<?= base_url('exlapor/pdfprintUser'); ?>" id="item_pdf" class="r-btn btn btn-success btn-sm p-2 shadow-sm"><i class="fas fa-print fa-fw"></i> Print Laporan</a>
								</div>
								<div class="flex-fill">
									<button type="button" class="btn btn-dark dropdown-toggle shadow-sm p-2" style="float:right;" onclick="return false;" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										<i class="fas fa-fw fa-file"></i> Export
									</button>
									<div class="dropdown-menu dm-export">
										<a class="dropdown-item dm-export-item" href="<?= base_url('exlapor/exceluser'); ?>" id="xls"><i class="fas fa-file-csv fa-fw me-2"></i> Excel</a>
										<a class="dropdown-item dm-export-item" href="<?= base_url('exlapor/docuser'); ?>" id="doc"><i class="fas fa-file-word fa-fw me-2"></i> Word</a>
										<a class="dropdown-item dm-export-item" href="<?= base_url('exlapor/pdfuser'); ?>" id="pdf"><i class="fas fa-file-pdf fa-fw me-2"></i> Pdf</a>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col table-responsive">
								<!-- Load list_user.php -->
								<div id="User_AJAX"></div>
							</div>
						</div>
						<p class="userVCount">Jumlah pengguna saat ini : <?= $usersCount; ?></p>
						<button type="button" class="btn bg-softblue shadow-sm btn-sm p-2" onclick="listUser()"><i class="fas fa-redo-alt fa-fw"></i></button>
					</div>
				</div>
		</section>
	</div>
</main class="mb-3">

<!-- User Modal -->
<div class="modal fade" id="User_Modal" tabindex="-1" aria-labelledby="User_Label" aria-hidden="true">
	<div class="modal-dialog modal-xl">
		<div class="modal-content">
			<div class="modal-header text-light" id="User_Header">
				<h5 class="modal-title" id="User_Label">User Modal </h5>
				<button type="button" class="close btn-modal-close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true" class="text-light">&times;</span>
				</button>
			</div>
			<form id="User_Form" method="POST" enctype="multipart/form-data">

			</form>
		</div>
	</div>
</div>

<!-- Crop Image Before Upload -->
<div class="modal fade" id="uploadimageModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="crop_userLabel" aria-hidden="true">
	<div class="modal-dialog modal-xl">
		<div id="cfading" class=""></div>
		<div class="modal-content" style="z-index: 33;">
			<div class="modal-header bg-light py-2">
				<h5 class="modal-title" id="crop_userLabel">Potong Gambar</h5>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-sm-8 text-center">
						<div id="image_demo" class="p-1" style="overflow-x:scroll"></div>
					</div>
					<div class="col-sm-4 p-3">
						<button class="btn btn-success btn-block crop_image shadow-sm">Potong Gambar</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?= $this->endSection() ?>