<?= $this->extend('home/landingTemplate') ?>

<?= $this->section('homecontent') ?>
<!--Div layout-->
<div class="home-landing">
    <!--Div container-->
    <div class="container home-content">
        <!--Grid row-->
        <div class="row">
            <div class="intro col-md-6 mb-4">
                <div class="view overlay z-depth-1-half">
                    <h2>Inventaris Barang Gudang dan Manajemen Pekerja Terpadu</h2>
                    <hr>
                    <p>Ibmaeter merupakan website yang dapat membantu anda dalam mengelola aktivitas inventaris barang gudang dan manajemen pekerja gudang. Fitur-fitur yang disediakan
                        dapat mempertahankan performa bisnis anda dengan tetap pegang kendali penuh pada persediaan stok barang yang tersaji
                        cepat dan real time. Dengan kemudahan yang didapatkan, jadikanlah Ibmaeter sebagai partner bisnis anda mulai dari sekarang...
                    </p>
                    <a href="<?= base_url("login"); ?>" class="btn mulai btn-info btn-lg shadow-sm" style="letter-spacing:3px;font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;">Mulai&nbsp;Inventaris</a>
                </div>
            </div><hr class="batas">
            <div class="col-md-6 mb-4">
                <img src="<?= base_url('img/Warehouse.jpg') ?>" class="card-img-top" alt="gudang">
            </div>
        </div><br><br>

        <!-- Atrikel -->
        <!-- <section class="article" style="margin-bottom: 50px;">
            <div class="artikel-slider-wrapper">
                <div class="row">
                    <div class="col-12">
                        <div id="carouselExampleIndicators2" class="carousel slide carousel-fade" data-ride="carousel">
                            <div class="custom-header header-wrapper text-center">
                                <h3><i class="fas fa-laptop-house fa-fw me-3"></i>Tentang Website</h3>
                            </div>
                            <hr class="solid"><br>
                            <div class="carousel-inner">

                                <div class="carousel-item active" data-interval="3000">
                                    <div class="card-deck card-wrap">
                                        <div class="card c-main col-md-4">
                                            <div class="card-body c-body">
                                                <img class="img-fluid" alt="100%x280" src="<?= base_url("img/home/login.jpg"); ?>">
                                                <h4 class="card-title"><i class="fas fa-sign-in-alt fa-fw me-2"></i>LOGIN</h4>
                                                <p class="card-text">merupakan sebuah menu yang berfungsi sebagai alat identifikasi akun pekerja atau admin untuk masuk ke dalam sistem.</p>
                                            </div>
                                        </div>
                                        <div class="card c-main col-md-4">
                                            <div class="card-body c-body">
                                                <img class="img-fluid" alt="100%x280" src="<?= base_url("img/home/dashboard.jpg"); ?>">
                                                <h4 class="card-title"><i class="fas fa-house-user fa-fw me-2"></i>DASHBOARD</h4>
                                                <p class="card-text">merupakan sebuah menu yang memiliki manfaat yaitu dapat memberikan informasi dengan mudah dan ringkas pada satu halaman.</p>
                                            </div>
                                        </div>
                                        <div class="card c-main col-md-4">
                                            <div class="card-body c-body">
                                                <img class="img-fluid" alt="100%x280" src="<?= base_url("img/home/kelbarang-1.jpg"); ?>">
                                                <h4 class="card-title"><i class="fas fa-box fa-fw me-2"></i>MANAJEMEN BARANG</h4>
                                                <p class="card-text">merupakan sebuah isi dari menu kelola barang yang tersedia sebagai sarana untuk mengelola barang.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="carousel-item" data-interval="3000">
                                    <div class="card-deck card-wrap">
                                        <div class="card c-main col-md-4">
                                            <div class="card-body c-body">
                                                <img class="img-fluid" alt="100%x280" src="<?= base_url("img/home/kelbarang-2.jpg"); ?>">
                                                <h4 class="card-title"><i class="fas fa-clipboard-list fa-fw me-2"></i>STATUS PERIZINAN BARANG</h4>
                                                <p class="card-text">merupakan sebuah isi dari menu kelola barang yang tersedia sebagai sarana untuk melihat status perizinan stok barang masuk / keluar.</p>
                                            </div>
                                        </div>
                                        <div class="card c-main col-md-4">
                                            <div class="card-body c-body">
                                                <img class="img-fluid" alt="100%x280" src="<?= base_url("img/home/kelbarang-3.jpg"); ?>">
                                                <h4 class="card-title"><i class="fas fa-box fa-fw me-2"></i>SPESIFIKASI BARANG</h4>
                                                <p class="card-text">merupakan sebuah isi dari menu kelola barang yang tersedia sebagai sarana untuk meninjau spesifikasi barang dan supplier.</p>
                                            </div>
                                        </div>
                                        <div class="card c-main col-md-4">
                                            <div class="card-body c-body">
                                                <img class="img-fluid" alt="100%x280" src="<?= base_url("img/home/userabsensi.jpg"); ?>">
                                                <h4 class="card-title"><i class="fas fa-clipboard fa-fw me-2"></i>ABSENSI PEKERJA</h4>
                                                <p class="card-text">merupakan sebuah menu yang berfungsi untuk mendata kehadiran setiap pengguna website.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="carousel-item" data-interval="3000">
                                    <div class="card-deck card-wrap">
                                        <div class="card c-main col-md-4">
                                            <div class="card-body c-body">
                                                <img class="img-fluid" alt="100%x280" src="<?= base_url("img/home/pengumuman.jpg"); ?>">
                                                <h4 class="card-title"><i class="fas fa-bell fa-fw me-2"></i>PENGUMUMAN</h4>
                                                <p class="card-text">merupakan sebuah menu yang dibuat bertujuan agar pekerja dapat mengetahui informasi dari Admin.</p>
                                            </div>
                                        </div>
                                        <div class="card c-main col-md-4">
                                            <div class="card-body c-body">
                                                <img class="img-fluid" alt="100%x280" src="<?= base_url("img/home/laporanbulanan.jpg"); ?>">
                                                <h4 class="card-title"><i class="fas fa-print fa-fw me-2"></i>LAPORAN BULANAN</h4>
                                                <p class="card-text">merupakan sebuah menu yang berfungsi untuk cetak laporan bulanan.</p>
                                            </div>
                                        </div>
                                        <div class="card c-main col-md-4">
                                            <div class="card-body c-body">
                                                <img class="img-fluid" alt="100%x280" src="<?= base_url("img/home/pengaduan.jpg"); ?>">
                                                <h4 class="card-title"><i class="fas fa-comment-dots fa-fw me-2"></i>PENGADUAN</h4>
                                                <p class="card-text">merupakan sebuah menu yang berfungsi untuk menginformasikan langsung kepada admin terkait kendala yang ada.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="carousel-item" data-interval="3000">
                                    <div class="card-deck card-wrap">
                                        <div class="card c-main col-md-4">
                                            <div class="card-body c-body">
                                                <img class="img-fluid" alt="100%x280" src="<?= base_url("img/home/admindatauser.jpg"); ?>">
                                                <h4 class="card-title"><i class="fas fa-users fa-fw me-2"></i>DATA PEKERJA</h4>
                                                <p class="card-text">merupakan sebuah menu yang hanya dapat diakses oleh admin untuk mengelola data pekerja.</p>
                                            </div>
                                        </div>
                                        <div class="card c-main col-md-4">
                                            <div class="card-body c-body">
                                                <img class="img-fluid" alt="100%x280" src="<?= base_url("img/home/adminperizinan.jpg"); ?>">
                                                <h4 class="card-title"><i class="fas fa-clipboard-list fa-fw me-2"></i>PERIZINAN BARANG</h4>
                                                <p class="card-text">merupakan sebuah menu yang hanya dapat diakses oleh admin untuk mengelola perizinan barang keluar / masuk.</p>
                                            </div>
                                        </div>
                                        <div class="card c-main col-md-4">
                                            <div class="card-body c-body">
                                                <img class="img-fluid" alt="100%x280" src="<?= base_url("img/home/adminpengumuman.jpg"); ?>">
                                                <h4 class="card-title"><i class="fas fa-bullhorn fa-fw me-2"></i>EDIT PENGUMUMAN</h4>
                                                <p class="card-text">merupakan sebuah menu yang hanya dapat diakses oleh admin untuk mengelola pengumuman.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="carousel-item" data-interval="3000">
                                    <div class="card-deck card-wrap">
                                        <div class="card c-main col-md-4">
                                            <div class="card-body c-body">
                                                <img class="img-fluid" alt="100%x280" src="<?= base_url("img/home/adminabsensi.jpg"); ?>">
                                                <h4 class="card-title"><i class="fas fa-clipboard fa-fw me-2"></i>ABSENSI USER</h4>
                                                <p class="card-text">merupakan sebuah isi dari menu aktivitas user yang hanya dapat diakses oleh admin untuk mengelola absensi pekerja.</p>
                                            </div>
                                        </div>
                                        <div class="card c-main col-md-4">
                                            <div class="card-body c-body">
                                                <img class="img-fluid" alt="100%x280" src="<?= base_url("img/home/adminaktivitas.jpg"); ?>">
                                                <h4 class="card-title"><i class="fas fa-book-reader fa-fw me-2"></i>AKTIVITAS USER</h4>
                                                <p class="card-text">merupakan sebuah isi dari menu aktivitas user yang hanya dapat diakses oleh admin untuk mengawasi kegiatan setiap pekerja pada website secara realtime.</p>
                                            </div>
                                        </div>
                                        <div class="card c-main col-md-4">
                                            <div class="card-body c-body">
                                                <img class="img-fluid" alt="100%x280" src="<?= base_url("img/home/adminkomplain.jpg"); ?>">
                                                <h4 class="card-title"><i class="fas fa-gavel fa-fw me-2"></i>KOMPLAIN PEKERJA & ARSIP</h4>
                                                <p class="card-text">merupakan sebuah menu yang hanya dapat diakses oleh admin untuk mengelola komplain dari setiap pekerja dan mengarsipkannya.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> -->
        <!-- END of Artikel -->

    </div>
    <!--Div container-->
</div>
<!--Div layout-->
<?= $this->endSection() ?>