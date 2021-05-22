<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<link rel="stylesheet" href="<?= base_url('../css/content.css') ?>" /> <!-- include cakra --->

<!-- style for td -->
<?php $tdStyle = "white-space: -moz-pre-wrap !important; white-space: -pre-wrap; white-space: -o-pre-wrap; white-space: pre-wrap; word-wrap: break-word; white-space: -webkit-pre-wrap; word-break: break-word; white-space: normal;" ?>

<!--Main layout-->
<main class="bg-dark">
    <div class="container pt-4">
        <?php if (session()->getFlashdata('komenPerz')) : ?>
            <div class="position-fixed bottom-0 right-0 p-3" style="z-index: 5; right: 0; bottom: 0;">
                <div class="toast shadow" role="alert" aria-live="assertive" aria-atomic="true" autohide: false>
                    <div class="toast-header bg-dark text-light">
                        <img src="<?= base_url('img/icon/favicon-16x16.png') ?>" class="rounded mr-2" alt="Pesan">
                        <strong class="mr-auto">INVENBAR CI-4</strong>
                        <small>Baru Saja</small>
                        <button type="button" class="ml-2 mb-1 close text-light" data-dismiss="toast" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="toast-body">
                        <?= session()->getFlashdata('komenPerz'); ?>
                    </div>
                </div>
            </div>
        <?php endif ?>
        <section class="mb-4">
            <div class="card">
                <div class="card-header text-center py-3">
                    <h5 class="mb-0 text-center">
                        <strong>Menu Perizinan Barang</strong>
                    </h5>
                </div>
                <div class="card-body pt-1">
                    <div class="container mb-3 pb-2" style="border-bottom: 1px solid #dfdfdf;">
                        <div class="row my-3">
                            <div class="clearfix">
                                <div class="float-left">
                                    <a href="<?= base_url('exlapor/pdfprintIzin'); ?>" id="pizin_pdf" class="btn active btn-success btn-sm shadow-sm p-2"><i class="fas fa-print fa-fw"></i> Print Laporan</a>
                                </div>
                                <div class="float-right">
                                    <button type="button" class="btn active btn-dark dropdown-toggle btn-sm shadow-sm p-2" style="float:right;" onclick="return false;" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-fw fa-file"></i> Export
                                    </button>
                                    <div class="dropdown-menu dm-export">
                                        <a class="dropdown-item dm-export-item" href="<?= base_url('exlapor/excelizin'); ?>" id="izin_xls"><i class="fas fa-file-csv fa-fw me-2"></i>Excel</a>
                                        <a class="dropdown-item dm-export-item" href="<?= base_url('exlapor/docizin'); ?>" id="izin_doc"><i class="fas fa-file-word fa-fw me-2"></i>Word</a>
                                        <a class="dropdown-item dm-export-item" href="<?= base_url('exlapor/pdfizin'); ?>" id="izin_pdf"><i class="fas fa-file-pdf fa-fw me-2"></i>Pdf</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <!-- Reload Table -->
                                <div id="Perizinan_AJAX"></div>
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <small><b>*NB :</b> jika terdapat <b style="color: red;">kesalahan</b> dalam melakukan perizinan, mohon untuk melakukan <b style="color: sandybrown;">permintaan</b> perizinan ulang dari menu kelola barang.</small>
                    </div>
                    <button type="button" class="btn bg-softblue shadow-sm btn-sm p-2" onclick="listPerizinan()"><i class="fas fa-redo-alt fa-fw"></i></button>
                </div>
        </section>
    </div><br>
</main>

<!-- Perizinan Modal -->
<div class="modal fade" id="Perizinan_Modal" tabindex="-1" aria-labelledby="PerizinanLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header text-light" id="Perizinan_Header">
                <h5 class="modal-title" id="Perizinan_Label"> Perizinan Barang</h5>
                <button type="button" class="close modal-dissmis" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="text-light">&times;</span>
                </button>
            </div>
            <form id="Perizinan_Form" method="POST" enctype="multipart/form-data">
            </form>
        </div>
    </div>
</div>

<?= $this->endSection() ?>