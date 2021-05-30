<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

<!--Main layout-->
<main class="bg-dark">
    <div class="container py-4">
        <div class="row mb-4 mx-2">
            <div class="card col-sm-12 mx-auto">
                <div class="card-header text-center py-3">
                    <h5 class="mb-0 text-center">
                        <strong><i class="fas fa-fw fa-bell mr-2"></i> Pengumuman</strong>
                    </h5>
                </div>
                <!-- <div id="toast_alert"></div> -->
                <div class="card-body pt-1" style="margin-top: 30px;margin-bottom: 30px;">
                    <div class="container mb-3 pb-2" style="border-bottom: 1px solid #dfdfdf;">
                        <div class="row">
                            <div class="info-card mb-3">
                                <div class="row no-gutters">
                                    <div class="col-md-12" id="laporanbulanan-user">
                                        <div class=" card-body event-description" style="min-height: 150vh;">
                                            <div class="scroller">
                                                <?php $c = 1; ?>
                                                <?php foreach ($infoJoinV as $i) : ?>
                                                    <div class="pengumuman-slide px-4">
                                                        <hr>
                                                        <div class="pengumuman_header clearfix pb-4 px-7">
                                                            <h6 class="card-title text-muted float-left me-2">
                                                                <i class="fas fa-fw fa-thumbtack"></i>
                                                            </h6>
                                                            <strong><?= $i['judul']; ?></strong>
                                                            <button class="btn bg-softblue btn-sm float-right shadow-sm btn-lihat" onclick="PengumumanDilihat(<?= $i['id_pengumuman']; ?>)" type="button" data-toggle="collapse" data-target="#pengumuman<?= $c; ?>" aria-expanded="false" aria-controls="collapseExample"><i class="fas fa-fw fa-eye"></i></button>
                                                            <span id="statusIndicator<?= $i['id_pengumuman']; ?>">
                                                                <?php if ($i['status'] == 'Belum Dilihat') : ?>
                                                                    <span class="ml-4 py-1 badge bg-nanas" style="font-weight: 500;font-size: 11px;"><i class="fas fa-times fa-fw mr-1"></i>Belum Dilihat </span>
                                                                <?php else : ?>
                                                                    <span class="ml-4 text-muted"><small><i class="fas fa-fw fa-check mr-2"></i>Sudah dilihat</small></span>
                                                                <?php endif; ?>
                                                            </span>
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
        </div>
</main>

<?= $this->endSection() ?>