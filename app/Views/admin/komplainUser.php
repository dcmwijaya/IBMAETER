<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<link rel="stylesheet" href="<?= base_url('../css/content.css') ?>" /> <!-- include cakra --->
<!--Main layout-->
<main class="bg-dark">
	<div class="container pt-4">
		<section class="mb-4">
			<div class="card">
				<div class="card-header text-center py-3">
					<h5 class="mb-0 text-center">
						<strong>KOMPLAIN PEKERJA</strong>
					</h5>
				</div>
				<div class="card-body pt-1">
					<div class="container mb-3 pb-2" style="border-bottom: 1px solid #dfdfdf;">
						<div class="row my-3">
							<div class="btn-wrap d-flex">
								<div class="flex-fill">
									<div class="btn-group btn-group-toggle" data-toggle="buttons">
										<button type="button" class="btn active btn-dark dropdown-toggle btn-sm shadow-sm p-2" style="float:right;" onclick="return false;" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											<i class="fas fa-fw fa-file"></i> Export
										</button>
										<div class="dropdown-menu dm-export">
											<a class="dropdown-item dm-export-item" href="<?= base_url('Admin/Complain'); ?>" id="xls"><i class="fas fa-file-csv fa-fw me-2"></i>Export Excel</a>
											<a class="dropdown-item dm-export-item" href="<?= base_url('Admin/Complain'); ?>" id="doc"><i class="fas fa-file-word fa-fw me-2"></i>Export Word</a>
											<a class="dropdown-item dm-export-item" href="<?= base_url('Admin/Complain'); ?>" id="pdf"><i class="fas fa-file-pdf fa-fw me-2"></i>Export Pdf</a>
										</div>
										<button type="button" onclick="window.print()" id="item_pdf" class="btn active btn-success btn-sm shadow-sm p-2"><i class="fas fa-print fa-fw"></i> Print Laporan</button>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col">
								<table id="table_komplain" class="display nowrap " style="font-size: 14px; width:100%; overflow-x:auto;">
									<thead>
										<tr>
											<th>Email</th>
											<th>Perihal Komplain</th>
											<th>Kendala</th>
											<th>Bukti</th>
											<th>Waktu Komplain</th>
											<th>Aksi</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>saber.datealive@gmail.com</td>
											<td>Kendala Edit Profile</td>
											<td>Foto tidak bisa dirubah</td>
											<td>
												<!-- Bagian ini : Gambar SS -->
											</td>
											<td>2021/4/26 11:31:10 AM</td>
											<td>
												<div class="btn-group" role="group" aria-label="inoutcom">
													<button type="button" class="btn btn-success btn-sm btn-acc-item px-2 rounded-left" data-id="" data-nama="" data-stok="" data-jenis="" data-penyimpanan="" data-toggle="modal" data-target="#Accept"><i class="fas fa-check fa-fw"></i></button>
													<button type="button" class="btn btn-danger btn-sm btn-rjc-item px-2 rounded-right" data-id="" data-nama="" data-toggle="modal" data-target="#Rejected"><i class="fas fa-times fa-fw"></i></button>
												</div>
											</td>
										</tr>
										<tr>
											<td>kacangjago@gmail.com</td>
											<td>Kendala Menu Absensi</td>
											<td>Menu tidak bisa diakses</td>
											<td>
												<!-- Bagian ini : Gambar SS -->
											</td>
											<td>2021/4/26 11:32:11 AM</td>
											<td>
												<div class="btn-group" role="group" aria-label="inoutcom">
													<button type="button" class="btn btn-success btn-sm btn-acc-item px-2 rounded-left" data-id="" data-nama="" data-stok="" data-jenis="" data-penyimpanan="" data-toggle="modal" data-target="#Accept"><i class="fas fa-check fa-fw"></i></button>
													<button type="button" class="btn btn-danger btn-sm btn-rjc-item px-2 rounded-right" data-id="" data-nama="" data-toggle="modal" data-target="#Rejected"><i class="fas fa-times fa-fw"></i></button>
												</div>
											</td>
										</tr>
										<tr>
											<td>kuro911@gmail.com</td>
											<td>Kendala Menu Absensi</td>
											<td>Menu tidak bisa diakses</td>
											<td>
												<!-- Bagian ini : Gambar SS -->
											</td>
											<td>2021/4/26 11:33:12 AM</td>
											<td>
												<div class="btn-group" role="group" aria-label="inoutcom">
													<button type="button" class="btn btn-success btn-sm btn-acc-item px-2 rounded-left" data-id="" data-nama="" data-stok="" data-jenis="" data-penyimpanan="" data-toggle="modal" data-target="#Accept"><i class="fas fa-check fa-fw"></i></button>
													<button type="button" class="btn btn-danger btn-sm btn-rjc-item px-2 rounded-right" data-id="" data-nama="" data-toggle="modal" data-target="#Rejected"><i class="fas fa-times fa-fw"></i></button>
												</div>
											</td>
										</tr>
										<tr>
											<td>rifkya911@gmail.com</td>
											<td>Kendala Edit Profile</td>
											<td>Foto tidak bisa dirubah</td>
											<td>
												<!-- Bagian ini : Gambar SS -->
											</td>
											<td>2021/4/26 11:36:15 AM</td>
											<td>
												<div class="btn-group" role="group" aria-label="inoutcom">
													<button type="button" class="btn btn-success btn-sm btn-acc-item px-2 rounded-left" data-id="" data-nama="" data-stok="" data-jenis="" data-penyimpanan="" data-toggle="modal" data-target="#Accept"><i class="fas fa-check fa-fw"></i></button>
													<button type="button" class="btn btn-danger btn-sm btn-rjc-item px-2 rounded-right" data-id="" data-nama="" data-toggle="modal" data-target="#Rejected"><i class="fas fa-times fa-fw"></i></button>
												</div>
											</td>
										</tr>
										<tr>
											<td>merdinabrori@gmail.com</td>
											<td>Kendala Edit Profile</td>
											<td>Foto tidak bisa dirubah</td>
											<td>
												<!-- Bagian ini : Gambar SS -->
											</td>
											<td>2021/4/26 11:34:13 AM</td>
											<td>
												<div class="btn-group" role="group" aria-label="inoutcom">
													<button type="button" class="btn btn-success btn-sm btn-acc-item px-2 rounded-left" data-id="" data-nama="" data-stok="" data-jenis="" data-penyimpanan="" data-toggle="modal" data-target="#Accept"><i class="fas fa-check fa-fw"></i></button>
													<button type="button" class="btn btn-danger btn-sm btn-rjc-item px-2 rounded-right" data-id="" data-nama="" data-toggle="modal" data-target="#Rejected"><i class="fas fa-times fa-fw"></i></button>
												</div>
											</td>
										</tr>
										<tr>
											<td>devancakra@gmail.com</td>
											<td>Kendala Menu Absensi</td>
											<td>Menu tidak bisa diakses</td>
											<td>
												<!-- Bagian ini : Gambar SS -->
											</td>
											<td>2021/4/26 11:35:14 AM</td>
											<td>
												<div class="btn-group" role="group" aria-label="inoutcom">
													<button type="button" class="btn btn-success btn-sm btn-acc-item px-2 rounded-left" data-id="" data-nama="" data-stok="" data-jenis="" data-penyimpanan="" data-toggle="modal" data-target="#Accept"><i class="fas fa-check fa-fw"></i></button>
													<button type="button" class="btn btn-danger btn-sm btn-rjc-item px-2 rounded-right" data-id="" data-nama="" data-toggle="modal" data-target="#Rejected"><i class="fas fa-times fa-fw"></i></button>
												</div>
											</td>
										</tr>
										<tr>
											<td>okezone712@gmail.com</td>
											<td>Kendala Menu Absensi</td>
											<td>Menu tidak bisa diakses</td>
											<td>
												<!-- Bagian ini : Gambar SS -->
											</td>
											<td>2021/4/27 11:37:16 AM</td>
											<td>
												<div class="btn-group" role="group" aria-label="inoutcom">
													<button type="button" class="btn btn-success btn-sm btn-acc-item px-2 rounded-left" data-id="" data-nama="" data-stok="" data-jenis="" data-penyimpanan="" data-toggle="modal" data-target="#Accept"><i class="fas fa-check fa-fw"></i></button>
													<button type="button" class="btn btn-danger btn-sm btn-rjc-item px-2 rounded-right" data-id="" data-nama="" data-toggle="modal" data-target="#Rejected"><i class="fas fa-times fa-fw"></i></button>
												</div>
											</td>
										</tr>
										<tr>
											<td>dyandra90@gmail.com</td>
											<td>Kendala Edit Profile</td>
											<td>Foto tidak bisa dirubah</td>
											<td>
												<!-- Bagian ini : Gambar SS -->
											</td>
											<td>2021/4/27 11:37:16 AM</td>
											<td>
												<div class="btn-group" role="group" aria-label="inoutcom">
													<button type="button" class="btn btn-success btn-sm btn-acc-item px-2 rounded-left" data-id="" data-nama="" data-stok="" data-jenis="" data-penyimpanan="" data-toggle="modal" data-target="#Accept"><i class="fas fa-check fa-fw"></i></button>
													<button type="button" class="btn btn-danger btn-sm btn-rjc-item px-2 rounded-right" data-id="" data-nama="" data-toggle="modal" data-target="#Rejected"><i class="fas fa-times fa-fw"></i></button>
												</div>
											</td>
										</tr>
										<tr>
											<td>genshin_keqing@gmail.com</td>
											<td>Kendala Edit Profile</td>
											<td>Foto tidak bisa dirubah</td>
											<td>
												<!-- Bagian ini : Gambar SS -->
											</td>
											<td>2021/4/27 11:37:16 AM</td>
											<td>
												<div class="btn-group" role="group" aria-label="inoutcom">
													<button type="button" class="btn btn-success btn-sm btn-acc-item px-2 rounded-left" data-id="" data-nama="" data-stok="" data-jenis="" data-penyimpanan="" data-toggle="modal" data-target="#Accept"><i class="fas fa-check fa-fw"></i></button>
													<button type="button" class="btn btn-danger btn-sm btn-rjc-item px-2 rounded-right" data-id="" data-nama="" data-toggle="modal" data-target="#Rejected"><i class="fas fa-times fa-fw"></i></button>
												</div>
											</td>
										</tr>
										<tr>
											<td>saber.nero@gmail.com</td>
											<td>Kendala Menu Absensi</td>
											<td>Menu tidak bisa diakses</td>
											<td>
												<!-- Bagian ini : Gambar SS -->
											</td>
											<td>2021/4/27 11:37:16 AM</td>
											<td>
												<div class="btn-group" role="group" aria-label="inoutcom">
													<button type="button" class="btn btn-success btn-sm btn-acc-item px-2 rounded-left" data-id="" data-nama="" data-stok="" data-jenis="" data-penyimpanan="" data-toggle="modal" data-target="#Accept"><i class="fas fa-check fa-fw"></i></button>
													<button type="button" class="btn btn-danger btn-sm btn-rjc-item px-2 rounded-right" data-id="" data-nama="" data-toggle="modal" data-target="#Rejected"><i class="fas fa-times fa-fw"></i></button>
												</div>
											</td>
										</tr>
										<tr>
											<td>kuro.sensei99@gmail.com</td>
											<td>Kendala Menu Absensi</td>
											<td>Menu tidak bisa diakses</td>
											<td>
												<!-- Bagian ini : Gambar SS -->
											</td>
											<td>2021/4/28 07:37:16 AM</td>
											<td>
												<div class="btn-group" role="group" aria-label="inoutcom">
													<button type="button" class="btn btn-success btn-sm btn-acc-item px-2 rounded-left" data-id="" data-nama="" data-stok="" data-jenis="" data-penyimpanan="" data-toggle="modal" data-target="#Accept"><i class="fas fa-check fa-fw"></i></button>
													<button type="button" class="btn btn-danger btn-sm btn-rjc-item px-2 rounded-right" data-id="" data-nama="" data-toggle="modal" data-target="#Rejected"><i class="fas fa-times fa-fw"></i></button>
												</div>
											</td>
										</tr>
										<tr>
											<td>nikey88@gmail.com</td>
											<td>Kendala Edit Profile</td>
											<td>Foto tidak bisa dirubah</td>
											<td>
												<!-- Bagian ini : Gambar SS -->
											</td>
											<td>2021/4/28 07:37:16 AM</td>
											<td>
												<div class="btn-group" role="group" aria-label="inoutcom">
													<button type="button" class="btn btn-success btn-sm btn-acc-item px-2 rounded-left" data-id="" data-nama="" data-stok="" data-jenis="" data-penyimpanan="" data-toggle="modal" data-target="#Accept"><i class="fas fa-check fa-fw"></i></button>
													<button type="button" class="btn btn-danger btn-sm btn-rjc-item px-2 rounded-right" data-id="" data-nama="" data-toggle="modal" data-target="#Rejected"><i class="fas fa-times fa-fw"></i></button>
												</div>
											</td>
										</tr>
										<tr>
											<td>liediana@gmail.com</td>
											<td>Kendala Edit Profile</td>
											<td>Foto tidak bisa dirubah</td>
											<td>
												<!-- Bagian ini : Gambar SS -->
											</td>
											<td>2021/4/28 07:37:16 AM</td>
											<td>
												<div class="btn-group" role="group" aria-label="inoutcom">
													<button type="button" class="btn btn-success btn-sm btn-acc-item px-2 rounded-left" data-id="" data-nama="" data-stok="" data-jenis="" data-penyimpanan="" data-toggle="modal" data-target="#Accept"><i class="fas fa-check fa-fw"></i></button>
													<button type="button" class="btn btn-danger btn-sm btn-rjc-item px-2 rounded-right" data-id="" data-nama="" data-toggle="modal" data-target="#Rejected"><i class="fas fa-times fa-fw"></i></button>
												</div>
											</td>
										</tr>
										<tr>
											<td>rungkutgakure@gmail.com</td>
											<td>Kendala Menu Home</td>
											<td>Menu tidak bisa diakses</td>
											<td>
												<!-- Bagian ini : Gambar SS -->
											</td>
											<td>2021/4/28 09:37:16 AM</td>
											<td>
												<div class="btn-group" role="group" aria-label="inoutcom">
													<button type="button" class="btn btn-success btn-sm btn-acc-item px-2 rounded-left" data-id="" data-nama="" data-stok="" data-jenis="" data-penyimpanan="" data-toggle="modal" data-target="#Accept"><i class="fas fa-check fa-fw"></i></button>
													<button type="button" class="btn btn-danger btn-sm btn-rjc-item px-2 rounded-right" data-id="" data-nama="" data-toggle="modal" data-target="#Rejected"><i class="fas fa-times fa-fw"></i></button>
												</div>
											</td>
										</tr>
										<tr>
											<td>suketteki@gmail.com</td>
											<td>Kendala Menu Home</td>
											<td>Menu tidak bisa diakses</td>
											<td>
												<!-- Bagian ini : Gambar SS -->
											</td>
											<td>2021/4/28 09:37:16 AM</td>
											<td>
												<div class="btn-group" role="group" aria-label="inoutcom">
													<button type="button" class="btn btn-success btn-sm btn-acc-item px-2 rounded-left" data-id="" data-nama="" data-stok="" data-jenis="" data-penyimpanan="" data-toggle="modal" data-target="#Accept"><i class="fas fa-check fa-fw"></i></button>
													<button type="button" class="btn btn-danger btn-sm btn-rjc-item px-2 rounded-right" data-id="" data-nama="" data-toggle="modal" data-target="#Rejected"><i class="fas fa-times fa-fw"></i></button>
												</div>
											</td>
										</tr>
										<tr>
											<td>buildingclub@gmail.com</td>
											<td>Kendala Edit Profile</td>
											<td>Foto tidak bisa dirubah</td>
											<td>
												<!-- Bagian ini : Gambar SS -->
											</td>
											<td>2021/4/28 09:37:16 AM</td>
											<td>
												<div class="btn-group" role="group" aria-label="inoutcom">
													<button type="button" class="btn btn-success btn-sm btn-acc-item px-2 rounded-left" data-id="" data-nama="" data-stok="" data-jenis="" data-penyimpanan="" data-toggle="modal" data-target="#Accept"><i class="fas fa-check fa-fw"></i></button>
													<button type="button" class="btn btn-danger btn-sm btn-rjc-item px-2 rounded-right" data-id="" data-nama="" data-toggle="modal" data-target="#Rejected"><i class="fas fa-times fa-fw"></i></button>
												</div>
											</td>
										</tr>
										<tr>
											<td>bagindahokage@gmail.com</td>
											<td>Kendala Edit Profile</td>
											<td>Foto tidak bisa dirubah</td>
											<td>
												<!-- Bagian ini : Gambar SS -->
											</td>
											<td>2021/4/28 11:37:16 AM</td>
											<td>
												<div class="btn-group" role="group" aria-label="inoutcom">
													<button type="button" class="btn btn-success btn-sm btn-acc-item px-2 rounded-left" data-id="" data-nama="" data-stok="" data-jenis="" data-penyimpanan="" data-toggle="modal" data-target="#Accept"><i class="fas fa-check fa-fw"></i></button>
													<button type="button" class="btn btn-danger btn-sm btn-rjc-item px-2 rounded-right" data-id="" data-nama="" data-toggle="modal" data-target="#Rejected"><i class="fas fa-times fa-fw"></i></button>
												</div>
											</td>
										</tr>
										<tr>
											<td>nagissa@gmail.com</td>
											<td>Kendala Menu Pengumuman</td>
											<td>Gambar tidak tampil</td>
											<td>
												<!-- Bagian ini : Gambar SS -->
											</td>
											<td>2021/4/28 11:37:16 AM</td>
											<td>
												<div class="btn-group" role="group" aria-label="inoutcom">
													<button type="button" class="btn btn-success btn-sm btn-acc-item px-2 rounded-left" data-id="" data-nama="" data-stok="" data-jenis="" data-penyimpanan="" data-toggle="modal" data-target="#Accept"><i class="fas fa-check fa-fw"></i></button>
													<button type="button" class="btn btn-danger btn-sm btn-rjc-item px-2 rounded-right" data-id="" data-nama="" data-toggle="modal" data-target="#Rejected"><i class="fas fa-times fa-fw"></i></button>
												</div>
											</td>
										</tr>
										<tr>
											<td>suparmanbentor@gmail.com</td>
											<td>Kendala Menu Pengumuman</td>
											<td>Gambar tidak tampil</td>
											<td>
												<!-- Bagian ini : Gambar SS -->
											</td>
											<td>2021/4/28 11:37:16 AM</td>
											<td>
												<div class="btn-group" role="group" aria-label="inoutcom">
													<button type="button" class="btn btn-success btn-sm btn-acc-item px-2 rounded-left" data-id="" data-nama="" data-stok="" data-jenis="" data-penyimpanan="" data-toggle="modal" data-target="#Accept"><i class="fas fa-check fa-fw"></i></button>
													<button type="button" class="btn btn-danger btn-sm btn-rjc-item px-2 rounded-right" data-id="" data-nama="" data-toggle="modal" data-target="#Rejected"><i class="fas fa-times fa-fw"></i></button>
												</div>
											</td>
										</tr>
										<tr>
											<td>indahbersamamu@gmail.com</td>
											<td>Kendala Edit Profile</td>
											<td>Foto tidak bisa dirubah</td>
											<td>
												<!-- Bagian ini : Gambar SS -->
											</td>
											<td>2021/4/28 11:37:16 AM</td>
											<td>
												<div class="btn-group" role="group" aria-label="inoutcom">
													<button type="button" class="btn btn-success btn-sm btn-acc-item px-2 rounded-left" data-id="" data-nama="" data-stok="" data-jenis="" data-penyimpanan="" data-toggle="modal" data-target="#Accept"><i class="fas fa-check fa-fw"></i></button>
													<button type="button" class="btn btn-danger btn-sm btn-rjc-item px-2 rounded-right" data-id="" data-nama="" data-toggle="modal" data-target="#Rejected"><i class="fas fa-times fa-fw"></i></button>
												</div>
											</td>
										</tr>
										<tr>
											<td>muraiki@gmail.com</td>
											<td>Kendala Edit Profile</td>
											<td>Foto tidak bisa dirubah</td>
											<td>
												<!-- Bagian ini : Gambar SS -->
											</td>
											<td>2021/4/28 11:37:16 AM</td>
											<td>
												<div class="btn-group" role="group" aria-label="inoutcom">
													<button type="button" class="btn btn-success btn-sm btn-acc-item px-2 rounded-left" data-id="" data-nama="" data-stok="" data-jenis="" data-penyimpanan="" data-toggle="modal" data-target="#Accept"><i class="fas fa-check fa-fw"></i></button>
													<button type="button" class="btn btn-danger btn-sm btn-rjc-item px-2 rounded-right" data-id="" data-nama="" data-toggle="modal" data-target="#Rejected"><i class="fas fa-times fa-fw"></i></button>
												</div>
											</td>
										</tr>
										<tr>
											<td>melinda@gmail.com</td>
											<td>Kendala Menu Pengumuman</td>
											<td>Gambar tidak tampil</td>
											<td>
												<!-- Bagian ini : Gambar SS -->
											</td>
											<td>2021/4/28 11:37:16 AM</td>
											<td>
												<div class="btn-group" role="group" aria-label="inoutcom">
													<button type="button" class="btn btn-success btn-sm btn-acc-item px-2 rounded-left" data-id="" data-nama="" data-stok="" data-jenis="" data-penyimpanan="" data-toggle="modal" data-target="#Accept"><i class="fas fa-check fa-fw"></i></button>
													<button type="button" class="btn btn-danger btn-sm btn-rjc-item px-2 rounded-right" data-id="" data-nama="" data-toggle="modal" data-target="#Rejected"><i class="fas fa-times fa-fw"></i></button>
												</div>
											</td>
										</tr>
										<tr>
											<td>lunayaluna@gmail.com</td>
											<td>Kendala Menu Pengumuman</td>
											<td>Gambar tidak tampil</td>
											<td>
												<!-- Bagian ini : Gambar SS -->
											</td>
											<td>2021/4/28 11:37:16 AM</td>
											<td>
												<div class="btn-group" role="group" aria-label="inoutcom">
													<button type="button" class="btn btn-success btn-sm btn-acc-item px-2 rounded-left" data-id="" data-nama="" data-stok="" data-jenis="" data-penyimpanan="" data-toggle="modal" data-target="#Accept"><i class="fas fa-check fa-fw"></i></button>
													<button type="button" class="btn btn-danger btn-sm btn-rjc-item px-2 rounded-right" data-id="" data-nama="" data-toggle="modal" data-target="#Rejected"><i class="fas fa-times fa-fw"></i></button>
												</div>
											</td>
										</tr>
										<tr>
											<td>warbyasahh@gmail.com</td>
											<td>Kendala Edit Profile</td>
											<td>Foto tidak bisa dirubah</td>
											<td>
												<!-- Bagian ini : Gambar SS -->
											</td>
											<td>2021/4/28 11:37:16 AM</td>
											<td>
												<div class="btn-group" role="group" aria-label="inoutcom">
													<button type="button" class="btn btn-success btn-sm btn-acc-item px-2 rounded-left" data-id="" data-nama="" data-stok="" data-jenis="" data-penyimpanan="" data-toggle="modal" data-target="#Accept"><i class="fas fa-check fa-fw"></i></button>
													<button type="button" class="btn btn-danger btn-sm btn-rjc-item px-2 rounded-right" data-id="" data-nama="" data-toggle="modal" data-target="#Rejected"><i class="fas fa-times fa-fw"></i></button>
												</div>
											</td>
										</tr>
										<tr>
											<td>miraihikari@gmail.com</td>
											<td>Kendala Edit Profile</td>
											<td>Foto tidak bisa dirubah</td>
											<td>
												<!-- Bagian ini : Gambar SS -->
											</td>
											<td>2021/4/28 11:37:16 AM</td>
											<td>
												<div class="btn-group" role="group" aria-label="inoutcom">
													<button type="button" class="btn btn-success btn-sm btn-acc-item px-2 rounded-left" data-id="" data-nama="" data-stok="" data-jenis="" data-penyimpanan="" data-toggle="modal" data-target="#Accept"><i class="fas fa-check fa-fw"></i></button>
													<button type="button" class="btn btn-danger btn-sm btn-rjc-item px-2 rounded-right" data-id="" data-nama="" data-toggle="modal" data-target="#Rejected"><i class="fas fa-times fa-fw"></i></button>
												</div>
											</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
		</section>
	</div><br>
</main>

<!-- Accept Modal -->
<div class="modal fade" id="Accept" tabindex="-1" aria-labelledby="AcceptLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header bg-light">
				<h5 class="modal-title" id="AcceptLabel">Komplain Disetujui</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="<?= base_url('Admin/Complain'); ?>" method="POST" enctype="multipart/form-data">
					<div class="form-group">
						<label for="acc_komentar">Komentar</label>
						<input type="text" class="form-control" id="acc_komentar" placeholder="Tuliskan Komentar Anda" name="k_accept">
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-fw fa-window-close"></i> Batal</button>
						<button type="submit" class="btn btn-primary"><i class="fas fa-check-square fa-fw"></i> Setuju & Selesai</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<!-- Rejected Modal -->
<div class="modal fade" id="Rejected" tabindex="-1" aria-labelledby="RejectedLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header bg-light">
				<h5 class="modal-title" id="RejectedLabel">Komplain Ditolak</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="<?= base_url('Admin/Complain'); ?>" method="POST" enctype="multipart/form-data">
					<div class="form-group">
						<label for="rjc_komentar">Komentar</label>
						<input type="text" class="form-control" id="rjc_komentar" placeholder="Tuliskan Komentar Anda" name="k_rejected">
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-fw fa-window-close"></i> Batal</button>
						<button type="submit" class="btn btn-primary"><i class="fas fa-check-square fa-fw"></i> Setuju & Selesai</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<?= $this->endSection() ?>
