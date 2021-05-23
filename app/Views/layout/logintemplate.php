<!doctype html>
<html lang="id">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="author" content="Dev Cakra, Merdin Risal, RifkyA911">
	<title><?= $title; ?></title>
	<link rel="icon" href="<?= base_url('img/icon/favicon.ico') ?>">
	<!-- Google Fonts Roboto -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" />

	<!-------------------------- CSS -------------------------->
	<!-- Replacement Bootsrap 4.0.0 with MDB -->
	<link rel="stylesheet" href="<?= base_url('../vendor/bootstrap-4.0.0/dist/css/bootstrap.min.css') ?>">
	<link rel="stylesheet" href="<?= base_url('../css/mdb.min.css') ?>" />

	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?= base_url('fontawesome/css/all.css') ?>">

	<!-- Custom styles -->
	<link rel="stylesheet" href="<?= base_url('css/loginstyle.css') ?>">
</head>

<body class="login-body">
	<?= $this->include('layout/loginnavbar'); ?>
	<?= $this->include('layout/tentang'); ?>
	<?= $this->renderSection('logincontent'); ?>
	<!-- Tidak pakai Footer-->
</body>

<!-------------------------- JavaScript -------------------------->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="../vendor/jquery/jquery.slim.min.js"></script>
<!-- Bootsrap 4.0.0 JS -->
<script src="<?= base_url('../vendor/bootstrap-4.0.0/assets/js/vendor/popper.min.js') ?>"></script>
<script src="<?= base_url('../vendor/bootstrap-4.0.0/dist/js/bootstrap.min.js') ?>"></script>
<script>
	$(function() {
		$('[data-toggle="popover"]').popover()
	})
</script>

</html>