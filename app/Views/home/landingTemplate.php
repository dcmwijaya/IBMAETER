<!DOCTYPE html>
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

    <!-- Template Main CSS File -->
    <link rel="stylesheet" href="<?= base_url('../css/home.css') ?>">
</head>

<body class="login-body">
    <?= $this->include('home/landingNavbar'); ?>
    <?= $this->renderSection('homecontent'); ?>
    <?= $this->include('home/landingFooter'); ?>
</body>


<!------------------------ JavaScript ------------------------>
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="../vendor/jquery/jquery.slim.min.js"></script>
<!-- Bootsrap MDB -->
<script type="text/javascript" src="<?= base_url('../js/mdb.min.js') ?>"></script>
<!-- Bootsrap 4.0.0 JS -->
<script src="<?= base_url('../vendor/bootstrap-4.0.0/dist/js/bootstrap.min.js') ?>"></script><!-- jQuery Custom Scroller CDN -->
<script src="<?= base_url('../vendor/bootstrap-4.0.0/assets/js/vendor/popper.min.js') ?>"></script>
<!-- malhiu scrollbar plugin -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script> <!-- malihu depedensi-->
<script src="<?= base_url('../vendor/malihu-scrollbar/jquery.mCustomScrollbar.concat.min.js') ?>"></script>

</html>