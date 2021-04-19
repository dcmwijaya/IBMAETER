<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

<!--Main layout-->
<main class="bg-dark">
	<div class="container pt-4">
		<section class="mb-4">
			<div class="card">
				<div class="card-header text-center py-3">
					<h5 class="mb-0 text-center">
						<strong>DASHBOARD - Tabel Barang Gudang</strong>
					</h5>
				</div>
				<div class="card-body pt-1">
					<div class="container mb-3 pb-2" style="border-bottom: 1px solid #dfdfdf;">
						<div class="row">
							<div class="col-sm-6">
								<div class="d-flex flex-wrap">
									<button type="button" class="btn btn-primary shadow-sm p-2 m-2" data-toggle="modal" data-target="#Tambah_item"><i class="fas fa-plus fa-fw"></i> Tambah Barang</button>
									<button type="button" onclick="window.print()" id="item_pdf" class="ml-auto btn btn-info shadow-sm p-2 m-2"><i class="fas fa-file-pdf fa-fw"></i> Print Laporan</button>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="d-flex justify-content-end">
									<div class="btn-group m-2">
										<a type="button" href="#" class="btn btn-dark btn-sm" onclick="return false;"><i class="fas fa-download fa-fw"></i> Export Data Barang</a>
										<button type="button" class="btn btn-dark btn-sm dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											<span class="sr-only">Toggle Dropdown</span>
										</button>
										<div class="dropdown-menu dm-export">
											<a class="dropdown-item dm-export-item" href="<?= base_url('Menu/excelbarang'); ?>" id="xls"><i class="fas fa-file-csv fa-fw me-2"></i>Export Excel</a>
											<a class="dropdown-item dm-export-item" href="<?= base_url('Menu/docbarang'); ?>" id="doc"><i class="fas fa-file-word fa-fw me-2"></i>Export Word</a>
											<a class="dropdown-item dm-export-item" href="<?= base_url('Menu/pdfbarang'); ?>" id="pdf"><i class="fas fa-file-pdf fa-fw me-2"></i>Export Pdf</a>
										</div>
										<style>
											.dm-export {
												background-color: rgba(225, 225, 225);
												margin: 10px 10px;
												border-radius: 2px;
											}

											.dm-export-item:hover {
												background-color: grey;
												color: white;
												padding-left: 10px;
												border-radius: 2px;
												width: 100%;
												text-transform: uppercase;
											}
										</style>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col">
							<table id="table_item" class="display nowrap " style="font-size: 14px; width:100%; overflow-x:auto;">
								<thead>
									<tr>
										<th>No</th>
										<th>Nama Barang</th>
										<th>Stok</th>
										<th>Jenis</th>
										<th>Room</th>
										<th>Aksi</th>
										<th>Kirim</th>
									</tr>
								</thead>
								<tbody>
									<?php $no = 1; ?>
									<?php foreach ($item as $b) : ?>
										<tr>
											<td><?= $no ?></td>
											<td><?= $b['nama_item'] ?></td>
											<td><?= $b['stok']; ?></td>
											<td><?= $b['jenis']; ?></td>
											<td><?= $b['penyimpanan']; ?></td>
											<td>
												<div class="btn-group" role="group" aria-label="inoutcom">
													<button type="button" class="btn btn-warning btn-sm btn-edit-item px-2 rounded-left" data-id="<?= $b['id_item']; ?>" data-nama="<?= $b["nama_item"]; ?>" data-stok="<?= $b['stok']; ?>" data-jenis="<?= $b['jenis']; ?>" data-penyimpanan="<?= $b['penyimpanan']; ?>" data-toggle="modal" data-target="#Edit_item"><i class="fas fa-edit fa-fw"></i></button>
													<button type="button" class="btn btn-danger btn-sm btn-delete-item px-2 rounded-right" data-id="<?= $b['id_item']; ?>" data-nama="<?= $b["nama_item"]; ?>" data-toggle="modal" data-target="#Delete_item"><i class="fas fa-trash fa-fw"></i></button>
												</div>
											</td>
											<td>
												<div class="btn-group" role="group" aria-label="inoutcom">
													<button type="button" class="btn btn-light btn-sm btn-in-item px-2 rounded-left" data-id="<?= $b['id_item']; ?>" data-nama="<?= $b["nama_item"]; ?>" data-toggle="modal" data-target="#itemIn"><i class="fas fa-plus-circle fa-fw"></i> Masuk</button>
													<button type="button" class="btn btn-success btn-sm btn-out-item px-2 rounded-right" data-id="<?= $b['id_item']; ?>" data-nama="<?= $b["nama_item"]; ?>" data-toggle="modal" data-target="#itemOut"><i class="fas fa-dolly fa-fw"></i> Keluar</button>
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
		</section>
	</div><br>
</main>
<!-- Tambah Modal -->
<div class="modal fade" id="Tambah_item" tabindex="-1" aria-labelledby="Tambah_itemLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header bg-light">
				<h5 class="modal-title" id="Tambah_itemLabel">Tambah Barang Baru </h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="<?= base_url('/Menu/Add_item'); ?>" method="POST" enctype="multipart/form-data">
					<div class="form-group">
						<label for="nama_barang">Nama Barang</label>
						<input type="text" class="form-control" id="nama_barang" placeholder="Tuliskan Nama barang baru" name="nama_item">
					</div>
					<div class="form-group">
						<label for="stok_barang">Stok Barang</label>
						<input type="number" class="form-control" id="stok_barang" placeholder="Tuliskan Stok barang baru" name="stok">
					</div>
					<div class="form-group">
						<label for="jenis_barang">Jenis Barang</label>
						<select class="form-control" id="jenis_barang" name="jenis">
							<option>Padat</option>
							<option>Cair</option>
							<option>Mudah Terbakar</option>
							<option>Minyak</option>
							<option>Daging</option>
						</select>
					</div>
					<div class="form-group">
						<label for="penyimpanan">Kelompok Kamar</label>
						<select class="form-control" id="penyimpanan" name="penyimpanan">
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
						<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-fw fa-window-close"></i> Batal</button>
						<button type="submit" class="btn btn-primary"><i class="fas fa-fw fa-plus"></i> Tambah Barang</button>
					</div>
				</form>
			</div>
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
						<label for="edit_penyimpanan">Kelompok Kamar</label>
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
						<input type="hidden" id="itemInId" class="form-control" name="id_item">
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
						<input type="hidden" id="itemOutId" class="form-control" name="id_item">
						<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-fw fa-window-close"></i> Batal</button>
						<button type="submit" class="btn btn-success"><i class="fas fa-fw fa-check"></i> Keluarkan</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<?= $this->endSection() ?>
