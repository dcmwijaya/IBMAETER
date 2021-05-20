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

	<!-- stepwizard -->
	<!-- <link rel="stylesheet" href="<?= base_url('../vendor/stepwizard/style.css') ?>"> -->

	<!-- Custom styles -->
	<link rel="stylesheet" href="<?= base_url('../css/custom.css') ?>" />
	<link rel="stylesheet" href="<?= base_url('../css/sidebar.css') ?>" />
</head>

<body>
	<?= $this->include('layout/tentang'); ?>
	<?= $this->include('layout/sidebar'); ?>
	<?= $this->include('layout/navbar'); ?>
	<?= $this->renderSection('content'); ?>

	<footer class="py-5 bg-light mt-auto" style="font-family: 'Roboto';">
		<div class="container">
			<p class="m-0 text-center text-dark"><a class="text-dark" type="button" data-toggle="modal" data-target="#TentangModal"><img class="mr-1" src="<?= base_url('img/icon/favicon-32x32.png') ?>" alt=""> Inventory Barang Gudang - Kelompok 5 Framework C 2021</a></p>
		</div>
	</footer>
	</div> <!-- END wrapper pembungkus body from sidebar.php-->
</body>

<!------------------------ JavaScript ------------------------>
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="../vendor/jquery/jquery.slim.min.js"></script>
<!-- Bootsrap MDB -->
<script type="text/javascript" src="<?= base_url('../js/mdb.min.js') ?>"></script>
<!-- Bootsrap 4.0.0 JS -->
<script src="<?= base_url('../vendor/bootstrap-4.0.0/assets/js/vendor/popper.min.js') ?>"></script>
<script src="<?= base_url('../vendor/bootstrap-4.0.0/dist/js/bootstrap.min.js') ?>"></script><!-- jQuery Custom Scroller CDN -->
<!-- stepwizard -->
<!-- <script src="<?= base_url('../vendor/stepwizard/script.js') ?>"></script> -->

<!-------------------------------------------------- Config malhiu scrollbar plugin -------------------------------------------------->
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
	// $(document).ready(function() {
	// 	$('#alert-login').ready(function() {
	// 		setTimeout({
	// 			$('#alert-login').remove();
	// 		}), 45000;
	// 	})
	// });
</script>

<!-------------------------------------------------- Config datatables -------------------------------------------------->
<script type="text/javascript" src="<?= base_url('../vendor/DataTables/js/jquery.dataTables.js') ?>"></script>
<script>
	$(document).ready(function() {
		$('#table_user').DataTable({
			scrollY: '100vh',
			scrollCollapse: true,
			paging: false
		});
		$('#table_item').DataTable({
			scrollY: '100vh',
			scrollCollapse: true,
			paging: false
		});
		$('#table_spesifikasi').DataTable({
			scrollY: '100vh',
			scrollCollapse: true,
			paging: false
		});
		$('#table_perizinan').DataTable({
			scrollY: '100vh',
			scrollCollapse: true,
			paging: false,
			"order": [
				[0, "desc"]
			]
		});

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
		$('#table_komplain').DataTable({
			scrollY: '100vh',
			scrollCollapse: true,
			paging: false
		});
		$('.toast').toast('show');
	});
</script>

<!-------------------------------------------------- Config Sidebar -------------------------------------------------->
<script>
	$(document).ready(function() {
		$("#sidebarCollapse").on('click', function(e) {
			e.stopPropagation();
			$("#fading").toggleClass('fading');
			$("#sidebar").toggleClass('active');
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

<!-------------------------------------------------- Catch Data for Kelola Barang -------------------------------------------------->
<script>
	$(document).ready(function() {

		$('#Tambah_item .jenis-barang').change(function() {
			$('#Tambah_item .kode2').val($(this).val());
			$('#Tambah_item .hkode2').val($('#Tambah_item .kode2').val())
		});

		$('#Tambah_item .penyimpanan').change(function() {
			$('#Tambah_item .kode1').val($(this).val());
			$('#Tambah_item .hkode1').val($('#Tambah_item .kode1').val())
		});

		// get Edit Product
		$('.btn-edit-item').on('click', function() {
			// get data from button edit
			const id = $(this).data('id');
			const nama = $(this).data('nama');
			const stok = $(this).data('stok');
			const jenis = $(this).data('jenis');
			const penyimpanan = $(this).data('penyimpanan');
			// Set data to Form Edit
			$('#Edit_item #edit_id_item').val(id);
			$('#Edit_item #edit_nama_barang').val(nama);
			$('#Edit_item #edit2_nama_item').text(nama);
			$('#Edit_item #edit_stok_barang').val(stok);
			$('#Edit_item #edit_jenis_barang').val(jenis).trigger('change');
			$('#Edit_item #edit_penyimpanan').val(penyimpanan).trigger('change');
			// Call Modal Edit
			// $('#editModal').modal('show');
			// $("#edit-item-form").attr("action", `${id}`);
		});

		// get Delete Product
		$('.btn-delete-item').on('click', function() {
			// get data from button delete
			const id = $(this).data('id');
			const nama = $(this).data('nama');
			// Set data to Form delete
			$('#Delete_item #delete_id_item').val(id);
			$('#Delete_item #delete_nama_item').text(nama);
		});

		// get Masuk Product
		$('.btn-in-item').on('click', function() {
			// get data from button masuk
			const id = $(this).data('id');
			const nama = $(this).data('nama');
			// Set data to Form masuk
			// $('#itemIn #itemInId').val(id);
			$('#itemIn #itemInNama').text(nama);
			$('#itemIn #itemInNamaPost').val(nama);
		});

		// get Keluar Product
		$('.btn-out-item').on('click', function() {
			// get data from button keluar
			const id = $(this).data('id');
			const nama = $(this).data('nama');
			// Set data to Form keluar
			// $('#itemOut #itemOutId').val(id);
			$('#itemOut #itemOutNama').text(nama);
			$('#itemOut #itemOutNamaPost').val(nama);
		});

		// get Edit Spesifikasi
		$('.detl-edit-item').on('click', function() {
			// get data from button edit spec
			const id = $(this).data('id');
			const nama = $(this).data('nama');
			const kode = $(this).data('kode');
			const harga = $(this).data('harga');
			const berat = $(this).data('berat');
			const supplier = $(this).data('supplier');

			// Set data to Form edit spec
			$('#Edit_spesifikasi #edit_spesifikasi_nama').text(nama);
			$('#Edit_spesifikasi #edit_sp_kode').val(kode);
			$('#Edit_spesifikasi #edit_sp_harga').val(harga);
			$('#Edit_spesifikasi #edit_sp_berat').val(berat);
			const selectsupplier = $('#selectsupplier');
			if (supplier != null) {
				if (supplier == 1) {
					selectsupplier.val(1).change();
				} else if (supplier == 2) {
					selectsupplier.val(2).change();
				} else if (supplier == 3) {
					selectsupplier.val(3).change();
				} else if (supplier == 4) {
					selectsupplier.val(4).change();
				} else if (supplier == 5) {
					selectsupplier.val(5).change();
				} else if (supplier == 6) {
					selectsupplier.val(6).change();
				}
			}
			$('#Edit_spesifikasi #edit_sp_id_item').val(id);
		});

		//get detail spec
		$('.detl-item').on('click', function() {
			// get data from button keluar
			const id = $(this).data('id');
			const nama = $(this).data('nama');
			const stok = $(this).data('stok');
			const jenis = $(this).data('jenis');
			const penyimpanan = $(this).data('penyimpanan');
			const kode = $(this).data('kode');
			const harga = $(this).data('harga');
			const berat = $(this).data('berat');
			const supplier = $(this).data('supplier');

			// get detail spesifikasi
			$('#Detail_spesifikasi #detail_nama').val(nama);
			$('#Detail_spesifikasi #detail_stok').val(stok);
			$('#Detail_spesifikasi #detail_jenis').val(jenis);
			$('#Detail_spesifikasi #detail_penyimpanan').val(penyimpanan);
			$('#Detail_spesifikasi #detail_kode').val(kode);
			$('#Detail_spesifikasi #detail_harga').val(harga);
			$('#Detail_spesifikasi #detail_berat').val(berat);
			$('#Detail_spesifikasi #detail_supplier').val(supplier);
			$('#Detail_spesifikasi #detail_id').val(id);
		})
	});
</script>

<!-------------------------------------------------- Catch Data for Data User -------------------------------------------------->
<script>
	function previewEditImg() {

		const edit_img = document.querySelector('#edit_img');
		const label_edit_img = document.querySelector('.label-img-edit');
		const preview_img = document.querySelector('.edit-img-preview');

		label_edit_img.textContent = edit_img.files[0].name;

		const file_img = new FileReader();
		file_img.readAsDataURL(edit_img.files[0]);

		file_img.onload = function(e) {
			preview_img.src = e.target.result;
		}
	}
	$(document).ready(function() {

		// get Edit User
		$('.btn-edit-user').on('click', function() {
			// get data from button edit
			const uid = $(this).data('uid');
			const nama = $(this).data('nama');
			const email = $(this).data('email');
			const password = $(this).data('password');
			const urole = $(this).data('urole');
			const picture = $(this).data('picture');
			// Set data to Form Edit
			$('#Edit_user #edit_nama_user').val(nama);
			$('#Edit_user #edit_email_user').val(email);
			$('#Edit_user #edit_jenis_user').val(urole).trigger('change');
			$('#Edit_user .edit-img-preview').attr("src", `<?= base_url('../img/user'); ?>/${picture}`);
			$('#Edit_user #old_image').val(picture);
			$('#Edit_user #old_password').val(password);
			$('#Edit_user #edit_user_id').val(uid);
		});

		// get Delete User
		$('.btn-delete-user').on('click', function() {
			// get data from button delete
			const uid = $(this).data('uid');
			const nama = $(this).data('nama');
			// Set data to Form delete
			$('#Delete_user #delete_user_id').val(uid);
			$('#Delete_user #delete_nama_user').text(nama);
		});
	});
</script>


<!-------------------------------------------------- Catch for edit pengumuman -------------------------------------------------->
<script>
	let sloading = '<div class="spinner-border spinner-border-sm text-info" role="status"><span class="sr-only">&emsp;&ensp; Loading...</span></div> Loading Data...'

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

	let SaveType; // Tumbal Operan :'v

	function showTambahmodal() {
		SaveType = "Tambah";
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

	function showEditmodal(id) {
		SaveType = "Edit";
		$('#Pengumuman_Modal').modal('show');
		$.ajax({
			url: "<?= base_url('Admin/EditPengumuman_Form'); ?>",
			beforeSend: function(data) {
				$('#Pengumuman_Icon').removeClass("fa-folder-plus");
				$('#Pengumuman_Icon').addClass("fa-folder-open");
				$('#Pengumuman_Header').removeClass("bg-softblue");
				$('#Pengumuman_Header').addClass("bg-dark");
				$('#Modal_Title').text(' Edit Pengumuman');
				console.log("EDIT PENDING SENT...");
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

	// function Simpan() {
	$("#Pengumuman_Form").submit('click', function() {
		// e.preventDefault(); tidak berhasil
		$('#Pengumuman_Modal').modal('hide');
		let url;
		if (SaveType == "Tambah") {
			url = "<?= base_url('Admin/TambahPengumuman'); ?>";
		} else if (SaveType == "Edit") {
			url = "<?= base_url('Admin/EditPengumuman'); ?>";
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
	// }

	function infoClear() {
		// Set data to Form input
		let url = '<?= base_url('Admin/BlankPengumuman_Form'); ?>';
		let jpholder;
		if (SaveType == "Tambah") {
			jpholder = "Tambah Judul Pengumuman...";
		} else if (SaveType == "Edit") {
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


	// Mungkin Dihapus
	$(document).ready(function() {
		// load list data when document load
		listPengumuman();
	});
</script>


<!-- Script for preview picture on edit -->
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

<!-------------------------------------------------- Config croppie js -------------------------------------------------->
<script src="<?= base_url('../vendor/croppie/croppie.js') ?>"></script>
<script>
	$(document).ready(function() { // OVERLOAD MODAL

		$image_crop = $('#image_demo').croppie({
			enableExif: true,
			viewport: {
				width: 400,
				height: 400,
				type: 'square' //circle
			},
			boundary: {
				width: 500,
				height: 500
			}
		});

		$('#add_img').on('change', function() {
			var reader = new FileReader();
			reader.onload = function(event) {
				$image_crop.croppie('bind', {
					url: event.target.result
				}).then(function() {
					console.log('jQuery bind complete');
				});
			}
			reader.readAsDataURL(this.files[0]);
			$('#uploadimageModal').modal('show');
		});

		$('.crop_image').click(function(event) {
			$image_crop.croppie('result', {
				type: 'canvas',
				size: 'viewport'
			}).then(function(response) {
				$.ajax({
					url: "<?= base_url('Admin/cropImage'); ?>",
					type: "POST",
					data: {
						"image": response
					},
					success: function(data) {
						$('#uploadimageModal').modal('hide');
						html = '<img src="' + response + '" class="img-thumbnail img-preview" alt="image preview" style="max-height: 370px; " />';
						$('#show-add-img').html(html);
						//Membuat FORM by JavaScript
						var formData = new FormData();
						var file = response;
						//Cek Dulu, Apakah Gambarnya sudah dipilih
						if (file != null) {
							formData.append('picture', file);
						}
					}
				});
			})
		});

	});
</script>

<!-------------------------------------------------- Catch for Arsip komplain dan Perizinan -------------------------------------------------->
<script>
	$(document).ready(function() {
		<?php
		$masukSpan = '<span class="py-2 badge badge-success" style="font-weight: 600;font-size: 12px;"><i class="fas fa-arrow-down fa-fw mr-1"></i>';
		$keluarSpan = '<span class="py-2 badge badge-danger" style="font-weight: 600;font-size: 12px;"><i class="fas fa-arrow-up fa-fw mr-1"></i>';
		?>
		// get Accept Komplain dan perizinan 
		$('.btn-acc-item').on('click', function() {
			// perizinan absensi
			var idIzin = $(this).data('idizin');
			// get data from button accept
			const noKomp = $(this).data('no');
			// perzinaan
			const reqs = $(this).data('reqs');
			const nama = $(this).data('nama');
			const stok = $(this).data('stok');
			const pekerja = $(this).data('pekerja');
			const tgl = $(this).data('tgl');
			const ket = $(this).data('ket');

			// Set data to Form accept
			$('#acc-izin').val(idIzin);
			$('#acc-nomor').val(noKomp);
			$('#acc-reqs').val(reqs);
			$('#Accept #TerimaNama').val(nama);
			if (reqs == "Masuk") {
				$("#Accept #TerimaReqs").html(`<?= $masukSpan ?> ${reqs}</span>`);
			} else {
				$("#Accept #TerimaReqs").html(`<?= $keluarSpan ?> ${reqs}</span>`);
			}
			$('#Accept #TerimaUbahStok').val(stok);
			$('#Accept #TerimaPekerja').val(pekerja);
			$('#Accept #TerimaTgl').val(tgl);
			$('#Accept #TerimaKet').val(ket);
		});

		// get Decline Komplain dan perizinan
		$('.btn-rjc-item').on('click', function() {
			// perizinan absensi
			var idIzin = $(this).data('idizin');
			// get data from button accept
			const noKomp = $(this).data('no');
			//perzinaan
			const reqs = $(this).data('reqs');
			const nama = $(this).data('nama');
			const stok = $(this).data('stok');
			const pekerja = $(this).data('pekerja');
			const tgl = $(this).data('tgl');
			const ket = $(this).data('ket');

			// Set data to Form decline
			$('#dec-izin').val(idIzin);
			$('#dec-nomor').val(noKomp);
			$('#dec-reqs').val(reqs);
			$('#Rejected #TolakNama').text(nama);
			if (reqs == "Masuk") {
				$("#Rejected #TolakReqs").html(`<?= $masukSpan ?> ${reqs}</span>`);
			} else {
				$("#Rejected #TolakReqs").html(`<?= $keluarSpan ?> ${reqs}</span>`);
			}
			$('#Rejected #TolakUbahStok').text(stok);
			$('#Rejected #TolakPekerja').val(pekerja);
			$('#Rejected #TolakTgl').val(tgl);
			$('#Rejected #TolakKet').val(ket);
		});

		// get Bukti Image
		$('.btn-img-item').on('click', function() {
			// get img from tabel
			const img = $(this).data('img');

			// Set img to modal
			$('#gambarBukti img').attr('src', img);
		});
	});
</script>

</html>