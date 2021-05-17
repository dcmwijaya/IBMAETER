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
                            <div class="flex-fill">
                                <div class="btn-group btn-wrap">
                                    <button type="button" class="btn active btn-dark dropdown-toggle btn-sm shadow-sm p-2" style="float:right;" onclick="return false;" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-fw fa-file"></i> Export
                                    </button>
                                    <div class="dropdown-menu dm-export">
                                        <a class="dropdown-item dm-export-item" href="<?= base_url('exlapor/#'); ?>" id="xls" onclick="return false;"><i class="fas fa-file-csv fa-fw me-2"></i>Excel</a>
                                        <a class="dropdown-item dm-export-item" href="<?= base_url('exlapor/#'); ?>" id="doc" onclick="return false;"><i class="fas fa-file-word fa-fw me-2"></i>Word</a>
                                    </div>
                                    <a href="<?= base_url('exlapor/#'); ?>" id="item_pdf" onclick="return false;" class="btn active btn-success btn-sm shadow-sm p-2"><i class="fas fa-print fa-fw"></i> Print Laporan</a>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <table id="table_perizinan" class="display nowrap " style="font-size: 14px; width:100%; overflow-x:auto;">
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
                                                <td style="<?= $tdStyle; ?>"><?= $log['tgl']; ?></td>
                                                <td><?= $log['nama_pekerja']; ?></td>
                                                <td style="<?= $tdStyle; ?>"><?= $log['nama_barang']; ?></td>
                                                <td><?= $log['request']; ?></td>
                                                <td><?= $log['ubah_stok']; ?></td>
                                                <td>
                                                    <?php if ($log['status'] == 'Diterima') : ?>
                                                        <span class=" py-2 badge badge-success" style="font-weight: 500;font-size: 11px;"><i class="fas fa-check fa-fw mr-1"></i>DITERIMA</span>
                                                    <?php elseif ($log['status'] == 'Ditolak') : ?>
                                                        <span class="py-2 badge badge-danger" style="font-weight: 500;font-size: 11px;"><i class="fas fa-times fa-fw mr-1"></i>DITOLAK </span>
                                                    <?php else : ?>
                                                        <span class="py-2 badge badge-warning" style="font-weight: 500;font-size: 11px;background-color: orange;"><i class="fas fa-spinner fa-fw mr-1"></i>PENDING</span>
                                                    <?php endif; ?>
                                                </td>
                                                <td style="<?= $tdStyle; ?>"><?= $log['ket']; ?></td>
                                                <td>
                                                    <?php if ($log['status'] == 'Pending') : ?>
                                                        <div class="btn-group" role="group" aria-label="inoutcom">
                                                            <button type="button" class="btn btn-success btn-sm btn-acc-item px-2 rounded-left" data-no="<?= $log['no_log']; ?>" data-stok="<?= $log['ubah_stok']; ?>" data-reqs="<?= $log['request']; ?>" data-toggle="modal" data-target="#Accept"><i class="fas fa-check fa-fw"></i>Accept</button>
                                                            <button type="button" class="btn btn-danger btn-sm btn-rjc-item px-2 rounded-right" data-no="<?= $log['no_log']; ?>" data-toggle="modal" data-target="#Rejected"><i class="fas fa-times fa-fw"></i>Decline</button>
                                                        </div>
                                                    <?php else : ?>
                                                        <div class="info-progress">
                                                            <span class=" py-2 badge badge-info" style="font-weight: 500;font-size: 11px;"><i class="fas fa-thumbs-up fa-fw mr-1"></i>Telah Diproses</span>
                                                        </div>
                                                    <?php endif; ?>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
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
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h5 class="modal-title" id="AcceptLabel"><b style="color: green;">Terima</b> Izin Barang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('Admin/AksiPerizinan'); ?>" method="POST" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <div class="form-group">
                        <label for="acc_komentar">Komentar</label>
                        <textarea class="col-sm-12 p-2 <?= ($validation->hasError('komen')) ? 'is-invalid' : ''; ?>" id="acc_komentar" name="komen" placeholder="Tuliskan Komentar Anda" value="<?= (old('komen')) ? old('komen') : ""; ?>"></textarea>
                        <div class="invalid-feedback">
                            <?= $validation->getError('komen'); ?>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" id="acc-nomor" name="no_log">
                        <input type="hidden" id="acc-stok" name="ubah_stok">
                        <input type="hidden" id="acc-reqs" name="reqs">
                        <input type="hidden" id="accepted" name="status" value="Diterima">
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
                <form action="<?= base_url('Admin/AksiPerizinan'); ?>" method="POST" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <div class="form-group">
                        <label for="rjc_komentar">Komentar</label>
                        <textarea class="col-sm-12 p-2 <?= ($validation->hasError('komen')) ? 'is-invalid' : ''; ?>" id="rjc_komentar" name="komen" placeholder="Tuliskan Komentar Anda" value="<?= (old('komen')) ? old('komen') : ""; ?>"></textarea>
                        <div class="invalid-feedback">
                            <?= $validation->getError('komen'); ?>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" id="dec-nomor" name="no_log">
                        <input type="hidden" id="rejected" name="status" value="Ditolak">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-fw fa-window-close"></i> Batal</button>
                        <button type="submit" class="btn btn-primary"><i class="fas fa-check-square fa-fw"></i> Setuju & Selesai</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
