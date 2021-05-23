<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<link rel="stylesheet" href="<?= base_url('../css/content.css') ?>" /> <!-- include cakra --->

<!-- style for td -->
<?php $tdStyle = "white-space: -moz-pre-wrap !important; white-space: -pre-wrap; white-space: -o-pre-wrap; white-space: pre-wrap; word-wrap: break-word; white-space: -webkit-pre-wrap; word-break: break-word; white-space: normal;" ?>

<!--Main layout-->
<main class="bg-dark">
	<div class="container pt-4">
		<!-- data item -->
		<section class="mb-4">
			<div class="card">
				<div class="card-header text-center py-3">
					<h5 class="mb-0 text-center">
						<strong>Manajemen Barang Gudang</strong>
					</h5>
				</div>
				<div class="card-body pt-1">
					<div class="container mb-3 pb-2" style="border-bottom: 1px solid #dfdfdf;">
						<div class="row my-3">
							<div class="d-flex">
								<div class="flex-fill mr-auto">
									<?php if (session('role') == 0) : ?>
										<button type="button" class="btn btn-primary btn-sm p-2 shadow-sm" onclick="ItemTambahmodal()"><i class="fas fa-plus fa-fw"></i> Tambah Barang</button>
									<?php endif; ?>
									<a type="button" href="<?= base_url('exlapor/pdfprintBarang'); ?>" id="item_pdf" class="r-btn btn btn-success btn-sm p-2 shadow-sm"><i class="fas fa-print fa-fw"></i> Print Laporan</a>

								</div>
								<div class="flex-fill">
									<button type="button" class="btn btn-dark dropdown-toggle shadow-sm p-2" style="float:right;" onclick="return false;" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										<i class="fas fa-fw fa-file"></i> Export
									</button>
									<div class="dropdown-menu dm-export">
										<a class="dropdown-item dm-export-item" href="<?= base_url('exlapor/excelbarang'); ?>" id="xls"><i class="fas fa-file-csv fa-fw me-2"></i>Excel</a>
										<a class="dropdown-item dm-export-item" href="<?= base_url('exlapor/docbarang'); ?>" id="doc"><i class="fas fa-file-word fa-fw me-2"></i>Word</a>
										<a class="dropdown-item dm-export-item" href="<?= base_url('exlapor/pdfbarang'); ?>" id="pdf"><i class="fas fa-file-pdf fa-fw me-2"></i>Pdf</a>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col">
								<!-- Reload Table Barang -->
								<div id="Item_AJAX"></div>
							</div>
						</div>
					</div>
					<button type="button" class="btn bg-softblue shadow-sm btn-sm p-2" onclick="listItem()"><i class="fas fa-redo-alt fa-fw"></i></button>
				</div>
			</div>
		</section>
		<!-- status permintaan -->
		<section class="mb-4">
			<div class="card">
				<div class="card-header text-center py-3">
					<h5 class="mb-0 text-center">
						<strong>Status Perizinan Barang Masuk/Keluar</strong>
					</h5>
				</div>
				<div class="card-body pt-1">
					<div class="container mb-3 pb-2" style="border-bottom: 1px solid #dfdfdf;">
						<div class="row my-3">
							<div class="clearfix">
								<div class="float-left">
									<a type="button" href="<?= base_url('exlapor/pdfprintStatizin'); ?>" id="pstatizin_pdf" class="btn btn-success btn-sm p-2 shadow-sm"><i class="fas fa-print fa-fw"></i> Print Laporan</a>
								</div>
								<div class="float-right">
									<button type="button" class="btn btn-dark dropdown-toggle shadow-sm p-2" onclick="return false;" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										<i class="fas fa-fw fa-file"></i> Export
									</button>
									<div class="dropdown-menu dm-export">
										<a class="dropdown-item dm-export-item" href="<?= base_url('exlapor/excelstatizin'); ?>" id="statizin_xls"><i class="fas fa-file-csv fa-fw me-2"></i>Excel</a>
										<a class="dropdown-item dm-export-item" href="<?= base_url('exlapor/docstatizin'); ?>" id="statizin_doc"><i class="fas fa-file-word fa-fw me-2"></i>Word</a>
										<a class="dropdown-item dm-export-item" href="<?= base_url('exlapor/pdfstatizin'); ?>" id="statizin_pdf"><i class="fas fa-file-pdf fa-fw me-2"></i>Pdf</a>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col">
								<!-- Reload Table Perizinan -->
								<div id="Perizinan_AJAX"></div>
							</div>
						</div>
					</div>
					<button type="button" class="btn bg-softblue shadow-sm btn-sm p-2" onclick="listPerizinan()"><i class="fas fa-redo-alt fa-fw"></i></button>
				</div>
			</div>
		</section>
		<!-- detail item -->
		<section class="mb-4">
			<div class="card">
				<div class="card-header text-center py-3">
					<h5 class="mb-0 text-center">
						<strong>Spesifikasi Barang Didalam Gudang</strong>
					</h5>
				</div>
				<div class="card-body pt-1">
					<div class="container mb-3 pb-2" style="border-bottom: 1px solid #dfdfdf;">
						<div class="row my-3">
							<div class="d-flex">
								<div class="flex-fill mr-auto">
									<a type="button" href="<?= base_url('exlapor/pdfprintSpesifikasi'); ?>" id="spesifikasi_pdf" class="r-btn btn btn-success btn-sm p-2 shadow-sm"><i class="fas fa-print fa-fw"></i> Print Laporan</a>
								</div>
								<div class="flex-fill">
									<button type="button" class="btn btn-dark dropdown-toggle shadow-sm p-2" style="float:right;" onclick="return false;" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										<i class="fas fa-fw fa-file"></i> Export
									</button>
									<div class="dropdown-menu dm-export">
										<a class="dropdown-item dm-export-item" href="<?= base_url('exlapor/excelspesifikasi'); ?>" id="spesifikasi_xls"><i class="fas fa-file-csv fa-fw me-2"></i>Excel</a>
										<a class="dropdown-item dm-export-item" href="<?= base_url('exlapor/docspesifikasi'); ?>" id="spesifikasi_doc"><i class="fas fa-file-word fa-fw me-2"></i>Word</a>
										<a class="dropdown-item dm-export-item" href="<?= base_url('exlapor/pdfspesifikasi'); ?>" id="spesifikasi_pdf"><i class="fas fa-file-pdf fa-fw me-2"></i>Pdf</a>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col">
								<!-- Reload Table Spesifikasi -->
								<div id="Spesifikasi_AJAX"></div>
							</div>
						</div>
					</div>
					<button type="button" class="btn bg-softblue shadow-sm btn-sm p-2" onclick="listSpesifikasi()"><i class="fas fa-redo-alt fa-fw"></i></button>
					<small><b>*Untuk Kode barang : </b><span style="color:crimson;"><strong>[1] =</strong></span> alfabet tempat penyimpanan, <span style="color:steelblue;"><strong>[2]~[3] =</strong></span> no urutan Kategori, <span style="color: green;"><strong>[4]~[8] =</strong></span> no produksi</small>
				</div>
			</div>
		</section>
	</div><br>
</main>

<!-- In/Out Item Modal -->
<div class="modal fade" id="InOut_Modal" tabindex="-1" aria-labelledby="InOut_Label" aria-hidden="true">
	<div class="modal-dialog modal-xl">
		<div class="modal-content">
			<div class="modal-header text-light" id="InOut_Header">
				<h5 class="modal-title font-weight-bold" id="InOut_Label"> Modal InOut</h5>
				<button type="button" class="close modal-dissmis" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true" class="text-light">&times;</span>
				</button>
			</div>
			<form id="InOut_Form" method="POST" enctype="multipart/form-data"></form>
		</div>
	</div>
</div>

<!-- Spesifikasi Item Modal -->
<div class="modal fade" id="Spec_Modal" tabindex="-1" aria-labelledby="Spec_Label" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header text-light" id="Spec_Header">
				<h5 class="modal-title" id="Spec_Label"> Spesifikasi Modal</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true" class="text-light">&times;</span>
				</button>
			</div>
			<form id="Spec_Form" method="POST" enctype="multipart/form-data">

			</form>
		</div>
	</div>
</div>

<!-- FOR ADMIN SECTION -->
<?php if (session('role') == 0) : ?>
	<!-- Item Barang Modal -->
	<div class="modal fade" id="Item_Modal" tabindex="-1" aria-labelledby="Item_Label" aria-hidden="true">
		<div class="modal-dialog modal-xl">
			<div class="modal-content">
				<div class="modal-header text-light" id="Item_Header">
					<h5 class="modal-title font-weight-bold" id="Item_Label"> Modal Item</h5>
					<button type="button" class="close text-light modal-dissmis" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form id="Item_Form" method="POST" enctype="multipart/form-data">
				</form>
			</div>
		</div>
	</div>

	<!-- Perizinan Modal -->
	<div class="modal fade" id="Perizinan_Modal" tabindex="-1" aria-labelledby="PerizinanLabel" aria-hidden="true">
		<div class="modal-dialog modal-xl">
			<div class="modal-content">
				<div class="modal-header text-light" id="Perizinan_Header">
					<h5 class="modal-title" id="Perizinan_Label"> Perizinan Barang</h5>
					<button type="button" class="close modal-dissmis" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true" class="text-light">&times;</span>
					</button>
				</div>
				<form id="Perizinan_Form" method="POST" enctype="multipart/form-data">
				</form>
			</div>
		</div>
	</div>
<?php endif; ?>

<?= $this->endSection() ?>