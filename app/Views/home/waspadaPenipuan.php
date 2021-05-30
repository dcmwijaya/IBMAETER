<?= $this->extend('home/landingTemplate') ?>

<?= $this->section('homecontent') ?>
<!--Div layout-->
<div class="waspada-landing">
	<!--Div container-->
	<div class="container waspada-content">

		<!-- Atrikel -->
		<section class="article">
			<div class="row">
				<div class="col-12">
					<div class="custom-header header-wrapper text-center">
						<h3>WASPADA PENIPUAN</h3>
					</div>
					<hr class="solid"><br>
				</div>
			</div>
			<div class="waspadapenipuan">
				<div class="row">
					<div class="card-body col-md-3 waspadapenipuan-wrap">
						<ul class="list-group" id="nav-waspada">
							<li><a href="<?= base_url("home/WaspadaPenipuan#indikasi"); ?>" class="list-group-item" style="text-decoration:none;">Indikasi Penipuan</a></li>
							<li><a href="<?= base_url("home/WaspadaPenipuan#solusi"); ?>" class="list-group-item" style="text-decoration:none;">Solusi Permasalahan</a></li>
						</ul>

						<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
						<script type="text/javascript">
							$(document).ready(function() {
								$('ul li a').click(function() {
									$('li a').removeClass("active");
									$(this).addClass("active");
								});
							});
						</script>
					</div>
					<div class="card-body col-md-9 waspadapenipuan-wrap">
						<section id="indikasi">
							<h3><i class="fab fa-confluence fa-fw me-2"></i>Indikasi Penipuan</h3>
							<hr>
							<p>IBMAETER menerima setiap telepon dan email dari masyarakat umum yang meminta penjelasan tentang penawaran (kerjasama) bisnis, tawaran kerja, undian berhadiah dan pemberian uang.
							<ul style="text-align:justify;">
								<li>
									<strong>1. Penawaran (Kerjasama)</strong><br>
									Penipuan penawaran kerjasama bisnis biasanya dibuat secara pura-pura atas nama IBMAETER dalam berbagai bentuk, tapi biasanya meminta sejumlah uang untuk ditransfer dalam jumlah yang besar
									baik dalam mata uang local (Rupiah) ataupun mata uang asing. Terkadang juga ditawarkan bonus yang besar atas suatu Perjanjian bagi yang menerima e-mail tersebut.
								</li><br>
								<li>
									<strong>2. Rekrutmen Pegawai</strong><br>
									Penawaran pekerjaan yang berasal dari organisasi atau kelompok yang tidak benar yang berpura-pura mengatasnamakan bagian dari IBMAETER atau orang yang mengaku
									bekerja atau memiliki hubungan dengan IBMAETER. Penawaran yang disampaikan menyatakan bahwa orang tersebut memenuhi kualifikasi sebagai pekerja (baik local
									maupun ekspatriat) di IBMAETER dan meminta untuk mentransfer sejumlah uang sebagai ijin kerja, polis asuransi, dll. Mohon untuk diketahui bahwa IBMAETER (baik
									secara organisasi yang melakukan rekrutmen atas nama IBMAETER) tidak pernah meminta uang atau pembayaran dari pelamar dalam setiap tahapan rekrutmen. Setiap orang yang
									berhasil mendapatkan penawaran dari IBMAETER, baik secara langsung atau pun tidak langsung, akan diminta untuk mengikuti proses rekrutmen formal. Seluruh
									komunikasi harus berasal dari e-mail resmi IBMAETER dan bukan dari e-mail dari internet seperti hotmail, yahoo, dll.
								</li><br>
								<li>
									<strong>3. Hadiah dan Pemberian</strong><br>
									Pemberian hadiah dan uang sering diterima melalui pesan singkat dan/atau e-mail yang mengaku dari IBMAETER, Indonesia, yang menyatakan bahwa penerima pesan tersebut telah
									memenangkan promo undian berhadiah dan program sejenis yang dikeluarkan IBMAETER, dan meminta kepada yang bersangkutan untuk mengirimkan uang agar mendapatkan
									hadiah tersebut. Mohon diketahui bahwa IBMAETER tidak terlibat dalam undian atau pemberian hibah melalui e-mail/sms.
								</li>
							</ul>
							</p>
						</section><br>

						<section id="solusi">
							<h3><i class="fas fa-check-double fa-fw me-2"></i>Solusi Permasalahan</h3>
							<hr>
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
									3. Mohon untuk waspada terhadap informasi dari alamat yang bukan milik IBMAETER (seperti contoh email dari yahoo.com) baik dalam bahasa Indonesia dan
									Bahasa Inggris meminta sejumlah uang.
								</li>
							</ul>
							</p>
						</section>
					</div>
				</div>
			</div><br><br>
		</section>
		<!-- END of Artikel -->

	</div>
	<!--Div container-->
</div>
<!--Div layout-->
<?= $this->endSection() ?>