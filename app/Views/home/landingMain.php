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
                    <a href="<?= base_url("login"); ?>" class="btn mulai btn-info shadow-sm" style="letter-spacing:3px;font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;">
                        <span class="container text-center">Mulai&nbsp;Inventaris</span>
                    </a><br>
                </div>
            </div>
            <hr class="batas">
            <div class="col-md-6 mb-4">
                <img src="<?= base_url('img/Warehouse.jpg') ?>" class="card-img-top" alt="gudang">
            </div>
        </div><br><br>

    </div>
    <!--Div container-->
</div>
<!--Div layout-->
<?= $this->endSection() ?>