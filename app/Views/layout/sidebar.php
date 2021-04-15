<!-- start wrapper pembungkus bodieh-->
<div class="wrapper">
	<nav id="sidebar" class="collapse d-lg-block sidebar collapse">
		<!-- Image and text -->
		<nav class="navbar navbar-light bg-light justify-content-center font-weight-bold" style="padding: 10.5px">
			<a class="navbar-brand" href="<?= base_url('dashboard') ?>">
				<img class="mr-3 d-inline-block align-top" src="<?= base_url('../img/icon/favicon-32x32.png') ?>" width="30" height="30" alt="Logo Brand">
				INVENBAR
			</a>
		</nav>
		<div class="card my-4 mx-2">
			<div class="card-body">
				<div class="d-flex flex-column align-items-center text-center">
					<a href="<?= base_url('menu/profakun') . "/" . session('email') ?>">
						<img class="d-inline-block align-top rounded-circle" src="<?= base_url("/img/user") . "/" . session('picture'); ?>" width="150" height="150" style="box-shadow: 0px 3px 5px 0px #a8a8a8;" alt="Photo Profile">
					</a>
					<div class="mt-3">
						<h5 class="text-center text-dark font-weight-bold"><?= session('nama'); ?><i class="fas fa-fw fa-circle ml-2" style="font-size: 10px; color:yellowgreen; vertical-align: middle;"></i></h5>
						<p class="text-dark mb-1">Pekerja | Online</p>
					</div>
				</div>
			</div>
		</div>
		<!-- Menus Sidebar -->
		<ul class="sidebar-navigation px-0">
			<div class="pilside position-sticky">
				<div class="list-group list-group-flush mx-2 mt-4">
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