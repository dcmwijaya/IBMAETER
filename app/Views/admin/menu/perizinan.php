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
                                    <button type="button" class="btn bg-softblue shadow-sm btn-sm p-2" onclick="listPerizinan()"><i class="fas fa-sync fa-fw"></i></button>
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
                </div>
        </section>
    </div><br>
</main>

<!-- Accept Modal -->
<div class="modal fade" id="Accept" tabindex="-1" aria-labelledby="AcceptLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h5 class="modal-title" id="AcceptLabel"><b style="color: green;">Terima</b> Izin Barang </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body pt-1">
                <form action="<?= base_url('Admin/AksiPerizinan'); ?>" method="POST" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <div class="row">
                        <!-- part 1 -->
                        <div class="col-sm-6 px-4">
                            <div class="form-group">
                                <i class="fas fa-fw fa-clipboard-list" style="color:green;"></i> <small>Berikut detail permintaan perizinan yang diajukan oleh pekerja</small>
                                <hr class="mt-0 mb-2">
                                <label for="TerimaNama"><strong>Nama Barang</strong></label>
                                <input type="text" class="form-control" id="TerimaNama" readonly>
                            </div>
                            <div class="form-group row">
                                <div class="col-6">
                                    <div class="row">
                                        <label for="TerimaUbahStok" class="col-sm-4 col-form-label py-0"><strong>Stok</strong></label>
                                        <div class="col-sm-8">
                                            <input type="number" readonly class="form-control text-center" id="TerimaUbahStok">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="row">
                                        <label class="my-0 col-sm-5"><strong>Request</strong> </label>
                                        <span class="col-sm-5" id="TerimaReqs"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-12">
                                    <div class="row">
                                        <label for="TerimaPekerja" class="col-sm-4 col-form-label py-0"><strong>Nama Pekerja</strong></label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="TerimaPekerja" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-12">
                                    <div class="row">
                                        <label for="TerimaTgl" class="col-sm-4 col-form-label py-0"><strong>Tanggal & Waktu</strong></label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="TerimaTgl" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-12">
                                    <textarea class="col-sm-12" id="TerimaKet" rows="4" readonly></textarea>
                                </div>
                            </div>
                        </div>
                        <!-- part 2 -->
                        <div class="col-6 pt-1">
                            <div class="form-group row">
                                <h5><i class="fas fa-fw fa-pen-square" style="color:green;"></i> Kelola Perizinan</h5>
                            </div>
                            <hr class="mt-0 mb-2">
                            <div class="form-group">
                                <label for="acc_komentar"><strong>Tambahkan Komentar</strong></label>
                                <textarea class="col-sm-12 p-2 <?= ($validation->hasError('komen')) ? 'is-invalid' : ''; ?>" id="acc_komentar" name="komen" placeholder="Tuliskan Komentar Anda bila perlu" value="<?= (old('komen')) ? old('komen') : ""; ?>"></textarea>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('komen'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" id="acc-nomor" name="no_log">
                        <input type="hidden" id="acc-stok" name="ubah_stok">
                        <input type="hidden" id="acc-reqs" name="reqs">
                        <input type="hidden" id="accepted" name="status" value="Diterima">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-fw fa-window-close"></i> Batal</button>
                        <button type="submit" class="btn btn-primary"><i class="fas fa-check-square fa-fw"></i> Terima</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Rejected Modal -->
<div class="modal fade" id="Rejected" tabindex="-1" aria-labelledby="RejectedLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h5 class="modal-title" id="RejectedLabel"><b style="color: red;">Tolak</b> Izin Barang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body pt-1">
                <form action="<?= base_url('Admin/AksiPerizinan'); ?>" method="POST" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <div class="row">
                        <!-- part 1 -->
                        <div class="col-sm-6 px-4">
                            <div class="form-group">
                                <i class="fas fa-fw fa-paperclip" style="color:crimson;"></i> <small>Berikut detail permintaan perizinan yang diajukan oleh pekerja</small>
                                <hr class="mt-0 mb-2">
                                <label for="TolakNama"><strong>Nama Barang</strong></label>
                                <input type="text" class="form-control" id="TolakNama" readonly>
                            </div>
                            <div class="form-group row">
                                <div class="col-6">
                                    <div class="row">
                                        <label for="TolakUbahStok" class="col-sm-4 col-form-label py-0"><strong>Stok</strong></label>
                                        <div class="col-sm-8">
                                            <input type="number" readonly class="form-control text-center" id="TolakUbahStok">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="row">
                                        <label class="my-0 col-sm-5"><strong>Request</strong> </label>
                                        <span class="col-sm-5" id="TolakReqs"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-12">
                                    <div class="row">
                                        <label for="TolakPekerja" class="col-sm-4 col-form-label py-0"><strong>Nama Pekerja</strong></label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="TolakPekerja" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-12">
                                    <div class="row">
                                        <label for="TolakTgl" class="col-sm-4 col-form-label py-0"><strong>Tanggal & Waktu</strong></label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="TolakTgl" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-12">
                                    <textarea class="col-sm-12" id="TolakKet" rows="4" readonly></textarea>
                                </div>
                            </div>
                        </div>
                        <!-- part 2 -->
                        <div class="col-6 pt-1">
                            <div class="form-group row">
                                <h5><i class="fas fa-fw fa-pen-square" style="color:crimson;"></i> Kelola Perizinan</h5>
                            </div>
                            <hr class="mt-0 mb-2">
                            <div class="form-group">
                                <label for="acc_komentar"><strong>Tambahkan Komentar</strong></label>
                                <textarea class="col-sm-12 p-2 <?= ($validation->hasError('komen')) ? 'is-invalid' : ''; ?>" id="acc_komentar" name="komen" placeholder="Tuliskan Komentar Anda bila perlu" value="<?= (old('komen')) ? old('komen') : ""; ?>"></textarea>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('komen'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" id="dec-nomor" name="no_log">
                        <input type="hidden" id="rejected" name="status" value="Ditolak">
                        <input type="hidden" id="dec-reqs" name="reqs">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-fw fa-window-close"></i> Batal</button>
                        <button type="submit" class="btn btn-primary"><i class="fas fa-check-square fa-fw"></i> Tolak</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>