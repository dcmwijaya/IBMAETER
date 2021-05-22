<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

<!--Main layout-->
<main class="bg-dark">
    <div class="container py-4">
        <div class="row mb-4 mx-2">
            <div class="card col-sm-12 mx-auto">
                <div class="card-header text-center py-3">
                    <h5 class="mb-0 text-center">
                        <strong><i class="fas fa-fw fa-bell mr-2"></i>PENGUMUMAN</strong>
                    </h5>
                </div>
                <div class="card-body pt-1" style="margin-top: 30px;margin-bottom: 30px;">
                    <div class="container mb-3 pb-2" style="border-bottom: 1px solid #dfdfdf;">
                        <div class="row">
                            <div class="info-card mb-3">
                                <div class="row no-gutters">
                                    <div class="col-md-5 mt-4" id="img-laporanbulanan">
                                        <img src="<?= base_url('../img/brand2.jpg') ?>" class="card-img-top" alt="judul pengumuman" style="width:100%;max-width:350px;border-radius:10px;">

                                        <br>
                                        <div class="row" role="group" aria-label="pagination" style="margin-top:30px;width:100%;">
                                            <?= $pager->links('pengumuman', 'pengumuman_pagination') ?>
                                        </div>
                                    </div>

                                    <div class="col-md-7" id="laporanbulanan-user">
                                        <div class=" card-body event-description">
                                            <?php $c = 1 + (3 * ($curpage - 1)); ?>
                                            <?php foreach ($info as $i) : ?>

                                                <hr>
                                                <div class="pengumuman-slide px-4">
                                                    <div class="pengumuman_header clearfix pb-4 px-7">
                                                        <h6 class="card-title text-muted float-left me-2">
                                                            <button class="btn bg-softblue btn-sm float-right" type="button" data-toggle="collapse" data-target="#pengumuman<?= $c; ?>" aria-expanded="false" aria-controls="collapseExample"><i class="fas fa-fw fa-eye"></i></button>
                                                        </h6><strong><?= $i['judul']; ?></strong>
                                                    </div>
                                                    <div class="collapse px-7" id="pengumuman<?= $c; ?>">
                                                        <div class="card-body border border-bottom">
                                                            <pre class="card-text" id="show_textarea" style="white-space: pre-wrap; word-wrap: break-word; font-family: inherit;"><?= $i['isi']; ?></pre>
                                                            <p class="card-text mb-0"><small class="text-muted"><?= $i['waktu']; ?></small></p>
                                                            <p class="card-text"><small class="font-weight-bold text-muted"><?= $i['nama']; ?></small></p>
                                                        </div>
                                                    </div>
                                                </div>

                                                <?php $c++; ?>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</main>

<?= $this->endSection() ?>