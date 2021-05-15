<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<link rel="stylesheet" href="<?= base_url('../css/content.css') ?>" /> <!-- include cakra --->

<!-- style for td -->
<?php $tdStyle = "white-space: -moz-pre-wrap !important; white-space: -pre-wrap; white-space: -o-pre-wrap; white-space: pre-wrap; word-wrap: break-word; white-space: -webkit-pre-wrap; word-break: break-word; white-space: normal;" ?>

<!--Main layout-->
<main class="bg-dark">
    <div class="container pt-4">
        <?php if (session()->getFlashdata('komenKomp')) : ?>
            <div class="alert alert-success" role="alert">
                <?= session()->getFlashdata('komenKomp'); ?>
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
                            <div class="flex-fill">
                                <div class="btn-group btn-wrap">
                                    <button type="button" class="btn active btn-dark dropdown-toggle btn-sm shadow-sm p-2" style="float:right;" onclick="return false;" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-fw fa-file"></i> Export
                                    </button>
                                    <div class="dropdown-menu dm-export">
                                        <a class="dropdown-item dm-export-item" href="<?= base_url('Admin/excelkomplain'); ?>" id="xls"><i class="fas fa-file-csv fa-fw me-2"></i>Excel</a>
                                        <a class="dropdown-item dm-export-item" href="<?= base_url('Admin/dockomplain'); ?>" id="doc"><i class="fas fa-file-word fa-fw me-2"></i>Word</a>
                                    </div>
                                    <a href="<?= base_url('Admin/pdfprintKomplain'); ?>" id="item_pdf" class="btn active btn-success btn-sm shadow-sm p-2"><i class="fas fa-print fa-fw"></i> Print Laporan</a>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <table id="table_komplain" class="display nowrap " style="font-size: 14px; width:100%; overflow-x:auto;">
                                    <thead>
                                        <tr>
                                            <th>Waktu</th>
                                            <th>Pekerja</th>
                                            <th>Barang</th>
                                            <th>Request</th>
                                            <th>Stok</th>
                                            <th>Status</th>
                                            <th>Keterangan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($log_item as $log) : ?>
                                            <tr>
                                                <td><?= $log['tgl']; ?></td>
                                                <td><?= $log['nama_pekerja']; ?></td>
                                                <td><?= $log['nama_barang']; ?></td>
                                                <td><?= $log['request']; ?></td>
                                                <td><?= $log['ubah_stok']; ?></td>
                                                <td>
                                                    <?php if ($log['status'] == 'Diterima') : ?>
                                                        <div type="button" class="btn btn-success btn-sm btn-acc-item px-2 rounded-left"><i class="fas fa-check fa-fw"></i>Diterima</div>
                                                    <?php elseif ($log['status'] == 'Ditolak') : ?>
                                                        <button type="button" class="btn btn-danger btn-sm btn-rjc-item px-2 rounded-right"><i class="fas fa-times fa-fw"></i>DiTolak</button>
                                                    <?php else : ?>
                                                        <button type="button" class="btn btn-warning btn-sm btn-acc-item px-2 rounded-left"><i class="fas fa-spinner fa-fw"></i>Proses...</button>
                                                    <?php endif; ?>
                                                </td>
                                                <td><?= $log['ket']; ?></td>
                                                <td>
                                                    <div class="btn-group" role="group" aria-label="inoutcom">
                                                        <button type="button" class="btn btn-success btn-sm btn-acc-item px-2 rounded-left" data-no="<?= $log['no_log']; ?>" data-toggle="modal" data-target="#Accept"><i class="fas fa-check fa-fw"></i>Accept</button>
                                                        <button type="button" class="btn btn-danger btn-sm btn-rjc-item px-2 rounded-right" data-no="<?= $log['no_log']; ?>" data-toggle="modal" data-target="#Rejected"><i class="fas fa-times fa-fw"></i>Decline</button>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
    </div><br>
</main>

<!-- Accept Modal -->
<div class="modal fade" id="Accept" tabindex="-1" aria-labelledby="AcceptLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h5 class="modal-title" id="AcceptLabel"><b style="color: green;">Terima</b> Izin Barang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('Admin/arsipKomplain'); ?>" method="POST" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <div class="form-group">
                        <label for="acc_komentar">Komentar</label>
                        <textarea class="col-sm-12 p-2 <?= ($validation->hasError('komen')) ? 'is-invalid' : ''; ?>" id="acc_komentar" name="komen" placeholder="Tuliskan Komentar Anda" value="<?= (old('komen')) ? old('komen') : ""; ?>"></textarea>
                        <div class="invalid-feedback">
                            <?= $validation->getError('komen'); ?>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" id="acc-nomor" name="no_komplain">
                        <input type="hidden" id="status" name="status" value="accepted">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-fw fa-window-close"></i> Batal</button>
                        <button type="submit" class="btn btn-primary"><i class="fas fa-check-square fa-fw"></i> Setuju & Selesai</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Rejected Modal -->
<div class="modal fade" id="Rejected" tabindex="-1" aria-labelledby="RejectedLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h5 class="modal-title" id="RejectedLabel"><b style="color: red;">Tolak</b> Izin Barang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('Admin/arsipKomplain'); ?>" method="POST" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <div class="form-group">
                        <label for="rjc_komentar">Komentar</label>
                        <textarea class="col-sm-12 p-2 <?= ($validation->hasError('komen')) ? 'is-invalid' : ''; ?>" id="rjc_komentar" name="komen" placeholder="Tuliskan Komentar Anda" value="<?= (old('komen')) ? old('komen') : ""; ?>"></textarea>
                        <div class="invalid-feedback">
                            <?= $validation->getError('komen'); ?>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" id="dec-nomor" name="no_komplain">
                        <input type="hidden" id="status" name="status" value="rejected">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-fw fa-window-close"></i> Batal</button>
                        <button type="submit" class="btn btn-primary"><i class="fas fa-check-square fa-fw"></i> Setuju & Selesai</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>