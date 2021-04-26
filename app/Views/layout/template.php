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

<!-- malhiu scrollbar plugin -->
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

<!-- datatables -->
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
		$('.toast').toast('show');
	});
</script>
<!-- Custom scripts -->

<!-- sidebar -->
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

<!-- Catch Data for Dashboard -->
<script>
	$(document).ready(function() {

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
			$('#itemIn #itemInId').val(id);
			$('#itemIn #itemInNama').text(nama);
		});

		// get Keluar Product
		$('.btn-out-item').on('click', function() {
			// get data from button keluar
			const id = $(this).data('id');
			const nama = $(this).data('nama');
			// Set data to Form keluar
			$('#itemOut #itemOutId').val(id);
			$('#itemOut #itemOutNama').text(nama);
		});

	});
</script>

<!-- Catch Data for Data User -->
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


<!-- edit pengumuman -->
<script>
	$(document).ready(function() {
		// clear input field
		$('.info-clear').on('click', function() {
			// Set data to Form input
			$('#info-maker #edit_judul_info').val("");
			$('#info-maker #edit_isi_info').text("");
		});
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

<!-- croppie js -->
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
						$('#show-add-img').html(data);
						const file_img = new FileReader();
						const label_add_img = document.querySelector('.label-img-input');
						label_add_img.textContent = $('#add_img').files[0].name;
						file_img.readAsDataURL($('#add_img').files[0]);
					}
				});
			})
		});

	});

	// function previewAddImg() {

	// 	const add_img = document.querySelector('#add_img');
	// 	const label_add_img = document.querySelector('.label-img-input');
	// 	const preview_img = document.querySelector('.img-preview');

	// 	label_add_img.textContent = add_img.files[0].name;

	// 	const file_img = new FileReader();
	// 	file_img.readAsDataURL(add_img.files[0]);

	// 	file_img.onload = function(e) {
	// 		preview_img.src = e.target.result;
	// 	}
	// }
</script>

</html>