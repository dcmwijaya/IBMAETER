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

<!-- Edit Spesifikasi Modal -->
<div class="modal fade" id="Edit_spesifikasi" tabindex="-1" aria-labelledby="Edit_spesifikasiLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header bg-dark text-light">
				<h5 class="modal-title" id="Edit_spesifikasiLabel">Edit Spesifikasi Barang "<strong><span id="edit_spesifikasi_nama" style="color: gold !important;"></span></strong>"</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true" class="text-light">&times;</span>
				</button>
			</div>
			<form action="<?= base_url('Menu/EditSpecItem'); ?>" method="POST" enctype="multipart/form-data">
				<div class="modal-body">
					<div class="row">
						<div class="col-sm-4">
							<div class="container">
								<small><b>*Untuk Kode barang : </br></b><span style="color:crimson;"><strong>[1] =</strong></span> alfabet tempat penyimpanan, </br><span style="color:steelblue;"><strong>[2]~[3] =</strong></span> no urutan Kategori, </br><span style="color: green;"><strong>[4]~[8] =</strong></span> no produksi</small>
							</div>
						</div>
						<div class="col-sm-8 border-left p-4">
							<div class="form-group">
								<label for="edit_sp_kode"><i class="fas fa-fw fa-box"></i> Kode Barang</label>
								<input type="text" class="form-control" id="edit_sp_kode" placeholder="Edit Kode Barang..." name="sp_kode" required>
								<small><b>*</b> Harus sesuai kode Barang !</small>
							</div>
							<div class="form-group">
								<label for="edit_sp_harga"><i class="fas fa-fw fa-money-bill-wave-alt"></i> Harga/item (Rp)</label>
								<input type="number" class="form-control" id="edit_sp_harga" placeholder="Edit berat Barang..." name="sp_harga">
							</div>
							<div class="form-group">
								<label for="edit_sp_berat"><i class="fas fa-fw fa-dolly-flatbed"></i> Berat/item (gram)</label>
								<input type="number" class="form-control" id="edit_sp_berat" placeholder="Edit berat Barang..." name="sp_berat">
							</div>
							<div class="form-group">
								<label for="edit_sp_supplier"><i class="fas fa-fw fa-id-card-alt"></i> Dikirim oleh Supplier</label>
								<select class="form-control" name="sp_supplier" id="selectsupplier">
									<option value="0">(Tidak Ada)</option>
									<?php $sp = 1; ?>
									<?php foreach ($supplier as $s) :  ?>
										<option class="checksupplier" value="<?= $sp; ?>">
											<?= $s['nama_supplier']; ?>
										</option>
										<?php $sp++; ?>
									<?php endforeach; ?>
								</select>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<input type="hidden" name="sp_id_item" id="edit_sp_id_item">
						<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-fw fa-window-close"></i> Batal</button>
						<button type="submit" class="btn btn-warning"><i class="fas fa-fw fa-check"></i> Simpan</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>

<!-- Detail Spesifikasi Modal -->
<div class="modal fade" id="Detail_spesifikasi" tabindex="-1" aria-labelledby="Detail_spesifikasiLabel" aria-hidden="true">
	<div class="modal-dialog modal-xl">
		<div class="modal-content">
			<div class="modal-header text-light" style="background-color: #199ac5 !important;">
				<h5 class="modal-title" id="Detail_spesifikasiLabel"><i class="fas fa-fw fa-folder-open text-light"></i> Detail Spesifikasi Barang</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-6">
						<div class="form-group">
							<label for="detail_nama" class="font-weight-bold"><i class="fas fa-fw fa-box"></i> Nama Barang</label>
							<input type="text" class="famebg form-control" id="detail_nama" name="detail_nama" readonly>
						</div>
						<div class="form-group">
							<label for="detail_stok" class="font-weight-bold"><i class="fas fa-fw fa-cubes"></i> Stok Barang Saat Ini</label>
							<input type="number" class="famebg form-control" id="detail_stok" name="detail_stok" readonly>
						</div>
						<div class="form-group">
							<label for="detail_jenis" class="font-weight-bold"><i class="fas fa-fw fa-th-list"></i> Jenis Barang</label>
							<input type="text" class="famebg form-control" id="detail_jenis" name="detail_jenis" readonly>
						</div>
						<div class="form-group">
							<label for="detail_penyimpanan" class="font-weight-bold"><i class="fas fa-fw fa-thumbtack"></i> Tempat Gudang</label>
							<input type="text" class="famebg form-control" id="detail_penyimpanan" name="detail_penyimpanan" readonly>
						</div>
					</div>
					<div class="col-6">
						<div class="form-group">
							<label for="detail_kode" class="font-weight-bold"><i class="fas fa-fw fa-tag"></i> Kode Barang</label>
							<input type="text" class="famebg form-control" id="detail_kode" name="detail_kode" readonly>
						</div>
						<div class="form-group">
							<label for="detail_harga" class="font-weight-bold"><i class="fas fa-fw fa-money-bill-wave-alt"></i> Harga/item Saat Ini (IDR)</label>
							<input type="number" class="famebg form-control" id="detail_harga" name="detail_harga" readonly>
						</div>
						<div class="form-group">
							<label for="detail_berat" class="font-weight-bold"><i class="fas fa-fw fa-dolly-flatbed"></i> Berat/item (gram)</label>
							<input type="text" class="famebg form-control" id="detail_berat" name="detail_berat" readonly>
						</div>
						<div class="form-group">
							<label for="detail_supplier" class="font-weight-bold"><i class="fas fa-fw fa-id-card-alt"></i> Pensuplai Barang</label>
							<input type="text" class="famebg form-control" id="detail_supplier" name="detail_supplier" readonly>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<!-- <form action="<?= base_url('Menu/kelolabarang'); ?>" method="POST" enctype="multipart/form-data"> -->
				<input type="hidden" name="detail_item" id="detail_item">
				<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-fw fa-window-close"></i> Keluar</button>
				<button type="button" class="btn btn-success"><i class="fas fa-fw fa-print"></i> Print</button>
				<!-- </form> -->
			</div>
		</div>
	</div>
</div>

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

<!-- In/Out Item -->
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

<!-- Outcome Item -->
<div class="modal fade" id="itemOut" tabindex="-1" aria-labelledby="In_itemLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header bg-light">
				<h5 class="modal-title" id="In_itemLabel">Keluar Data barang "<strong><span id="itemOutNama"></span></strong>"</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="<?= base_url('/Menu/Outcome_item'); ?>" method="POST" enctype="multipart/form-data">

				</form>
			</div>
		</div>
	</div>
</div>

<?= $this->endSection() ?>