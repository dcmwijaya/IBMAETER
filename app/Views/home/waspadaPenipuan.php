<?= $this->extend('home/landingTemplate') ?>

<?= $this->section('homecontent') ?>
<!--Main layout-->
<main class="pt-5">
	<!--Main container-->
	<div class="container">

		<!-- Atrikel -->
		<section class="article">
			<div class="row">
				<div class="col-12">
					<div class="custom-header header-wrapper text-center">
						<h3>WASPADA PENIPUAN</h3>
					</div>
					<hr class="solid"><br>
				</div>
			</div><br><br>
			<div class="kebijakan card mb-3 bg-light">
				<div class="row no-gutters">
					<div class="col-md-3">
						<ul class="list-group">
							<li class="list-group-item"><a href="<?= base_url("home/WaspadaPenipuan#indikasi"); ?>" style="text-decoration:none;">Indikasi Penipuan</a></li>
							<li class="list-group-item"><a href="<?= base_url("home/WaspadaPenipuan#solusi"); ?>" style="text-decoration:none;">Solusi Permasalahan</a></li>
						</ul>
					</div>
					<div class="col-md-9">
						<div class="card-body event-description">
							<section id="indikasi">
								<h3>Indikasi Penipuan</h3>
								<p>INVENBAR menerima setiap telepon dan email dari masyarakat umum yang meminta penjelasan tentang penawaran (kerjasama) bisnis, tawaran kerja, undian berhadiah dan pemberian uang.
								<ul style="text-align:justify;">
									<li>
										<strong>1. Penawaran (Kerjasama)</strong><br>
										Bisnis Penipuan bisnis biasanya dibuat secara pura-pura atas nama INVENBAR dalam berbagai bentuk, tapi biasanya meminta sejumlah uang untuk ditransfer dalam jumlah yang besar
										baik dalam mata uang local (Rupiah) ataupun mata uang asing. Terkadang juga ditawarkan bonus yang besar atas suatu Perjanjian bagi yang menerima e-mail tersebut.
									</li><br>
									<li>
										<strong>2. Rekrutmen Pegawai</strong><br>
										Penawaran Pekerjaan yang berasal dari organisasi atau kelompok yang tidak benar yang berpura-pura mengatasnamakan bagian dari INVENBAR atau orang yang mengaku
										bekerja atau memiliki hubungan dengan INVENBAR. Penawaran yang disampaikan menyatakan bahwa orang tersebut memenuhi kualifikasi sebagai pekerja (baik local
										maupun ekspatriat) di INVENBAR dan meminta untuk mentransfer sejumlah uang sebagai ijin kerja, polis asuransi, dll. Mohon untuk diketahui bahwa INVENBAR (baik
										secara organisasi yang melakukan rekrutmen atas nama INVENBAR) tidak pernah meminta uang atau pembayaran dari pelamar dalam setiap tahapan rekrutmen. Setiap orang yang
										berhasil mendapatkan penawaran dari INVENBAR, baik secara langsung atau pun tidak langsung, akan diminta untuk mengikuti proses rekrutmen formal. Seluruh
										komunikasi harus berasal dari e-mail resmi INVENBAR dan bukan dari e-mail dari internet seperti hotmail, yahoo, dll.
									</li><br>
									<li>
										<strong>3. Hadiah dan Pemberian</strong><br>
										Pemberian hadiah dan uang sering diterima melalui pesan singkat dan/atau e-mail yang mengaku dari INVENBAR, Indonesia, yang menyatakan bahwa penerima pesan tersebut telah
										memenangkan promo undian berhadiah dan program sejenis yang dikeluarkan INVENBAR, dan meminta kepada yang bersangkutan untuk mengirimkan uang agar mendapatkan
										hadiah tersebut. Mohon diketahui bahwa INVENBAR tidak terlibat dalam undian atau pemberian hibah melalui e-mail/sms.
									</li>
								</ul>
								</p>
							</section><br>
							<hr>
							<section id="solusi">
								<h3>Solusi Permasalahan</h3>
								<p>Apabila mengalami hal tersebut, anda harus:<br>
								<ul style="text-align:justify;">
									<li>
										1. Tidak memberikan respon kepada janji-janji penawaran bisnis yang tidak benar dan/atau penawaran kerja yang berasal dari orang atau alamat e-mail yang anda tidak ketahui
										atau tidak dipercaya.
									</li><br>
									<li>
										2. Jangan mengungkapkan data pribadi anda atau data barang anda kepada siapapun yang tidak anda kenal dan percaya. Apabila anda mengungkapkan informasi tersebut kepada
										orang atau mengunggah melalui website yang tidak anda percayai mohon untuk melaporkan kepada aparat penegak hukum.
									</li><br>
									<li>
										3. Mohon untuk waspada terhadap informasi dari alamat yang bukan milik INVENBAR (seperti contoh email dari yahoo.com) baik dalam bahasa Indonesia dan
										Bahasa Inggris meminta sejumlah uang.
									</li>
								</ul>
								</p>
							</section>
						</div>
					</div>
				</div>
			</div><br><br>
		</section>
		<!-- END of Artikel -->

	</div>
	<!--Main container-->
</main>
<!--Main layout-->
<?= $this->endSection() ?>
