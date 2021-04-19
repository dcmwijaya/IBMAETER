<!-- start wrapper pembungkus bodieh-->
<div class="wrapper">
	<div id="fading" class=""></div> <!-- bg gelap fading -->
	<nav id="sidebar" class="collapse d-lg-block sidebar collapse ">

		<!-- Image and text -->
		<nav class="navbar navbar-light bg-light justify-content-center font-weight-bold" style="padding: 10.5px">
			<a class="navbar-brand" href="<?= base_url('dashboard') ?>">
				<img class="mr-3 d-inline-block align-top" src="<?= base_url('../img/icon/favicon-32x32.png') ?>" width="30" height="30" alt="Logo Brand">
				INVENBAR
			</a>
		</nav>
		<!-- scroll body -->
		<div id="sidebar-body">
			<div class="card mt-4 mb-2 mx-2">
				<div class="card-body p-2">
					<div class="d-flex flex-column align-items-center text-center">
						<a href="<?= base_url('menu/profakun') . "/" . session('email') ?>">
							<img class="d-inline-block align-top rounded-circle" src="<?= base_url("/img/user") . "/" . session('picture'); ?>" width="110" style="box-shadow: 0px 3px 5px 0px #a8a8a8;" alt="Photo Profile">
						</a>
						<div class="mt-3">
							<h6 class="text-center text-dark font-weight-bold"><?= session('nama'); ?><i class="fas fa-fw fa-circle ml-2" style="font-size: 10px; color:yellowgreen; vertical-align: middle;"></i></h6>
							<p class="text-dark mb-1">??? | Online</p>
						</div>
					</div>
				</div>
			</div>
			<!-- Menus Sidebar -->
			<div class="sidebar-list" style="font-size: 15px;">
				<ul class="sidebar-navigation px-0">
					<div class="pilside position-sticky">
						<div class="list-group list-group-flush mx-2 mt-2">
							<!-- cluster admin -->
							<?php if (session('role') == 0) : ?>
								<div class="menu-parent bg-light mb-2">
									<h6 class="menu-head sidebar-heading shadow-lg d-flex justify-content-between align-items-center px-3 m-0 text-muted rounded">
										<span>Admin Menu</span>
										<a class=" d-flex align-items-center text-muted disabled"><i class="fas fa-fw fa-address-card"></i></a>
									</h6>
									<hr class="my-0 font-weight-bold">
									<div class=" mb-1" id="admin_menu">
										<a href="<?= base_url('Admin/Datauser') ?>" class="<?= ($CurrentMenu == 'data_user') ? 'active' : '' ?> list-group-item list-group-item-action py-2 ripple">
											<i class="fas fa-users fa-fw me-3"></i><span>Data Users</span>
										</a>
										<a href="<?= base_url('Admin/Adminpengumuman') ?>" class="<?= ($CurrentMenu == 'edit_pengumuman') ? 'active' : '' ?> list-group-item list-group-item-action py-2 ripple">
											<i class="fas fa-bullhorn fa-fw me-3"></i><span>Edit Pengumuman</span>
										</a>
									</div>
								</div>
							<?php endif; ?>
							<!-- cluster user -->
							<?php if (session('role') != null) : ?>
								<div class="menu-parent bg-light mb-2 ">
									<h6 class="menu-head sidebar-heading shadow-lg d-flex justify-content-between align-items-center px-3 m-0 text-muted rounded">
										<span>User Menu</span>
										<a class=" d-flex align-items-center text-muted disabled"><i class="fas fa-fw fa-box"></i></a>
									</h6>
									<hr class="my-0 font-weight-bold">
									<div class="mb-1" id="user_menu">
										<a href="<?= base_url('Menu/Dashboard') ?>" class="<?= ($CurrentMenu == 'dashboard') ? 'active' : '' ?> list-group-item list-group-item-action py-2 ripple">
											<i class="fas fa-house-user fa-fw me-3"></i><span>Dashboard</span>
										</a>
										<a href="<?= base_url('Menu/Pengumuman') ?>" class="<?= ($CurrentMenu == 'pengumuman') ? 'active' : '' ?> list-group-item list-group-item-action py-2 ripple">
											<i class="fas fa-bell fa-fw me-3"></i><span>Pengumuman</span>
										</a>
										<a href="<?= base_url('Menu/Profakun') . "/" . session('email') ?>" class="<?= ($CurrentMenu == 'profakun') ? 'active' : '' ?> list-group-item list-group-item-action py-2 ripple">
											<i class="far fa-user-circle fa-fw me-3"></i><span>My Profile</span>
										</a>
										<a href="<?= base_url('Menu/Profedit') . "/" . session('uid') ?>" class="<?= ($CurrentMenu == 'profedit') ? 'active' : '' ?> list-group-item list-group-item-action py-2 ripple">
											<i class="fas fa-users-cog fa-fw me-3"></i><span>Edit Profile</span>
										</a>
										<a href="<?= base_url('Menu/Chart') ?>" class="<?= ($CurrentMenu == 'view_chart') ? 'active' : '' ?> list-group-item list-group-item-action py-2 ripple">
											<i class="fas fa-chart-line fa-fw me-3"></i><span>View Chart</span>
										</a>
										<a href="<?= base_url('Menu/logout') ?>" class="list-group-item list-group-item-action py-2 ripple">
											<i class="fas fa-sign-out-alt fa-fw me-3"></i><span>Keluar Akun</span>
										</a>
									</div>
								</div>
							<?php endif; ?>
							<!-- utility -->
							<div class="menu-parent bg-light mb-2">
								<h6 class="sidebar-heading shadow-lg d-flex justify-content-between align-items-center px-3 m-0 text-muted rounded">
									<span>Cluster Baru?</span>
									<a class="d-flex align-items-center text-muted disabled" href="#"><i class="fas fa-fw fa-thumbtack"></i></a>
								</h6>
								<hr class="my-0 font-weight-bold">
								<div class=" mb-1" id="admin_menu">
									<a href="<?= base_url('Menu') ?>" class="list-group-item list-group-item-action py-2 ripple">
										<i class="fas fa-question fa-fw me-3"></i><span>Laporan Gudang</span>
									</a>
									<a href="<?= base_url('Menu') ?>" class="list-group-item list-group-item-action py-2 ripple">
										<i class="fas fa-question fa-fw me-3"></i><span>Detail Barang</span>
									</a>
									<a href="<?= base_url('Menu') ?>" class="list-group-item list-group-item-action py-2 ripple">
										<i class="fas fa-question fa-fw me-3"></i><span>Data Kamar</span>
									</a>
								</div>
							</div>
						</div>
					</div>
				</ul>
			</div>
		</div> <!-- end sidebar body scroll -->
	</nav>
	<!-- Sidebar -->