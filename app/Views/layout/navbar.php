<!-- SUPER BODY -->
<div id="content" style="padding: 0;">
	<!-- Navbar -->
	<nav id="head-navbar" class="navbar bg-light navbar-expand-lg">
		<div class="container-fluid">
			<!-- Toggler untuk Sidebar -->
			<button type="button" id="sidebarCollapse" class="btn btn-info px-3" style="box-shadow: 0px 2px 3px #c9c9c9;">
				<i class="fas fa-align-left"></i>
				<span></span>
			</button>
			<!-- Right links -->
			<ul class="navbar-nav ms-auto d-flex flex-row">
				<!-- Nav Item - Messages -->
				<li class="nav-item notif-pengumuman dropdown no-arrow d-flex align-items-center mx-3">
					<a class="nav-link" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<div class="position-relative">
							<i class="fas fa-bell fa-fw" style="font-size: 20px;">
								<!-- Counter - Messages -->
								<span class="custom-indicator badge-danger badge-counter"><?= $infoCV; ?></span>
							</i>
						</div>
					</a>
					<!-- Dropdown - Messages -->
					<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right py-0" aria-labelledby="alertsDropdown">
						<div class="dropdown-menu-header">
							<i class="fas fa-bell fa-fw"></i> <?= $infoCV; ?> Notifikasi Baru
						</div>
						<!-- VISIBILITY -->
						<div class="list-group">
							<!-- Info Pengumuman Cluster -->
							<?php foreach ($infoV as $p) : ?>
								<a href="<?= base_url('Menu/Pengumuman/' . $p['id_pengumuman']); ?>" class="list-group-item border m-0">
									<div class="row mx-auto align-items-center">
										<div class="col-2">
											<i class="fas fa-fw fa-users"></i>
										</div>
										<div class="col-10">
											<div class="text-dark">
												<span><?= $p['judul']; ?></span>
											</div>
											<div class="text-muted small mt-1">
												<span><?= $p['isi']; ?></span>
											</div>
											<div class="text-muted small mt-1">
												<small><?= $p['waktu']; ?></small>
											</div>
										</div>
									</div>
								</a>
							<?php endforeach; ?>
							<!-- Info Alur Barang Cluster -->
							<!-- Info Komplain Cluster -->
						</div>
						<div class="dropdown-menu-footer">
							<a href="<?= base_url('Menu/Pengumuman'); ?>" class="text-muted">Lihat Semua Pengumuman</a>
						</div>
					</div>
				</li>

				<!-- Avatar -->
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle hidden-arrow d-flex align-items-center" href="#" id="navbarDropdownMenuLink" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
						<img class="r-circle" src="<?= base_url("/img/user") . "/" . session('picture'); ?>" class="rounded-circle" height="30" alt="" loading="lazy" />
					</a>
					<ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
						<li><a class="dropdown-item" href="<?= base_url('Menu/Profakun') . "/" . session('email') ?>"><i class="far fa-user-circle fa-fw me-3"></i>My profile</a></li>
						<li><a class="dropdown-item" href="<?= base_url('Menu/Profedit') . "/" . session('uid') ?>"><i class="fas fa-users-cog fa-fw me-3"></i>Edit Profile</a></li>
						<li><a class="dropdown-item" href="<?= base_url('Menu/Logout') ?>" onclick="return confirm('Apakah Anda yakin ingin melakukan Logout?');"><i class="fas fa-sign-out-alt fa-fw me-3"></i>Keluar Akun</a></li>
					</ul>
				</li>
			</ul>
		</div>
	</nav>
	<!--/End Navbar-->