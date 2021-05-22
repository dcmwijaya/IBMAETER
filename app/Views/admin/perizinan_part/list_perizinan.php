<!-- style for td -->
<?php $tdStyle = "white-space: -moz-pre-wrap !important; white-space: -pre-wrap; white-space: -o-pre-wrap; white-space: pre-wrap; word-wrap: break-word; white-space: -webkit-pre-wrap; word-break: break-word; white-space: normal;" ?>

<!-- if admin -->
<?php $noLogCounter = 1; ?>
<?php if (session('role') == 0) : ?>
    <table id="table_perizinan" class="display nowrap " style="font-size: 14px; width:100%; overflow-x:auto;">
        <thead>
            <tr>
                <th><i class="fas fa-fw fa-calendar-alt"></i> Waktu</th>
                <th><i class="fas fa-fw fa-users"></i> Pekerja</th>
                <th><i class="fas fa-fw fa-box"></i> Barang</th>
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
                    <td><?= $log['nama']; ?></td>
                    <td style="<?= $tdStyle; ?>"><?= $log['nama_item']; ?></td>
                    <td>
                        <?php if ($log['request'] == "Masuk") : ?>
                            <?= $log['request'] . '<i class="fas fa-fw fa-long-arrow-alt-up " style="color: #06a647 !important; font-size: 18px;"></i>'; ?>
                        <?php else : ?>
                            <?= $log['request'] . '<i class="fas fa-fw fa-long-arrow-alt-down" style="color: #d53651 !important; font-size: 18px;"></i>'; ?>
                        <?php endif; ?>
                    </td>
                    <td style="width: 75px;">
                        <div class="stok text-center bg-dark text-light py-1 rounded">
                            <?= $log['ubah_stok']; ?>
                        </div>
                        <div class="progress mt-2">
                            <div class="progress-bar bg-info" role="progressbar" style="width: <?= $log['ubah_stok']; ?>%" aria-valuenow="<?= $log['ubah_stok']; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </td>
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
                            <div class="btn-group shadow-sm" role="group" aria-label="inoutcom">
                                <button type="button" class="btn btn-success btn-sm btn-acc-item shadow-sm px-2 rounded-left" data-no="<?= $log['no_log']; ?>" onclick="AcceptPerizinan(<?= $log['no_log']; ?>)"><i class="fas fa-check fa-fw"></i>Terima</button>
                                <button type="button" class="btn btn-danger btn-sm btn-rjc-item shadow-sm px-2 rounded-right" data-no="<?= $log['no_log']; ?>" onclick="DeclinePerizinan(<?= $log['no_log']; ?>)"><i class="fas fa-times fa-fw"></i>Tolak</button>
                            </div>
                        <?php else : ?>
                            <div class="info-progress">
                                <form action="<?= base_url('exlapor/pdfprintNotaizin/'); ?>" method="POST" enctype="multipart/form-data">
                                    <span class=" py-2 badge badge-info" style="font-weight: 500;font-size: 11px;"><i class="fas fa-thumbs-up fa-fw mr-1"></i>Telah Diproses</span>
                                    <?php if ($log['status'] == 'Diterima') : ?>
                                        <input type="hidden" name="no_log" value="<?= $log['no_log']; ?>">
                                        <button type="submit" class="ml-2 btn btn-success text-light btn-sm btn-acc-item shadow-sm px-2 rounded-left"><i class="fas fa-print fa-fw"></i></button>
                                    <?php endif; ?>
                                </form>
                            </div>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <!-- for pekerja -->
<?php else : ?>
    <table id="table_perizinan" class="display nowrap " style="font-size: 14px; width:100%; overflow-x:auto;">
        <thead>
            <tr>
                <th><i class="fas fa-fw fa-calendar-alt"></i> Waktu</th>
                <th><i class="fas fa-fw fa-users"></i> Pekerja</th>
                <th><i class="fas fa-fw fa-box"></i> Barang</th>
                <th>Request</th>
                <th>Stok</th>
                <th>Status</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($log_item as $log) : ?>
                <tr>
                    <td style="<?= $tdStyle; ?>"><?= $log['tgl']; ?></td>
                    <td><?= $log['nama']; ?></td>
                    <td style="<?= $tdStyle; ?>"><?= $log['nama_item']; ?></td>
                    <td>
                        <?php if ($log['request'] == "Masuk") : ?>
                            <?= $log['request'] . '<i class="fas fa-fw fa-long-arrow-alt-up " style="color: #06a647 !important; font-size: 18px;"></i>'; ?>
                        <?php else : ?>
                            <?= $log['request'] . '<i class="fas fa-fw fa-long-arrow-alt-down" style="color: #d53651 !important; font-size: 18px;"></i>'; ?>
                        <?php endif; ?>
                    </td>
                    <td style="width: 75px;">
                        <div class="stok text-center bg-dark text-light py-1 rounded">
                            <?= $log['ubah_stok']; ?>
                        </div>
                        <div class="progress mt-2">
                            <div class="progress-bar bg-info" role="progressbar" style="width: <?= $log['ubah_stok']; ?>%" aria-valuenow="<?= $log['ubah_stok']; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </td>
                    <td>
                        <?php if ($log['status'] == 'Diterima') : ?>
                            <span class="py-2 badge badge-success" style="font-weight: 500;font-size: 11px;"><i class="fas fa-check fa-fw mr-1"></i>DITERIMA</span>
                        <?php elseif ($log['status'] == 'Ditolak') : ?>
                            <span class="py-2 badge badge-danger" style="font-weight: 500;font-size: 11px;"><i class="fas fa-times fa-fw mr-1"></i>DITOLAK </span>
                        <?php else : ?>
                            <span class="py-2 badge badge-warning" style="font-weight: 500;font-size: 11px;background-color: orange;"><i class="fas fa-spinner fa-fw mr-1"></i>PROSES...</span>
                        <?php endif; ?>
                    </td>
                    <td style="<?= $tdStyle; ?>"><?= $log['ket']; ?></td>
                    <!-- Jejak Admin -->
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>