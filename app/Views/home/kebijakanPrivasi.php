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
						<h3>KEBIJAKAN PRIVASI</h3>
					</div>
					<hr class="solid"><br>
				</div>
			</div><br><br>
			<div class="kebijakan card mb-3 bg-light">
				<div class="row no-gutters">
					<div class="col-md-3">
						<ul class="list-group">
							<li class="list-group-item"><a href="<?= base_url("home/KebijakanPrivasi#umum"); ?>" style="text-decoration:none;">Umum</a></li>
							<li class="list-group-item"><a href="<?= base_url("home/KebijakanPrivasi#privasi"); ?>" style="text-decoration:none;">Privasi Pengguna</a></li>
							<li class="list-group-item"><a href="<?= base_url("home/KebijakanPrivasi#keamanan"); ?>" style="text-decoration:none;">Keamanan</a></li>
							<li class="list-group-item"><a href="<?= base_url("home/KebijakanPrivasi#anak2"); ?>" style="text-decoration:none;">Privasi Anak-Anak</a></li>
							<li class="list-group-item"><a href="<?= base_url("home/KebijakanPrivasi#perubahankebijakan"); ?>" style="text-decoration:none;">Perubahan Pada Kebijakan Privasi</a></li>
						</ul>
					</div>
					<div class="col-md-9">
						<div class="card-body event-description">
							<section id="umum">
								<h3>Umum</h3>
								<p>INVENBAR membangun website sebagai sarana kelola inventaris barang gratis. LAYANAN ini disediakan oleh INVENBAR tanpa biaya dan dimaksudkan untuk
									digunakan sebagaimana adanya. Halaman ini digunakan untuk menginformasikan pengunjung mengenai kebijakan kami dengan pengumpulan, penggunaan, dan
									pengungkapan Informasi Pribadi jika ada yang memutuskan untuk menggunakan Layanan kami. Jika Anda memilih untuk menggunakan Layanan kami,
									maka Anda menyetujui pengumpulan dan penggunaan informasi yang terkait dengan kebijakan ini. Informasi Pribadi yang kami kumpulkan digunakan
									untuk menyediakan dan meningkatkan Layanan. Kami tidak akan menggunakan atau membagikan informasi Anda dengan siapa pun kecuali seperti yang
									dijelaskan dalam Kebijakan Privasi ini. Istilah-istilah yang digunakan dalam Kebijakan Privasi ini memiliki arti yang sama seperti dalam
									Syarat dan Ketentuan kami, yang dapat diakses di aplikasi kecuali ditentukan lain dalam Kebijakan Privasi ini.
								</p>
							</section><br>
							<hr>
							<section id="privasi">
								<h3>Privasi Pengguna</h3>
								<p>Setiap data pribadi yang telah dikumpulkan di situs ini diperuntukkan kepada INVENBAR.

									INVENBAR hanya akan memberikan data pribadi anda dengan perusahaan lain atau pihak lain di luar organisasi (INVENBAR) hanya dalam hal sebagai berikut:
								<ul style="text-align:justify;">
									<li>
										1. Kami memiliki ijin dari anda. Kami meminta pilihan ijin dari anda untuk memberikan dan menyebarkan beberapa data pribadi yang khusus.
									</li>
									<li>
										2. Kami akan memberikan informasi tersebut kepada anak perusahaan, afiliasi atau rekan usaha atau orang untuk maksud penggunaan data
										tersebut atas nama INVENBAR. Kami memerlukan persetujuan anda untuk memproses data pribadi berdasarkan instruksi kami
										dan akan disesuaikan dengan kebijakan personal ini dan kerahasiaan lainnya yang sesuai dan syarat keamanan yang ada.
									</li>
									<li>
										3. Kami memiliki itikad baik untuk mengakses, menggunakan, memelihara atau mengungkapkan beberapa data pribadi yang layak untuk keperluan
										(a) memenuhi hukum, peraturan, proses hukum atau permintaan dari lembaga pemerintah/instansi yang berwenang, (b) ketentuan di bidang jasa
										yang berlaku termasuk untuk investigasi pelanggaran (c) mendeteksi, mencegah atau mengatasi penipuan (d) melindungi dari kejahatan yang
										dapat merugikan hak, asset, atau keamanan INVENBAR, pengguna yang ada ataupun masyarakat umum yang diperbolehkan menurut hukum.
										Jika INVENBAR dan/atau anak perusahaan, afiliasinya dan rekan usahanya atau orang yang tergabung dalam merger, akuisisi atau bentuk lain
										dari penjualan beberapa atau asetnya, kami memastikan bahwa kerahasiaan dari data pribadi yang termasuk ke dalam transaksinya dan
										sebelumnya dinyatakan sebelum data.
									</li>
								</ul>
								</p>
							</section><br>
							<hr>
							<section id="keamanan">
								<h3>Keamanan</h3>
								<p>Kami menghargai kepercayaan Anda dalam memberikan kami Informasi Pribadi Anda, sehingga kami berusaha menggunakan sarana yang dapat diterima secara
									komersial untuk melindunginya. Tetapi ingat bahwa tidak ada metode transmisi melalui internet, atau metode penyimpanan elektronik 100% aman dan
									andal, dan kami tidak dapat menjamin keamanan mutlaknya.
								</p>
							</section><br>
							<hr>
							<section id="anak2">
								<h3>Privasi Anak-Anak</h3>
								<p>Layanan ini tidak ditujukan kepada siapa pun yang berusia di bawah 13 tahun. Kami tidak secara sadar mengumpulkan informasi identitas pribadi dari
									anak-anak berusia di bawah 13 tahun. Dalam kasus ini kami menemukan bahwa seorang anak di bawah 13 tahun telah memberi kami informasi pribadi,
									kami segera menghapus ini dari server kami. Jika Anda adalah orang tua atau wali dan Anda sadar bahwa anak Anda telah memberi kami informasi
									pribadi, silakan hubungi kami sehingga kami akan dapat melakukan tindakan yang diperlukan.
							</section><br>
							<hr>
							<section id="perubahankebijakan">
								<h3>Perubahan pada Kebijakan Privasi ini</h3>
								<p>Kami dapat memperbarui Kebijakan Privasi kami dari waktu ke waktu. Dengan demikian, Anda disarankan untuk meninjau halaman ini secara berkala untuk
									setiap perubahan. Kami akan memberi tahu Anda tentang perubahan apa pun dengan memposting Kebijakan Privasi baru di halaman ini. Perubahan ini
									efektif segera setelah diposkan di halaman ini.
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
