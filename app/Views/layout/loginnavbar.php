	<!-- Image and text -->
	<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm font-weight-bold ">
		<div class="container p-0">
			<a class="navbar-brand">
				<img class="mr-3 d-inline-block align-top" src="<?= base_url('../img/icon/favicon-32x32.png') ?>" width="30" height="30" alt="Logo Brand">
				INVENBAR
			</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
				<i class="fas fa-fw fa-bars"></i>
			</button>
			<div class="collapse navbar-collapse" id="navbarText">
				<span class="navbar-text mr-auto"></span>
				<ul class="navbar-nav ">
					<li class="nav-item active">
						<a class="nav-link">Home <span class="sr-only">(current)</span></a>
					</li>
					<?php
						$mail = "https://mail.google.com/mail/";
						$emailtujuan = "fikinvenbar@upnjatim.ac.id";
						$subject = "HUBUNGI ADMIN INVENBAR";
						$enter = "%0A%0A%0A";
						$pg1 = "[Tuliskan pesan anda disini]";
						$pg2 = "Dengan ini, saya menyatakan bahwa saya menghubungi admin tanpa paksaan siapapun serta dalam keadaan sadar.";
						$pg3 = "Atas perhatian Bapak/Ibu, besar harapan saya agar permintaan saya dapat diproses sebagaimana mestinya. Sekian dari saya, terima kasih.";
						$namaAnda = "[Nama Anda]";
						$body = "Isi Pesan:%0A".$pg1."".$enter."".$pg2."%0A".$pg3."%0A%0AHormat Saya,".$enter."".$namaAnda;

						$pesan = "".$mail. "?view=cm&fs=1&tf=1&to=".$emailtujuan."&subject?&su=".$subject."&body=".$body;
					?>
					<li class="nav-item">
						<a class="nav-link reg" href="<?= $pesan; ?>" target="_blank" http-equiv="refresh" content="2">
							Kontak
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" type="button" data-toggle="modal" data-target="#TentangModal">Tentang</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	<!-- Navbar -->
