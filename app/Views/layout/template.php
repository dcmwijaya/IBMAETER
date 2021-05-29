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
				listItem()
				listPerizinan();
				listSpesifikasi()
				listPengumuman();
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

<!-- Config Modal -->
<script>
	$(document).ready(function() {
		$('.modal-dismiss').click(function() {
			$('#Perizinan_Modal').modal('hide');
		});
	});
</script>

<!-------------------------------------------------- Catch Data for Kelola Barang -------------------------------------------------->
<?= $this->include('scripts/global/kelola_barang'); ?>

<!-------------------------------------------------- Catch Data for Data User -------------------------------------------------->
<!--.......................... Config croppie js ..........................--->
<script src="<?= base_url('../vendor/croppie/croppie.js') ?>"></script>
<?= $this->include('scripts/admin/data_user'); ?>

<!-------------------------------------------------- Catch For Perizinan-------------------------------------------------->
<?= $this->include('scripts/admin/perizinan'); ?>

<!-------------------------------------------------- Catch for edit pengumuman -------------------------------------------------->
<script>
	function listPengumuman() {
		$.ajax({
			url: '<?= base_url('Admin/ShowPengumuman'); ?>',
			beforeSend: function(f) {
				$('#Reload_AJAX').html(sloading);
			},
			success: function(data) {
				$('#Reload_AJAX').html(data);
				$('#table_pengumuman').DataTable({
					scrollY: '100vh',
					scrollCollapse: true,
					paging: false,
					"order": [
						[0, "desc"]
					],
					"columnDefs": [{
						"width": "20%",
						"targets": 1
					}]
				});
			}
		});
	}

	let PengumumanSaveType; // Tumbal Operan :'v

	function showTambahmodal() {
		PengumumanSaveType = "Tambah";
		$('#Pengumuman_Modal').modal('show');
		$.ajax({
			type: "POST",
			url: "<?= base_url('Admin/TambahPengumuman_Form'); ?>",
			beforeSend: function(data) {
				$('#Pengumuman_Icon').removeClass("fa-folder-open");
				$('#Pengumuman_Icon').addClass("fa-folder-plus");
				$('#Pengumuman_Header').removeClass("bg-dark");
				$('#Pengumuman_Header').addClass("bg-softblue");
				$('#Modal_Title').text(' Tambah Pengumuman');
			},
			success: function(data) {
				$('#Pengumuman_Form').html(data);
			}
		});
	}

	function showDeleteModal(id) {
		PengumumanSaveType = "Delete";
		$('#Pengumuman_Modal').modal('show');
		$.ajax({
			url: "<?= base_url('Admin/DeletePengumuman_Form'); ?>",
			beforeSend: function(data) {
				$('#Pengumuman_Icon').removeClass("fa-folder-plus");
				$('#Pengumuman_Icon').addClass("fa-folder-open");
				$('#Pengumuman_Header').removeClass("bg-softblue");
				$('#Pengumuman_Header').addClass("bg-dark");
				$('#Modal_Title').text(' Hapus Pengumuman');
			},
			success: function(data) {
				$('#Pengumuman_Form').html(data);
				$.ajax({
					url: '<?= base_url('Admin/GetIdPengumuman'); ?>',
					data: {
						"id_pengumuman": id
					},
					type: "POST",
					dataType: "JSON",
					success: function(data) {
						$('[name="id_pengumuman"]').val(data.id_pengumuman);
						$('[name="judul"]').val(data.judul);
						$('[name="isi"]').text(data.isi);
					}
				});
			}
		});
	}

	$("#Pengumuman_Form").submit('click', function() {
		// e.preventDefault(); tidak berhasil
		$('#Pengumuman_Modal').modal('hide');
		let url;
		if (PengumumanSaveType == "Tambah") {
			url = "<?= base_url('Admin/TambahPengumuman'); ?>";
		} else if (PengumumanSaveType == "Delete") {
			url = "<?= base_url('Admin/DeletePengumuman'); ?>";
		}
		$.ajax({
			url: url,
			type: "POST",
			data: $('#Pengumuman_Form').serialize(),
			success: function(data) {
				$('#Pengumuman_Form').html(' ');
				listPengumuman();
			}
		});
		return false;
	})

	function infoClear() {
		// Set data to Form input
		let url = '<?= base_url('Admin/BlankPengumuman_Form'); ?>';
		let jpholder;
		if (PengumumanSaveType == "Tambah") {
			jpholder = "Tambah Judul Pengumuman...";
		} else if (PengumumanSaveType == "Edit") {
			jpholder = "Edit Judul Pengumuman...";
		}
		$.ajax({
			url: url,
			type: "POST",
			success: function(data) {
				$('#PengumumanF_Input').html(data);
				$('#pengumuman_judul').attr('placeholder', jpholder);
			}
		});
	}
</script>

<!-------------------------------------------------- Catch for Arsip komp & komplain-------------------------------------------------->
<?= $this->include('scripts/admin/komplain'); ?>
<!-------------------------------------------------- Catch for Pengaduan -------------------------------------------------->
<script>
	$(document).ready(function() {
		const PengaduanScript = "<?= base_url('../js/dragdrop.js'); ?>";

		function PengaduanForm() {
			// $('#Komplain_Modal').modal('show');
			$.ajax({
				url: "<?= base_url('Menu/PengaduanForm'); ?>",
				type: "POST",
				success: function(data) {
					$('#Pengaduan_Form').html(data);
					$.getScript(PengaduanScript);
				},
				error: function(data) {
					alert(' Operasi AJAX Gagal :(');
				}
			});
		}
		PengaduanForm();

		// ..........................Aksi Pengaduan..........................

		$("#Pengaduan_Form").submit(function(e) {
			e.preventDefault();
			$.ajax({
				url: "<?= base_url('Menu/adukan'); ?>",
				type: "POST",
				// data: $('#Pengaduan_Form').serialize(),
				data: new FormData(this),
				processData: false,
				contentType: false,
				cache: false,
				async: false,
				success: function(adukan) {
					alert('Data Terkirim !');
					// $('[name="judul"]').val('');
					// $('[name="isi"]').val('');
					// $('[name="foto"]').val(null);
					// $('.drop-zone__thumb').attr('style', null);
					PengaduanForm();
				},
				error: function(data) {
					alert('Operasi Ajax Gagal :(');
				}
			});
			// return false;
		});
	});
</script>

<!-------------------------------------------------- Catch for profile edit -------------------------------------------------->
<script>
	function imgPreview() {
		const sampul = document.querySelector('#foto');
		const imgPreview = document.querySelector('.img-preview');

		const fileSampul = new FileReader();
		fileSampul.readAsDataURL(sampul.files[0]);

		fileSampul.onload = function(e) {
			imgPreview.src = e.target.result;
		}
	}
</script>

<!------------------------------------------------ Catch for Perizinan Absensi ------------------------------------------------>
<script>
	$(document).ready(function() {
		// get Accept Absensi
		$('.btn-acc-izin').on('click', function() {
			// mengambil data id_absen
			var idIzin = $(this).data('idizin');

			// Set data ke modal Form accept
			$('#acc-izin').val(idIzin);
		});

		// get Decline Absensi 
		$('.btn-rjc-izin').on('click', function() {
			// mengambil data id_absen
			var idIzin = $(this).data('idizin');

			// Set data ke modal Form decline
			$('#dec-izin').val(idIzin);
		});

		// get Bukti Image
		$('.btn-img-izin').on('click', function() {
			// get img from tabel
			const img = $(this).data('img');

			// Set img to modal
			$('#buktiIzin img').attr('src', img);
			// $('#Komplain_Modal').modal('hide');
		});
	});
</script>

</html>