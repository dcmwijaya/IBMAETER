<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

<!--Main layout-->
<main class="bg-dark">
    <div class="container py-4">
        <div class="row mb-4 mx-2">
            <div class="card col-sm-10 mx-auto">
                <div class="card-header text-center py-3">
                    <h5 class="mb-0 text-center">
                        <strong><i class="fas fa-fw fa-bell mr-2"></i>PENGUMUMAN</strong>
                    </h5>
                </div>
                <div class="card-body px-5 text-center mb-3">
                    <img src="<?= base_url('../img/brand2.jpg') ?>" class="card-img-top" alt="judul pengumuman" style="max-width:350px;">
                </div>
                <hr>
                <?php $c = 1; ?>
                <?php foreach ($info as $i) : ?>
                    <div class="pengumuman-slide px-4 mt-3">
                        <div class="pengumuman_header clearfix pb-4">
                            <h6 class="card-title text-muted float-left"><strong><i class="fas fa-fw fa-comment-dots mr-4"></i><?= $i['judul']; ?></strong></h6>
                            <button class="btn bg-softblue btn-sm float-right" type="button" data-toggle="collapse" data-target="#pengumuman<?= $c; ?>" aria-expanded="false" aria-controls="collapseExample"><i class="fas fa-fw fa-eye"></i></button>
                        </div>
                        <div class="collapse px-5" id="pengumuman<?= $c; ?>">
                            <div class="card-body border border-bottom">
                                <pre class="card-text" id="show_textarea" style="white-space: pre-wrap; word-wrap: break-word; font-family: inherit;"><?= $i['isi']; ?></pre>
                                <p class="card-text mb-0"><small class="text-muted"><?= $i['waktu']; ?></small></p>
                                <p class="card-text"><small class="font-weight-bold text-muted"><?= $i['nama']; ?></small></p>
                            </div>
                        </div>
                        <hr>
                    </div>
                    <?php $c++; ?>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</main>

<?= $this->endSection() ?>