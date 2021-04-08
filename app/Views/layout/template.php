<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- CSS -->
	<link rel="icon" href="<?= base_url('img/icon/favicon.ico') ?>">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="<?= base_url('fontawesome/css/all.css') ?>">
	<title><?= $title; ?></title>

	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css" />
	<!-- Google Fonts Roboto -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" />
	<!-- MDB -->
	<link rel="stylesheet" href="<?= base_url('../css/mdb.min.css') ?>" />
	<!-- Custom styles -->
	<link rel="stylesheet" href="<?= base_url('../css/sidebar.css') ?>" /> <!-- ganti cuy -->
	<!-- Scrollbar Custom CSS -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">

	<!-- datatables -->
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">


</head>

<body>

	<?= $this->include('layout/sidebar'); ?>
	<?= $this->include('layout/navbar'); ?>

	<?= $this->renderSection('content'); ?>
	<footer class="py-5 bg-light mt-auto" style="font-family: 'Roboto';">
		<div class="container">
			<p class="m-0 text-center text-dark"><img class="mr-1" src="<?= base_url('img/icon/favicon-32x32.png') ?>" alt=""> Inventory Barang Gudang - Kelompok 5 Framework C 2021</p>
		</div>
	</footer>
	</div>
	<!-- END wrapper pembungkus bodieh from sidebar.php-->

</body>

<!-- MDB -->
<script type="text/javascript" src="<?= base_url('../js/mdb.min.js') ?>"></script>
<!-- Custom scripts -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<!-- jQuery Custom Scroller CDN -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>

<!-- datatables -->
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>
<script>
	$(document).ready(function() {
		$('#table_user').DataTable({
			scrollX: 'true',
			scrollCollapse: true
		});
		$('#table_item').DataTable({
			scrollX: 'true'
		});
	});
</script>

<!-- sidebar -->
<script>
	$(document).ready(function() {
		$("#sidebarCollapse").on('click', function() {
			$("#sidebar").toggleClass('active');
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
	$(document).ready(function() {

		// get Edit User
		$('.btn-edit-user').on('click', function() {
			// get data from button edit
			const uid = $(this).data('uid');
			const nama = $(this).data('nama');
			const email = $(this).data('email');
			const password = $(this).data('password');
			const urole = $(this).data('urole');
			// Set data to Form Edit
			$('#Edit_user #edit_nama_user').val(nama);
			$('#Edit_user #edit_email_user').val(email);
			$('#Edit_user #edit_password').val(password);
			$('#Edit_user #edit_jenis_user').val(urole).trigger('change');
			$('#Edit_user #edit_user_id').val(uid);
		});

		// get Delete User
		$('.btn-delete-user').on('click', function() {
			// get data from button delete
			const uid = $(this).data('uid');
			const nama = $(this).data('nama');
			// Set data to Form delete
			$('#Delete_user #delete_user_id').val(uid);
			$('#Delete_user #delete_nama_user').val(nama);
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

</html>