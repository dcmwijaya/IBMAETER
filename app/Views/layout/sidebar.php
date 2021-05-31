<!-- start wrapper pembungkus bodieh-->
<div class="wrapper">
	<div id="fading" class=""></div> <!-- bg gelap fading -->
	<nav id="sidebar" class="collapse d-lg-block sidebar collapse ">

		<!-- Image and text -->
		<nav class="navbar navbar-light bg-light justify-content-center font-weight-bold" style="padding: 9px">
			<a class="navbar-brand" href="<?= base_url('dashboard') ?>">
				<img class="mr-3 d-inline-block align-top" src="<?= base_url('../img/icon/favicon-32x32.png') ?>" width="30" height="30" alt="Logo Brand">
				IBMAETER
			</a>
		</nav>
		<!-- scroll body -->
		<div id="sidebar-body">
			<div class="card mt-4 mb-2 mx-2">
				<div class="card-body p-2">
					<div class="d-flex flex-column align-items-center text-center">
						<a href="<?= base_url('menu/profakun') . "/" . session('email') ?>">
							<img id="photoUser" class="d-inline-block align-top rounded-circle" src="<?= base_url("/img/user") . "/" . session('picture'); ?>" alt="Photo Profile">
						</a>
						<div class="mt-3">
							<h6 class="text-center text-dark font-weight-bold"><?= session('nama'); ?>
								<?php if (session('role') == 0) : ?>
									<?php if (session('divisi_user') == 1) : ?>
										<i class="fas fa-fw fa-circle ml-2" style="font-size: 10px; color:#dca400; vertical-align: middle;"></i>
									<?php elseif (session('divisi_user') == 10) : ?>
										<i class="fas fa-fw fa-circle ml-2 text-primary" style="font-size: 10px; vertical-align: middle;"></i>
									<?php else : ?>
										<i class="fas fa-fw fa-circle ml-2" style="font-size: 10px; color:yellowgreen; vertical-align: middle;"></i>
									<?php endif; ?>
								<?php else : ?>
									<i class="fas fa-fw fa-circle ml-2" style="font-size: 10px; color:yellowgreen; vertical-align: middle;"></i>
								<?php endif ?>
							</h6>
							<p class="text-dark mb-1">
								<?php if (session('role') == 0) : ?>
									<?php if (session('divisi_user') == 1) : ?>
										Super Admin | Online
									<?php elseif (session('divisi_user') == 10) : ?>
										IT Staff | Online
									<?php else : ?>
										Admin | Online
									<?php endif; ?>
								<?php else : ?>
									Pekerja | Online
								<?php endif ?>
							</p>
						</div>
					</div>
				</div>
			</div>
			<!-- Menus Sidebar -->
			<div class="sidebar-list" style="font-size: 15px;">
				<ul class="sidebar-navigation px-0">
					<div class="pilside position-sticky">
						<div class="list-group list-group-flush mx-2 mt-2">
							<!-- Cluster admin -->
							<?php if (session('role') == 0) : ?>
								<div class="menu-parent bg-light mb-2">
									<h6 class="menu-head sidebar-heading shadow-lg d-flex justify-content-between align-items-center px-3 m-0 text-muted rounded">
										<span>Menu Admin</span>
										<a class=" d-flex align-items-center text-muted disabled"><i class="fas fa-fw fa-address-card"></i></a>
									</h6>
									<hr class="my-0 font-weight-bold">
									<!-- ROLE DIVISI ADMIN -->
									<div class=" mb-1" id="admin_menu">
										<!-- dewan direksi & manager & it staff == ABSOLUTE-->
										<?php if (intval(session('role')) == 0 && intval(session('divisi_user') <= 2) || intval(session('divisi_user')) == 10) : ?>
											<a href="<?= base_url('Admin/Datauser') ?>" class="<?= ($CurrentMenu == 'data_user') ? 'active' : '' ?> list-group-item list-group-item-action py-2 border-0">
												<i class="fas fa-users fa-fw me-3"></i><span>Data Pekerja</span>
											</a>
										<?php endif; ?>
										<!-- pengadaan barang -->
										<?php if (intval(session('role')) == 0 && intval(session('divisi_user') <= 4) && intval(session('divisi_user') != 3) || intval(session('divisi_user')) == 10) : ?>
											<a href="<?= base_url('Admin/Perizinan') ?>" class="<?= ($CurrentMenu == 'perizinan') ? 'active' : '' ?> list-group-item list-group-item-action py-2 border-0">
												<div class="notifs">
													<i class="fas fa-clipboard-list fa-fw me-3"></i><span>Perizinan Barang</span>
													<span class="badge badge-danger px-1 ml-1"><?= ($log_notifs > 0) ? $log_notifs : ''; ?></span>
													<span class="sr-only">unread messages</span>
												</div>
											</a>
										<?php endif; ?>
										<!-- humas -->
										<?php if (intval(session('role')) == 0 && intval(session('divisi_user') <= 3) || intval(session('divisi_user')) == 10) : ?>
											<a href="<?= base_url('Admin/Adminpengumuman') ?>" class="<?= ($CurrentMenu == 'edit_pengumuman') ? 'active' : '' ?> list-group-item list-group-item-action py-2 border-0">
												<i class="fas fa-bullhorn fa-fw me-3"></i><span>Edit Pengumuman</span>
											</a>
											<a href="<?= base_url('Admin/LogUser') ?>" class="<?= ($CurrentMenu == 'logUser') ? 'active' : '' ?> list-group-item list-group-item-action py-2 border-0">
												<i class="fas fa-book-reader fa-fw me-3"></i><span>Aktivitas User</span>
												<span class="badge badge-danger px-1 ml-1"><?= ($absensi_notif > 0) ? $absensi_notif : ''; ?></span>
												<span class="sr-only">unread messages</span>
											</a>
											<a href="<?= base_url('Admin/Complain') ?>" class="<?= ($CurrentMenu == 'komplainUser') ? 'active' : '' ?> list-group-item list-group-item-action py-2 border-0">
												<div class="notifs">
													<i class="fas fa-gavel fa-fw me-3"></i><span>Komplain Pekerja</span>
													<span class="badge badge-danger px-1 ml-1"><?= ($komplain_notifs > 0) ? $komplain_notifs : ''; ?></span>
													<span class="sr-only">unread messages</span>
												</div>
											</a>
										<?php endif; ?>
									</div>
								</div>
							<?php endif; ?>
							<!-- cluster user -->
							<?php if (session('role') != null) : ?>
								<div class="menu-parent bg-light mb-2 ">
									<h6 class="menu-head sidebar-heading shadow-lg d-flex justify-content-between align-items-center px-3 m-0 text-muted rounded">
										<span>Menu Gudang</span>
										<a class=" d-flex align-items-center text-muted disabled"><i class="fas fa-fw fa-warehouse box"></i></a>
									</h6>
									<hr class="my-0 font-weight-bold">
									<div class="mb-1" id="user_menu">
										<a href="<?= base_url('Menu/Dashboard') ?>" class="<?= ($CurrentMenu == 'dashboard') ? 'active' : '' ?> list-group-item list-group-item-action py-2 border-0">
											<i class="fas fa-house-user fa-fw me-3"></i><span>Dashboard</span>
										</a>
										<a href="<?= base_url('Menu/kelolaBarang') ?>" class="<?= ($CurrentMenu == 'kelolabarang') ? 'active' : '' ?> list-group-item list-group-item-action py-2 border-0">
											<i class="fas fa-box fa-fw me-3"></i><span>Kelola Barang</span>
										</a>
										<a href="<?= base_url('Menu/absensiUser') ?>" class="<?= ($CurrentMenu == 'absensi') ? 'active' : '' ?> list-group-item list-group-item-action py-2 border-0">
											<i class="fas fa-clipboard fa-fw me-3"></i><span>Absensi Pekerja</span>
										</a>
										<a href="<?= base_url('Menu/Pengumuman') ?>" class="<?= ($CurrentMenu == 'pengumuman') ? 'active' : '' ?> list-group-item list-group-item-action py-2 border-0">
											<div class="notifs">
												<i class="fas fa-bell fa-fw me-3"></i><span>Pengumuman</span>
												<span class="badge badge-danger px-1 ml-1" id="SidebarPengumumanCounter"><?= ($infoCV > 0) ? $infoCV : ''; ?></span>
												<span class="sr-only">unread messages</span>
											</div>
										</a>
										<a href="<?= base_url('Menu/LaporanBulanan') ?>" class="<?= ($CurrentMenu == 'laporanBulanan') ? 'active' : '' ?> list-group-item list-group-item-action py-2 border-0">
											<i class="fas fa-print fa-fw me-3"></i><span>Laporan Bulanan</span>
										</a>
										<a href="<?= base_url('Menu/Pengaduan') ?>" class="<?= ($CurrentMenu == 'pengaduan') ? 'active' : '' ?> list-group-item list-group-item-action py-2 border-0">
											<i class="fas fa-comment-dots fa-fw me-3"></i><span>Pengaduan</span>
											<span class="badge badge-danger px-1 ml-1" id="SidebarPengaduanCounter"><?= ($PengaduanCounter > 0) ? $PengaduanCounter : ''; ?></span>
											<span class="sr-only">unread messages</span>
										</a>
									</div>
								</div>
							<?php endif; ?>
							<!-- Cluster Activity Records -->
							<?php if (session('role') != null) : ?>
								<div class="menu-parent bg-light mb-2">
									<h6 class="sidebar-heading shadow-lg d-flex justify-content-between align-items-center px-3 m-0 text-muted rounded">
										<span>Menu Profile</span>
										<a class="d-flex align-items-center text-muted disabled"><i class="fas fa-fw fa-users"></i></a>
									</h6>
									<hr class="my-0 font-weight-bold">
									<div class=" mb-1" id="admin_menu">
										<a href="<?= base_url('Menu/Profakun') . "/" . session('email') ?>" class="<?= ($CurrentMenu == 'profakun') ? 'active' : '' ?> list-group-item list-group-item-action py-2 border-0">
											<i class="far fa-user-circle fa-fw me-3"></i><span>My Profile</span>
										</a>
										<a href="<?= base_url('Menu/Profedit') . "/" . session('uid') ?>" class="<?= ($CurrentMenu == 'profedit') ? 'active' : '' ?> list-group-item list-group-item-action py-2 border-0">
											<i class="fas fa-user-cog fa-fw me-3"></i><span>Edit Profile</span>
										</a>
										<a href="<?= base_url('Menu/logout') ?>" class="list-group-item list-group-item-action py-2 border-0" onclick="return confirm('Apakah Anda yakin ingin melakukan Logout?');">
											<i class="fas fa-sign-out-alt fa-fw me-3"></i><span>Keluar Akun</span>
										</a>
									</div>
								</div>
							<?php endif; ?>
						</div>
					</div>
				</ul>
			</div>
		</div> <!-- end sidebar body scroll -->
	</nav>
	<!-- Sidebar -->