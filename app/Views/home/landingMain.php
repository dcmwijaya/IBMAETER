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
                    <img src="<?= base_url('img/home/b1.jpg') ?>" class="card-img-top" alt="">
                    <div class="mask rgba-white-light"></div>
                </div>
            </div>
            <div class="col-md-5 mb-4">
                <h2>Inventory Barang Gudang</h2>
                <hr>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis pariatur quod ipsum atque quam
                    dolorem
                    voluptate officia sunt placeat consectetur alias fugit cum praesentium ratione sint mollitia, perferendis
                    natus quaerat!</p>
                <a class="btn btn-info shadow-sm">Detail</a>
            </div>
        </div>
    </div>
    <!--Main container-->
</main>
<!--Main layout-->
<?= $this->endSection() ?>