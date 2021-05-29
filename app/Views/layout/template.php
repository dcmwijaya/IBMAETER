<!doctype html>
<html lang="id">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Website Item Warehouse Management Framework C">
	<meta name="author" content="Dev Cakra, Merdin Risal, RifkyA911">
	<title><?= $title; ?></title>
	<link rel="icon" href="<?= base_url('img/icon/favicon.ico') ?>">
	<!-- Google Fonts Roboto -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" />

	<!------------------------ CSS ------------------------>
	<!-- Bootsrap 4.0.0 but replace and using ver MDB -->
	<link rel="stylesheet" href="<?= base_url('../vendor/bootstrap-4.0.0/dist/css/bootstrap.min.css') ?>">
	<link rel="stylesheet" href="<?= base_url('../css/mdb.min.css') ?>" />

	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?= base_url('fontawesome/css/all.css') ?>">

	<!-- Scrollbar Custom CSS -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">

	<!-- datatables -->
	<link rel="stylesheet" href="<?= base_url('../vendor/DataTables/css/jquery.dataTables.css') ?>">

	<!-- malihu scrollbar -->
	<link rel="stylesheet" href="<?= base_url('../vendor/malihu-scrollbar/jquery.mCustomScrollbar.min.css') ?>">

	<!-- croppie -->
	<link rel="stylesheet" href="<?= base_url('../vendor/croppie/croppie.css') ?>">

	<!-- Custom styles -->
	<link rel=" stylesheet" href="<?= base_url('../css/custom.css') ?>" />
	<link rel="stylesheet" href="<?= base_url('../css/sidebar.css') ?>" />
</head>

<body>
	<?= $this->include('layout/tentang'); ?>
	<?= $this->include('layout/sidebar'); ?>
	<?= $this->include('layout/navbar'); ?>
	<?= $this->renderSection('content'); ?>

	<footer class="py-5 bg-light mt-auto" style="font-family: 'Roboto';">
		<div class="container">
			<p class="m-0 text-center text-dark"><a class="text-dark" type="button" data-toggle="modal" data-target="#TentangModal"><img class="mr-1" src="<?= base_url('img/icon/favicon-32x32.png') ?>" alt=""> Ibmaeter (Inventaris Barang Gudang dan Manajemen Pekerja Terpadu)</a></p>
		</div>
	</footer>
	</div> <!-- END wrapper pembungkus body from sidebar.php-->
</body>

<!--========================================== JavaScript Vendors==========================================-->

<!--.......................... jQuery first, then Popper.js, then Bootstrap JS ..........................-->
<script src="../vendor/jquery/jquery.slim.min.js"></script>
<!--.......................... Bootsrap MDB ..........................-->
<script type="text/javascript" src="<?= base_url('../js/mdb.min.js') ?>"></script>
<!--.......................... Bootsrap 4.0.0 JS ..........................-->
<script src="<?= base_url('../vendor/bootstrap-4.0.0/assets/js/vendor/popper.min.js') ?>"></script>
<script src="<?= base_url('../vendor/bootstrap-4.0.0/dist/js/bootstrap.min.js') ?>"></script><!-- jQuery Custom Scroller CDN -->
<!--.......................... Config malhiu scrollbar plugin ..........................-->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script> <!-- malihu depedensi-->
<script src="<?= base_url('../vendor/malihu-scrollbar/jquery.mCustomScrollbar.concat.min.js') ?>"></script>
<script>
	(function($) {
		$(window).on("load", function() {

			$("#sidebar-body").mCustomScrollbar({
				theme: "minimal"
			});

		});
	})(jQuery);
</script>

<!-------------------------------------------------- Config Login ---------------------------------------------------------------->
<script>
	$(document).ready(function() {
		$('#btn_ban-login').on('click', function() {
			setTimeout(function() { // mulai timeout selama 45 detik
				document.getElementById("ban-login").remove();
				document.getElementById("btn_ban-login").disabled = false;
				// $('#ban-login').remove();
				// $('#btn_ban-login').removeProp()
			}, 45000);
		})
	});
</script>

<!-------------------------------------------------- Config datatables -------------------------------------------------->
<script type="text/javascript" src="<?= base_url('../vendor/DataTables/js/jquery.dataTables.js') ?>"></script>
<script>
	$(document).ready(function() {
		$('#table_absensi').DataTable({
			scrollY: '100vh',
			scrollCollapse: true,
			paging: false
		});
		$('#table_aktivitas').DataTable({
			scrollY: '100vh',
			scrollCollapse: true,
			paging: false
		});
		$('.toast').toast('show');
		// load tables
	});
	// Memulai Loading Page dengan AJAX
	// load list data when document load
	$(document).ready(function() {
		// page data_user
		listUser();
		// page kelola_barang
		listItem()
		listPerizinan();
		listSpesifikasi()
		listPengumuman();
		// page komplain
		listKomplain();
		listArsipKomplain();
	});
</script>

<!-------------------------------------------------- Config Sidebar -------------------------------------------------->
<script>
	$(document).ready(function() {
		$("#sidebarCollapse").on('click', function(e) {
			e.stopPropagation();
			$("#fading").toggleClass('fading');
			$("#sidebar").toggleClass('active');
			setTimeout(function() {
				// page data_user
				listUser();
				// page kelola_barang
				listItem()
				listPerizinan();
				listSpesifikasi()
				listPengumuman();
				// page komplain
				listKomplain();
				listArsipKomplain();
			}, 1000);
		});
		$('#sidebar').click(function(e) {
			e.stopPropagation();
		});
		// media query 
		$('body,html').click(function(e) {
			if ($(window).width() < 760) {
				$('#sidebar').removeClass('active');
				$("#fading").removeClass('fading');
			}
		});
	});
</script>


<!-------------------------------------------------- Config Cancel/Close Button -------------------------------------------------->
<script>
	function UserModalClose() {
		$(".btn-modal-close").on("click", function() {
			$('#User_Modal').modal("hide");
			$('#User_Form').html('');
		});
	}

	function BarangModalClose() {
		$(".btn-modal-close").on("click", function() {
			$('#Item_Modal').modal("hide");
			$('#Item_Form').html('');
		});
	}

	function PerizinanModalClose() {
		$(".btn-modal-close").on("click", function() {
			$('#Perizinan_Modal').modal("hide");
			$('#Perizinan_Form').html('');
		});
	}

	function InOutModalClose() {
		$(".btn-modal-close").on("click", function() {
			$('#InOut_Modal').modal("hide");
			$('#InOut_Form').html('');
		});
	}

	function SpesifikasiModalClose() {
		$(".btn-modal-close").on("click", function() {
			$('#Spec_Modal').modal("hide");
			$('#Spec_Form').html('');
		});
	}

	function KomplainModalClose() {
		$(".btn-modal-close").on("click", function() {
			$('#Komplain_Modal').modal("hide");
			$('#Komplain_Form').html('');
		});
	}

	function PengumumanModalClose() {
		$(".btn-modal-close").on("click", function() {
			$('#Pengumuman_Modal').modal("hide");
			$('#Pengumuman_Form').html('');
		});
	}
</script>


<!-- #################################### ADMIN SECTION  ####################################-->

<!------------------------------------ Catch Data for Data User -------------------------------------->
<!-- Config croppie js --->
<script src="<?= base_url('../vendor/croppie/croppie.js') ?>"></script>
<?= $this->include('scripts/admin/data_user'); ?>

<!------------------------------------ Catch For Perizinan-------------------------------------->
<?= $this->include('scripts/admin/perizinan'); ?>

<!------------------------------------ Catch for edit pengumuman -------------------------------------->
<?= $this->include('scripts/admin/edit_pengumuman'); ?>

<!------------------------------------ Catch for Arsip komp & komplain -------------------------------------->
<?= $this->include('scripts/admin/komplain'); ?>

<!------------------------------------ Catch for Perizinan Absensi --------------------------------->
<?= $this->include('scripts/admin/aktivitas'); ?>

<!-- ##################################### USER SECTION ##################################### -->

<!------------------------------------ Catch Data for Kelola Barang -------------------------------------->
<?= $this->include('scripts/global/kelola_barang'); ?>

<!------------------------------------ Catch for Pengaduan -------------------------------------->
<?= $this->include('scripts/global/pengaduan'); ?>

<!------------------------------------ Catch for profile edit ------------------------------------->
<?= $this->include('scripts/global/profile_edit'); ?>

</html>