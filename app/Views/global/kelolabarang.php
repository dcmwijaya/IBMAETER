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
										<button type="button" class="btn btn-primary btn-sm p-2 shadow-sm" data-toggle="modal" data-target="#Tambah_item"><i class="fas fa-plus fa-fw"></i> Tambah Barang</button>
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
						<div class="tabel">
							<!-- TH TABLE BERGANTUNG PADA CLASS UNTUK MENGHAPUS ROW -->
							<div class="srow container-fluid">
								<table id="table_item" class="display nowrap " style="font-size: 14px; width:100% !important; overflow-x:auto;">
									<thead class="container-fluid" style="width:100%;">
										<tr>
											<th>No</th>
											<th>Nama Barang</th>
											<th>Stok</th>
											<th>Jenis</th>
											<th>Room</th>
											<?php if (session('role') == 0) : ?>
												<th>Aksi</th>
											<?php endif; ?>
											<th>Kirim</th>
										</tr>
									</thead>
									<tbody>
										<?php $no = 1; ?>
										<?php foreach ($item as $b) : ?>
											<tr>
												<td><?= $no ?></td>
												<td style="<?= $tdStyle; ?>"><?= $b['nama_item'] ?></td>
												<td><?= $b['stok']; ?></td>
												<td><?= $b['jenis']; ?></td>
												<td><?= $b['penyimpanan']; ?></td>
												<?php if (session('role') == 0) : ?>
													<td>
														<div class="btn-group" role="group" aria-label="upordel">
															<button type="button" class="btn btn-warning btn-sm btn-edit-item px-2 rounded-left" data-id="<?= $b['id_item']; ?>" data-nama="<?= $b["nama_item"]; ?>" data-stok="<?= $b['stok']; ?>" data-jenis="<?= $b['jenis']; ?>" data-penyimpanan="<?= $b['penyimpanan']; ?>" data-toggle="modal" data-target="#Edit_item"><i class="fas fa-edit fa-fw"></i></button>
															<button type="button" class="btn btn-danger btn-sm btn-delete-item px-2 rounded-right" data-id="<?= $b['id_item']; ?>" data-nama="<?= $b["nama_item"]; ?>" data-toggle="modal" data-target="#Delete_item"><i class="fas fa-trash fa-fw"></i></button>
														</div>
													</td>
												<?php endif; ?>
												<td>
													<div class="btn-group" role="group" aria-label="inoutcom">
														<button type="button" class="btn btn-light btn-sm btn-in-item px-2 rounded-left" data-id="<?= $b['id_item']; ?>" data-nama="<?= $b["nama_item"]; ?>" data-toggle="modal" data-target="#itemIn"><i class="fas fa-plus-circle fa-fw"></i> Masuk</button>
														<button type="button" style="background-color:#37af06" class="btn text-light btn-sm btn-out-item px-2 rounded-right" data-id="<?= $b['id_item']; ?>" data-nama="<?= $b["nama_item"]; ?>" data-toggle="modal" data-target="#itemOut"><i class="fas fa-dolly fa-fw"></i> Keluar</button>
													</div>
												</td>
											</tr>
											<?php $no++; ?>
										<?php endforeach; ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
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
							<div class="d-flex">
								<div class="flex-fill mr-auto">
									<a type="button" href="<?= base_url('exlapor/#'); ?>" id="izin_pdf" onclick="return false;" class="r-btn btn btn-success btn-sm p-2 shadow-sm"><i class="fas fa-print fa-fw"></i> Print Laporan</a>
								</div>
								<div class="flex-fill">
									<button type="button" class="btn btn-dark dropdown-toggle shadow-sm p-2" style="float:right;" onclick="return false;" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										<i class="fas fa-fw fa-file"></i> Export
									</button>
									<div class="dropdown-menu dm-export">
										<a class="dropdown-item dm-export-item" href="<?= base_url('exlapor/#'); ?>" id="izin_xls" onclick="return false;"><i class="fas fa-file-csv fa-fw me-2"></i>Excel</a>
										<a class="dropdown-item dm-export-item" href="<?= base_url('exlapor/#'); ?>" id="izin_doc" onclick="return false;"><i class="fas fa-file-word fa-fw me-2"></i>Word</a>
										<a class="dropdown-item dm-export-item" href="<?= base_url('exlapor/#'); ?>" id="izin_pdf" onclick="return false;"><i class="fas fa-file-pdf fa-fw me-2"></i>Pdf</a>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col">
								<table id="table_perizinan" class="display nowrap " style="font-size: 14px; width:100%; overflow-x:auto;">
									<thead>
										<tr>
											<th><i class="fas fa-fw fa-calendar-alt"></i> Waktu</th>
											<th><i class="fas fa-fw fa-users"></i> Pekerja</th>
											<th><i class="fas fa-fw fa-box"></i> Barang</th>
											<th>Request</th>
											<th>Stok</th>
											<th>Status</th>
											<th>Keterangan</th>
										</tr>
									</thead>
									<tbody>
										<?php foreach ($log_item as $log) : ?>
											<tr>
												<td style="<?= $tdStyle; ?>"><?= $log['tgl']; ?></td>
												<td><?= $log['nama_pekerja']; ?></td>
												<td style="<?= $tdStyle; ?>"><?= $log['nama_barang']; ?></td>
												<td>
													<?php if ($log['request'] == "Masuk") : ?>
														<?= $log['request'] . '<i class="fas fa-fw fa-long-arrow-alt-up " style="color: #06a647 !important; font-size: 18px;"></i>'; ?>
													<?php else : ?>
														<?= $log['request'] . '<i class="fas fa-fw fa-long-arrow-alt-down" style="color: #d53651 !important; font-size: 18px;"></i>'; ?>
													<?php endif; ?>
												</td>
												<td style="width: 75px;">
													<div class="stok text-center bg-dark text-light py-1 rounded">
														<?= $log['ubah_stok']; ?>
													</div>
													<div class="progress mt-2">
														<div class="progress-bar bg-info" role="progressbar" style="width: <?= $log['ubah_stok']; ?>%" aria-valuenow="<?= $log['ubah_stok']; ?>" aria-valuemin="0" aria-valuemax="100"></div>
													</div>
												</td>
												<td>
													<?php if ($log['status'] == 'Diterima') : ?>
														<span class="py-2 badge badge-success" style="font-weight: 500;font-size: 11px;"><i class="fas fa-check fa-fw mr-1"></i>DITERIMA</span>
													<?php elseif ($log['status'] == 'Ditolak') : ?>
														<span class="py-2 badge badge-danger" style="font-weight: 500;font-size: 11px;"><i class="fas fa-times fa-fw mr-1"></i>DITOLAK </span>
													<?php else : ?>
														<span class="py-2 badge badge-warning" style="font-weight: 500;font-size: 11px;background-color: orange;"><i class="fas fa-spinner fa-fw mr-1"></i>PROSES...</span>
													<?php endif; ?>
												</td>
												<td style="<?= $tdStyle; ?>"><?= $log['ket']; ?></td>
											</tr>
										<?php endforeach; ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
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
								<table id="table_spesifikasi" class="display nowrap " style="font-size: 14px; width:100%; overflow-x:auto;">
									<thead>
										<tr>
											<th>No</th>
											<th>Nama Barang</th>
											<th>Kode Barang</th>
											<th>Harga/Item (Rp)</th>
											<th>Berat/Item (gr)</th>
											<th>Nama Supplier</th>
											<?php if (session('role') == 0) : ?>
												<th>Aksi</th>
											<?php endif; ?>
										</tr>
									</thead>
									<tbody>
										<?php $no = 1; ?>
										<?php foreach ($spec as $b) : ?>
											<tr>
												<td><?= $no ?></td>
												<td style="<?= $tdStyle; ?>"><?= $b['nama_item'] ?></td>
												<td>
													<?php if ($b['kode_barang'] != null) : ?>
														<?= $b['kode_barang']; ?>
													<?php else : ?>
														<span class="font-weight-bold text-danger">(Kosong)</span>
													<?php endif; ?>
												</td>
												<td>
													<?php if ($b['harga'] != 0) : ?>
														<?= $b['harga']; ?>
													<?php else : ?>
														<span class="font-weight-bold text-danger">(Kosong)</span>
													<?php endif; ?>
												</td>
												<td>
													<?php if ($b['berat'] != 0) : ?>
														<?= $b['berat']; ?>
													<?php else : ?>
														<span class="font-weight-bold text-danger">(Kosong)</span>
													<?php endif; ?>
												</td>
												<td style="<?= $tdStyle; ?>">
													<?php if ($b['nama_supplier'] != null) : ?>
														<?= $b['nama_supplier']; ?>
													<?php else : ?>
														<span class="font-weight-bold text-danger">(Kosong)</span>
													<?php endif; ?>
												</td>
												<?php if (session('role') == 0) : ?>
													<td>
														<div class="btn-group" role="group" aria-label="inoutcom">
															<button type="button" class="btn btn-dark btn-sm detl-edit-item px-2 rounded-left" data-id="<?= $b['id_item']; ?>" data-nama="<?= $b["nama_item"]; ?>" data-kode="<?= $b['kode_barang']; ?>" data-harga="<?= $b['harga']; ?>" data-berat="<?= $b['berat']; ?>" data-supplier="<?= $b['id_supplier']; ?>" data-toggle="modal" data-target="#Edit_spesifikasi"><i class="fas fa-edit fa-fw"></i></button>
															<button type="button" style="background-color: #1687b3;" class="btn text-light btn-sm detl-item px-2 rounded-right" data-id="<?= $b['id_item']; ?>" data-nama="<?= $b["nama_item"]; ?>" data-kode="<?= $b['kode_barang']; ?>" data-harga="<?= $b['harga']; ?>" data-berat="<?= $b['berat']; ?>" data-supplier="<?= $b['nama_supplier']; ?>" data-stok="<?= $b['stok']; ?>" data-jenis="<?= $b['jenis']; ?>" data-penyimpanan="<?= $b['penyimpanan']; ?>" data-toggle="modal" data-target="#Detail_spesifikasi"><i class="fas fa-file-alt fa-fw"></i></button>
														</div>
													</td>
												<?php endif; ?>
											</tr>
											<?php $no++; ?>
										<?php endforeach; ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
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

<!-- Tambah Barang Modal -->
<div class="modal fade" id="Tambah_item" tabindex="-1" aria-labelledby="Tambah_itemLabel" aria-hidden="true">
	<div class="modal-dialog modal-xl">
		<div class="modal-content">
			<div class="modal-header text-light" style="background-color: #199ac5 !important;">
				<h5 class="modal-title" id="Tambah_itemLabel"><i class="fas fa-fw fa-folder-plus"></i> Tambah Barang Baru </h5>
				<button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?= base_url('/Menu/Add_item'); ?>" method="POST" enctype="multipart/form-data">
				<div class="modal-body">
					<div class="row">
						<!-- bagian kanan -->
						<div class="col-sm-6">
							<div class="form-group">
								<label for="nama_barang"><i class="fas fa-fw fa-box"></i> Nama Barang</label>
								<input type="text" class="form-control" id="nama_barang" placeholder="Tuliskan Nama barang baru" name="nama_item" required>
							</div>
							<div class="form-group">
								<label for="stok_barang"><i class="fas fa-fw fa-cubes"></i> Stok Barang</label>
								<input type="number" class="form-control" id="stok_barang" placeholder="Tuliskan Stok barang baru" name="stok">
							</div>
							<div class="form-group">
								<label for="jenis_barang"><i class="fas fa-fw fa-th-list"></i> Jenis Barang</label>
								<select class="form-control jenis-barang" id="jenis_barang" name="jenis">
									<option>Padat</option>
									<option>Cair</option>
									<option>Mudah Terbakar</option>
									<option>Minyak</option>
									<option>Daging</option>
								</select>
							</div>
							<div class="form-group">
								<label for="penyimpanan"><i class="fas fa-fw fa-thumbtack"></i> Tempat Gudang</label>
								<select class="form-control penyimpanan" id="penyimpanan" name="penyimpanan">
									<option>A</option>
									<option>B</option>
									<option>C</option>
									<option>D</option>
									<option>E</option>
									<option>F</option>
									<option>G</option>
								</select>
							</div>
						</div>
						<!-- bagian kanan -->
						<div class="col-sm-6" style="border-left: outset;">
							<div class="form-group">
								<label for="tambah_kode"><i class="fas fa-fw fa-tag"></i> Kode Barang</label>
								<div class="row pb-1">
									<div class="col-sm-2">
										<small><b>Tempat</b></small>
										<select class="form-control kode1" id="tambah_kode1" disabled>
											<option>A</option>
											<option>B</option>
											<option>C</option>
											<option>D</option>
											<option>E</option>
											<option>F</option>
											<option>G</option>
										</select>
										<input type="hidden" class="hkode1" name="kode1">
									</div>
									/
									<div class="col-sm-4">
										<small><b>Kategori Jenis</b></small>
										<select class="form-control kode2" id="tambah_kode2" disabled>
											<option>Padat</option>
											<option>Cair</option>
											<option>Mudah Terbakar</option>
											<option>Minyak</option>
											<option>Daging</option>
										</select>
										<input type="hidden" class="hkode2" name="kode2">
									</div>
									/
									<div class="col-sm-5">
										<small><b>No. Seri</b></small>
										<input type="number" class="form-control" id="tambah_kode3" placeholder="No. Seri Kode..." name="kode3" required>
									</div>
								</div>
								<small class=""><b>*</b> Sesuai Format kode Barang</small>
								<hr class="mb-0">
							</div>
							<div class="form-group">
								<label for="tambah_harga"><i class="fas fa-fw fa-money-bill-wave-alt"></i> Harga/item (Rp)</label>
								<input type="number" class="form-control" id="tambah_harga" placeholder="Tambah berat Barang..." name="harga">
							</div>
							<div class="form-group">
								<label for="tambah_berat"><i class="fas fa-fw fa-dolly-flatbed"></i> Berat/item (gram)</label>
								<input type="number" class="form-control" id="tambah_berat" placeholder="Tambah berat Barang..." name="berat">
							</div>
							<div class="form-group">
								<label for="tambah_supplier"><i class="fas fa-fw fa-id-card-alt"></i> Dikirim oleh Supplier</label>
								<select class="form-control" id="tambah_supplier" name="supplier">
									<?php $sp = 1; ?>
									<?php foreach ($supplier as $s) :  ?>
										<option value="<?= $sp; ?>"><?= $s['nama_supplier']; ?></option>
										<?php $sp++; ?>
									<?php endforeach; ?>
								</select>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-fw fa-window-close"></i> Batal</button>
					<button type="submit" class="btn btn-primary"><i class="fas fa-fw fa-plus"></i> Tambah Barang</button>
				</div>
			</form>
		</div>
	</div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="Edit_item" tabindex="-1" aria-labelledby="Edit_itemLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header bg-light">
				<h5 class="modal-title" id="Edit_itemLabel">Edit Data Barang "<strong><span id="edit2_nama_item"></span></strong>"</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="<?= base_url('/Menu/Edit_item'); ?>" method="POST" enctype="multipart/form-data">
					<div class="form-group">
						<label for="edit_nama_barang">Nama Barang</label>
						<input type="text" class="form-control" id="edit_nama_barang" name="nama_item">
					</div>
					<div class="form-group">
						<label for="edit_stok_barang">Stok Barang</label>
						<input type="number" class="form-control" id="edit_stok_barang" name="stok">
					</div>
					<div class="form-group">
						<label for="edit_jenis_barang">Jenis Barang</label>
						<select class="form-control" id="edit_jenis_barang" name="jenis">
							<option>Padat</option>
							<option>Cair</option>
							<option>Mudah Terbakar</option>
							<option>Minyak</option>
							<option>Daging</option>
						</select>
					</div>
					<div class="form-group">
						<label for="edit_penyimpanan">Tempat Gudang</label>
						<select class="form-control" id="edit_penyimpanan" name="penyimpanan">
							<option>A</option>
							<option>B</option>
							<option>C</option>
							<option>D</option>
							<option>E</option>
							<option>F</option>
							<option>G</option>
						</select>
					</div>
					<div class="modal-footer">
						<input type="hidden" name="id_item" id="edit_id_item">
						<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-fw fa-window-close"></i> Batal</button>
						<button type="submit" class="btn btn-warning"><i class="fas fa-fw fa-check"></i> Simpan</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<!-- Delete Modal -->
<div class="modal fade" id="Delete_item" tabindex="-1" aria-labelledby="Delete_itemLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header bg-light">
				<h5 class="modal-title" id="Delete_itemLabel">Hapus Data Barang</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				Apakah Anda Yakin ingin menghapus barang "<strong><span id="delete_nama_item"></span></strong>" ?
			</div>
			<div class="modal-footer">
				<form action="<?= base_url('/Menu/Delete_item'); ?>" method="POST" enctype="multipart/form-data">
					<input type="hidden" name="id_item" id="delete_id_item">
					<button type="button" class="btn btn-info" data-dismiss="modal"><i class="fas fa-fw fa-window-close"></i> Batal</button>
					<button type="submit" class="btn btn-danger"><i class="fas fa-fw fa-check"></i> Hapus</button>
				</form>
			</div>
		</div>
	</div>
</div>

<!-- Income Item -->
<div class="modal fade" id="itemIn" tabindex="-1" aria-labelledby="In_itemLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header bg-light">
				<h5 class="modal-title" id="In_itemLabel">Masuk Data barang "<strong><span id="itemInNama"></span></strong>"</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="<?= base_url('/Menu/Income_item'); ?>" method="POST" enctype="multipart/form-data">
					<div class="form-group mb-0">
						<label for="InRange" class="font-weight-bold">Masukan Jumlah Stok Barang Yang <span style="color: #087098;">Masuk</span></label>
						<script>
							function updateRangeInput(elem) {
								$(elem).next().val($(elem).val());
							}
						</script>
						<input type="range" class="form-control-range" id="InRange" min="0" max="100" oninput="updateRangeInput(this)" style="cursor: pointer;">
						<input type="number" class="text-center form-control my-3" name="jumlah_in" required autofocus>
						<small class="text-muted"><span style="color: red;">*</span> Geser Slider</small>
					</div>
					<div class="form-group">
						<label for="ItemTime" class="font-weight-bold">Date and time</label>
						<input type="datetime-local" class="form-control" value="" id="ItemTime" name="tgl" required>
					</div>
					<div class="form-group">
						<label for="InInfo"><b>Keterangan</b></label>
						<textarea class="form-control" id="InInfo" rows="6" name="ket" placeholder="Sampaikan isi pengumuman bila perlu...&#10;"></textarea>
						<small class="text-muted"><span style="color: red;">*</span> Maksimal 254 huruf</small>
					</div>
					<div class="modal-footer">
						<input type="hidden" id="itemInNamaPost" class="form-control" name="nama_barang">
						<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-fw fa-window-close"></i> Batal</button>
						<button type="submit" class="btn btn-primary"><i class="fas fa-fw fa-check"></i> Masukkan</button>
					</div>
				</form>
			</div>
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
					<div class="form-group mb-0">
						<label for="InRange" class="font-weight-bold">Masukan Jumlah Stok Barang Yang <span style="color: #028838;">Keluar</span></label>
						<script>
							function updateRangeInput(elem) {
								$(elem).next().val($(elem).val());
							}
						</script>
						<input type="range" class="form-control-range" id="OutRange" min="0" max="100" oninput="updateRangeInput(this)" style="cursor: pointer;">
						<input type="number" class="text-center form-control my-3" name="jumlah_out" required autofocus>
						<small class="text-muted"><span style="color: red;">*</span> Geser Slider</small>
					</div>
					<div class="form-group">
						<label for="ItemTime2" class="font-weight-bold">Date and time</label>
						<input type="datetime-local" class="form-control" value="" id="ItemTime2" name="tgl" required>
					</div>
					<div class="form-group">
						<label for="InInfo2"><b>Keterangan</b></label>
						<textarea class="form-control" id="InInfo2" rows="6" name="ket" placeholder="Sampaikan isi pengumuman bila perlu...&#10;"></textarea>
						<small class="text-muted"><span style="color: red;">*</span> Maksimal 254 huruf</small>
					</div>
					<div class="modal-footer">
						<input type="hidden" id="itemOutNamaPost" class="form-control" name="nama_barang">
						<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-fw fa-window-close"></i> Batal</button>
						<button type="submit" class="btn btn-success"><i class="fas fa-fw fa-check"></i> Keluarkan</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<?= $this->endSection() ?>