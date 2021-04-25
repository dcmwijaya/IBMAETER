<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

<!--Main layout-->
<main class="bg-dark">
    <div class="container py-4">
        <div class="row mb-4 mx-2">
            <div class="card col-sm-8 mx-auto">
                <div class="card-header text-center py-3">
                    <h5 class="mb-0 text-center">
                        <strong>PENGUMUMAN</strong>
                    </h5>
                </div>
                <?php foreach ($info as $i) : ?>
                    <div class="card-body px-5 text-center">
                        <img src="<?= base_url('../img/' . $i['foto']); ?>" class="card-img-top" alt="judul pengumuman" style="max-width:100%;max-height:100%;width:1000px;height:300px">
                    </div>
                    <div class="card-body px-5">
                        <hr>
                        <h5 class="card-title"><strong><?= $i['judul']; ?></strong></h5>
                        <pre class="card-text" id="show_textarea" style="white-space: pre-wrap; word-wrap: break-word; font-family: inherit;"><?= $i['isi']; ?></pre>
                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</main>

<?= $this->endSection() ?>
