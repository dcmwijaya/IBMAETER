<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<link rel="stylesheet" href="<?= base_url('css/menukhusus.css') ?>">
<link rel="stylesheet" href="<?= base_url('css/dragdrop.css') ?>" />

<!--Main layout-->
<main class="bg-dark">
	<div class="container pt-4">
		<section class="mb-4">
			<div class="card">
				<div class="card-header text-center py-3">
					<h5 class="mb-0 text-center">
						<strong>PENGADUAN</strong>
					</h5>
				</div>
				<div class="card-body pt-1">
					<div class="container mb-3 pb-2" style="border-bottom: 1px solid #dfdfdf;">
						<div class="row">
							<div class="info-card card mb-3 bg-light">
								<div class="row no-gutters">
									<div class="col-md-5" id="img-pengaduan">
										<img src="<?= base_url("img/Pengaduan.jpg"); ?>" class="card-img" alt="img-1">
									</div>
									<div class="col-md-6" id="pengaduan-user">
										<div class=" card-body event-description">
											<form action=" <?= base_url('/Menu/Pengaduan'); ?>" method="POST" enctype="multipart/form-data">
												<input type="hidden" name="fotoLama" value="">
												<div class="form-group">
													<label for="judul_komplain"><b>Judul Komplain</b></label>
													<input type="text" class="form-control col-sm-12 p-2" id="judul_komplain" name="judulKomplain" placeholder="Tuliskan judul komplain..." value="">
												</div>
												<div class="form-group">
													<label for="isi_komplain"><b>Isi Komplain</b></label>
													<small class="text-muted"><span style="color: red;">*</span> Maksimal 256 huruf</small>
													<textarea class="col-sm-12 p-2" id="isi_komplain" rows="6" name="isi" placeholder="Sampaikan isi komplain..."></textarea>
												</div>
												<div class="form-group">
													<label for="edit_gambar_info"><b>Bukti Screenshoot</b></label>
													<small class="text-muted"><span style="color: red;">*</span> Gambar (.jpg/.jpeg/.png) maks 10Mb</small>
													<div class="drop-zone col-sm-12">
														<span class="drop-zone__prompt">Drop file here or click to upload</span>
														<input type="file" name="foto" class="drop-zone__input" />
													</div>
												</div>
												<script src="<?= base_url('../js/dragdrop.js'); ?>"></script>
												<div class="my-4">
													<input type="hidden" class="form-control" value="" name="id_pengaduan">
													<button type="submit" class="btn btn-success btn-komplain col-sm-12"><i class="fas fa-fw fa-check"></i> Kirim Komplain</button>
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div><br>
</main>

<?= $this->endSection() ?>
