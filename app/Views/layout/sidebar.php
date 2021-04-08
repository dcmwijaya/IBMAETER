<!-- start wrapper pembungkus bodieh-->
<div class="wrapper">
	<nav id="sidebar" class="collapse d-lg-block sidebar collapse">
		<div class="container sidebar-header" style="padding: 11px">
			<a class="navbar-brand" href="<?= base_url('dashboard') ?>">
				<div class="row align-items-center">
					<div class="col-4 align-self-start px-4">
						<img src="<?= base_url('../img/icon/favicon-32x32.png') ?>" alt="" loading="lazy" />

					</div>
					<div class="col-8 align-self-end">
						<h5 class="text-center">INVENBAR</h5>
					</div>
				</div>
			</a>
		</div>
		<ul class="lisst-unstyled components">
			<div class="pilside position-sticky">
				<div class="list-group list-group-flush mx-3 mt-4">
					<!-- profile -->
					<!-- <div class="col-sm-12 p-0">
						<img src="https://mdbootstrap.com/img/Photos/Avatars/img (31).jpg" class="rounded-circle" height="22" alt="" loading="lazy" />
					</div> -->
					<!-- admon -->
					<div>
						<button class="list-group-item list-group-item-action py-2 ripple font-weight-bold" type="button" data-toggle="collapse" data-target="#admin_menu" aria-expanded="false" aria-controls="admin_menu">
							<i class="fas fa-user-tie fa-fw me-3"></i>Admin Menu
						</button>
					</div>
					<hr class="my-0 font-weight-bold">
					<div class="collapse.show mb-1" id="admin_menu">
						<a href="<?= base_url('admin/datauser') ?>" class="list-group-item list-group-item-action py-2 ripple">
							<i class="fas fa-users fa-fw me-3"></i><span>Data Users</span>
						</a>
						<a href="<?= base_url('admin/adminpengumuman') ?>" class="list-group-item list-group-item-action py-2 ripple">
							<i class="fas fa-bullhorn fa-fw me-3"></i><span>Edit Pengumuman</span>
						</a>
					</div>
					<!-- user -->
					<div class="mb-0">
						<button class="list-group-item list-group-item-action py-2 ripple font-weight-bold" type="button" data-toggle="collapse" data-target="#user_menu" aria-expanded="false" aria-controls="user_menu">
							<i class="fas fa-users fa-fw me-3"></i>User Menu
						</button>
					</div>
					<hr class="my-0 font-weight-bold">
					<div class="collapse.show" id="user_menu">
						<a href="<?= base_url('menu/dashboard') ?>" class="list-group-item list-group-item-action py-2 ripple">
							<i class="fas fa-house-user fa-fw me-3"></i><span>Dashboard</span>
						</a>
						<a href="<?= base_url('menu/pengumuman') ?>" class="list-group-item list-group-item-action py-2 ripple">
							<i class="fas fa-bell fa-fw me-3"></i><span>Pengumuman</span>
						</a>
						<a href="<?= base_url('menu/profakun') . "/" . session('email') ?>" class="list-group-item list-group-item-action py-2 ripple">
							<i class="far fa-user-circle fa-fw me-3"></i><span>My Profile</span>
						</a>
						<a href="<?= base_url('menu/profedit') . "/" . session('uid') ?>" class="list-group-item list-group-item-action py-2 ripple">
							<i class="fas fa-users-cog fa-fw me-3"></i><span>Edit Profile</span>
						</a>
						<a href="<?= base_url('menu/chart') ?>" class="list-group-item list-group-item-action py-2 ripple">
							<i class="fas fa-chart-line fa-fw me-3"></i><span>View Chart</span>
						</a>
						<a href="<?= base_url('/') ?>" class="list-group-item list-group-item-action py-2 ripple">
							<i class="fas fa-sign-out-alt fa-fw me-3"></i><span>Keluar Akun</span>
						</a>
					</div>
				</div>
			</div>
		</ul>
	</nav>
	<!-- Sidebar -->