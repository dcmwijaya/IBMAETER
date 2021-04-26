<?= $this->extend('home/landingTemplate') ?>

<?= $this->section('homecontent') ?>
<!--Main layout-->
<main class="pt-5">
    <!--Main container-->
    <div class="container">
        <!--Grid row-->
        <div class="row">
            <!--Grid column-->
            <div class="col-md-7 mb-4">
                <div class="view overlay z-depth-1-half">
                    <img src="<?= base_url('img/home/b1.jpg') ?>" class="card-img-top" alt="gudang">
                    <div class="mask rgba-white-light"></div>
                </div>
            </div>
            <div class="intro col-md-5 mb-4">
                <h2>Inventaris Barang Gudang</h2>
                <hr>
                <p>Invenbar merupakan website yang dapat membantu anda dalam mengelola aktivitas inventaris barang gudang. Fitur aplikasi inventory
                    barang ini dapat mempertahankan performa bisnis anda dengan tetap pegang kendali penuh pada persediaan stok barang yang tersaji
                    cepat dan real time. Dengan kemudahan yang didapatkan, jadikanlah Invenbar sebagai partner bisnis anda mulai dari sekarang...
                </p>
                <a class="btn btn-info shadow-sm">Detail</a>
            </div>
        </div><br><br>

        <!-- Atrikel -->
        <section class="article">
            <div class="artikel-slider-wrapper">
                <div class="row">
                    <div class="col-12">
                        <div id="carouselExampleIndicators2" class="carousel slide carousel-fade" data-ride="carousel">
                            <div class="custom-header header-wrapper text-center">
                                <h3><i class="fas fa-laptop-house fa-fw me-3"></i>Tentang Website</h3>
                            </div>
                            <hr class="solid"><br>
                            <div class="carousel-inner">
                                <div class="carousel-item active" data-interval="5000">
                                    <div class="card-deck">
                                        <div class="con-article col-md-4 mb-6">
                                            <div class="card">
                                                <img class="img-fluid" alt="100%x280" src="<?= base_url("img/home/login.jpg"); ?>">
                                                <div class="card-body">
                                                    <h4 class="card-title">LOGIN</h4>
                                                    <p class="card-text">Login Invenbar merupakan sebuah menu yang tersedia sebagai sarana untuk masuk ke akun pengguna website inventaris barang gudang.</p>
                                                    <a href="<?= base_url("login"); ?>">Kunjungi</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="con-article col-md-4">
                                            <div class="card">
                                                <img class="img-fluid" alt="100%x280" src="<?= base_url("img/home/dashboard.jpg"); ?>">
                                                <div class="card-body">
                                                    <h4 class="card-title">DASHBOARD</h4>
                                                    <p class="card-text">Dashboard Invenbar merupakan sebuah menu yang memiliki manfaat yaitu dapat memberikan informasi dengan mudah dan ringkas pada satu halaman.</p>
                                                    <a href="<?= base_url("/Menu/dashboard"); ?>">Kunjungi</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="con-article col-md-4">
                                            <div class="card">
                                                <img class="img-fluid" alt="100%x280" src="<?= base_url("img/home/viewchart.jpg"); ?>">
                                                <div class="card-body">
                                                    <h4 class="card-title">VIEW CHART</h4>
                                                    <p class="card-text">View Chart Invenbar merupakan sebuah menu yang berfungsi menampilkan data stok anda dalam bentuk beberapa diagram.</p>
                                                    <a href="<?= base_url("/Menu/chart"); ?>">Kunjungi</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="carousel-item" data-interval="5000">
                                    <div class="card-group">
                                        <div class="con-article col-md-4">
                                            <div class="card">
                                                <img class="img-fluid" alt="100%x280" src="<?= base_url("img/home/pengumuman.jpg"); ?>">
                                                <div class="card-body">
                                                    <h4 class="card-title">PENGUMUMAN</h4>
                                                    <p class="card-text">Pengumuman Invenbar merupakan sebuah menu yang dibuat bertujuan agar pengguna dapat mengetahui informasi dari Admin.</p>
                                                    <a href="<?= base_url("/Menu/pengumuman") ?>">Kunjungi</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="con-article col-md-4">
                                            <div class="card">
                                                <img class="img-fluid" alt="100%x280" src="<?= base_url("img/home/absensi.jpg"); ?>">
                                                <div class="card-body">
                                                    <h4 class="card-title">ABSENSI PEKERJA</h4>
                                                    <p class="card-text">Absensi Pekerja Invenbar merupakan sebuah menu yang ditujukan untuk pengguna agar dapat melakukan absensi.</p>
                                                    <a href="<?= base_url("/Menu/absensiUser") ?>">Kunjungi</a>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="con-article col-md-4">
                                            <div class="card">
                                                <img class="img-fluid" alt="100%x280" src="<?= base_url("img/home/laporanbulanan.jpg"); ?>">
                                                <div class="card-body">
                                                    <h4 class="card-title">CETAK LAPORAN BULANAN</h4>
                                                    <p class="card-text">Cetak Laporan Bulanan merupakan sebuah menu yang ditujukan untuk pengguna agar dapat melakukan cetak laporan bulanan.</p>
                                                    <a href="<?= base_url("/Menu/laporanBulanan") ?>">Kunjungi</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- END of Artikel -->

    </div>
    <!--Main container-->
</main>
<!--Main layout-->
<?= $this->endSection() ?>
