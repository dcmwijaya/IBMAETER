<!-- style for td -->
<?php $tdStyle = "white-space: -moz-pre-wrap !important; white-space: -pre-wrap; white-space: -o-pre-wrap; white-space: pre-wrap; word-wrap: break-word; white-space: -webkit-pre-wrap; word-break: break-word; white-space: normal;" ?>

<table id="table_spesifikasi" class="display nowrap " style="font-size: 14px; width:100%; overflow-x:auto;">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Barang</th>
            <th>Kode Barang</th>
            <th>Harga/Item (Rp)</th>
            <th>Berat/Item (gr)</th>
            <th>Nama Supplier</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1; ?>
        <?php foreach ($spec as $b) : ?>
            <tr>
                <td><?= $no ?></td>
                <td style="<?= $tdStyle; ?>"><?= $b['nama_item'] ?></td>
                <td>
                    <?php if ($b['kode_barang'] != null) : ?>
                        <?= $b['kode_barang']; ?>
                    <?php else : ?>
                        <span class="font-weight-bold text-danger">(Kosong)</span>
                    <?php endif; ?>
                </td>
                <td>
                    <?php if ($b['harga'] != 0) : ?>
                        <?= $b['harga']; ?>
                    <?php else : ?>
                        <span class="font-weight-bold text-danger">(Kosong)</span>
                    <?php endif; ?>
                </td>
                <td>
                    <?php if ($b['berat'] != 0) : ?>
                        <?= $b['berat']; ?>
                    <?php else : ?>
                        <span class="font-weight-bold text-danger">(Kosong)</span>
                    <?php endif; ?>
                </td>
                <td style="<?= $tdStyle; ?>">
                    <?php if ($b['nama_supplier'] != null) : ?>
                        <?= $b['nama_supplier']; ?>
                    <?php else : ?>
                        <span class="font-weight-bold text-danger">(Kosong)</span>
                    <?php endif; ?>
                </td>
                <td>
                    <form action="../exlapor/pdfprintNotaspesifikasi" method="POST" role="form">
                        <div class="btn-group" role="group" aria-label="inoutcom">
                            <?php if (intval(session('role')) == 0 && intval(session('divisi_user') <= 4) && intval(session('divisi_user') != 3) || intval(session('divisi_user')) == 10) : ?>
                                <button type="button" class="btn btn-dark btn-sm detl-edit-item px-2 rounded-left" onclick="SpecEditmodal(<?= $b['id_item']; ?>)"><i class="fas fa-edit fa-fw"></i></button>
                            <?php endif; ?>
                            <button type="button" style="background-color: #1687b3;" class="btn text-light btn-sm detl-item px-2" onclick="SpecDetailmodal(<?= $b['id_item']; ?>)"><i class="fas fa-file-alt fa-fw"></i></button>

                            <input type="hidden" name="print_nota" value="<?= $b['id_item']; ?>">
                            <button type="submit" class="btn btn-success btn-sm print-item px-2 rounded-right"><i class="fas fa-fw fa-print"></i></button>
                        </div>
                    </form>
                </td>
            </tr>
            <?php $no++; ?>
        <?php endforeach; ?>
    </tbody>
</table>