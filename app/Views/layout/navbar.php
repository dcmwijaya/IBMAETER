<!-- SUPER BODY -->
<div id="content" style="padding: 0;">
	<!-- Navbar -->
	<nav class="navbar bg-light navbar-expand-lg">
		<div class="container-fluid">
			<!-- Toggler untuk Sidebar -->
			<button type="button" id="sidebarCollapse" class="btn btn-info px-3">
				<i class="fas fa-align-left"></i>
				<span></span>
			</button>
			<!-- Right links -->
			<ul class="navbar-nav ms-auto d-flex flex-row">
				<!-- Nav Item - Messages -->
				<li class="nav-item dropdown no-arrow mx-1 d-flex align-items-center">
					<a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<i class="fas fa-envelope fa-fw"></i>
						<!-- Counter - Messages -->
						<span class="badge badge-danger badge-counter mr-4">1</span>
					</a>
					<!-- Dropdown - Messages -->
					<div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
						<h5 class="dropdown-header text-center pt-3 pb-0">
							<strong>Pengumuman</strong>
						</h5>
						<hr>
						<?php foreach ($info as $i) : ?>
							<a class="dropdown-item d-flex align-items-center" href="#">
								<div class="container">
									<div class="row">
										<div class="col-12 dropdown-list-image text-center">
											<img class="rounded-lg" style="max-width: 450px; max-height: 200px;" src="<?= base_url('../img/' . $i['foto']); ?>" alt="">
											<div class="status-indicator bg-success"></div>
										</div>
									</div>
									<div class="row">
										<div class="col-12 mt-3">
											<div class="title py-2"><strong><?= $i['judul']; ?></strong></div>
											<div class="text-truncate p-3 border">
												<pre class="card-text" style="white-space: pre-wrap; word-wrap: break-word; font-family: inherit;"><?= $i['isi']; ?></pre>
											</div>
											<hr>
											<div class="small text-gray-500 text-center pt-0 pb-3"><strong>- @Admin -</strong></div>
										</div>
									</div>
								</div>
							</a>
						<?php endforeach; ?>
						<!-- <a class=" dropdown-item text-center small text-gray-500" href="#">Read More Messages
							</a> -->
					</div>
				</li>

				<!-- Avatar -->
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle hidden-arrow d-flex align-items-center" href="#" id="navbarDropdownMenuLink" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
						<img src="<?= base_url("/img/user") . "/" . session('picture'); ?>" class="rounded-circle" height="30" alt="" loading="lazy" />
					</a>
					<ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
						<li><a class="dropdown-item" href="<?= base_url('menu/profakun') . "/" . session('email') ?>"><i class="far fa-user-circle fa-fw me-3"></i>My profile</a></li>
						<li><a class="dropdown-item" href="<?= base_url('menu/profedit') . "/" . session('uid') ?>"><i class="fas fa-users-cog fa-fw me-3"></i>Edit Profile</a></li>
						<li><a class="dropdown-item" href="<?= base_url('/') ?>"><i class="fas fa-sign-out-alt fa-fw me-3"></i>Keluar Akun</a></li>
					</ul>
				</li>
			</ul>
		</div>
	</nav>
	<!--/End Navbar-->