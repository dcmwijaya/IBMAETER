<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<link rel="stylesheet" href="<?= base_url('../css/content.css') ?>" /> <!-- include cakra --->
<!-- style for td -->
<?php $tdStyle = "white-space: -moz-pre-wrap !important; white-space: -pre-wrap; white-space: -o-pre-wrap; white-space: pre-wrap; word-wrap: break-word; white-space: -webkit-pre-wrap; word-break: break-word; white-space: normal;" ?>

<!--Main layout-->
<main class="bg-dark">
	<div class="container pt-4">
		<?php if (session()->getFlashdata('komenKomp')) : ?>
			<div class="alert alert-success" role="alert">
				<?= session()->getFlashdata('komenKomp'); ?>
			</div>
		<?php endif ?>
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
							<div class="clearfix">
								<div class="float-left">
									<a href="<?= base_url('exlapor/pdfprintKomplain'); ?>" id="item_pdf" class="btn active btn-success btn-sm shadow-sm p-2"><i class="fas fa-print fa-fw"></i> Print Laporan</a>
								</div>
								<div class="float-right">
									<button type="button" class="btn active btn-dark dropdown-toggle btn-sm shadow-sm p-2" style="float:right;" onclick="return false;" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										<i class="fas fa-fw fa-file"></i> Export
									</button>
									<div class="dropdown-menu dm-export">
										<a class="dropdown-item dm-export-item" href="<?= base_url('exlapor/excelkomplain'); ?>" id="xls"><i class="fas fa-file-csv fa-fw me-2"></i>Excel</a>
										<a class="dropdown-item dm-export-item" href="<?= base_url('exlapor/dockomplain'); ?>" id="doc"><i class="fas fa-file-word fa-fw me-2"></i>Word</a>
										<a class="dropdown-item dm-export-item" href="<?= base_url('exlapor/pdfkomplain'); ?>" id="pdf"><i class="fas fa-file-pdf fa-fw me-2"></i>Pdf</a>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col">
								<!-- load tabel -->
								<div id="Komplain_AJAX"></div>
							</div>
						</div>
					</div>
					<button type="button" class="btn bg-softblue shadow-sm btn-sm p-2" onclick="listKomplain()"><i class="fas fa-redo-alt fa-fw"></i></button>
					<button type="button" class="btn active btn-secondary btn-sm shadow-sm p-2 rounded-right" data-toggle="modal" data-target="#Arsip">
						<i class="fas fa-check fa-fw"></i>Arsip Komplain
					</button>
				</div>
		</section>
	</div><br>
</main>

<!-- Komplain Modal -->
<div class="modal fade" id="Komplain_Modal" tabindex="-1" aria-labelledby="Komplain_Label" aria-hidden="true">
	<div class="modal-dialog modal-xl">
		<div class="modal-content">
			<div class="modal-header text-light" id="Komplain_Header">
				<h5 class="modal-title" id="Komplain_Label">Komplain Modal</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span class="text-light" aria-hidden="true">&times;</span>
				</button>
			</div>
			<form id="Komplain_Form" method="POST" enctype="multipart/form-data">

			</form>
		</div>
	</div>
</div>

<!-- Arsip Modal -->
<div class="modal fade" id="Arsip" tabindex="-1" aria-labelledby="ArsipLabel" aria-hidden="true">
	<div class="modal-dialog modal-fullscreen modal-dialog-centered modal-dialog-scrollable">
		<div class="modal-content">
			<div class="modal-header bg-light">
				<h5 class="modal-title" id="ArsipLabel">Arsip Komplain</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<table id="table_komplain" class="display nowrap " style="font-size: 14px; width:100%; overflow-x:auto;">
					<thead style="border-bottom: 1px solid #dfdfdf;">
						<tr>
							<th>Email</th>
							<th>Perihal Komplain</th>
							<th>Kendala</th>
							<th>Bukti</th>
							<th>Waktu Komplain</th>
							<th>Status</th>
							<th>Waktu Respon</th>
						</tr>
					</thead>
					<tbody>
						<!-- data arsip komplain -->
						<?php foreach ($arsipKomp as $arc) : ?>
							<tr>
								<td><?= $arc['email_arsipKomp']; ?></td>
								<td><?= $arc['judul_arsipKomp']; ?></td>
								<td style="<?= $tdStyle; ?>"><?= $arc['isi_arsipKomp']; ?></td>
								<td>
									<?php if ($arc['foto_arsipKomp'] == "-") : ?>
										<b class="center">-</b>
									<?php else : ?>
										<button type="button" class="btn btn-sm btn-img-item" data-img="<?= base_url('../img/komplain/' . $arc['foto_arsipKomp']); ?>" data-toggle="modal" data-target="#gambarBukti">
											<img src="<?= base_url('../img/komplain/' . $arc['foto_arsipKomp']); ?>" width="150" height="auto">
										</button>
									<?php endif; ?>
								</td>
								<td><?= $arc['waktu_arsipKomp']; ?></td>
								<td>
									<?php if ($arc['status_arsipKomp'] == 'accepted') : ?>
										<button type="button" class="btn btn-success btn-sm btn-acc-item px-2 rounded"><i class="fas fa-check fa-fw"></i> Diterima</button>
									<?php else : ?>
										<button type="button" class="btn btn-danger btn-sm btn-rjc-item px-2 rounded"><i class="fas fa-times fa-fw"></i> Ditolak</button>
									<?php endif; ?>
								</td>
								<td><?= $arc['commented_at']; ?></td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<!-- Gambar Modal -->
<div class="modal fade" id="gambarBukti" aria-hidden="true" aria-labelledby="gambarBuktiLabel" tabindex="-1">
	<div class="modal-dialog modal-lg modal-dialog-centered bg-transparent">
		<div class="modal-content bg-transparent">
			<div class="modal-body bg-transparent">
				<img width="750px" height="auto">
			</div>
		</div>
	</div>
</div>

<?= $this->endSection() ?>