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
						<h3>PARTNERSHIP</h3>
					</div>
					<hr class="solid"><br>
				</div>
			</div><br><br>
			<div class="partnership">
				<div class="row">
					<div class="card-body col-md-3 partnership-wrap">
						<ul class="list-group" id="nav-partnership">
							<li><a href="<?= base_url("home/Partnership#indonesia"); ?>" class="list-group-item" style="text-decoration:none;">Partnership Di Indonesia</a></li>
							<li><a href="<?= base_url("home/Partnership#luarnegeri"); ?>" class="list-group-item" style="text-decoration:none;">Partnership Di Luar Negeri</a></li>
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
					<div class="card-body col-md-9 partnership-wrap">
						<section id="indonesia">
							<h3><i class="fas fa-handshake fa-fw me-2"></i>Partnership Di Indonesia</h3>
							<hr>
							<p>
								Hubungan kerjasama IBMAETER di lingkup dalam negeri meliputi pada instansi/startup berikut ini :<br>
							</p><br>
							<div class="container">
								<div class="row" style="text-align:justify;">
									<div class="col-md-6">
										<strong>1. PT 1 Indonesia Tbk</strong><br>
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Alamat : Jl. Garuda Emas V/42, Jawa Timur<br>
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Telp : <a href="#" onclick="return false;" style="text-decoration:none;">+6235-5244006</a><br>
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Fax : <a href="#" onclick="return false;" style="text-decoration:none;">+6225-52440006</a><br>
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Website : <a href="#" onclick="return false;" style="text-decoration:none;">www.pt1indonesia.com</a><br>
										<br><br>
										<strong>2. PT 2 Indonesia Tbk</strong><br>
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Alamat : Jl. Soedirman II/20, Jawa Timur<br>
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Telp : <a href="#" onclick="return false;" style="text-decoration:none;">+6231-5244226</a><br>
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Fax : <a href="#" onclick="return false;" style="text-decoration:none;">+6221-52440226</a><br>
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Website : <a href="#" onclick="return false;" style="text-decoration:none;">www.pt2indonesia.com</a><br>
										<br><br>
									</div>
									<div class="col-md-6">
										<strong>3. Startup 1 Indonesia</strong><br>
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Alamat : Jl. Ir Soekarno IV/5, Jawa Timur<br>
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Telp : <a href="#" onclick="return false;" style="text-decoration:none;">+6233-5244116</a><br>
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Fax : <a href="#" onclick="return false;" style="text-decoration:none;">+6223-52440116</a><br>
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Website : <a href="#" onclick="return false;" style="text-decoration:none;">www.startup1indonesia.com</a><br>
										<br><br>
										<strong>4. Startup 2 Indonesia</strong><br>
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Alamat : Jl. Bung Hatta I/25, Jawa Timur<br>
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Telp : <a href="#" onclick="return false;" style="text-decoration:none;">+6233-5544126</a><br>
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Fax : <a href="#" onclick="return false;" style="text-decoration:none;">+6223-55442136</a><br>
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Website : <a href="#" onclick="return false;" style="text-decoration:none;">www.startup2indonesia.com</a><br>
										<br><br>
									</div>
								</div>
							</div>
						</section><br>

						<section id="luarnegeri">
							<h3><i class="fas fa-handshake fa-fw me-2"></i>Partnership Di Luar Negeri</h3>
							<hr>
							<p>Hubungan kerjasama IBMAETER di lingkup luar negeri meliputi pada instansi/startup berikut ini :<br>
							</p><br>
							<div class="container">
								<div class="row" style="text-align:justify;">
									<div class="col-md-6">
										<strong>1. PT 1 Singapura Tbk</strong><br>
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Alamat : St. Lion V/42, Singapura<br>
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Telp : <a href="#" onclick="return false;" style="text-decoration:none;">+2235-5244026</a><br>
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Fax : <a href="#" onclick="return false;" style="text-decoration:none;">+2225-52440026</a><br>
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Website : <a href="#" onclick="return false;" style="text-decoration:none;">www.pt1singapura.com</a><br>
										<br><br>
										<strong>2. PT 2 Korea Tbk</strong><br>
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Alamat : St. Goryeo II/20, Korea Selatan<br>
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Telp : <a href="#" onclick="return false;" style="text-decoration:none;">+3321-5544021</a><br>
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Fax : <a href="#" onclick="return false;" style="text-decoration:none;">+3321-55440021</a><br>
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Website : <a href="#" onclick="return false;" style="text-decoration:none;">www.pt2koreaselatan.com</a><br>
										<br><br>
									</div>
									<div class="col-md-6">
										<strong>3. Startup 1 Amerika</strong><br>
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Alamat : St. Los Santos 5, Amerika<br>
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Telp : <a href="#" onclick="return false;" style="text-decoration:none;">+0223-8288102</a><br>
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Fax : <a href="#" onclick="return false;" style="text-decoration:none;">+0223-82880102</a><br>
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Website : <a href="#" onclick="return false;" style="text-decoration:none;">www.startup1amerika.com</a><br>
										<br><br>
										<strong>4. Startup 2 Inggris</strong><br>
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Alamat : St. Soekarno-Hatta, Inggris<br>
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Telp : <a href="#" onclick="return false;" style="text-decoration:none;">+1433-0044050</a><br>
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Fax : <a href="#" onclick="return false;" style="text-decoration:none;">+1423-00442050</a><br>
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Website : <a href="#" onclick="return false;" style="text-decoration:none;">www.startup2inggris.com</a><br>
										<br><br>
									</div>
								</div>
							</div>
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