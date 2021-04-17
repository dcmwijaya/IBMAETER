<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<link rel="stylesheet" href="<?= base_url('../css/dragdrop.css') ?>" />

<!--Main layout-->
<main class="bg-dark">
	<div class="container pt-4">
		<section class="mb-4">
			<div class="card">
				<div class="card-header text-center py-3">
					<h5 class="mb-0 text-center">
						<strong>EDIT PENGUMUMAN</strong>
					</h5>
				</div>
				<div class="card-body">
					<div class="container mb-3 pb-2" style="border-bottom: 1px solid #dfdfdf;">
						<div class="row">
							<div class="col-sm-8" id="info-maker">
								<?php foreach ($info as $i) : ?>
									<form action="<?= base_url('/Admin/editpengumuman'); ?>" method="POST" enctype="multipart/form-data">
										<div class="form-group">
											<label for="edit_judul_info"><b>Judul Pengumuman</b></label>
											<input type="text" class="form-control" id="edit_judul_info" name="judul" placeholder="Tuliskan judul pengumuman..." value="<?= $i['judul']; ?>">
										</div>
										<div class="form-group">
											<label for="edit_isi_info"><b>Isi Pengumuman</b></label>
											<textarea class="col-sm-12 p-2" id="edit_isi_info" rows="6" name="isi" placeholder="Sampaikan isi pengumuman..."><?= $i['isi']; ?></textarea>
											<small class="text-muted"><span style="color: red;">*</span> Maksimal 256 huruf</small>
										</div>
										<div class="drop-zone">
											<span class="drop-zone__prompt">Drop file here or click to upload</span>
											<input type="file" name="myFile" class="drop-zone__input" />
										</div>

										<script src="<?= base_url('../js/dragdrop.js'); ?>"></script>

										<div class="my-4">
											<input type="hidden" class="form-control" value="<?= $i['id']; ?>" name="id_info">
											<button type="submit" class="btn btn-success btn-block"><i class="fas fa-fw fa-check"></i> Terapkan</button>
										</div>
									</form>
								<?php endforeach; ?>
							</div>
							<div class="col-sm-1"></div>
							<div class="col-sm-3">
								<hr>
								<div class="mt-3">
									<button type="button" class="btn btn-danger btn-block info-clear p-2"><i class="fas fa-fw fa-trash"></i> Kosongkan</button>
									<!-- <button type="button" class="btn btn-warning btn-block p-2 mt-3"><i class="fas fa-fw fa-print"></i> Cetak Pengumuman</button> -->
								</div>
							</div>
						</div>
					</div>
				</div>
			</div><br>
		</section>

	</div>
</main>

<?= $this->endSection() ?>
