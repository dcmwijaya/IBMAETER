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
			<div class="kebijakan">
				<div class="row">
					<div class="card-body col-md-3 kebijakan-wrap">
						<ul class="list-group" id="nav-kebijakan">
							<li><a href="<?= base_url("home/KebijakanPrivasi#umum"); ?>" class="list-group-item" style="text-decoration:none;">Umum</a></li>
							<li><a href="<?= base_url("home/KebijakanPrivasi#privasi"); ?>" class="list-group-item" style="text-decoration:none;">Privasi Pengguna</a></li>
							<li><a href="<?= base_url("home/KebijakanPrivasi#keamanan"); ?>" class="list-group-item" style="text-decoration:none;">Keamanan</a></li>
							<li><a href="<?= base_url("home/KebijakanPrivasi#anak2"); ?>" class="list-group-item" style="text-decoration:none;">Privasi Anak-Anak</a></li>
							<li><a href="<?= base_url("home/KebijakanPrivasi#perubahankebijakan"); ?>" class="list-group-item" style="text-decoration:none;">Perubahan Pada Kebijakan Privasi</a></li>
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
					<div class="card-body col-md-9 kebijakan-wrap">
						<section id="umum">
							<h3><i class="fas fa-globe-europe fa-fw me-2"></i>Umum</h3>
							<hr>
							<p>IBMAETER membangun website sebagai sarana kelola inventaris barang dan manajemen pekerja pada suatu gudang. LAYANAN ini disediakan oleh IBMAETER tanpa biaya dan dimaksudkan untuk
								digunakan sebagaimana adanya. Halaman ini digunakan untuk menginformasikan pengunjung mengenai kebijakan kami dengan pengumpulan, penggunaan, dan
								pengungkapan Informasi Pribadi jika ada yang memutuskan untuk menggunakan Layanan kami. Jika Anda memilih untuk menggunakan Layanan kami,
								maka Anda menyetujui pengumpulan dan penggunaan informasi yang terkait dengan kebijakan ini. Informasi Pribadi yang kami kumpulkan digunakan
								untuk menyediakan dan meningkatkan Layanan. Kami tidak akan menggunakan atau membagikan informasi Anda dengan siapa pun kecuali seperti yang
								dijelaskan dalam Kebijakan Privasi ini. Istilah-istilah yang digunakan dalam Kebijakan Privasi ini memiliki arti yang sama seperti dalam
								Syarat dan Ketentuan kami, yang dapat diakses di aplikasi kecuali ditentukan lain dalam Kebijakan Privasi ini.
							</p>
						</section><br>
						<section id="privasi">
							<h3><i class="fas fa-users fa-fw me-2"></i>Privasi Pengguna</h3>
							<hr>
							<p>Setiap data pribadi yang telah dikumpulkan di situs ini diperuntukkan kepada IBMAETER.

								IBMAETER hanya akan memberikan data pribadi anda dengan perusahaan lain atau pihak lain di luar organisasi (IBMAETER) hanya dalam hal sebagai berikut:
							<ul style="text-align:justify;">
								<li>
									1. Kami memiliki ijin dari anda. Kami meminta pilihan ijin dari anda untuk memberikan dan menyebarkan beberapa data pribadi yang khusus.
								</li>
								<li>
									2. Kami akan memberikan informasi tersebut kepada anak perusahaan, afiliasi atau rekan usaha atau orang untuk maksud penggunaan data
									tersebut atas nama IBMAETER. Kami memerlukan persetujuan anda untuk memproses data pribadi berdasarkan instruksi kami
									dan akan disesuaikan dengan kebijakan personal ini dan kerahasiaan lainnya yang sesuai dan syarat keamanan yang ada.
								</li>
								<li>
									3. Kami memiliki itikad baik untuk mengakses, menggunakan, memelihara atau mengungkapkan beberapa data pribadi yang layak untuk keperluan
									(a) memenuhi hukum, peraturan, proses hukum atau permintaan dari lembaga pemerintah/instansi yang berwenang, (b) ketentuan di bidang jasa
									yang berlaku termasuk untuk investigasi pelanggaran (c) mendeteksi, mencegah atau mengatasi penipuan (d) melindungi dari kejahatan yang
									dapat merugikan hak, asset, atau keamanan IBMAETER, pengguna yang ada ataupun masyarakat umum yang diperbolehkan menurut hukum.
									Jika IBMAETER dan/atau anak perusahaan, afiliasinya dan rekan usahanya atau orang yang tergabung dalam merger, akuisisi atau bentuk lain
									dari penjualan beberapa atau asetnya, kami memastikan bahwa kerahasiaan dari data pribadi yang termasuk ke dalam transaksinya dan
									sebelumnya dinyatakan sebelum data.
								</li>
							</ul>
							</p>
						</section><br>
						<section id="keamanan">
							<h3><i class="fas fa-shield-alt fa-fw me-2"></i>Keamanan</h3>
							<hr>
							<p>Kami menghargai kepercayaan Anda dalam memberikan kami Informasi Pribadi Anda, sehingga kami berusaha menggunakan sarana yang dapat diterima secara
								komersial untuk melindunginya. Tetapi ingat bahwa tidak ada metode transmisi melalui internet, atau metode penyimpanan elektronik 100% aman dan
								andal, dan kami tidak dapat menjamin keamanan mutlaknya.
							</p>
						</section><br>
						<section id="anak2">
							<h3><i class="fas fa-child fa-fw me-2"></i>Privasi Anak-Anak</h3>
							<hr>
							<p>Layanan ini tidak ditujukan kepada siapa pun yang berusia di bawah 17 tahun. Kami tidak secara sadar mengumpulkan informasi identitas pribadi dari
								anak-anak berusia di bawah 17 tahun. Dalam kasus ini kami menemukan bahwa seorang anak di bawah 17 tahun telah memberi kami informasi pribadi,
								kami segera menghapus ini dari server kami. Jika Anda adalah orang tua atau wali dan Anda sadar bahwa anak Anda telah memberi kami informasi
								pribadi, silakan hubungi kami sehingga kami akan dapat melakukan tindakan yang diperlukan.
						</section><br>
						<section id="perubahankebijakan">
							<h3><i class="fas fa-paperclip fa-fw me-2"></i>Perubahan pada Kebijakan Privasi ini</h3>
							<hr>
							<p>Kami dapat memperbarui Kebijakan Privasi kami dari waktu ke waktu. Dengan demikian, Anda disarankan untuk meninjau halaman ini secara berkala untuk
								setiap perubahan. Kami akan memberi tahu Anda tentang perubahan apa pun dengan memposting Kebijakan Privasi baru di halaman ini. Perubahan ini
								efektif segera setelah diposkan di halaman ini.
						</section>
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